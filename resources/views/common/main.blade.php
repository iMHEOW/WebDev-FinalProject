<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care Admin</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="d-flex">
        @include('common.sidebar')
        
        <main class="flex-grow-1 p-4" style="margin-left: 280px; min-height: 100vh;">
            @yield('content')
        </main>
    </div>
</body>
</html>
