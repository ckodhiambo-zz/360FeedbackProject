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
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
        rel="stylesheet"
    />
    <title>Register Employee</title>
    <style>
        section {
            padding: 40px;
        }
    </style>
</head>
<body>
<section>
    <div class="container">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-header text-white bg-info" style="background-color: #0000A0 !important;">
                        <h5>360° Feedback Employee Registration</h5>
                    </div>
                    <hr>
                    <form method="post" action="{{ route('post.create') }}">
                    @csrf
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form3Example1" class="form-control" name="first_name"/>
                                    <label class="form-label" for="form3Example1">Employee's First Name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form3Example2" class="form-control" name="last_name"/>
                                    <label class="form-label" for="form3Example2">Employee's Last Name</label>
                                </div>
                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form3Example3" class="form-control" name="email"/>
                            <label class="form-label" for="form3Example3">Employee's Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form3Example4" class="form-control" name="position"/>
                            <label class="form-label" for="form3Example4">Position</label>
                        </div>

                        <div class="form-group">
                            <label for="company_id" class="form-label"
                                   style="color:#0000A0;font-weight:bold;margin-left:0px;">Company/Business
                                Unit</label>
                            <br>
                            <br>
                            <select class="custom-select" name="company_id" id="company_id" style="margin-top:-45px;"
                                    required>
                                <option selected>--Select Company--</option>
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group" id="company_{{$company->id}}">
                            <label for="department_id" class="form-label"
                                   style="color:#0000A0;font-weight:bold;margin-left:0px;">Department</label>
                            <br>
                            <br>
                            <select class="custom-select" name="department_id" style="margin-top:-45px;" required>
                                <option selected>--Select Department--</option>
                                @foreach ($companies as $company)
                                    @foreach ($company->departments as $department)
                                        <option class="departments company_{{$company->id}}"
                                                value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                @endforeach
                            </select>

                        </div>


                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>

                    </form>
                </div>
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
<!-- MDB -->
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
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
</body>
</html>
