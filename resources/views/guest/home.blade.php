<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{ asset('css/front.css') }}">      
    </head>
    <body>
        <div id="root">

        </div>
        <script src="{{ asset('js/front.js') }}" ></script>
    </body>
</html>
