<?php
//php编码格式
header("Content-type: text/html; charset=utf-8");
//定义数组
class get_message
{
	var $name=array();
	var $phone=array();
	var $location=array();
	var $address=array();
	var $context=array();
	//打开数据库
	function connect_database()
	{ 
		$con=mysql_connect("localhost","root","09317999011")or die(mysql_error());
		mysql_select_db("message",$con)or die(mysql_error());
		mysql_query("set names 'utf8'")or die(mysql_error());
	}
	//获取电话
	function search_phone()
	{
		$i=0;
		$result = mysql_query("SELECT telephone FROM shop ")or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$phone[$i]=$row['telephone'];
			echo $phone[$i];
			$i++;
		}	
	}
	//获取姓名
	function search_name()
	{
		$i=0;
		$result = mysql_query("SELECT name FROM shop ")or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$name[$i]=$row['name'];
			echo $name[$i];
			$i++;
		}
	}
	//获取地址坐标
	function search_location()
	{
		$i=0;
		$result = mysql_query("SELECT location FROM shop ")or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$location[$i]=$row['location'];
			echo $location[$i];
			$i++;
		}
	}
	//获取地址
	function search_address()
	{
		$i=0;
		$result = mysql_query("SELECT address FROM shop ")or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$address[$i]=$row['address'];
			echo $address[$i];
			$i++;
		}
	}
	//获取文字
	function search_context()
	{
		$i=0;
		$result = mysql_query("SELECT context FROM shop ")or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$context[$i]=$row['context'];
			echo $context[$i];
			$i++;
		}
	}

	//获取基本信息
	function search_basemessage()
	{
		$i=0;
		$result = mysql_query("SELECT * FROM shop ")or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$name[$i]=$row['name'];
			$phone[$i]=$row['telephone'];
			$location[$i]=$row['location'];
			$address[$i]=$row['address'];
			$context[$i]=$row['context'];
			echo $name[$i],$phone[$i],$location[$i],$address[$i],$context[$i];
			$i++;
		}
	}
}
?>