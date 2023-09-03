<?PHP
$table = 'donate';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$post = $activity->filter($_POST);
	$mysql->set_table($table);	
	$result = $mysql->insert($post);
	if (is_numeric($result))
	{
		// email admin
		$notice->parse(' <b>SUCCESS:</b> Thank you for donating to SWI. Our correspondents will reach out to you shortly.');
	}
	else
	{
		$link = '<a href="mailto:info@socialwelfareinitiative.com" target="_blank">
			info@socialwelfareinitiative.com
		</a>';
		$notice->parse('!<b>ERROR:</b> Payslip registration failed! Kindly contact us at '.$link.' for immediate assistance.');
	}
}
?>  
