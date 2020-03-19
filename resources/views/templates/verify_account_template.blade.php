 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"style="font-family: Roboto, sans-serif;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Nadestack - CSGO-League made Easy</title>
        @include('includes.head')
    </head>
    <body style="">
      @include('includes.nav_without_login')
      @yield('content')   
      @include('includes.footer')
    </body>
 </html>