<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body{
            background: #ffb889;
        }
    </style>
</head>
<body>
    @auth
    <p>Congratulations. You are logged in</p>
    <form action="/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>
    @else
        <div class="container box animate__animated animate__backInRight">
            <h3 align="center">Login Page</h3>
            <br>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="/login">
                @csrf
                <div class="form-group">
                    <label for="user_email">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Please enter your email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Please enter your password">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary" style="float: right; margin-bottom: 10px;">Login</button>
                </div>
            </form>
        </div>
    @endauth
</body>
</html>