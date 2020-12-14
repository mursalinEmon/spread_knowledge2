@extends('layouts.theme')

@section('content')
<div class="container">

    @forelse ($lessons as $item)
        <div class="card">
            <div class="card-header"> {{ $item->lesson_title }}</div>
            <div class="card-body">
              <button class="btn btn-danger">Delete</button>
              <button class="btn btn-warning">Edit</button>
            </div>

        </div>
    @empty

    @endforelse


    {{ $lessons->links() }}

</div>

@endsection
