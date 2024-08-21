<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Authentication Forms </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <span class="big-circle">
        <span class="inner-circle"></span>
    </span>
    <img src="https://i.imgur.com/wcGWHvx.png" class="square" alt="" />
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <div class="infield">
                    <input type="text" id="name" placeholder="Name" />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="email" id="sign_up_email" placeholder="Email" name="email" />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" id="sign_up_password" placeholder="Password" />
                    <label></label>
                </div>
                <button onclick="sign_up()">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <div class="form">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <div class="infield">
                    <input type="email" id="email" placeholder="Email" name="email" />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" id="password" placeholder="Password" />
                    <label></label>
                </div>
                <a href="#" class="forgot">Forgot your password?</a>
                <button id="login" onclick="login()">Sign In</button>
            </div>
        </div>
        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button>Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button id="signUpBtn">Sign Up</button>
                </div>
            </div>
            <button id="overlayBtn"></button>
        </div>
    </div>
    <input type="hidden" name="_token" id="csrf_token" value="{{ Session::token() }}" />


    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const container = document.getElementById('container');
        const overlayCon = document.getElementById('overlayCon');
        const overlayBtn = document.getElementById('overlayBtn');

        overlayBtn.addEventListener('click', () => {
            container.classList.toggle('right-panel-active');

            overlayBtn.classList.remove('btnScaled');
            window.requestAnimationFrame(() => {
                overlayBtn.classList.add('btnScaled');
            });
        });

        //login
        function login() {
            var email = $("#email").val();
            var password = $("#password").val();

            $.ajax({
                type: "POST",
                // url: "{{ url('/login') }}",
                url: "/login",
                data: {
                    email: email,
                    password: password,
                    _token: $("#csrf_token").val()
                },
                success: function(data) {
                    // console.log(data.status);
                    if (data.status == "success" && data.message == "successfully login") {
                        window.location.href = "/dashboard";
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Please enter Register email and password",
                            timer: 1500
                        });
                    }
                }
            })
        }


        //signup
        function sign_up() {
            var name = $("#name").val();
            var email = $("#sign_up_email").val();
            var password = $("#sign_up_password").val();

            $.ajax({
                type: "POST",
                // url: "{{ url('/register') }}",
                url: "/sign_up",
                data: {
                    name: name,
                    email: email,
                    password: password,
                    _token: $("#csrf_token").val()
                },
                success: function(data) {
                    // console.log(data.status);
                    if (data.status == "success" && data.message == "Successfully registered") {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Registration successful",
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Registration failed, please try again later",
                            timer: 1500
                        })
                    }
                }
            })
        }
    </script>
</body>

</html>
