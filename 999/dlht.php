<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
     .mian{
     	margin: 0 auto;
     	width: 350px;
     	height: 100px;
     	background:#987888;
     	padding: 20px;
     }
	</style>
</head>
<body>
 <div class="mian">
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
    $login=mysql_query("select username,password from dlzc where username='$name' and password='$password'");
    $rows=mysql_num_rows($login);
    if ($rows) {
        header("refresh:0;url=index.html");
        exit;
    }
    else{
    	echo "用户名或密码错误";
    	echo "
    	<script>
          setTimeout (function(){window.location.href='dlu.html';},1000);
    	</script>
    	      ";
    }

   mysql_close($conn);



  ?>



 </div>
</body>
</html>