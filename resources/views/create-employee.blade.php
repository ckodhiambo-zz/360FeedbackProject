<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Employee Registration</title>
</head>
{{--{{var_dump($companies)}}--}}
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

    .card-header {
        color: #0000A0;
    }

    form {
        margin-top: 30px;
    }

    .form-group {
        position: relative;
    }

    .row {
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
        border: 3px solid #0000A0;
    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        font-family: verdana;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }

    input[type=text]:focus {
        border: 3px solid #0000A0;
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
        border: 3px solid #0000A0;
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

    button {
        margin-left: 260px;
        color: #ffffff;
    }


</style>
<body>
<section>
    <div class="container">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <div class="card-header text-white bg-info" style="background-color: #0000A0 !important;">
                    <h5>360° Feedback Employee Registration</h5>
                </div>
                <form method="post" action="{{ route('post.create') }}">
                    @csrf
                    <div class="form-group" style="margin-top: -15px !important;">
                        <div class="row" style="margin-top: 20px !important;">
                            <div class="col">
                                <input id="first_name" type="text" class="form-control" name="first_name" value=""
                                       required
                                       autofocus>
                                <label for="first_name"
                                       style="color:#0000A0;font-weight:bold;margin-left:12px;margin-top: 5px">Employee's
                                    First Name</label>
                            </div>
                            <div class="col">
                                <input id="last_name" type="text" class="form-control" name="last_name"
                                       aria-label="Last name">
                                <label for="last_name"
                                       style="color:#0000A0;font-weight:bold;margin-left: 12px;margin-top: 5px">Employee's
                                    Last Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 10px !important;">
                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                        <label for="email" style="color:#0000A0;font-weight:bold">Employee's Email Address</label>
                    </div>
                    <div class="form-group" style="margin-top: 20px !important;">
                        <input id="position" type="text" class="form-control" name="position" value="" required
                               autofocus>
                        <label for="position" style="color:#0000A0;font-weight:bold">Employee's Position</label>
                    </div>

                    <div class="form-group" style="margin-top: -20px !important;">
                        <label for="company_id" class="form-label"
                               style="color:#0000A0;font-weight:bold;margin-left:0px;margin-top: 10px">Company/Business
                            Unit</label>
                        <br>
                        <br>
                        <select class="custom-select" name="company_id" id="company_id" required>
                            <option selected>Select Company</option>
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group" id="company_{{$company->id}}" style="margin-top: -20px !important;">
                        <label for="department_id" class="form-label"
                               style="color:#0000A0;font-weight:bold;margin-left:0px;margin-top: 10px">Department</label>
                        <br>
                        <br>
                        <select class="custom-select" name="department_id" required>
                            <option selected>Select Department</option>
                            @foreach ($companies as $company)
                                @foreach ($company->departments as $department)
                                    <option class="departments company_{{$company->id}}"
                                            value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            @endforeach
                        </select>

                    </div>
                    {{--                    <div class="form-group" id="supervisor_id" style="margin-top: -20px !important;">--}}
                    {{--                        <label for="supervisor_id" class="form-label"--}}
                    {{--                               style="color:#0000A0;font-weight:bold;margin-left:0px;margin-top: 10px">Supervisor</label>--}}
                    {{--                        <br>--}}
                    {{--                        <br>--}}
                    {{--                        <select class="custom-select" name="supervisor_id" required>--}}
                    {{--                            <option selected>Select Supervisor</option>--}}
                    {{--                            @foreach ($supervisors as $supervisor)--}}
                    {{--                                <option value="{{$supervisor->id}}">{{$supervisor->name}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}

                    {{--                    </div>--}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-outline-success">Register</button>
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
    $('#company_id').change((event) => {
        $('.departments').hide();
        $(`.company_${event.target.value}`).show();
    });
    $(document).ready(function () {
        $('.departments').hide();
    });
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
