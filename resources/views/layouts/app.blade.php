<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{mix('assets/app.css')}}"/>
        <link rel="stylesheet" href="{{mix('assets/tailwind.css')}}"/>
        @livewireStyles
        <script src="{{ mix('assets/app.js') }}"></script>
    </head>
    <body class="bg-light-1 font-iranyekan antialiased">
        {!! $slot !!}
        @livewireScripts
        <script src="http://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/redoc@next/bundles/redoc.standalone.js"></script>
    </body>
</html>
