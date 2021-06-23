<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
    />
    {{--    <!-- Google Fonts -->--}}
    {{--    <link--}}
    {{--        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"--}}
    {{--        rel="stylesheet"--}}
    {{--    />--}}
    {{--    <!-- MDB -->--}}
    {{--    <link--}}
    {{--        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"--}}
    {{--        rel="stylesheet"--}}
    {{--    />--}}
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

        .bs-example {
            margin: 10px;
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
                        @foreach($survey->categories as $category)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $category->id == 1 ? 'active' : '' }}"
                                   id="ex3-tab-{{ $category->id }}"
                                   data-mdb-toggle="tab" href="#ex3-tabs-{{ $category->id }}"
                                   role="tab" aria-controls="ex3-tabs-{{ $category->id }}"
                                   aria-selected="true">{{ $category->category_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Tabs navs -->

                    <!-- Tabs content -->

                    <div class="tab-content" id="ex2-content">
                        @foreach($survey->categories as $category)
                            <div class="tab-pane fade {{ $category->id == 1 ? 'show active' : '' }}"
                                 id="ex3-tabs-{{ $category->id }}"
                                 role="tabpanel" aria-labelledby="ex3-tab-{{ $category->id }}">

                                <form action="" method="post">
                                    @csrf
                                    <input type="text" name="item" value="{{$category->id}}" hidden>
                                    <h5 class="mt-2">{{ $category->category_name }} tab content</h5>

                                    @foreach($category->questions as $question)

                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <p> {{$question->question_name}}</p>
                                                </div>
                                                <div class="bs-example">
                                                    <form>

                                                        @foreach($survey->ratings as $key => $rating)
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                       name="rating_level"
                                                                       id="{{$rating->id}}" value="{{ $key + 1 }}">
                                                                <label class="form-check-label"
                                                                       for="{{$rating->id}}">{{ $rating->rating_level }}</label>
                                                            </div>
                                                        @endforeach
                                                        {{--                                                        <div class="form-check form-check-inline">--}}
                                                        {{--                                                            <input class="form-check-input" type="radio"--}}
                                                        {{--                                                                   name="inlineRadioOptions"--}}
                                                        {{--                                                                   id="inlineRadio1" value="option1">--}}
                                                        {{--                                                            <label class="form-check-label" for="inlineRadio1">{{$category->target->rating_two}}</label>--}}
                                                        {{--                                                        </div>--}}
                                                        {{--                                                        <div class="form-check form-check-inline">--}}
                                                        {{--                                                            <input class="form-check-input" type="radio"--}}
                                                        {{--                                                                   name="inlineRadioOptions"--}}
                                                        {{--                                                                   id="inlineRadio1" value="option1">--}}
                                                        {{--                                                            <label class="form-check-label" for="inlineRadio1">{{$category->target->rating_three}}</label>--}}
                                                        {{--                                                        </div>--}}
                                                        {{--                                                        <div class="form-check form-check-inline">--}}
                                                        {{--                                                            <input class="form-check-input" type="radio"--}}
                                                        {{--                                                                   name="inlineRadioOptions"--}}
                                                        {{--                                                                   id="inlineRadio1" value="option1">--}}
                                                        {{--                                                            <label class="form-check-label" for="inlineRadio1">{{$category->target->rating_four}}</label>--}}
                                                        {{--                                                        </div>--}}
                                                        {{--                                                        <div class="form-check form-check-inline">--}}
                                                        {{--                                                            <input class="form-check-input" type="radio"--}}
                                                        {{--                                                                   name="inlineRadioOptions"--}}
                                                        {{--                                                                   id="inlineRadio1" value="option1">--}}
                                                        {{--                                                            <label class="form-check-label" for="inlineRadio1">{{$category->target->rating_five}}</label>--}}
                                                        {{--                                                        </div>--}}
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    @endforeach()

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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
<script>
    $('.next-button').click(function () {
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
        //Trigger the click on the tab - same as clicking on the tab
    });
    $('.previous-button').click(function () {
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });

</script>

