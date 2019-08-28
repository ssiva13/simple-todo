@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="container w-50">
                <h1><strong>Dashboard</strong></h1>
                @include('includes.messages')
            </div>
            <div class="container d-flex row">
                <div class="w-50 d-flex bd-highlight">
                    <div class="ml-8">
                        <a class="btn btn-info m-1" href="tasks/create">Add Task</a>
                    </div>
                </div>
                <div class="w-50 d-flex bd-highlight">
                    <div class="ml-4">
                        <form class="navbar-form navbar-left" action="{{route('search')}}" method="GET">
                            {{-- @method('PUT') --}}
                            <div class="input-group">
                                <input type="text" name="task" class="form-control" placeholder="Search">
                                <div class="ml-3 input-group-btn">
                                    <button class="btn btn-info" type="submit">
                                        <span>Search for task</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container text-center">
                <table class="table table-hover table-responsive">
                    <caption>List of Tasks</caption>
                    <thead class="thead-dark bg-dark">
                        <th><span>Number</span></th>
                        <th><span>Name</span></th>
                        <th><span>Description</span></th>
                        <th><span>Time</span></th>
                        <th><span>Duration</span></th>
                        <th><span>Status</span></th>
                        <th colspan="2"><span>Action</span></th>
                    </thead>
                    <tbody>
                        @if (count($tasks) > 0 )
                        @foreach ($tasks as $task)
                        <tr>
                            {{-- <td>{{$task->id}}</td> --}}
                            <td>{{$number = $number + 1}}</td>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>
                            <td>{{$task->time}} hrs</td>
                            <td>
                                @if (($task->duration == 0))
                                N/A
                                @else
                                {{$task->duration}} hours
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{url('complete',$task->id)}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn @if($task->duration != 0) btn-warning @else btn-success @endif">
                                        @if($task->duration
                                        != 0) Pending @else Complete @endif</button>
                                </form>

                            </td>
                            <td>
                                <a href="/tasks/{{$task->id}}" class="btn btn-info @if($task->duration == 0) disabled @endif" >Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{url('tasks', [$task->id])}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <div class="form-group text-right "> --}}
                                    <button class="btn btn-danger"><strong>DELETE</strong></button>
                                    {{-- </div> --}}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if (count($tasks) > 10 )
                        <tr>
                            <th style="text-align: center;" colspan="100%">{{$tasks->links()}}</th>
                        </tr>
                        @endif
                    </tbody>
                    @endif
            </div>

        </div>

    </div>
</div>
@endsection
