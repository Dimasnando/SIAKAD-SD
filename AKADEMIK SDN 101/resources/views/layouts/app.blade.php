<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>SDN 101 &mdash; Tanjab Timur</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ url('update/modules/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('update/modules/fontawesome/css/all.min.css') }}">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ url('update/modules/jqvmap/dist/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ url('update/modules/weather-icon/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ url('update/modules/weather-icon/css/weather-icons-wind.min.css') }}">
        <link rel="stylesheet" href="{{ url('update/modules/summernote/summernote-bs4.css') }}">

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ url('update/css/style.css') }}">
        <link rel="stylesheet" href="{{ url('update/css/components.css') }}">
        <!-- Start GA -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-94034622-3');
        </script>
    </head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>

</html>
