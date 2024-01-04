<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Foodee Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png"
        sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32"
        type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16"
        type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg"
        color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body class="text-center">

    <main class="form-signin">
        {{-- signin form --}}
        <section class="form-signin" id="signin-form">
            <img class="mb-4"
                src="data:image/png;base64,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"
                alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput"
                        placeholder="name@example.com" value="admin@gmail.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
            <p> Not registered ? </p>
            <button class="w-100 btn btn-lg btn-danger" id="register-button"
                onclick="preventDefault()">Register</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>

        </section>

        {{-- registraton form --}}
        <section class="form-signin" id="registration-form">
            <img class="mb-4"
                src="data:image/png;base64,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"
                alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
            <form action="{{ route('registration') }}" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" name="name" class="form-control" id="floatingName" placeholder="John Stone">
                    <label for="floatingName">Name</label>
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" id="agree-term"> I agree to the terms and conditions
                    </label>
                    <p class="text-danger" id="checkbox-message">* Please check the terms and conditions</p>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" id="register">Register</button>
            </form>
            <p>Already have an account ?</p>
            <button class="w-100 btn btn-lg btn-success" id="signin-button">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </section>
    </main>

    <script>
        $(document).ready(function() {

            $("#registration-form").hide();
            $("#checkbox-message").hide();

            $("#register-button").click(function(e) {
                $("#registration-form").show();
                $("#signin-form").hide();
            });
            $("#signin-button").click(function(e) {
                $("#registration-form").hide();
                $("#signin-form").show();
            });

        });
        $('#register').click(function() {
            if (!$('#agree-term').is(':checked')) {
                $('#checkbox-message').show();
                return false;
            }
        });
    </script>

</body>

</html>
