<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    {{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">


    <title>Employees</title>
</head>
<style>
    section {

        padding: 40px;
    }

    #example_wrapper {
        background-color: #0c63e4;
    }

</style>
<body>
<section>
    <form action="">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="card-header" style="background-color: #0000A0 !important;">
                        <div class="card-title text-white ">
                            <h5>360° Feedback List of Employees</h5>
                        </div>
                    </div>
                    <br>
                    @csrf
                    <table id="myTable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Business Unit</th>
                            <th>Department</th>
                            <th>Supervisor</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($employees as $employee)
                            <tr>
                                <td style="font-family: Verdana, sans-serif;">{{ $employee ->  first_name}}</td>
                                <td style="font-family: Verdana, sans-serif;">{{ $employee ->  last_name}}</td>
                                <td style="font-family: Verdana, sans-serif;">{{ $employee -> email }}</td>
                                @foreach($employee->companies as $item)
                                    <td style="font-family: Verdana, sans-serif;">{{ $item->name }}</td>
                                @endforeach

                                @foreach($employee->departments as $item)
                                    <td style="font-family: Verdana, sans-serif;">{{ $item->name }}</td>
                                @endforeach

                                @foreach($employee->supervisors as $item)
                                    <td style="font-family: Verdana, sans-serif;">{{ $item->name }}</td>
                                @endforeach
                                <td>
                                    <a href="#" class="btn btn-info btn-block"
                                       style="font-family:courier,arial,helvetica;margin-top:4px">Profile</a>
                                    &nbsp;
                                    <a href="#" class="btn btn-danger btn-block"
                                       style="font-family:courier,arial,helvetica;margin-top:4px">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </form>
</section>
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"--}}
{{--        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}

{{--<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>--}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });

</script>

</body>
</html>
