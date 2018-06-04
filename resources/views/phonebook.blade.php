<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Title Page</title>
        <link rel="stylesheet" href="{{ mix('css/app.css')}}"/>
    </head>
    <body>
        <div id="app">
            <my-header></my-header>
                <div class="container">
                    <router-view></router-view>
                </div>
            <my-footer></my-footer>
        </div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>