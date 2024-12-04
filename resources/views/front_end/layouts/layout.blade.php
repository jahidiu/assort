<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assort - {{ $data->title }}</title>

    <link rel="stylesheet" href=" {{ asset('css/front_app.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/custom.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>

@include('front_end.layouts.navbar')

@yield('content')

@include('front_end.layouts.footer')
@stack('scripts')
<script src=" {{ asset('js/app.js') }} "></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>
</body>

</html>