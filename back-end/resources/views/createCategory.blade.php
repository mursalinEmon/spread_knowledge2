@extends('layouts.theme')

@section('content')
    <!-- Create Post Component-->
    <div class="container">
        <div id="app1">
            <create-category :categories="{{ $categories }}"></create-category>
        </div>
    </div>
@endsection
