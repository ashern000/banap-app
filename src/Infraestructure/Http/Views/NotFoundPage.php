<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="assets/js/animation.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f0f0f0;
        }

        .container {
            text-align: center;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 400px;
            color: #4CAF50;
        }

        .error-404 {
            font-size: 80px;
            color: #4CAF50;
        }

        .message {
            font-size: 24px;
            color: #333;
            margin: 20px 0;
        }

        .back-home {
            font-size: 18px;
        }

        .back-home a {
            text-decoration: none;
            color: #4CAF50;
        }

        .back-home a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-404">404</div>
        <div class="message">Oops! Page Not Found</div>
        <p class="back-home">Back to <a href="/login">Home</a></p>
    </div>
</body>
</html>
