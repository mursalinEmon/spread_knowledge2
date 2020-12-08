<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\CourseTopic;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('course.createCourse',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->file('file')){
            $image = $request->file;
            $imagePath = $request->file('file');
            $imageName=$imagePath->getClientOriginalName();
            $image->move(public_path('image/'.auth()->user()->name.'/'),$imageName);
            $course=Course::create([
                'contributor_id'=>auth()->user()->id,
                'course_title'=>$request->title,
                'image'=>'image/'.auth()->user()->name.'/'.$imageName,
                'course_level'=>$request->level,
                'rating'=>1.0,
                'category_id'=>$request->category_id,
                'sub_category_id'=>$request->sub_category_id,
                'tags'=> $request->tags,
            ]);

            return response(['message' => 'Course created Successfully','course_id'=>$course->id]);
        }
    }
    public function create_topic(Request $request){
        $course_topic=CourseTopic::create([
            'course_id'=>$request->course_id,
            'topic_title'=>$request->topic_title,
            'topic_body'=>$request->topic_body,
        ]);
        return response(['message'=>"Course Topic Created Successfully.."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
    public function course_list($id){
        $courses=Course::where('contributor_id',$id)->get();
            return view('course\courseList',compact('courses'));
    }
}
