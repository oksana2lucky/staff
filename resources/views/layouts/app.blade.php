<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Staff')</title>
</head>
<body>
<header>
    @section('title', 'Staff')
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Footer content -->
</footer>
</body>
</html>
