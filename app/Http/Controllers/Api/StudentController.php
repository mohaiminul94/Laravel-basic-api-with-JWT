<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function store(Request $request)
    {
        $data= $request->validate([
            'name' => 'required|string',
        ]);

        if($data) {
            Student::create($data);
            return response('Done');
        } else {
            return response('Something went wrong!');
        }

    }

    public function show($id)
    {
        $student= Student::find($id);
        return response($student);

    }

    public function update(Request $request, $id)
    {
        $data= $request->validate([
            'name' => 'required|string',
        ]);

        if($data) {
            Student::where('id',$id)->update($data);
            return response('Done');
        } else {
            return response('Something went wrong!');
        }

    }

    public function destroy($id)
    {
        $delete= Student::destroy($id);

        if($delete) {
            return response('Done');
        } else {
            return response('Something went wrong!');
        }

    }

}
