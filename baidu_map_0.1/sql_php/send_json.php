<?php
require 'get_message.php';
require 'message_information.php';
header("Content-type: text/html; charset=utf-8");
class SendJson extends Message
{
	var $message;
	var $message_information;
	var $name=array();
	var $phone=array();
	var $longitude=array();
	var $latitude=array();
	var $address=array();
	var $context=array();
	function SendJson()
	{
		$this->message=new Message();	
		$this->message->connect_database();
		$this->message_information=new Message_information();
	}
	//����������Ϣ
	function send_all()
	{
		$json_string;
		$this->message->search_basemessage();
		$this->name=$this->message->get_name();
		$this->phone=$this->message->get_phone();
		$this->longituge=$this->message->get_longitude();
		$this->latitude=$this->message->get_latitude();
		$this->address=$this->message->get_address();
		$this->context=$this->message->get_context();
		$this->teast=$this->message->get_teast();
		$this->price=$this->message->get_price();
		$this->creat_jsonclass();
		$json_string=$this->ch_json_encode($this->message_information);
		echo "creat_points($json_string)";
	}
	//����ֵ����ʵ����
	function creat_jsonclass()
	{
		$this->message_information->name=$this->name;
		$this->message_information->phone=$this->phone;
		$this->message_information->longitude=$this->longituge;
		$this->message_information->latitude=$this->latitude;
		$this->message_information->address=$this->address;
		$this->message_information->context=$this->context;
		$this->message_information->teast=$this->teast;
		$this->message_information->price=$this->price;
	}
	//��ʹ����utf_8������json�������ɻ�������룬�˺��������������
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
                	   $data[$k] = ch_urlencode($v); //�ݹ���øú���
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
$sendjson =new SendJson();
$sendjson->send_all();
?>