<!DOCTYPE html>
 <html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Log in </title> 

 
    <link href="{{asset('assets/css/register.css')}}" rel="stylesheet" type="text/css"> 
    

</head>
<body>
  <div class="wrapper">
    <h2>Log in</h2>
    <form action="{{ route('login.action')}}" method="POST">
    @csrf
      <div class="input-box">
        <input type="text" placeholder="Enter your name" required name='email'>
      </div>

        <!-- @if ($errors->has('email')) -->
            <!-- <span class="text-danger">{{ $errors->first('email') }}</span> -->
        <!-- @endif   -->
      <div class="input-box">
        <input type="password" placeholder="Create password" required name='password'>
      </div>

      <div class="input-box button">
        <input type="Submit" value="Login">
      </div>

    </form>
  </div>
</body>
</html>