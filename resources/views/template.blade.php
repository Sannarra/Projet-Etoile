<!doctype html> 
<html lang="en">
    <head>
        <title>@yield('title')</title>
         <!-- Required meta tags --> 
         <meta charset="utf-8"> 
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 


         <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    </head> 
    <header>

        <a href="{{ url("/")}}"><button>Home</button> </a>

        <a href="{{ url("/tasks")}}"><button>Show all tasks</button> </a>

        <a href="{{ url("/tasks/create")}}"><button> Create task </button> </a>

        <a href="{{ url("/slots")}}"><button> Show all slots </button> </a>

    </header>
    <body> 
        <!-- @yield('content') -->
        @yield('contenu')
    </body>
</html>