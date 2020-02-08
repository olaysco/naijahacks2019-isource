<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iSource - Business platform</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/all.css')}}">
    </head>
    <body>
        <div id="app">
            <App></App>
        </div>
        <script>
            window.user = {!! Auth::user() !!}
        </script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
