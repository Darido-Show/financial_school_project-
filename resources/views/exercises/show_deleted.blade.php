@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Deleted Exercises</h1>
            <div class="table-responsive-xl">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Exercise Name</th>
                            <th scope="col">Exercise Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($exercises as $item)
                            <tr class="">
                                <td scope="row">{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <form action="{{ route('exercises.restore', ['exercise' => $item]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info">Restore</button>
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