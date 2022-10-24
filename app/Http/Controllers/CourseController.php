<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::paginate(10);
        return view('course.index',compact('courses'));
    }
    

    public function create(){
        return view('course.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required','unique:college_course,course_name'],
            'code' => ['required'],
        ]);
        $slug = Str::slug($request->name);

        $course = new Course();
        $course->course_name = $request->name;
        $course->course_code = $request->code;
        $course->course_description = $request->description;
        $course->course_slug = $slug;
        // $course->status = "active";

        if($course->save()){
            return redirect('/course')->with('status','Course Successfully Added!');
        }else{
            return redirect()->back()->with('error','Course Successfully Added!');
        }
    }
    public function edit($id){
        $course = Course::where('id',$id)->first();
        return view('course.edit', compact('course'));
    }
    public function update(Request $request,$id){

        $request->validate([
            'name' => ['required','unique:college_course,course_name'],
            'code' => ['required'],
        ]);
        $slug = Str::slug($request->name);

        $course = Course::where('id', $id)->first();
        $course->course_name = $request->name;
        $course->course_code = $request->code;
        $course->course_description = $request->description;
        $course->course_slug = $slug;

        if($course->save()){
            return redirect('/course')->with('status','Course Successfully Updated!');
        }else{
            return redirect()->back()->with('error','Something went wrong!!!');
        }
    }
}
