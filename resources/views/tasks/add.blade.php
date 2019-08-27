@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="form-group col-md-6">
                <h2><strong>Add Task</strong></h2>
                <form method="POST" action="{{url('tasks')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ">
                            <label for="title"><strong>{{ __('Task Title :') }}</strong></label>
                            <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group row ">
                            <label for="description"><strong>{{ __('Task Description :') }}</strong></label>
                            <textarea type="text" name="description" class="form-control" required></textarea>
                    </div>
                    <div class="d-flex" >
                    <div class="form-group row ml-2 mr-3 w-50">
                            <label for="time"><strong>{{ __('Scheduled Time :') }}</strong></label>
                            <input type="time" name="time" class="form-control" required>
                    </div>
                    <div class="form-group text-left w-50">
                            <label for="duration"><strong>{{ __('Task Duration :') }}</strong></label>
                            <input type="number" name="duration" class="form-control" required>
                    </div>
                    </div>
                    <div class="form-group text-right ">
                            <button class="w-25 btn btn-success"><strong>Create</strong></button>
                    </div>
                </form>
            </div>


        </div>
    </div>
    @endsection