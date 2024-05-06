@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Holy guacamole!</strong>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="table-responsive-xl">
                <table class="table table-dark" id="courseTable">
                    <thead>
                        <tr>
                            <th scope="col">Exercise Name</th>
                            <th scope="col">Exercise Description</th>
                            <th scope="col">Correct Answer</th>
                            <th scope="col">Actions</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($exercises as $item)
                            <tr class="">
                                <td scope="row">{{ $item->name}}</td>
                                <td>{{ $item->description}}</td>
                                <td>
                                    <form action="{{ route('exercises.edit', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('exercises.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>

                                    <form action="{{ route('exercises.show', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-info">Show data</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-2"></div>
    </div>

@endsection
