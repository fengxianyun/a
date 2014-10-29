<?php
session_start();
require 'get_message.php';
$longitude=$_POST["lon"];    
$latitude=$_POST["lat"];
//echo json_encode("$latitude+$longitude");
header("Content-type: text/html; charset=utf-8");
class SendJson 
{
	var $message;
	var $message_informations;
	var $message_information;
	var $longitude;
	var $latitude;
	function SendJson($longitude,$latitude)
	{
		$this->message=new Message();	
		$this->message->connect_database();
		$this->longitude=$longitude;
		$this->latitude=$latitude;
	}
	//发送所有信息
	function send_all()
	{
		$send_message=array();
		$count=0;
		$this->message->search_basemessage();
		$this->message_informations=$this->message->get_information();
		for($i=0;$i<3;$i++)
		{
			$this->message_information[$i]=$this->message_informations[$i];
			$long=$this->message_information[$i]->longitude;
			$lat=$this->message_information[$i]->latitude;
			if(abs($long-$this->longitude)<1&&abs($lat-$this->latitude)<1)
			{
				$send_message[$count]=$this->message_information[$i];
				$count++;
				
			}
			
		}
		//print_r $send_message;
		$json_string=$this->ch_json_encode($send_message);
		$_SESSION['message']=$json_string;
		echo $_SESSION['message'];
	}
	//即使是用utf_8来传送json数据依旧会产生乱码，此函数用来解决乱码
	function ch_json_encode($data) {
   		function ch_urlencode($data) {
    	   if (is_array($data) || is_object($data)) {
        	   foreach ($data as $k => $v) {
            	   if (is_scalar($v)) {
                	   if (is_array($data)) {
                    	   $data[$k] = urlencode($v);
 	                  } else if (is_object($data)) {
    	                   $data->$k = urlencode($v);
        	           }
            	   } else if (is_array($data)) {
                	   $data[$k] = ch_urlencode($v); //递归调用该函数
              	 } else if (is_object($data)) {
            	       $data->$k = ch_urlencode($v);
              	 }
          	 }
      	 }
      	 return $data;
  	 }
   
   	$ret = ch_urlencode($data);
   	$ret = json_encode($ret);
   	return urldecode($ret);
	}
}
if($latitude!=null&&$longitude!=null)
{
	$sendjson =new SendJson($longitude,$latitude);
	$sendjson->send_all();
}
?>