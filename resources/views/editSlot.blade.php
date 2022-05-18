@extends('template')


@section('contenu') 
<h1> Edit Slot </h1>
    <form class="form" action="{{ route('updateSlotFromTask', $slot->id) }}" method="POST">
         @csrf
         @method('PUT')
         <label for="start">Date de début : </label> 
         <input type="datetime-local" name="start" id="start" value="{{ date('Y-m-d\TH:i', strtotime($slot->start)) }}">
         <label for="end">Date de fin : </label> 
         <input type="datetime-local" name="end" id="end" value="{{ date('Y-m-d\TH:i', strtotime($slot->end)) }}">
         <label for="end">Description : </label> 
         <textarea name="desc" id="desc"> {{$slot->desc}} </textarea>
         <input type="submit" value="Edit !">
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