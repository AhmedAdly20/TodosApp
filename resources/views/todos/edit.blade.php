@extends('layouts.app')
@section('title')
    Edit Todo
@endsection

@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Edit Todo</h1>
                    </div>
                    <div class="card-bod">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/todos/{{ $todo->id }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input value="{{$todo->title}}" name="todoTitle" type="text" class="form-control" placeholder="Enter The Task">
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Enter The Description Of The Task" name="todoDescription" class="form-control"  rows="3">{{$todo->description}}</textarea>
                            </div>
                            <div class="form-group text-center">
                                <button style="width: 40%" type="submit" class="btn btn-primary text-center">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
