@extends('template')


@section('contenu') 
<h1> Delete Slot {{$id}} </h1>
<form action="{{route('slots.destroy', $id, 'message')}}" method="POST">
    @csrf @method('DELETE')
    <p> Are you sure ? </p>
    <button>YES</button>
</form>
<a href="{{ url("/slots")}}"><button>NO</button> </a>
@endsection