@extends('layouts.theme')

@section('content')
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{  Session::get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @foreach ($courses as $item)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset($item->image) }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $item->course_title }}</h5>
          <p class="card-text"><span class="fas fa-user-edit text-black-50" style="padding:5px;" ></span><small> {{ $item->course_level }}</small></p>
          @if(!Session::has('message'))
          <div class="col-md-8 offset-3 d-flex justify-content-between">
                <a href="{{ route('course.enroll',[$item->id]) }}" class="btn btn-primary">Enroll</a>
                <a href="#" class="btn btn-secondary ml-4">Details</a>
            </div>
            @else
            <div class="col-md-10  d-flex justify-content-between">
                <a href="#" class="btn btn-success">Browse The Course</a>

            </div>
            @endif
        </div>
      </div>

    @endforeach


</div>
{{ $courses->links() }}
@endsection
