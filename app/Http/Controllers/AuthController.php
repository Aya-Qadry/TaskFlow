<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ; 
use App\Models\User ; 
use Session ; 
use Hash ; 

class AuthController extends Controller{

    public function register(){
         return view('auth.register');
    }

    
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'city' => 'required|string|max:255',
            'company' => 'required|string|max:255',
        ]);

        $profilePicture = $request->file('profile_picture');
        $profilePicturePath = $profilePicture->store('profile_pictures', 'public');

        $data = $request->all();
        $data['profilePicturePath'] = $profilePicturePath;

        $check = $this->create($data);
        return redirect("client-dashboard")->withSuccess('You have successfully created your account!');
    }


    public function login(){
        return view('auth.login') ; 
    }

    public function loginPost(Request $request){
        $validator = $request->validate([
            'email' => 'required' ,
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password') ; 
        if(Auth::attempt($credentials)){
            $user = Auth::user() ; 

            if($user->hasRole('client')){   
                return redirect('/client-dashboard');
            }elseif($user->hasRole('director')){
                // return redirect('/director-dashboard');
                return redirect()->route('director.index');
            }else{
                return redirect('/') ; 
            }
            
            // return redirect()->intended('dashboard')
            // ->withSuccess('Signed in') ; 
        }
        $validator['emailPassword'] = "Email / password incorrect" ;
        return redirect("login")->withErrors($validator);
    }
    
    public function dashboard(){ 
        if(Auth::check()){
            // return view('dashboard');
            return redirect()->route('director.index');

        }
        return redirect('login')->withSuccess('You dont have access') ; 
    }

    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'company' => $data['company'],
            'profile_picture' => $data['profilePicturePath'],
            'city' => $data['city'],
        ]);

        $user->assignRole('client');
        Auth::login($user);
        return $user;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


}
 