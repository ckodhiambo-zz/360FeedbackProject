<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function addPost()
    {
        $companies = Company::with('departments')->get();
        $supervisors = Supervisor::all();

        return view('survey.category',
            [
                'companies' => $companies,
                'supervisors' => $supervisors,
            ]);
    }

    public function createPost(Request $request)
    {
        $employee = Employee::query()->create($request->all());
        $employee->companies()->attach([\request('company_id')]);
        $employee->departments()->attach([\request('department_id')]);
        $employee->supervisors()->attach([\request('supervisor_id')]);

        return redirect('/employees')->with('message_sent', 'Details have been added successfully!');

    }

    public function getPost()
    {
        $employees = Employee::orderBy('id', 'ASC')->paginate(6);

        return view('list.employees-list', compact('employees'));
    }

    public function createQuestion()
    {
        return view('survey.question-form');
    }

}
