<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Company</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body> 
    <div class="main-container">
        @include('header')
        <main class="main">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/create-companies" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container-box">                    
                        <h1 class="textContainer headerText">Create Company</h1>                    
                        <button type="submit" class="btn-save" style="margin-right: 10px;">Save</button>                    
                    </div>
                    <h2 class="textContainer">COMPANY INFORMATION</h2>
                    <br>
                    <div class="container my-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_companies">Name:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                        <input type="text" id="name_companies" name="name_companies" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email_companies">Email:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="email" id="email_companies" name="email_companies" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo_companies">Company Logo:</label>                                    
                                    <input type="file" id="logo_companies" name="logo_companies" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website_companies">Company Website:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                        <input type="text" id="website_companies" name="website_companies" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </form>
            </div>            
        </main>
    </div>
</body>
</html>
