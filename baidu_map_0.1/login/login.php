<?php
	$con=mysql_connect("localhost","root","09317999011");
	$username=htmlspecialchars($_POST['user']);
	$password=md5($_POST['psw']);
	mysql_select_db("message",$con);
	
	$check_name=mysql_query("SELECT * FROM usermessage where username='$username'");
	$check_query=mysql_query("SELECT * FROM usermessage where username='$username'and password='$password'");
	if(!(mysql_fetch_array($check_name))) {
		echo "用户名不存在";
		echo"<META HTTP-EQUIV=REFRESH CONTENT='2;URL=login.html'>";
		exit();
	}
	else if(!(mysql_fetch_array($check_query)))
	{
		echo "密码错误";
		echo"<META HTTP-EQUIV=REFRESH CONTENT='2;URL=login.html'>";
		exit();
	}
	else
	{
		echo "登录成功";
		echo"<META HTTP-EQUIV=REFRESH CONTENT='2;URL=login.html'>";
		exit;
	}
?>