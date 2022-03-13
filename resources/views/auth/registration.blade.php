<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>SIGN UP</title>

    <style>
        body {
            background-color: rgb(60, 60, 150);
        }
        .eye1:hover {
            fill: #DA4567;
            cursor: pointer;
        }
        .eye2:hover {
            fill: #DA4567;
            cursor: pointer;
        }
        #box {
            margin: auto;
            width: 450px;
            max-width: 450px;
            height: auto;
        }
        .highlight
        {
            border: 1px solid red !important;
        }
    </style>

</head>
<body>

    
    <div class="container bg-light text-dark rounded text-center p-3 mt-5 mb-5" id="box">
        <h3>Create Account</h3>
        <p>It's quick and easy!</p>
        <div class="signUpForm">
            <form action="{{ route('register.custom') }}" method="POST" class="needs-validation"  id="signup" required>
                @csrf

    
                <div class="input-group mb-3 w-75 mx-auto">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg></span>
                    </div>
                    <input type="text" autocomplete="off" name="name" id="name" value="" class="form-control" placeholder="Username" required>
                    @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
    
                <div class="input-group mb-3 w-75 mx-auto">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                        </svg></span>
                    </div>
                    <input type="email" autocomplete="off" name="email" id="email" value="" class="form-control " placeholder="Email" required>
                    @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
    
                <div class="input-group mb-3 w-75 mx-auto">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                        </svg></span>
                    </div>
                    <input type="password" autocomplete="off" class="form-control border-right-0" name="password" id="password" placeholder="Create Password" required>
                    @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-left-0" id="showPass"><svg class="eye1" id="eye1" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                            <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg></span>
                    </div>
                </div>
    
                
    
                <div class="registrationFormAlert mb-2" id="CheckPasswordMatch"></div>
    
                <button type="submit" class="btn btn-primary btn-block mb-4 w-75 mx-auto" id="signUp" >SIGN UP</button>
    
                <hr class="w-75">
    
                <div>
                    <p>Already have an account?</p>
                    <a class="btn btn-dark btn-block mb-3 w-50 mx-auto text-center" id="register" href="{{ route('login') }}">Login</a>
                </div>
            </form>
        </div>
        
    </div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="/js/javascript.js"></script>

</html>