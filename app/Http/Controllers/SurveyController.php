<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Survey;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SurveyController extends Controller
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

        foreach (request('rating_level') as $item) {
            $survey->ratings()
                ->create(['rating_level' => $item]);
        }

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

    public function CategoryTab()
    {
        return view('survey.survey-form');
    }

    public function SubmitResults(Request $request)
    {
        $request->session()
            ->reflash();

        $survey = Survey::query()
            ->create(request()->all());

        $survey->target()
            ->create(request()->all());

//        return view('survey.survey-form');
        return redirect('/display-surveys')->with('message_sent', 'Survey has been successfully created!');


    }

    public function postFeedback($id)
    {
        $survey = Survey::find($id);

        return view('survey.survey-form', compact('survey'));
    }

    public function indexQuestions()
    {
        return view('survey.question-form');
    }

    public function sendQuestions(Request $request)
    {
        $request->session()
            ->reflash();

        try {
//            $survey = Survey::find($id);
            $category = Category::find($request->input('item'));
            foreach (request('question_name') as $item) {
                $category->questions()
                    ->create(['question_name' => $item]);
            }

            return redirect('/display-surveys')->with('success', 'Questions for \'' . $category->survey_title . '\' Survey have
            successfully been added. Click on the Details to view the survey structure.');
//            session()->flash('success', 'Questions for \'' . $survey->survey_title . '\' Survey have
//            successfully been added. Click on the <b>Details</b> to view the survey structure.');
        } catch (Exception $e) {
            dd($e);
        }


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
