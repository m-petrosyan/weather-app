<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="antialiased">
    <div id="app">
    </div>
    @vite(['resources/js/app.js','resources/css/app.css'])
</div>
@vite('resources/js/app.js')
</body>
<script
    src="https://maps.googleapis.com/maps/api/js?libraries=places&key={{env('GOOGLE_PLACES_API')}}"></script>
</html>
