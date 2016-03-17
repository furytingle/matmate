<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <script type="text/javascript" src="{{ URL::asset('public/js/angular.min.js')  }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery-1.12.1.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('public/js/script.js') }}"></script>

</head>
<body>
    <div class="container">
        @yield('panel')
    </div>
    @yield('content')

    <div ng-app="">

        <p>Input something in the input box:</p>
        <p>Name: <input type="text" ng-model="name"></p>
        <p ng-bind="name"></p>

    </div>
</body>
