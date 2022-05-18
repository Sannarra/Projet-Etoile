@extends('template')


@section('contenu')
<h1> Edit Task </h1>
<form class="form" action="{{ route('tasks.update', $task->id) }}" method="POST">
         @csrf 
         @method('PUT')
         <label for="name">Entrez le nom de la tâche : </label> 
         <input type="text" name="name" id="name" value="{{$task->name}}">
         <label for="desc">Votre decription : </label> 
         <textarea name="desc" id="desc">{{$task->desc}}</textarea>
         <label for="deadl">La deadline : </label> 
         <input type="datetime-local" name="deadl" id="deadl" value="{{ date('Y-m-d\TH:i', strtotime($task->deadl)) }}">
         <label for="prio">L'importance de la tâche : </label> 
         <input type="number" name="prio" id="prio" value="{{$task->prio}}">
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