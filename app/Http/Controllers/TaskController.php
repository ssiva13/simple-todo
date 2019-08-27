<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = 0;
        $tasks = Task::orderBy('id', 'desc')->paginate(10);

        return \view('home')->with('tasks',$tasks)->with('number',$number);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('tasks.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'time' => 'required',
            'duration' => 'required',
            'description' => 'required'
        ]);

        $task = new Task();

        $task->title = $request->title;
        $task->description = $request->description;
        $task->duration = $request->duration;
        $task->time = $request->time;

        // $task->save();

        $task_json = \json_encode($task); //to return task details in json

        $tasks = Task::orderBy('id', 'desc')->paginate(10);

        return \redirect('home')->with('tasks', $tasks)->with('success','Task Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return \view('tasks.edit')->with('task', $task);
        
        //return $task; // to return task details in json
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //validate inputs
        $this->validate($request, [
            'title' => 'required',
            'time' => 'required',
            'duration' => 'required',
            'description' => 'nullable'
        ]);
        
        if(($request->description)!= ""){
            $description = $request->description;
        }
        else{
            $description = $task->description;
        }
        //get inputs
        $task->title = $request->title;
        $task->description = $description;
        $task->duration = $request->duration;
        $task->time = $request->time;

        $task->save();

        $task_json = \json_encode($task); //to return task details in json
        
        $tasks = Task::orderBy('id', 'desc')->paginate(10);
        
        return \redirect('home')->with('tasks', $tasks)->with('success','Task Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        $tasks = Task::orderBy('id', 'desc')->paginate(10);
        return \redirect('home')->with('tasks', $tasks)->with('success','Task Deleted Successfully');
    }
}
