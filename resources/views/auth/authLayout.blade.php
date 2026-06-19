<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care - @yield('title', 'Login')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #0f5cfd 0%, #ffffff 100%);
        }
        .auth-container {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .auth-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        .auth-logo svg {
            width: 40px;
            height: 40px;
            color: #0f5cfd;
        }
        .auth-logo h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            color: #1b1b18;
        }
        .auth-logo p {
            font-size: 14px;
            color: #666;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <div class="auth-logo">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h1>PUP Care</h1>
                </div>
            </div>
        </div>

        @yield('content')
    </div>
</body>
</html>