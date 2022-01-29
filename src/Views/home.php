<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= publicPath('img/favicon.ico')?>">
    <title>Link Pack</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Be Vietnam Pro', sans-serif;
            font-size: 45px;
        }

        .title {
            margin-bottom: 45px;
        }

        .button {
            text-decoration: none;
            color: black;
            cursor: pointer;
            padding: 5px 10px;
            border: 5px solid black;
            transition: 0.2s;
        }

        .button:hover {
            background-color: black;
            color: white;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Link Pack</h1>
        <a class="button" href="login">Login</a>
    </div>
</body>
</html>