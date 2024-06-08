<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
  <div class="container">

    <div class="wrapper">
        <h2>Login</h2>
        <form action="{{ route('login.action')}}" method="POST">
              @csrf

            <div class="input-box">
                <input type="text" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="button">
                <!-- <input type="submit" value="Login"> -->
                <button type="submit">Login</button>
            </div>
            
        </form>
    </div>
  </div>

</body>
</html>
