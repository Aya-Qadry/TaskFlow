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

    public function registerPost(Request $request){
        $request->validate([
            // 'firstname' => 'required' ,
            'name' => 'required' , 
            'email' => 'required|email|unique:users' , 
            'password' => 'required|min:6' ,
        ]);

        $data = $request->all() ; 
        $check = $this->create($data) ;
        return redirect("dashboard")->withSuccess('You have successfully created your account ! ');
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
                return redirect('/director-dashboard');
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
            return view('dashboard');
        }
        return redirect('login')->withSuccess('You dont have access') ; 
    }

    public function create(array $data){
        // return User::create([
        //     'name' => $data['name'] ,
        //     'email' => $data['email'] ,
        //     'password' => Hash::make($data['password']) 
        // ]);
        $user = User::create([
            'name' => $data['name'] ,
            'email' => $data['email'] ,
            'role_id' => 1,
            'password' => Hash::make($data['password']) 
        ]);

        $user->assignRole('client');
        Auth::login($user);

        return $user ; 

    }

}
 