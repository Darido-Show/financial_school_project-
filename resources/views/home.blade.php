@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($lessons as $lesson)
            <div class="col-3">
                <div class="card text-light border-light m-3" style="min-height: 175px; max-height: 175px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="h4 text-light text-truncate">{{ $lesson->title }}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-light text-secondary">Lesson level: {{ $lesson->difficulty_id}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="card-text text-light text-truncate">{{ $lesson->description }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <form action="{{ route('lessons.show', $lesson) }}" method="GET">
                                    <button type="submit" class="btn form-button mt-3 border-light text-light">Learn</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
