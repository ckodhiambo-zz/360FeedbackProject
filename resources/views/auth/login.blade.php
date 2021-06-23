<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<style>
    section {
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
    }

    card-header {
        color: #000080;
    }

    form {
        margin-top: 30px;
    }

    .form-group {
        position: relative;
    }

    .form-control {
        height: 40px;
    }

    .form-control:focus {
        box-shadow: none;
    }

    input[type=email] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }

    input[type=email]:focus {
        border: 3px solid #000080;
    }

    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }

    input[type=password]:focus {
        border: 3px solid #000080;
    }

    label {
        position: absolute;
        left: 10px;
        top: 10px;
        transition: all 0.3s;
        color: #999;
        font-weight: normal;
    }

    .form-control:focus ~ label {
        left: 5px;
        top: -10px;
        background: #fff;
        padding: 0 5px;
    }

    label.active {
        left: 5px;
        top: -10px;
        background: #fff;
        padding: 0 5px;
    }

    .form-group.form-check {
        margin-left: 15px;
    }

    a {
        margin-left: -15px;
    }

    button {
        color: #ffffff;
    }


</style>
<body>


<section>


    <div class="container">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                                                                                             data-dismiss="alert"
                                                                                             aria-label="close">&times;</a>
                    </p>
                @endif
            @endforeach
        </div>
        <div class="card" style="width: 35rem;">
            <div class="card-body">

                <div class="card-header text-white bg-info" style="background-color: #0000A0 !important;">
                    <h4>360 Feedback Login</h4>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email" style="color:#000080;font-weight:bold">Email address:</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password">
                        <label for="pwd" style="color:#000080;font-weight:bold">Password:</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group form-check">
                        <label class="form-check-label" for="invalidCheck" style="color:#000080;font-weight:bold">
                            {{ __('RememberMe') }}
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting!
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <span style="color:#000080">{{ __('Forgot Your Password?') }}</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<script>
    $(document).ready(function () {
        $(".form-group .form-control").blur(function () {
            if ($(this).val() != "") {
                $(this).siblings("label").addClass("active");
            } else {
                $(this).siblings("label").removeClass("active");
            }
        });
    })
</script>

</body>
</html>

