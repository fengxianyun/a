var message;
function getCookie(name){ 
	var strCookie=document.cookie; 
	var arrCookie=strCookie.split(";"); 
	for(var i=0;i<arrCookie.length;i++)
		{ 
			var arr=arrCookie[i].split("=");
			if(arr[0]==name||arr[0]==" "+name||arr[0]==name+" ")
				return arr[1]; 
		} 
	return ""; 
	} 
function set_shop()
{
	var longitude=getCookie('lng');
	var latitude=getCookie('latu');
	$.ajax({
    	url: "../sql_php/send_json.php",  
    	type: "POST",
    	data:{lat:latitude,lon:longitude},
    	dataType: "json",
    	error: function(){  
        alert('Error loading XML document');  
    	},  
    	success: function(data){//如果调用php成功
    		message=data;
    		for(var i=0;data[i]!=null;i++)
    			{
    				var text;
    				var container=document.getElementById("container");
    				var div=document.createElement("div");
    				container.appendChild(div);
    				div.setAttribute("id", "div"+i);
    				div.setAttribute("class", "div1");
    				div.setAttribute("onmouseover", "appear("+i+")");
    				
    				var p1=document.createElement("p");
    				div.appendChild(p1);
    				p1.setAttribute("id", i+"_name");
    				p1.setAttribute("class", "p1");
    				text=document.createTextNode(data[i].name);
    				p1.appendChild(text);
    				
    				
    				var p2=document.createElement("p");
    				div.appendChild(p2);
    				p2.setAttribute("id", i+"_address");
    				p2.setAttribute("class", "p2");
    				text=document.createTextNode(data[i].address);
    				p2.appendChild(text);
    				
    				var p3=document.createElement("p");
    				div.appendChild(p3);
    				p3.setAttribute("id", i+"_context");
    				p3.setAttribute("class", "p3");
    				text=document.createTextNode(data[i].context);
    				p3.appendChild(text);
    				
    				var p4=document.createElement("p");
    				div.appendChild(p4);
    				p4.setAttribute("id", i+"_phone");
    				p4.setAttribute("class", "p4");
    				text=document.createTextNode(data[i].phone);
    				p4.appendChild(text);
    			}
    	}
	});
}
function appear(id)
{
	var dc;
	alert(id);
	dc=document.getElementById("div"+id);
	dc.setAttribute("style", "border: thick;border-color: blue;");
}
set_shop();