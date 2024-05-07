@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($lessons as $lesson)
            <div class="col-3">
                <div class="card bg-dark text-white border-dark m-3" style="min-height: 175px; max-height: 175px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-8">
                                <p class="h5 text-truncate">{{$lesson->title}}</p>
                                <p class="text-secondary">Lesson level: {{$lesson->difficulty->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-8">
                                <p class="card-text text-truncate">{{$lesson->description}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form action="#" method="post">
                                    <button type="submit" class="btn form-button mt-3">Learn</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

