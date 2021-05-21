<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div id="app"></div>
            {{-- <h1 class="text-danger">dfkjsdklfjl</h1> --}}

            {{-- <app></app> --}}
        
        {{-- <script src="{{ mix('js/bootstrap.js') }}"></script> --}}
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>