function get_message(json)
{
	var message=json;
	var name=message.name;
	var location=message.location;
	var address=message.address;
	var context=message.context;
	var phone=message.phone;
	function get_name()
	{
		return name;
	}
	function get_location()
	{
		return location;
	}
	function get_address()
	{
		return address;
	}
	function get_context()
	{
		return context;
	}
	function get_phone()
	{
		return phone;
	}
}