

@extends('layouts.theme')

@section('content')
    <div class="container">

        <div class="row">


            <div>
                <a id="proc-btn" class="btn btn-success float-right m-4" style="color:white;position:fixed;right:1rem;" onclick="runproc()">Run Procedure</a>
                <div id="fader" style="height: 100vh;width:100vw;background-color:rgba(138, 138, 138, 0.644);display:none;">
                    <div class="row">
                        <h1 class="text text-danger">Process is Runnig wait..!!</h1>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
