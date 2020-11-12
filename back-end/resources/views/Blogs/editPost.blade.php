@extends('layouts.theme')

@section('content')
    <!-- Edit Post Component-->
    <div class="container">
        <div id="app1">
            <manage-post :post="{{ $post }}"></manage-post>

        </div>
    </div>
@endsection
