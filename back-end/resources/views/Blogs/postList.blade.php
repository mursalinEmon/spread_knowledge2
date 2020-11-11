@extends('layouts.theme')


@section('content')
    <!--  Post List Component-->
    <div class="container">
        @if (session('message'))
        <div class="alert alert-success alert-block">

            <strong>   {{ session('message') }}</strong>
            <button class="btn btn-danger right" type="button" style="padding: 2px!important;margin-left:100px;" class="close" data-dismiss="alert">x</button>
        </div>
        @endif
        @foreach ($posts as $post)
        <div class="card">
            <div class="card-body shadow">
              <h4 class="card-title">{{ $post->title }}</h4>
              <a href="#" class="btn btn-primary">Edit Post</a>

              <form action="{{ route('blogpost.delete') }}" method="POST">
                @csrf
                <input value="{{ $post->id }}" type="hidden" name="id">
                <button type="submit" value="submit" class="btn btn-danger">Delete Post</button>
              </form>

            </div>
          </div>
          <br>
        @endforeach
    </div>
@endsection
