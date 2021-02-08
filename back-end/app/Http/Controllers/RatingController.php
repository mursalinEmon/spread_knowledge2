<?php

namespace App\Http\Controllers;

use App\Course;
use App\Rating;
use Illuminate\Http\Request;
// require_once("../../../app/recomendation/recommend.php");
use App\Recommend;
use App\StudentProfile;
use App\User;

class RatingController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course,Request $request)
    {
        $rating=Rating::create([
            'course_id' => $course->id,
            'student_id' => auth()->user()->student_profile->id,
            'rating' => $request->rating
        ]);

        return response(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
    public function check_rating($id){
        $is_rated=false;
        $check = Rating::where('course_id',$id)->where('student_id',auth()->user()->student_profile->id)->get();
        $is_rated=$check->isEmpty() ?false:true ;
        return response(['is_rated'=>$is_rated]);
    }
    public function rec(){
        $student = StudentProfile::findOrFail($rating->student_id);

        $ratings=Rating::all()->where('student_id',);
        foreach($ratings as $rating){

            $student = StudentProfile::findOrFail($rating->student_id);
            $s_name=User::where('id',$student->user_id)->get();
            $course = Course::findOrFail($rating->course_id);
            $s_name=$s_name[0]->name;
            $c_name=$course->course_title;
            $c_rating = $rating->rating;



        }
        // dd( $c_name);
    }
}
