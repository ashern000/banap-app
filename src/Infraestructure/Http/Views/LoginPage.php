<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="http://localhost:80/login" method="POST">
        <input type="text" name="name" id="name" placeholder="coloque o seu nome">
        <input type="text" name="email" id="email">
        <input type="text" name="password" id="password">
        <button>Login</button>
    </form>

    <script>alert('<?= $data['name'] ?>')</script>
</body>

</html>