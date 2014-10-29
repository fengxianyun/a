<?php
	//界面优化
	//用户名验证放到前台
	



	//连接数据库
	$con=mysql_connect("localhost","root","09317999011")//地址，用户名，密码
	or  die("连接数据库失败  ".mysql_error());
	//选择表
	mysql_select_db("message",$con);
	//提取提交的数据
	$user=htmlspecialchars($_POST['user']);
	//使用MD5加密
	$psw=MD5($_POST['psw']);
	//检查用户名是否存在
	$check_query = mysql_query("select * from usermessage where username='$user' limit 1");
	if(mysql_fetch_array($check_query))
	{
    	echo '用户名 '.$user.' 已存在。';
    	echo "<META HTTP-EQUIV=REFRESH CONTENT='3;URL=register.html'>";
    	exit;
	}
	$sql="INSERT INTO usermessage(username,password)
	VALUES('$user','$psw')";
	//写入数据
	if(mysql_query($sql,$con))
	{
		echo"提交成功\n请等待页面跳转";
		//自动跳转
		echo "<META HTTP-EQUIV=REFRESH CONTENT='3;URL=../first_page.html'>";
	}
	else
	{
		echo "提交失败".mysql_error()."\n页面即将返回";
		echo "<META HTTP-EQUIV=REFRESH CONTENT='3;URL=register.html'>";
	}
?>