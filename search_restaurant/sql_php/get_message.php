<?php
require 'message_information.php';
//php�����ʽ
header("Content-type: text/html; charset=utf-8");
//��������
class Message
{
	 var $information=array();
	//�����ݿ�
	function connect_database()
	{ 
		$con=mysql_connect("localhost","root","09317999011")or die(mysql_error());
		mysql_select_db("message",$con)or die(mysql_error());
		mysql_query("set names 'utf8'")or die(mysql_error());
	}
	//��ȡ������Ϣ
	function search_basemessage()
	{
		$i=0;
		$result = mysql_query("SELECT * FROM shop ")or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$this->information[$i]=new Message_information();
			$this->information[$i]->name=$row['name'];
			$this->information[$i]->phone=$row['telephone'];
			$this->information[$i]->longitude=$row['longitude'];
			$this->information[$i]->latitude=$row['latitude'];
			$this->information[$i]->address=$row['address'];
			$this->information[$i]->context=$row['context'];
			$this->information[$i]->teast=$row['teast'];
			$this->information[$i]->price=$row['price'];
			$i++;		
		}
	}
	function get_information()
	{
		return $this->information;
	}
}
//$message=new Message();
//$message->connect_database();
//$lll=array();
//$message->search_basemessage();
//$lll=$message->get_information();
?>
