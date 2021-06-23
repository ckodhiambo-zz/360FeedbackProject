<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Survey;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class dummyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexSurvey()
    {
//        $categories = Category::all();
//        $ratings = Target::all();

        return view('survey.new-survey');
    }

    public function ShowSurveys()
    {
        return view('survey.list-of-surveys');
    }


    public function create(Request $request)
    {

        $request->session()
            ->reflash();

        $survey = Survey::query()
            ->create(request()->all());

        foreach (request('category_name') as $item) {
            $survey->categories()
                ->create(['category_name' => $item]);
        }


        $survey->ratings()
            ->create(request()->all());

//        return $survey;
        return redirect('/display-surveys')->with('message_sent', 'Survey has been successfully created!');

    }

    public function store(Request $request)
    {

    }

    public function displaySurveys()
    {
        $surveys = Survey::orderBy('id', 'ASC')->paginate();

        return view('survey.list-of-surveys', compact('surveys'));
    }

    public function displayCategories($id)
    {
        $survey = Survey::query()->where('id', $id)
            ->with('categories')
            ->first();

//        return $survey;
        return view('survey.question-form', compact('survey'));
    }

    public function indexQuestions()
    {
        return view('survey.question-form');
    }

    public function sendQuestions(Request $request)
    {
//        dd($request->all());


//        Session::put($category, $);

        try {
            $category = Category::find($request->input('item'));

            $question1 = $request->input('question_1');
            $question2 = $request->input('question_2');
            $question3 = $request->input('question_3');
            $question4 = $request->input('question_4');
            $question5 = $request->input('question_5');

            $questions = [$question1, $question2, $question3, $question4, $question5];

            foreach ($questions as $q) {
                $category->questions()->saveMany([
                    new Question(['question_name' => $q])
                ]);
            }

            session()->flash('success', 'Questions for category \'' . $category->category_name . '\' have
            successfully been added. Proceed to the next category or add more question on the same.');
        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->back();


//        $request->session()->reflash();

//        $request->validate([
//            'question_name'=>'required',
//        ]);

//        Survey::create($request->all());

//        $survey = Survey::query()
//            ->create(request()->all());
//
//        $survey->questions()
//            ->create(request()->all());
//
//
        return redirect('/display-surveys')->with('message_sent', 'Survey has been successfully created!');


    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
