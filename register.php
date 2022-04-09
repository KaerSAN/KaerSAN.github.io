<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册页面</title>
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
body{
    
    background-image: url(./aaa.jpg);
}
    </style>
</head>
<body>
    <!-- <form action="#" id="form1" name="form1" method="post">
        <table border="1">
            <tr>
                <td while="65" align="center">用户名：</td>
                <td while="140"><input type="text" name="用户名" id="username"></td>
            </tr>
            <tr>
                <td while="65" align="center">密码：</td>
                <td while="140"><input type="password" name="密码" id="password"></td>
            </tr>
            <tr>
                <td while="65">身份证：</td>
                <td while="140"><input type="text" name="身份证" id="id_Number"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="注册按钮" value="提交注册" id="Subemit">
                </td>
            </tr> 
        </table>
    </form> -->

    <form action="#" id="form1" name="form1" method="post" class="box">
        <h1>Register</h1>
        <table border="0">
                <input type="text" name="用户名" class="username" placeholder="用户名">
                <input type="password" name="密码" class="password" placeholder="密码">
                <input type="text" name="身份证" class="id_Number" placeholder="身份证">
                <div class='button_buttom'>
                    <input type="submit" name="注册按钮" value="提交注册" class='submit'>
                </div>
        </table>
    </form>










    <?php
        ini_set('date.timezone','Asia/Shanghai');
        $conn = mysqli_connect("localhost:3306", "root", "usbw", "system");
        // if($conn){
        //     echo"数据库连接成功";
        // }else{
        //     die("数据库连接失败");
        // }
        if(@ $_POST["用户名"] != "" && $_POST["密码"] != "" && $_POST["身份证"] != "" && $_POST["注册按钮"] == "提交注册"){
            $user = $_POST["用户名"];
            $pass = $_POST["密码"];
            $pswd = md5($pass);
            $inum = $_POST["身份证"];
            mysqli_query($conn, "INSERT INTO system(username, cipher, id_Number) VALUES('$user', '$pswd', '$inum')");
            echo"注册成功"; 
            function get_Shenfen($id){
                // 截取前两位数
                $index = substr($id, 0, 2);
                $area = array(
                    11 => "北京",
                    12 => "天津",
                    13 => "河北",
                    14 => "山西",
                    15 => "内蒙古",
                    21 => "辽宁",
                    22 => "吉林",
                    23 => "黑龙江",
                    31 => "上海",
                    32 => "江苏",
                    33 => "浙江",
                    34 => "安徽",
                    35 => "福建",
                    36 => "江西",
                    37 => "山东",
                    41 => "河南",
                    42 => "湖北",
                    43 => "湖南",
                    44 => "广东",
                    45 => "广西",
                    46 => "海南",
                    50 => "重庆",
                    51 => "四川",
                    52 => "贵州",
                    53 => "云南",
                    54 => "西藏",
                    61 => "陕西",
                    62 => "甘肃",
                    63 => "青海",
                    64 => "宁夏",
                    65 => "新疆",
                    71 => "台湾",
                    81 => "香港",
                    82 => "澳门",
                    91 => "国外"
                );
                return $area[$index];
            }
            function getAge($id){

                # 1.从身份证中获取出生日期
                $id = $id;//身份证
                $birth_Date = strtotime(substr($id, 6, 8));//截取日期并转为时间戳
                
                # 2.格式化[出生日期]
                $Year = date('Y', $birth_Date);//yyyy
                $Month = date('m', $birth_Date);//mm
                $Day = date('d', $birth_Date);//dd
                
                # 3.格式化[当前日期]
                $current_Y = date('Y');//yyyy
                $current_M = date('m');//mm
                $current_D = date('d');//dd
                
                # 4.计算年龄()
                $age = $current_Y - $Year;//今年减去生日年
                if($Month > $current_M || $Month == $current_M && $Day > $current_D){//深层判断(日)
                    $age--;//如果出生月大于当前月或出生月等于当前月但出生日大于当前日则减一岁
                }
                # 返回
                return $age;
            }
            function get_sex($idcard) {

                if(empty($idcard)) return null;
            
                $sexint = (int) substr($idcard, 16, 1);
            
                return $sexint % 2 === 0 ? '女' : '男';
            
            }
        //    $conn = mysqli_connect("localhost:3306", "root", "usbw", "system");
            $sel_id = mysqli_query($conn, "SELECT id_Number FROM system");
            $id_num_arr = mysqli_fetch_array($sel_id);
            foreach($id_num_arr as $id_Number){
                $household_Register = get_Shenfen($id_Number);
                mysqli_query($conn, "UPDATE system SET household_Register = '{$household_Register}' WHERE id_Number = '{$id_Number}'");
            }
            foreach($id_num_arr as $age_now){
                $age = getAge($age_now);
                mysqli_query($conn, "UPDATE system SET age = '{$age}' WHERE id_Number = '{$id_Number}'");
            }
            foreach($id_num_arr as $sex){
                $sex = get_sex($sex);
                mysqli_query($conn, "UPDATE system SET sex = '{$sex}' WHERE id_Number = '{$id_Number}'");
            }
            sleep(2);
            header('Location: index.php');
        }else{
            echo"<script>"; 
            echo" alert('注意：用户名或密码或身份证不能为空');";
            echo"</script>"; 
        }
    ?>
</body>
</html>