<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index()
    {
        $students= student::latest()->paginate(5);
        return view('students.index'),compact('students'))
            ->with('i'(request()->input('page'1)-1*5);
    }
 
    
    public function create()
    {
        return view('students.create');
    }
 
  
    public function store(Request $request)
    {
        // $input = $request->all();
        // Contact::create($input);
        // return redirect('contact')->with('flash_message', 'Contact Addedd!');  
        $request->validate([
            'students' =>'required',
            'course' =>'required',
            'fee' =>'required',
            

        ]);


        Student::create($request->all());


        return redirect()->route('students.index');

        ->with('success','Students created successfully');
    }
 
    
    public function show(Student $student)
    {
        // $contact = Contact::find($id);

        return view('students.show',compact('student'));
    }
 
    
    public function edit(Student $student)
    {
        // $contact = Contact::find($id);
        return view('students.edit',compact('student'));
    }
 
  
    public function update(Request $request, Student $student)
    {
        // $contact = Contact::find($id);
        $request->validate([

        ]);
        $student->update($request->all());
        // $contact->update($input);
        return redirect()->route('students.index')
            ->with('success','Student Updated Succesfully');
    }
 
  
    public function destroy(Student $student)
    {
        // Contact::destroy($id);
        $student->delete();
        return redirect()->route('students.index')
            ->with('success','Student Deleted Succesfully'); 
    }
}
