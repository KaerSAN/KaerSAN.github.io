<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录页面</title>
    <link rel="Shortcut Icon" href="./sda.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./base.css">
    <link rel="stylesheet" href="./index.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: #34495e;
    background-image: url(./aaa.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    overflow: hidden;
    background-position: 40% 0;
}
table{
    border: none;
    outline-style: none;
}
#Sign_in,   
#register{
    width: 30px;
    height: 25px;
}
#input1{
    width: 60px;
}

.box h1 {
    color: white;
    text-transform: uppercase;
    font-weight: 500;
    margin: 0 auto;
    text-align: center;
    }

.button {
    border: 0;
    background: none;
    display: flex;
    margin: 0 auto;
    margin-top: 10px;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
}
.button:hover {
    background: #2ecc71;
}
.submit {
    border: 0;
    background: none;
    display: flex;
    margin: 0 auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
}
.submit:hover {
    background: #2ecc71;
}

.box input[type ='text'],.box input[type = 'password'] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 14px 10px;
    width: 200px;
    outline: none;
    color: rgb(216, 207, 207);
    border-radius: 24px;
    transition: 0.25s;
}
.box input[type = 'text']:focus,.box input[type = 'password']:focus {
    width: 280px;
    border-color: #2ecc71;
}
    </style>
</head>
<body>
    <form action="#" id="form1" name="form1" method="post" class="box">
        <h1>Login</h1>
        <table border="0">
                <input type="text" name="用户名" class="username" placeholder="Username">
                <input type="password" name="密码" class="password" placeholder="Passwrod">
                <div class='button_buttom'>
                    <input type="submit" name="登录按钮" value="登录" class='submit'>
                    <input type="button" name="注册按钮" value="注册" onclick="location.href='register.php'" class='button'>
                </div>
        </table>
    </form>

<!-- 
    <form action="index.html" class="box" method="post">
        <h1>Login</h1>
        <input type="text" name="用户名" placeholder="Username" id="username">
        <input type="password" name="密码" placeholder="Password" id="password">
        <input type="submit" name="登录按钮" value="Login">
        <input type="button" name="注册按钮" value="注册" onclick="location.href='register.php'">
    </form> -->


    <?php
        $conn = mysqli_connect("localhost:3306", "root", "usbw", "system");
        mysqli_set_charset($conn, 'utf8');
        // if($conn){
        //     echo"数据库连接成功";
        // }else{
        //     die("数据库连接失败");
        // }
        if(@ $_POST["用户名"] != "" && $_POST["密码"] != "" && $_POST["登录按钮"] == "登录"){
            $x = $_POST["用户名"];
            $y = $_POST["密码"];
            $pswd = md5($y);
            $data = mysqli_query($conn, "SELECT * FROM system WHERE username = '{$x}' AND cipher = '{$pswd}' ");
            $row = mysqli_fetch_array($data);
            if(@empty($row)){
                echo"<script>"; 
                echo" alert('用户名或密码错误');";
                echo"</script>"; 
            }else{
                echo"<script>"; 
                echo" alert('登录成功');";
                echo"</script>"; 
                $_SESSION["用户名"] = $_POST["用户名"];
                sleep(1);
                header('Location: administration.php');
            }
        }
    ?>
    <br>
</body>
</html>