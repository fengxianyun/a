<?php
//php�����ʽ
header("Content-type: text/html; charset=utf-8");
//��������
class get_message
{
	var $name=array();
	var $phone=array();
	var $location=array();
	var $address=array();
	var $context=array();
	//�����ݿ�
	function connect_database()
	{ 
		$con=mysql_connect("localhost","root","09317999011")or die(mysql_error());
		mysql_select_db("message",$con)or die(mysql_error());
		mysql_query("set names 'utf8'")or die(mysql_error());
	}
	//��ȡ�绰
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
	//��ȡ����
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
	//��ȡ��ַ����
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
	//��ȡ��ַ
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
	//��ȡ����
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

	//��ȡ������Ϣ
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