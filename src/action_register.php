<?PHP
$table = 'register';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$post = $activity->filter($_POST);
	$mysql->set_table($table);	
	$result = $mysql->insert($post);
	if (is_numeric($result))
	{
		// email admin and sender
		$notice->parse(' <b>SUCCESS:</b> Thank you for joining SWI. Our correspondents will reach out to you shortly.');
	}
	else
		$notice->parse('!<b>ERROR:</b> Account creation failed! It appears the Email Address used is already registered with us.');
}
?>  
