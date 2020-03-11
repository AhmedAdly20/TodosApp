@extends('layouts.app')
@section('title')
Todos App
@endsection

@section('content')
    <div class="container">
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width: 60%">
                <div class="card-header text-center">
                    <h1>All Todos</h1>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="card-body">
                    <ul class="list-group">
                        @forelse ($todos as $todo)
                            <li class="list-group-item text-muted">
                                {{ $todo->title }}
                                <span class="float-right">
                                    <a href="/todos/{{ $todo->id }}/delete" style="color: red">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="/todos/{{ $todo->id }}/edit" style="color: #9d9109">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="/todos/{{ $todo->id }}" style="color: blue">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </span>
                                @if (!$todo->completed)
                                    <span class="float-right mr-2">
                                        <a href="/todos/{{ $todo->id }}/complete" style="color: #28a745">
                                            <i class="fa fa-check-square"></i>
                                        </a>
                                    </span>
                                @endif
                            </li>
                            @empty
                                <p class="alert alert-success text-center">No Task To do</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
