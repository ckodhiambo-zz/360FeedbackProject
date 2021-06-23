<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

    <title>Questions</title>
    <style>
        section {
            padding: 40px;
        }

        .categories-tabs {
            position: relative;
        }

        .tab-control .previous-button, .tab-control .next-button {
            position: absolute;
            bottom: -2%;
            margin-left: 420px;
            margin-right: -410px;
        }

        .tab-control .previous-button {
            left: 43%;
        }

        .tab-control .next-button {
            right: 43%;
        }

        @media (min-width: 0px) {
            .tab-control .previous-button, .tab-control .next-button {
                position: absolute;
                bottom: -2%;
                margin-left: 420px;
                margin-right: -410px;
            }
        }

    </style>
</head>

<body>

<section>
    <div class="container" style="max-width: 1000px">
        @include('includes.flash')
        <div class="card">
            <div class="card-body">
                <div class="card-header text-white bg-info" style="background-color: #0000A0 !important;">
                    <h5>+ 360° Feedback Question Module</h5>
                </div>
                @csrf
                <br>
                <div class="col-sm-12 categories-tabs">
                    <!-- Tabs navs -->
                    <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                        @foreach($survey->categories as $item)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $item->id == 1 ? 'active' : '' }}" id="ex3-tab-{{ $item->id }}"
                                   data-mdb-toggle="tab" href="#ex3-tabs-{{ $item->id }}"
                                   role="tab" aria-controls="ex3-tabs-{{ $item->id }}"
                                   aria-selected="true">{{ $item->category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Tabs navs -->

                    <!-- Tabs content -->

                    <div class="tab-content" id="ex2-content">
                        @foreach($survey->categories as $item)
                            {{-- Fetch the first record from categories and ensure only the first one is given the class 'show active' --}}
                            <div
                                class="tab-pane fade {{ $item->id == $survey->categories->first()->id ? 'show active' : '' }}"
                                id="ex3-tabs-{{ $item->id }}"
                                role="tabpanel" aria-labelledby="ex3-tab-{{ $item->id }}">

                                <form action="{{ route('question.create') }}" method="post">
                                    @csrf
                                    <input type="text" name="item" value="{{$item->id}}" hidden>
                                    <h5 class="mt-2">{{ $item->category_name }} tab content</h5>
                                    <!-- Dropdown Question Input Start-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dynamic_field-{{$item->id}}">
                                            <tr>
                                                <td><input type="text" name="question_name[]"
                                                           placeholder="New Question"
                                                           class="form-control name_list"/></td>
                                                <td>
                                                    <button type="button" name="add" id="add-{{$item->id}}"
                                                            class="btn btn-success">Add More
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- Dropdown Question Input End -->


                                    <br>
                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4"
                                            style="max-width: 200px">Save
                                    </button>

                                </form>


                            </div>
                        @endforeach


                    </div>
                    <!-- Tabs content -->

                    <!-- Tabs ctrl -->

                    <div class="tab-control">
                        <a class="previous-button" role="button"><i class="fa fa-angle-left fa-3x fa-fw"></i></a>
                        <a class="next-button" role="button"><i class="fa fa-angle-right fa-3x fa-fw"></i></a>
                    </div>

                    <!-- Tabs ctrl -->
                </div>

            </div>

        </div>

    </div>
</section>

</body>

</html>
<!-- MDB -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
<script>
    $(document).ready(function () {
        var i = 1;

        // Using jquery we pick the on the click of every button starting with 'add'
        $('[id^=add]').click(function () {

            // Since each button ends with a number unique to the category, we pick that last digit using this code
            var bNumber = this.id.substr(-1);
            i++;

            // We append the last digit obtain above to the 'dynamic_field' element which is meant to have the same
            // last digit (which is the category_id) so that only the matching category table receives an added question
            $('#dynamic_field-' + bNumber).append('<tr id="row' + i + '"><td><input type="text" name="question_name[]" placeholder="New Question" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
<script>
    $('.next-button').click(function () {
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
        //Trigger the click on the tab - same as clicking on the tab
    });
    $('.previous-button').click(function () {
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });

</script>

{{----}}

