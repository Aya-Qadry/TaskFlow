<!DOCTYPE html>
 <html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 

 
    <link href="{{asset('assets/css/register.css')}}" rel="stylesheet" type="text/css"> 
    

</head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="{{ route('register.action')}}" method="POST">
    @csrf

      <div class="input-box">
        <input type="text" placeholder="Enter your name" required name='name'>
      </div>
      <!-- <div class="input-box">
        <input type="text" placeholder="Enter your last name" required name='lastname'>
      </div> -->
      <div class="input-box">
        <input type="text" placeholder="Enter your email" required name='email'>
        <!-- @if ($errors->has('email')) -->
            <!-- <span class="text-danger">{{ $errors->first('email') }}</span> -->
        <!-- @endif   -->
    </div>
    <div class="input-box">
        <input type="text" placeholder="Enter your company" required name='company'>
      </div>

      <div class="input-box">
        <input type="password" placeholder="Create password" required name='password'>
      </div>

      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="#">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>