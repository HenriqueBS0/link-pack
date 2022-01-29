<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= publicPath('img/favicon.ico')?>">
    <title>Link Pack</title>
    <link rel="stylesheet" href="<?= publicPath('css/dashboard.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,500;1,400&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <h1>Link Pack</h1>
        <a href="/logout" class="button">Logout</a>
    </nav>
    <div class="containner">
        <div class="content">
            <form id="form">
                <div class="containner-input">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="containner-input">
                    <label for="url">Url</label>
                    <input type="text" name="url" id="url">
                </div>
                <div class="containner-input">
                    <input id="save" class="button" type="button" value="Save">
                </div>
            </form>
            <div id="feedback"></div>
            <div id="links"></div>
        </div>
    </div>
    <script src="<?= publicPath('js/dashboard.js') ?>"></script>
    <script>
        new Controller();
    </script>
</body>

</html>