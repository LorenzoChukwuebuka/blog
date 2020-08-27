<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title','learning Laravel 5.8') </title>

        <!-- Fonts -->
    <link href="{{ asset('materialize/css/materialize.css') }}" rel="stylesheet">
        </head>

    <body>

      <nav>
        <div class="nav-wrapper">
          <a href="/" class="brand-logo">Home</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/contact">contact</a></li>
            <li><a href="/about">about</a></li>
            <li><a href="/customers">customers</a></li>
          </ul>
        </div>
    </nav> 

        <div class="container">
        
           @yield('content')
        </div>


        
          

          
      <script src="{{ asset('jquery.js') }}"> </script>
      <script src="{{ asset('materialize/js/materialize.js') }}"> </script>
      <script>
        M.AutoInit();
       </script>
    </body>
</html>

