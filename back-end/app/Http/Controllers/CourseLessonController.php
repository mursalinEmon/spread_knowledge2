<?php

namespace App\Http\Controllers;

use App\CourseLesson;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class CourseLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseLesson  $courseLesson
     * @return \Illuminate\Http\Response
     */
    public function show(CourseLesson $courseLesson)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseLesson  $courseLesson
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseLesson $courseLesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseLesson  $courseLesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseLesson $courseLesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseLesson  $courseLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseLesson $courseLesson)
    {
        //
    }

    public function find_lessons(){
        $data=CourseLesson::all();
        return response($data);
    }

    public function selected_lessons($id){

        $data=CourseLesson::where('course_id',$id)->get();
        dd($data);
        return response($data);
    }
    public function delete_lesson($id){

        $lesson=CourseLesson::findOrFail($id);
        $lesson->delete();
        return response(['message'=>'Lesson Deleted Successfully..!!']);
    }
    public function edit_lesson($id){
        $lesson=CourseLesson::findOrFail($id);
        return view('course.editCourseLesson',compact('lesson'));
    }
    public function update_lesson(Request $request){
        $lesson=CourseLesson::findOrFail($request->id);
        $lesson->update([
            'lesson_body' => $request->lesson_body,
            'lesson_title' => $request->lesson_title
        ]);
        return response(['message'=>'Lesson Upadted Successfully...!! ']);
    }
}
