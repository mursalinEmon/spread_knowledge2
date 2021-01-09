<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use App\SubCategory;
use App\CourseLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::paginate(5);

        return view('course.allCoursesView',compact('courses'));
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
                'student_count'=>0,
                'category_id'=>$request->category_id,
                'sub_category_id'=>$request->sub_category_id,
                'tags'=> $request->tags,
            ]);

            return response(['message' => 'Course created Successfully','course_id'=>$course->id]);
        }
    }
    public function create_lesson(Request $request){
        $course_lesson=CourseLesson::create([
            'course_id'=>$request->course_id,
            'lesson_title'=>$request->topic_title,
            'lesson_body'=>$request->topic_body,
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

        return view('course.courseEdit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    // "title" => "num"
    // "tags" => "["ewrwer","test","assd"]"
    // "level" => "beginner"
    // "category_id" => "1"
    // "sub_category" => "php"
    public function update(Request $request, Course $course)
    {

        $sub_cat=null;
        $imageName=null;
        if($request->sub_category){
        $sub_cat=SubCategory::where('name',$request->sub_category)->pluck('id');


        }
        $sub_category_id = $sub_cat[0] ? $sub_cat[0]: $course->sub_category_id;


        if($request->file('file')){
            $image = $request->file;
            $imagePath = $request->file('file');
            $imageName=$imagePath->getClientOriginalName();
            $image->move(public_path('image/'.auth()->user()->name.'/'),$imageName);
            File::delete( public_path($course->image));

        }
        $db_image= $imageName ? 'image/'.auth()->user()->name.'/'.$imageName :  $course->image;

        $course->update([
            'course_title' => $request->title,
            'tags'=>$request->tags,
            'course_level'=>$request->level,
            'category_id' =>$request->category_id,
            'sub_category_id'=>$sub_category_id,
            'image' => $db_image,


        ]);

        return response(['message'=>'Post Updated SuccessFully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with(['message'=>'course deleted successfully...!!']);

    }
    public function course_list($id){
        $courses=Course::where('contributor_id',$id)->paginate(5);

            return view('course.allCoursesView',compact('courses'));
    }
    public function top_courses(){
        $top_courses=Course::orderBy('student_count', 'DESC')->take(10)->get();
        return response(['top_courses'=>$top_courses]);
    }

}
