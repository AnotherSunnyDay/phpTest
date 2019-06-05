<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contact</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    {{-- @include("inc.navbar") --}}

    <div class="container" id="app">
        @include("inc.messages")
        {{-- @yield("content") --}}
        <formv></formv>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>