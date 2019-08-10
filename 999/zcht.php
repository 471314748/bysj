<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
     .yyy{
      margin: 0 auto;
      width: 350px;
      height: 100px;
      background:#987888;
      padding: 20px;
     }
  </style>
</head>
<body>
<div class="yyy">
<?php
 $name=$_POST['zhao'];
 $password=$_POST['mma'];
 $conn = @mysql_connect("127.0.0.1","root","abc123");
if (!$conn){
    die("连接数据库失败：" . mysql_error());
}
mysql_select_db("dlzc", $conn);
//字符转换，读库
mysql_query("set character set 'utf8'");
//写库
mysql_query("set names 'utf8'");
 $yanz=mysql_query("select username from dlzc where username='$name'");
 $rows=mysql_num_rows($yanz);
 if ($rows) {
  echo "你输入的账号以存在请重新输入";
  echo "
      <script>
          setTimeout (function(){window.location.href='zhuce.html';},1000);
      </script>
            ";
 }
 else
   mysql_query("insert into dlzc (username,password) values('{$name}','{$password}')") or die("存入数据库失败".mysql_error()) ;
mysql_close($conn);
?>
<script type="text/javascript"> 

    alert("注册成功,即将进入登录界面"); 

    window.location.href="dlu.html"; 

  </script>  

</div>
</body>
</html>