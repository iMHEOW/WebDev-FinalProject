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
        .auth-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .form-title {
            font-size: 28px;
            font-weight: bold;
            color: #1b1b18;
            margin: 0;
            text-align: center;
        }
        .form-subtitle {
            font-size: 14px;
            color: #666;
            text-align: center;
            margin: 0;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }
        .form-control:focus {
            outline: none;
            border-color: #0f5cfd;
            box-shadow: 0 0 0 3px rgba(15, 92, 253, 0.1);
        }
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .error-message {
            font-size: 12px;
            color: #dc3545;
        }
        .alert ul {
            margin: 0;
            padding-left: 20px;
        }
        .alert li {
            margin: 5px 0;
        }
        .checkbox-group {
            flex-direction: row;
            align-items: center;
            gap: 8px;
        }
        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        .checkbox-group label {
            margin: 0;
            cursor: pointer;
            font-size: 14px;
            color: #333;
        }
        .btn-primary:hover {
            background-color: #0d4ed1;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(15, 92, 253, 0.3);
        }
        .form-footer {
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .form-footer a {
            color: #0f5cfd;
            text-decoration: none;
            font-weight: 600;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
        .password-wrapper {
            position: relative;
        }
        .password-wrapper .form-control {
            width: 100%;
            padding-right: 40px;
            box-sizing: border-box;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 16px;
            user-select: none;
            color: currentColor;
            opacity: 0.4;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <div class="auth-logo">
                <div class="bg-primary text-white p-2 rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="bi bi-heart-pulse-fill" style="font-size: 20px;"></i>
                </div>
                <div>
                    <h1>PUP Care</h1>
                </div>
            </div>
        </div>

        @yield('content')
    </div>

    <script>
        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            const icon = input.closest('.password-wrapper').querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>
</html>