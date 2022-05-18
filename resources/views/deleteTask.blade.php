@extends('template')


@section('contenu') 
<h1> Delete Task {{$id}} </h1>
<form action="{{route('tasks.destroy', $id, 'message')}}" method="POST">
    @csrf @method('DELETE')
    <p> Are you sure ? </p>
    <button>YES</button>
</form>
<a href="{{ url("/tasks")}}"><button>NO</button> </a>
@endsection