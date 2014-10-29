
	var message;
	var check=0;
	var map = new BMap.Map("allmap");  // 创建Map实例
	var point_center=new BMap.Point(118.799346,32.063356);
	map.centerAndZoom(point_center,15);      // 初始化地图,用城市名设置地图中心点
	map.enableScrollWheelZoom(true);
	alert(point_center.lng+"   "+point_center.lat);
	var center_marker=new BMap.Marker(point_center);
	map.addOverlay(center_marker);
	center_marker.enableDragging();

	
	//拖动
	center_marker.addEventListener("dragend", function(e){
		//增加新标记
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
		    success: function(data){//如果调用php成功
		    	var i=0;
		    	alert(1);
		    	for(i=0;data[i]!=null;i++);
		    	if(window.confirm("附近有"+i+"家餐厅，是否查看"))
		    		{
		    		window.location.href="shop_main.html";
		    		}
		    }
		});
		check=0;
		});