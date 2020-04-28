<?php

namespace App\Http\Controllers;

use App\Student;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "hii index method";
        // $std=new Student;
        // $std->name='vikram';
        // $std->email='vikram@gmail.com';
        // $std->address='jalor';
        // $std->save();

        $std = Student::first()->paginate(4);
        //return($std);

        return view('website.index',compact('std'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo "you are now create button";
        return view('website.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        echo "store method called";
        //print_r($request->all());
        // $student=new Student([
        //     'name'=> $request->get('name'),
        //     'email'=>$request->get('email'),
        //     'address'=>$request->get('address')
        // ]);
        // $student->save();

        //Student::create($request->all());

       
        //return redirect()->route('student.index')->with('success','data will be inserted successfully');
       // return redirect()->back()->with('message', 'IT WORKS!');
        //echo "data save successfully";
        //return view('website.create');
        //echo "data add";
        //return redirect()->back()->with('successs', 'Added Successfully!');
        //session()->flash('successs', 'Added Successfully!');
        return redirect()->back()->with('successs', 'Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student) 
    {
        //echo "show method calle";
        return view('website.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
