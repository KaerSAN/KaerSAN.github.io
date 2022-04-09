<?php
    session_start();
    $conn = mysqli_connect("localhost:3306", "root", "usbw", "system");
    $sql = mysqli_query($conn, "SELECT * FROM system");
?>
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>
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
    </style>
</head>
<body>
    <div class="table-container">
        <div class="heading">信息管理系统</div>
        <form action="#" method="post">
            <table border="1" class="table">
                    <tr>
                        <td colspan="7">用户名：<?php echo$_SESSION["用户名"]; ?></td>
                    </tr>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="top">用户名</th>
                        <th>密码</th>
                        <th>身份证号</th>
                        <th>籍贯</th>
                        <th>年龄</th>
                        <th>性别</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($system = mysqli_fetch_assoc($sql)){
                            echo"<tr>";
                            echo"<td>" .$system['id']. "</td>";
                            echo"<td>" .$system['username']. "</td>";
                            echo"<td>" .$system['cipher']. "</td>";
                            echo"<td>" .$system['id_Number']. "</td>";
                            echo"<td class='text_open'>" .$system['household_Register']. "</td>";
                            echo"<td>" .$system['age']. "</td>";
                            echo"<td>" .$system['sex']. "</td>";
                            echo"</tr>";
                        }
                    ?>
                </tbody>  
            </table>
        </form>
        <input type="button" value="退出登录" onclick="location.href='sign_out.php'" id="sign_out" class="btn">
        <input type="button" value='添加' class='three_btn btn' onclick="location.href='increase.php'">
        <input type="button" value='删除' class='three_btn btn' onclick="location.href='delete.php'">
    </div>

</body>
</html>