@extends('template')


@section('contenu') 
<h1> Create Task </h1>
    <form class="form" action="{{ route('tasks.store') }}" method="POST">
         @csrf 
         <label for="name">Entrez le nom de la tâche : </label> 
         <input type="text" name="name" id="name">
         <label for="desc">Votre description : </label> 
         <textarea name="desc" id="desc"></textarea>
         <label for="deadl">Deadline : </label> 
         <input type="datetime-local" name="deadl" id="deadl">
         <label for="prio">L'importance de la tâche : </label> 
         <input type="number" name="prio" id="prio">
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