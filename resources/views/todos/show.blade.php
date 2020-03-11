@extends('layouts.app')
@section('title')
    {{ $todo->title }}
@endsection

@section('content')
    <div class="container">
        <h1 class="mt-5 text-center">{{ $todo->title }}</h1>
        <div class="row pt-5 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Deatalis:</span>
                        <span class="badge badge-warning float-right">
                            {{ boolval($todo->completed) ? 'Completed' : 'Not Completed' }}
                        </span>
                    </div>
                    <div class="card-body">
                        {{ $todo->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
