@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="card border-secondary">
                <div class="card-body">
                    <h4 class="card-title text-white">Create a Exercise</h4>
                    <p class="card-text text-danger">Inputs marked with * shall be filled.</p>

                    @if ($errors->any())
                        <div class="mb-3 mt-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Ups, try again!</strong>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         
                            <strong>Wow, you're really good at this!</strong> 
                            <p>{{Session::get('success')}}</p>
                        </div>
                    @endif

                    <form action="{{ route('exercises.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Name</label>
                            <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) border border-danger @endif"
                                placeholder="Exercise Name" aria-describedby="helpId" value="{{old('name')}}">

                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @else
                                <small id="helpId" class="text-warning">The name of the Excercise to be created.</small>
                            @endif

                        </div>
                        <div class="mb-3">
                            <label for="lesson_id" class="form-label text-white">Lesson</label>
                            <select class="form-select" name="lesson_id" aria-label="Deafult select example">
                                <option selected disabled>Open this select menu</option>
                                @foreach ($lessons as $item)
                                    <option value="{{$item->id}}">{{ucfirst($item->title)}}</option>
                                @endforeach
                              </select>
                            <small id="helpId" class="text-warning">The Lesson which the Excercise belongs to.</small>
                        </div>
                        <div class="mb-3">
                            <label for="question_id" class="form-label text-white">Question</label>
{{--                             <select class="form-select" name="lesson" aria-label="Deafult select example">
                                <option selected disabled>Open this select menu</option>
                                @foreach ($lessons as $item)
                                    <option value="{{$item->id}}">{{ucfirst($item->title)}}</option>
                                @endforeach
                              </select> --}}
                            <small id="helpId" class="text-warning">The Question which the Excercise belongs to.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>

@endsection
