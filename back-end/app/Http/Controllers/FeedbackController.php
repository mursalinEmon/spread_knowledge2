<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use App\StudentProfile;

class FeedbackController extends Controller
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

    public function feedback(Request $request){
        $user_id=auth()->user()->id;
        $tmp=[];
        $student_id=StudentProfile::where('user_id',$user_id)->get();
        // dd($student_id);
        $feedback =Feedback::where('student_id',$student_id[0]->id)->get();
        // dd($feedback);
        $wrong=$feedback[0]->wrong;
        $w_course=$request->course_id;
        if($feedback[0]->wrong_ids ==null){
            array_push($tmp,$w_course);
        }else{
            array_merge($tmp,$feedback[0]->wrong_ids);
            array_push($tmp,$w_course);
        }

        $feedback[0]->update([
            'wrong'=>$wrong+1,
            'wrong_ids'=>$tmp
        ]);
        return response(['message'=>'success']);
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
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
