<?php
 header('Content-Type:text/html; charset=gb2312');//使用gb2312编码，使中文不会变成乱码    
 $longitude=$_POST['trans_data'];    
 $latitude=$_POST['trans_data1'];
 $lll=$latitude*$longitude;
 echo json_encode($lll);
 ?>