@extends('template')


@section('contenu') 
<h1> Show all Tasks </h1>
<a href="{{ url("/tasks/create")}}"><button> Create task </button> </a>
@foreach($tasks as $task)

    <p>Name : {{ $task->name }} </p>
    <p>Description : {{ $task->desc }} </p>
    <p>Deadline : {{ $task->deadl }} </p>
    <p>Priority : {{ $task->prio }} </p>
    <a href="{{ url("/tasks/$task->id")}}"> <button> See task </button></a>
    <a href="{{ url("/tasks/$task->id/delete")}}"><button> Delete task </button></a>
    <a href="{{ url("/tasks/$task->id/edit")}}"><button> Edit task </button></a>
    <hr/>

@endforeach
@endsection