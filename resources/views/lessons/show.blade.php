@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col">
        <div class="card border-secondary">
            <div class="card-body">
                <h4 class="card-title">{{$lessons->name}}</h4>

                <p>Name of the Lesson: {{$lessonss->name}}</p>
                <p>Description of the Lesson: {{$lessons->description}}</p>
                
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>

@endsection