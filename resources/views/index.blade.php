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
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>laravel-vue-ddd-with-cqrs</title>
</head>
<body>
<div id="app">
</div>
<script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>
