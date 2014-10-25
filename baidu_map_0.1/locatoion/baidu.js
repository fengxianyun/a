
	var message;
	var name;
	var longitude;
	var latitude;
	var address;
	var context;
	var phone;
	var teast;
	var price;
	var points=new Array();
	var markers=new Array();
	var map = new BMap.Map("allmap");  // 创建Map实例
	var point_center=new BMap.Point(118.799346,32.063356);
	map.centerAndZoom(point_center,15);      // 初始化地图,用城市名设置地图中心点
	map.enableScrollWheelZoom(true);
	var check=0;
	
	alert(point_center.lng+"   "+point_center.lat);
	var center_marker=new BMap.Marker(point_center);
	map.addOverlay(center_marker);
	center_marker.enableDragging();
	var circle=new Circle();
	

	
	//拖动
	center_marker.addEventListener("dragend", function(e){
		//增加新标记
		map.clearOverlays();
		point_center.lng=e.point.lng;
		point_center.lat=e.point.lat;
		map.addOverlay(center_marker);
		circle=new Circle();
//		var local =  new BMap.LocalSearch(map, {renderOptions: {map: map, autoViewport: false}});  
//	    var bounds = getSquareBounds(circle.getcircle().getCenter(),circle.getcircle().getRadius());
//	    local.searchInBounds("餐馆",bounds); 
//	    local.setMarkersSetCallback(function(pois)
//	    	{
//	    	
//	    		for(var i=0;i<pois.length;i++)
//		    	pois[i].marker.addEventListener("dblclick", function(e){
//					 if(check!=0)
//					 {
//					 	walking.deleteRoute();
//					 }
//					 walking=new WalkingRoute(point_center,e.point);
//					 check=1;
//					});
//		    });
		});




	//关于点的类
	function Point(a,b)
	{
		var point=new BMap.Point(a+0.01,b);		
		var marker=new BMap.Marker(point);
		//创建点		
		var creatPoint=function()
		{	
			map.addOverlay(marker);		
		};
		//删除点
		this.deletePoint=function()
		{
			map.removeOverlay(marker);
		};
		this.getPoint=function()
		{
			return point;
		};
		this.getMarker=function()
		{
			return marker;
		};
		creatPoint();
	}

	function Circle()
	{
		var circle = new BMap.Circle(point_center,500,{strokeColor:"blue", strokeWeight:2, strokeOpacity:0.5});
		var creatCircle=function()
		{
			map.addOverlay(circle);
		};
		this.deleteCircle=function()
		{
			map.removeOverlay(circle);
		};
		this.getcircle=function()
		{
			return circle;
		};
		creatCircle();
	}
	
	function WalkingRoute(a,b)
	{
		var walking = new BMap.WalkingRoute(a, {renderOptions:{map: map, autoViewport: true}});
		var	creatRoute=function()
		{
			walking.search(a,b);
		};
		this.deleteRoute=function()
		{
			walking.clearResults();
		};
		creatRoute();
	}
	  /**
     * 得到圆的内接正方形bounds
     * @param {Point} centerPoi 圆形范围的圆心
     * @param {Number} r 圆形范围的半径
     * @return 无返回值   
     */ 
    function getSquareBounds(centerPoi,r){
        var a = Math.sqrt(2) * r; //正方形边长
      
        mPoi = getMecator(centerPoi);
        var x0 = mPoi.x, y0 = mPoi.y;
     
        var x1 = x0 + a / 2 , y1 = y0 + a / 2;//东北点
        var x2 = x0 - a / 2 , y2 = y0 - a / 2;//西南点
        
        var ne = getPoi(new BMap.Pixel(x1, y1)), sw = getPoi(new BMap.Pixel(x2, y2));
        return new BMap.Bounds(sw, ne);        
        
    }
    //根据球面坐标获得平面坐标。
    function getMecator(poi){
        return map.getMapType().getProjection().lngLatToPoint(poi);
    }
    //根据平面坐标获得球面坐标。
    function getPoi(mecator){
        return map.getMapType().getProjection().pointToLngLat(mecator);
    }
    function creat_points(message)
    {
    	var i=0;
    	var opts;
    	var infoWindow;
    	name=message.name;
    	longitude=message.longitude;
    	latitude=message.latitude;
    	address=message.address;
    	context=message.context;
    	phone=message.phone;
    	price=message.price;
    	teast=message.teast;
    	for(i=0;latitude[i]!=null&&longitude[i]!=null;i++)
    		{
    			points[i]=new BMap.Point(longitude[i],latitude[i]);
    			markers[i]=new BMap.Marker(points[i]);
    			map.addOverlay(markers[i]);
 
    			function lll()
    			{
    				opts = {title : '<span style="font-size:14px;color:#0A8021">'+name[i]+'</span>'};
    				infoWindow =new BMap.InfoWindow("<div style='line-height:1.8em;font-size:12px;'><b>地址:</b>"+address[i]+"</br><b>电话:</b>"+phone[i]+"</br><b>口碑：</b><img src='http://cdn2.iconfinder.com/data/icons/diagona/icon/16/031.png' /><img src='http://cdn2.iconfinder.com/data/icons/diagona/icon/16/031.png' /><img src='http://cdn2.iconfinder.com/data/icons/diagona/icon/16/031.png' /><img src='http://cdn2.iconfinder.com/data/icons/diagona/icon/16/031.png' /><img src='http://cdn2.iconfinder.com/data/icons/diagona/icon/16/031.png' /><a style='text-decoration:none;color:#2679BA;float:right' href='#'>详情>></a></div>", opts[i]);    			
    				markers[i].addEventListener("mouseover", function(){this.openInfoWindow(infoWindow);});

    			}
    		}
    			
    		
    }