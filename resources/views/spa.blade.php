<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moscow Street</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;531;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/common.css') }}">

    {{--        maps--}}
    <link href="http://egiptest.mos.ru/jsapi/lib/ol-5.2.0.css" rel="stylesheet" type="text/css">
    <link href="http://egiptest.mos.ru/jsapi/lib/ol-ext-3.0.1.css" rel="stylesheet" type="text/css">
    <!-- ... -->
    <script src="http://egiptest.mos.ru/jsapi/lib/proj4-2.4.4.js"></script>
    <script src="http://egiptest.mos.ru/jsapi/lib/ol-5.2.0.js"></script>
    <script src="http://egiptest.mos.ru/jsapi/lib/ol-ext-3.0.1.js"></script>
    <script src="http://egiptest.mos.ru/jsapi/dist/egip.js"></script>
    <script>
        egip.setConfig({

            /** `baseURL` will be prepended to `url` unless `url` is absolute.
             *  It can be convenient to set `baseURL` for an instance of axios to pass relative URLs
             *  to methods of that instance.
             *  https://github.com/axios/axios
             */
            baseURL: '{!! env('APP_URL') !!}',


            /**
             * `withCredentials` indicates whether or not cross-site Access-Control requests
             *  should be made using credentials
             *  https://github.com/axios/axios
             */
            withCredentials: true
        })
    </script>
</head>
<body>
<div id="app">
    <app></app>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
