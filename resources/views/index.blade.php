@php
    /**
     * Created by IntelliJ IDEA.
     * User: gachakra
     * Date: 2019-08-17
     * Time: 19:57
     */
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>laravel-vue-ddd-with-cqrs</title>
</head>
<body>
<div id="app">
    <example-component></example-component>
</div>
<script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>
