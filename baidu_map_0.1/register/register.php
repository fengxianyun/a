<?php
	//�����Ż�
	//�û�����֤�ŵ�ǰ̨
	



	//�������ݿ�
	$con=mysql_connect("localhost","root","09317999011")//��ַ���û���������
	or  die("�������ݿ�ʧ��  ".mysql_error());
	//ѡ���
	mysql_select_db("message",$con);
	//��ȡ�ύ������
	$user=htmlspecialchars($_POST['user']);
	//ʹ��MD5����
	$psw=MD5($_POST['psw']);
	//����û����Ƿ����
	$check_query = mysql_query("select * from usermessage where username='$user' limit 1");
	if(mysql_fetch_array($check_query))
	{
    	echo '�û��� '.$user.' �Ѵ��ڡ�';
    	echo "<META HTTP-EQUIV=REFRESH CONTENT='3;URL=register.html'>";
    	exit;
	}
	$sql="INSERT INTO usermessage(username,password)
	VALUES('$user','$psw')";
	//д������
	if(mysql_query($sql,$con))
	{
		echo"�ύ�ɹ�\n��ȴ�ҳ����ת";
		//�Զ���ת
		echo "<META HTTP-EQUIV=REFRESH CONTENT='3;URL=../first_page.html'>";
	}
	else
	{
		echo "�ύʧ��".mysql_error()."\nҳ�漴������";
		echo "<META HTTP-EQUIV=REFRESH CONTENT='3;URL=register.html'>";
	}
?>