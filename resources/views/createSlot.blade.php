@extends('template')


@section('contenu') 
<h1> Create Slot </h1>
    <form class="form" action="{{ route('storeSlotFromTask', $task->id) }}" method="POST">
         @csrf 
         <label for="start">Date de début : </label> 
         <input type="datetime-local" name="start" id="start">
         <label for="end">Date de fin : </label> 
         <input type="datetime-local" name="end" id="end">
         <label for="end">Description : </label> 
         <textarea name="desc" id="desc"> </textarea>
         <input type="submit" value="Create !">
    </form> 
@endsection


@if ($errors->any())
    <div class="alert alert-danger"> 
        <ul> @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
            @endforeach
        </ul>
 </div>
@endif

@if (Session::has('message'))
 <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif