
	var message;
	var check=0;
	var map = new BMap.Map("allmap");  // ����Mapʵ��
	var point_center=new BMap.Point(118.799346,32.063356);
	map.centerAndZoom(point_center,15);      // ��ʼ����ͼ,�ó��������õ�ͼ���ĵ�
	map.enableScrollWheelZoom(true);
	alert(point_center.lng+"   "+point_center.lat);
	var center_marker=new BMap.Marker(point_center);
	map.addOverlay(center_marker);
	center_marker.enableDragging();

	
	//�϶�
	center_marker.addEventListener("dragend", function(e){
		//�����±��
		point_center.lng=e.point.lng;
		point_center.lat=e.point.lat;
		document.cookie='lng='+point_center.lng;
    	document.cookie='latu='+point_center.lat;
    	alert(point_center.lng);
    	alert(point_center.lat);
		$.ajax({
		    url: "../sql_php/send_json.php",  
		    type: "POST",
		    data:{lat:point_center.lat,lon:point_center.lng},
		    dataType: "json",
		    error: function(){  
		        alert('Error loading XML document');  
		    },  
		    success: function(data){//�������php�ɹ�
		    	var i=0;
		    	alert(1);
		    	for(i=0;data[i]!=null;i++);
		    	if(window.confirm("������"+i+"�Ҳ������Ƿ�鿴"))
		    		{
		    		window.location.href="shop_main.html";
		    		}
		    }
		});
		check=0;
		});