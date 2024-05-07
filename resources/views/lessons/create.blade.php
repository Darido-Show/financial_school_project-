@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="card border-dark">
                <div class="card-body">
                    <h4 class="card-title">Create a Lesson</h4>
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

                    <form action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control @if($errors->has('title')) border border-danger @endif"
                                placeholder="Lesson Title" aria-describedby="helpId" value="{{old('title')}}">

                            @if ($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            @else
                                <small id="helpId" class="text-muted">The name of the course to be created.</small>
                            @endif

                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control"
                                placeholder="f.e. Beginner tutorial" aria-describedby="helpId" maxlength="255">
                            <small id="helpId" class="text-muted">Short summary of the Lesson (255 chars)</small>
                        </div>
                        <div class="mb-3">
                            <label for="difficulty" class="form-label">Difficulty</label>
                                <select class="form-select" aria-label="Deafult select example">
                                    <option selected disabled>Open this select menu</option>
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Advanced">Advanced</option>
                                  </select>
                            <small id="helpId" class="text-muted">Short summary of the Lesson (255 chars)</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>

@endsection
