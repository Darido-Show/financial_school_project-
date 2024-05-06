@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col">
        <div class="card border-secondary">
            <div class="card-body">
                <h4 class="card-title">{{$exercises->name}}</h4>

                <p>Name of the Exercise: {{$exercises->name}}</p>
                <p>Description of the Exercise: {{$exercises->description}}</p>
                
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>

@endsection