<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Mono&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="antialiased">
        <section class="relative flex items-top justify-center min-h-screen bg-gray-400 dark:bg-gray-900 sm:items-center sm:pt-0" id="app">
           <article class="outer-wrapper">
               <h1>Word Wrapper</h1>

               {{-- Form --}}
               <word-wrap-form-component></word-wrap-form-component>
           </article>
        </section>

        <!-- Scripts -->
        <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
