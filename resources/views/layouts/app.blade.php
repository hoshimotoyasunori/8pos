<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>{{ config('app.name', '8pos') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- 下の1行を追加 --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <!--bootstrap-->
    <!--CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ secure_asset('css/application.css') }}" rel="stylesheet">

  </head>

  <body>
       @yield('navbar')
       
       {{-- ==========ここにcontainerクラスを追加する========== --}}
       <div class="container">
         @yield('content')
       </div>
       {{-- ==========divの閉じタグを追加========== --}}

       @yield('footer')
  </body>
</html>