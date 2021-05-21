<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Sched Easy Clients</title>
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- <link rel="stylesheet" href="/css/all.css"> -->
        <script>

            // (function () {
            //     window.Laravel = {
            //         csrfToken: '{{ csrf_token() }}'
            //     };
            // })();

        </script>

    </head>

    <body>
        
         <div id="app">
             <!-- @if(Auth::check())
                <mainapp :user="{{Auth::user()}}" :permission="{{Auth::user()->role->permission}}"></mainapp>
            @else
                <mainapp :user="false"></mainapp>
            @endif -->
            
            <mainapp></mainapp>

         </div>
         
    </body>

    <script src="{{mix('/js/app.js')}}"></script>

</html>
