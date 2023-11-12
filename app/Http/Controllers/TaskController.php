<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskAssigned;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('do-admin-operations');
        return view('dashboard.tasks.index',[
            'user' => Auth::user(),
            'tasks' =>Task::all(),
            //'personnels' => Personnel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('do-admin-operations');
        $request->validate([
            'personnel_id' => 'required',
            'description' => 'required'
        ]);

        $task = new Task;
        $task->personnel_id = $request->input('personnel_id');
        $task->description = $request->input('description');
        $task->due = $request->input('due');
        $success = $task->save();
        
        
        if($success){
            $data = ['description' => $request->input('description'), 
                'due' => $request->input('due')
                ];
            $personnel = Personnel::find($request->input('personnel_id')); 
        
            $this->sendMail($personnel->user->email, $data);
        
            return back()->with('action-success','Task Added Successfully');
        }
        return back()->with('action-fail','Something went wrong. Try again');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $this->authorize('do-admin-operations');
        return view('dashboard.tasks.edit', [
            'user' => Auth::user(),
            'task' => $task,
            'personnels' => Personnel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('do-admin-operations');
        $request->validate([
            'personnel_id' => 'required',
            'description' => 'required'
        ]);

        
        $task->personnel_id = $request->input('personnel_id');
        $task->description = $request->input('description');
        $task->due = $request->input('due');
        $success = $task->save();
        if($success){
            $data = [
               'description' => 'Task Update: '.$request->input('description'), 
               'due' => $request->input('due')
                ];
            
            $personnel = Personnel::find($request->input('personnel_id')); 
        
            $this->sendMail($personnel->user->email, $data);
            
            return redirect('/dashboard/tasks')->with('action-success','Task Updated Successfully');
        }
        return back()->with('action-fail','Something went wrong. Try again');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('do-admin-operations');
        $success = $task->delete();
        if($success){
            return back()->with('action-success','Task Deleted');
        }
        return back()->with('action-fail','Something went wrong, Try again.');
    }

    public function myTask($id){
        $tasks = Task::where('personnel_id',$id)->get();

        return view('dashboard.tasks.my-task',[
            'user' => Auth::user(),
            'tasks' => $tasks

        ]);
    }

    public function toggleStatus(Task $task){

        $task->status==1?$task->status = 0: $task->status = 1;
        $success = $task->save();
        if($success){
            return back()->with('action-success','Task Status changed');
        }
        return back()->with('action-fail','Something went wrong, Try again.');
    }
    
    public function sendMail($to,$data){
        Mail::to($to)
            ->send(new TaskAssigned($data) );
        
    }
}
