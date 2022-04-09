





<?php

    session_start();
    $_SESSION = array();
    session_destroy();
    sleep(3);
    header('Location: index.php')

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>退出登录</title>
    <link rel="Shortcut Icon" href="./sda.ico" type="image/x-icon" />
</head>
<body>
    
</body>
</html>