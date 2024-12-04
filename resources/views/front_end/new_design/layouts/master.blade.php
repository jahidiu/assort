<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | Assort Housing</title>
  @include('front_end.new_design.includes.style')

</head>

<body>
  <!-- Menu section:Start -->
  @include('front_end.new_design.includes.navbar')
  <!-- Menu section:End -->
  @yield('content')
  <!-- footer section:Start -->
  @include('front_end.new_design.includes.footer')
  <!-- footer section:End -->
  @include('front_end.new_design.includes.script')
</body>

</html>