<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseLesson;
use App\ExamQuestion;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
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
    public function create(Course $course,CourseLesson $courseLesson )
    {

        return view('course.createCourseLessonExam',compact('course','courseLesson'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamQuestion $examQuestion)
    {
        //
    }
}
