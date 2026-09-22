<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin Login | Giga Infotech')
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/admin-login.css') }}"
    >

</head>

<body class="login-dark">

    @yield('content')

    <script
        src="{{ asset('assets/js/admin-login.js') }}"
    ></script>

</body>

</html>