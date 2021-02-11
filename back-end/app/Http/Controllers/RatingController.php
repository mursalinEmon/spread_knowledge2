<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Rating;
// require_once("../../../app/recomendation/recommend.php");
use App\Recommend;
use App\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $book_and_ratings=[];
        $student_name_and_ratings=[];
        $students=StudentProfile::all();
        // dd($students);
        foreach($students as $student){
            // $student = StudentProfile::where('user_id',$student->user_id)->get();
            $ratings=Rating::all()->where('student_id',$student->id);
            $s_name=User::where('id',$student->user_id)->get();
            $s_name=$s_name[0]->name;
            foreach($ratings as $rating){
                $course = Course::findOrFail($rating->course_id);
                $c_name=$course->course_title;
                $c_rating = $rating->rating;
                $book_and_ratings[$c_name]=  $c_rating ;
            }
            $student_name_and_ratings[$s_name]=$book_and_ratings;
        }

        dd( $student_name_and_ratings);



    }
}
