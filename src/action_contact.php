<?PHP
$table = 'contact';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$post = $activity->filter($_POST);
	$mysql->set_table($table);	
	$result = $mysql->insert($post);
	if (is_numeric($result))
	{
		// email admin and sender
		$notice->parse(' <b>SUCCESS:</b> Thank you for contacting SWI. Our correspondents will reach out to you shortly.');
	}
	else
		$notice->parse('!<b>ERROR:</b> Message delivery failed! Message cound not be delivered to one or more of its recipients.');
}
?>  
