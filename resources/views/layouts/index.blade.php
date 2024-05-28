<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Pemesanan Hotel Pasha')</title>
</head>

<body>
    <x-header></x-header>

    <div class="container-lg">
        @yield('content')
    </div>

    <x-footer></x-footer>
</body>

</html>
