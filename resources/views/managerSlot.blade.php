@extends('template')


@section('contenu') 
<h1> Show all Slots </h1>

    {{-- {{$idTask}} --}}
@foreach($slots as $slot)
    <a href="{{ url("/tasks/$slot->task")}}" >Task n°{{$slot->task}}</a>
    <p>Start : {{ $slot->start }} </p>
    <p>End : {{ $slot->end }} </p>
    <p>Description : {{ $slot->desc }} </p>
    <a href="{{ url("/slots/$slot->id/delete")}}"><button> Delete slot </button></a>
    <a href="{{ url("/slots/$slot->id/edit")}}"><button> Edit slot </button></a>
<hr/>
@endforeach
@endsection