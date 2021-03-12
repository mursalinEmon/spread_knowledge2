<?php

namespace App\Http\Controllers;

use App\CareerPath;
use Illuminate\Http\Request;

class CareerPathController extends Controller
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
        return view('career_path.create');
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
     * @param  \App\CareerPath  $careerPath
     * @return \Illuminate\Http\Response
     */
    public function show(CareerPath $careerPath)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CareerPath  $careerPath
     * @return \Illuminate\Http\Response
     */
    public function edit(CareerPath $careerPath)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CareerPath  $careerPath
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CareerPath $careerPath)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CareerPath  $careerPath
     * @return \Illuminate\Http\Response
     */
    public function destroy(CareerPath $careerPath)
    {
        //
    }
}
