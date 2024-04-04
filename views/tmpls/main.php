<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Тест Заказ</title>
        <link href="/assets/main.css?<?php echo time();?>" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <a href="/">Главная</a>
        </header>
        <div class="container">
            <?php echo $content;?>
        </div>
        <script src="/assets/main.js?<?php echo time();?>" type="text/javascript"></script>
    </body>
</html>