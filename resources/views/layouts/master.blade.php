<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <title>Prego - Project Management App</title>
    <meta name="description" content="Prego is a project management app built for learning purposes">

    <!-- Typekit Fonts -->
    <script src="//use.typekit.net/udt8boc.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

<script src="{!! asset('js/app.js') !!}"></script>
<script src="{!! asset('js/app1.js') !!}"></script>
</body>
</html>