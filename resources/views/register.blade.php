<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrit
        y="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="registerPage.css">
        <title>Register Page</title>

        <style>
            .form-control::placeholder { 
                color: rgb(11, 11, 117);
                opacity: 50%;
                font-size: small;
            }               

            .btn-primary {
                background-color:  rgb(11, 11, 117);
                border-style: none;
            }

            .login-link {
                color: rgb(11, 11, 117);
                font-size: x-small;
            }

            a {
                color: rgb(11, 11, 117);
                text-decoration: none;
                font-weight: bold;
            }

            .validation{
                color: red;
                font-size: 12px;
                font-weight: bold;
                padding-top: 5px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="register-page" style="background-color: rgb(11, 11, 117);">
            <div class="container min-vh-100 d-flex align-items-center justify-content-center">
                <div class="card text-dark bg-light ma-5 shadow" style="min-width: 30%;">
                    <div class="card-header fw-bold text-center">REGISTER
                        <a href="#">
                        <button type="button" class="btn-close position-absolute top-25 end-0 me-3" aria-label="Close"></button>
                        </a>
                    </div>
                    <div class="card-body">
                        
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>Please reinput register, there are wrong input</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="mb-2 mt-4">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Firstname" required>
                                <div class="validation">
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Lastname" required>
                                <div class="validation">
                                </div>
                            </div>
                            <div class=" mb-2">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                <div class="validation">
                                    
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <div class="validation">
                                    
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                <div class="validation">
                                    
                                </div>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                                <div class="validation">
                                </div>
                            </div>
                            <div class="col d-grid mb-5">
                                <button type="submit" class="btn btn-primary" name="register">Daftar</button>
                            </div>
                            <div class="login-link col d-grid mt-2 text-center">
                                <p>Already Have an Account?
                                    <a href="{{ url('login') }}">Login</a> 
                                </p>
                            </div>                     
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>