@extends('template')


@section('contenu') 
<h1> Task {{$task->name}} </h1>
{{-- 
    <p> {{ $tasks->id }} </p> --}}
    <p>Name : {{ $task->name }} </p>
    <p>Description : {{ $task->desc }} </p>
    <p>Deadline : {{ $task->deadl }} </p>
    <p>Priority : {{ $task->prio }} </p>
    <a href="{{ url("/tasks/$task->id/edit")}}"><button> Edit task </button></a>
    <a href="{{ url("/tasks/$task->id/createSlot")}}"><button> Create Slot </button></a>
    <a href="{{ url("/tasks/$task->id/delete")}}"><button> Delete Task </button></a>
    <hr/><hr/>
    <h2> All slots for this Task </h2>
    <hr/><hr/>



    @foreach($slots as $slot)
    <p>Start : {{ $slot->start }} </p>
    <p>End : {{ $slot->end }} </p>
    <p>Description : {{ $slot->desc }} </p>
    <a href="{{ url("/slots/$slot->id/delete")}}"><button> Delete slot </button></a>
    <a href="{{ url("/slots/$slot->id/edit")}}"><button> Edit slot </button></a>
<hr/>
@endforeach
    
@endsection