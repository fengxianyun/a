<?php
 header('Content-Type:text/html; charset=gb2312');//ʹ��gb2312���룬ʹ���Ĳ���������    
 $longitude=$_POST['trans_data'];    
 $latitude=$_POST['trans_data1'];
 $lll=$latitude*$longitude;
 echo json_encode($lll);
 ?>