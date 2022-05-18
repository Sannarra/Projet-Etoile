<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Slot;
use Illuminate\Http\Request;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('manager', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createTask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->desc = $request->desc;
        $task->deadl = $request->deadl;
        $task->prio = $request->prio;

        $task->save();
        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        $slots = Slot::where('task', "=", $id)->get();
        return view('showTask', ['task' => $task, 'slots' => $slots]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('editTask', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->name = $request->name;
        $task->desc = $request->desc;
        $task->deadl = $request->deadl;
        $task->prio = $request->prio;

        $task->update();

        return redirect(route('tasks.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if($task->delete()) {
            $slots = Slot::where('task', "=", $id);
            if (gettype($slots) !== 'NULL') $slots->delete();
            // FIXME: mauvais redirect
            return redirect(route('tasks.index'));
        }
    }
    public function select_delete($id)
    {
        return view('deleteTask', ['id' => $id]);
            return redirect(route('tasks.index'))->with('message', 'Post deleted.');
    }
}