<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Load Leaflet from CDN-->
  {{-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
  <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> --}}

  <!--Drag and drop menu -->
  <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
  <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <!-- Load Esri Leaflet from CDN -->
    {{-- <script src="http://cdn-geoweb.s3.amazonaws.com/esri-leaflet/1.0.0-rc.2/esri-leaflet.js"></script>
    <script src="http://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js">
    </script>
    <link rel="stylesheet" type="text/css"
      href="http://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css"> --}}

    {{-- google chart --}}
    {{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> --}}

    <link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">


    <title> {{ Session::get('settings')->general_settings->site_name }} {{ $data->title }} </title>
</head>