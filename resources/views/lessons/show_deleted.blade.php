@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Deleted Lessons</h1>
            <div class="table-responsive-xl">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">Lesson Title</th>
                            <th scope="col">Lesson Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($lessons as $item)
                            <tr class="">
                                <td scope="row">{{$item->title}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <form action="{{ route('lessons.restore', ['lesson' => $item]) }}" method="POST">
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