<?php
    session_start();
    $conn = mysqli_connect("localhost:3306", "root", "usbw", "system");
    $sql = mysqli_query($conn, "SELECT * FROM system");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="Shortcut Icon" href="./sda.ico" type="image/x-icon" />
    <style>
                * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body 
        {
            background-color: #32312f;
            font-family: sans-serif;
        }
        .table-container {
            margin:0 auto;
            padding: 0 10%;
            margin: 40px auto 0;
        }
        .heading {
            font-size: 40px;
            text-align: center;
            color: #f1f1f1;
            margin-bottom: 40px;
            text-shadow: 0 0 50 #f00;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table thead {
            background-color: #ee2828;
        }
        .table thead tr th {
            font-size: 14px;
            font-weight: medium;
            letter-spacing: 0.35px;
            color: #fff;
            opacity: 1;
            padding: 12px;
            vertical-align: top;
            border: 1px socket_accept #dee2e685;
        }
        .table tbody tr td {
            font-size: 14px;
            letter-spacing: 0.35px;
            font-weight: normal;
            color: #f1f1f1;
            background-color: #3c3f44;
            padding: 8px;
            text-align:center;
            border: 1px solid #dee2e685;
        }
        .table .text_open {
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 0.35px;
            color: #ff1046;
        }
        .btn {
            width: 130px;
            text-decoration: none;
            line-height: 35px;
            display: inline-block;
            background-color: #ff1046;
            font-weight: medium;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            font-size: 14px;
            opacity: 1;
            float: left;
            margin-right:10px;
        }
        @media (max-width:768px) {
            .table thead {
                display: none;
            }
            .table, .table tbody,.table tr,.table td {
                display: block;
                width: 100%;
            }
            .table tr {
                margin-bottom: 15px;
            }
            .table tbody tr td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            .table td:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: 600;
                font-size: 14px;
                text-align: left;
            }
        }
        .top {
            text-align: center;
        }
        .three_btn {
            float: right;
            display:inline-block;
            border: none;
            outline-style: none;
            margin:0;
        }
        #sign_out {
            float: left;
        }
        .type_text {
            padding:0;
            height:27px;
            width:200px;
        }
        .table-containerr {
            width: 1400px;
            margin:0 auto;
        }
    </style>
</head>
<body>
    <div class="table-containerr">
        <div class="heading">信息管理系统</div>
        <form action="#" method="post">
            <table border="1" class="table">
                <thead>
                    <tr>
                        <td colspan="7">当前用户：<?php echo$_SESSION["用户名"]; ?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>要删除的ID：</td>
                        <td><input type="text" name="编号" class='type_text'></td>
                    </tr>
                    <tr>
                    <td colspan="7" align="center">
                            <input type="button" value="退出登录" onclick="location.href='sign_out.php'" id="sign_out" class='three_btn btn'>
                            <input type="submit" name="删除" value="删除" class='three_btn btn'>
                            <input type="button" value="退回" name="返回" onclick="location.href='administration.php'" class='three_btn btn'>
                        </td>
                    </tr>
                </tbody>
            </table>    
        </form>
    </div>





    <?php
        if(@ $_POST["编号"] != "" && $_POST["删除"] == "删除"){
            $id = $_POST["编号"];
            $nul = mysqli_query($conn, "SELECT id FROM system WHERE id = '{$id}'");
            $row = mysqli_fetch_array($nul);
            if(@empty($row)){
                echo"<script>"; 
                echo" alert('删除失败；错误原因：没有此id');";
                echo"</script>"; 
            }else{
                $del = mysqli_query($conn, "DELETE FROM system WHERE id = '{$id}'");
                echo"<script>"; 
                echo" alert('删除成功');";
                echo"</script>"; 
            }
        }
    ?>
</body>
</html>