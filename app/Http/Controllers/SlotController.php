<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots = Slot::all();
        return view('managerSlot', ['slots' => $slots]);
    }

    public function showSlots($idTask)
    {
        $slots = Slot::where('task', "=", $idTask)->get();
        return view('managerSlot', ['slots' => $slots, 'idTask' => $idTask]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $task = Task::find($id);
        return view('createSlot', ['task' => $task]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $slot = new Slot;
        $slot->task = $id;
        $slot->start = $request->start;
        $slot->end = $request->end;
        $slot->desc = $request->desc;

        $slot->save();
        return redirect(route('tasks.show', $id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slot = Slot::find($id);
        return view('showSlot', ['slot' => $slot]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slot = Slot::find($id);
        return view('editSlot', ['slot' => $slot]);
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
        $slot = Slot::find($id);
        $slot->start = $request->start;
        $slot->end = $request->end;
        $slot->desc = $request->desc;

        $slot->update();

        // return redirect(route('slots.index'));
        return redirect("/tasks/$slot->task");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slot = Slot::find($id);
        if($slot->delete()) {
            // return redirect(route('slots.index'));
            return redirect("/tasks/$slot->task");
        }
    }
    public function select_delete($id)
    {
        return view('deleteSlot', ['id' => $id]);
            return redirect(route('slots.index'))->with('message', 'Post deleted.');
    }
}
