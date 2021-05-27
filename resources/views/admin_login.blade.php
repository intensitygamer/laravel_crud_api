<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<div class = 'row'>
    <div class = 'container'>  

        
        <h2>Admin Login</h2>

        <form action="{{ route('login') }}" method="POST" >
            <div class="form-group">
            <label for="email"> Email </label>
            <input type="email" class="form-control" name="email" placeholder="Email">
            </div>

            <div class="form-group">
            <label for="password"> Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <input type='submit' class='btn btn-primary' value = "Login">

        </form>
    
    </div>

</div>

</body>
</html>
