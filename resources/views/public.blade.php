@php
  $route = Route::currentRouteName();
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
@viteReactRefresh
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Atalaya</title>

  <link rel="shortcut icon" href="/assets/img/icon.svg" type="image/png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: "Comfortaa", serif;
      box-sizing: border-box;
    }
  </style>

  <link href="/lte/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

  @vite(['resources/css/app.css', 'resources/js/' . $route])
  @inertiaHead
</head>

<body>
  @inertia
</body>

</html>
