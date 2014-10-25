<?php
//php编码格式
header("Content-type: text/html; charset=utf-8");
//定义数组
class Message
{
	var $name=array();
	var $phone=array();
	var $longitude=array();
	var $latitude=array();
	var $address=array();
	var $context=array();
	var $teast=array();
	var $price=array();
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
			$this->phone[$i]=$row['telephone'];
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
			$this->name[$i]=$row['name'];
			$i++;
		}
	}
	//获取地址坐标
	function search_location()
	{
		$i=0;
		$result = mysql_query("SELECT longitude or latitude FROM shop ")or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$this->longitude[$i]=$row['location'];
			$this->latitude[$i]=$row['latitude'];
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
			$this->address[$i]=$row['address'];
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
			$this->context[$i]=$row['context'];
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
			$this->name[$i]=$row['name'];
			$this->phone[$i]=$row['telephone'];
			$this->longitude[$i]=$row['longitude'];
			$this->latitude[$i]=$row['latitude'];
			$this->address[$i]=$row['address'];
			$this->context[$i]=$row['context'];
			$this->teast[$i]=$row['teast'];
			$this->price[$i]=$row['price'];
			$i++;
		}
	}
	//得到姓名
	function get_name()
	{
		return $this->name;
	}
	function get_phone()
	{
		return $this->phone;
	}
	function get_longitude()
	{
		
		return $this->longitude;
	}
	function get_latitude()
	{
		
		return $this->latitude;
	}
	function get_address()
	{
		return $this->address;
	}
	function get_context()
	{
		return $this->context;
	}
	function get_teast()
	{
		return $this->teast;
	}
	function get_price()
	{
		return $this->price;
	}
}
//$message=new Message();
//$message->connect_database();
//$lll=array();
//$lll=$message->search_basemessage();
//$lll=$message->get_name();
//print_r($message->get_longitude());
?>
