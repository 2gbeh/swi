<?PHP
class tent_otis_mail
{
	private $id, $user, $email, $ctx;
	function __construct ($id)
	{
		$this->id = $id;
		$this->user = new BeanUser($id);
		$this->email = $this->user->getEmail();
	}
	function context ($ctx)
	{
		$this->ctx = $ctx;
	}	
	function send ($args = 'null')
	{
		$server = $GLOBALS['glob_appname'];
		$from = $GLOBALS['glob_email'];
		$to = $this->email;
		extract($this->compose($args));
		mailMarkup($from,$to,$subject,$message,$server);
		return $this->preview($to,$subject,$message,$headers);
	}
	function preview ($to, $subject, $message, $headers)
	{
		$buf = '<div class="inbox">
			<div class="subject">Password successfully changed</div>
			<div class="headers">
				<div class="badge">N</div>
				<table border="0">
				<caption>
					noreply-inspira@un.org
					<i>to me</i>
					<a href="javascript:void(0)" onclick="hideDetails()">Hide details</a>
				</caption>
				<tr>
					<th>From</th>
					<td><a href="javascript:void(0)">noreply-inspira@un.org</a></td>
				</tr>
				<tr>
					<th>To:</th>
					<td><a href="javascript:void(0)">tugbeh.osaretin@gmail.com</a></td>
				</tr>
				<tr>
					<th>Date:</th>
					<td>Sep 14, 2020, 20:32</td>
				</tr>
				<tr>
					<td colspan="2"><a href="javascript:void(0)">View security details</a></td>
				</tr>				
				</table>
			</div>
			<div class="body">
				Dear <b>EMMANUEL</b>, 
				<p></p>
				The password for your <b>inspira</b> account - 2gbeh - is successfully changed.
				<p></p>
				If you didn\'t change your password, please contact the support center by
				clicking on <a href="#">"Contact Us"</a> link in <b>inspira</b>.
				<p></p>
				Please do not respond to this system-generated email.
				<p></p>
				Yours sincerely,
				<p></p>
				Office of Human Resources Management,<br/>
				<b>United Nations Secretariat</b>
				<p></p>
				<img src="../../images/logo_compact.png" width="160" alt="<?php echo $glob_typeface; ?>" border="0" />	
			</div>
		</div>';
		return $buf;
		
	}	
	function compose ($ctx)
	{
		if ($ctx = 'pre-login')
		{
		  $sub = 'One Time Password (Code) Notification';
		  $con = 'One Time Password (Code) Notification';
		}
		else if ($ctx = 'post-login')
		  $buf = 'Bank Login Confirmation';
		else if ($ctx = 'block-user')
		  $buf = 'Account Suspended';
		else if ($ctx = 'transfer-otp')
		  $buf = 'Transfer Code OTP';
		else if ($ctx = 'transfer-done')
		  $buf = 'Transfer Alert';
		else if ($ctx = 'admin-credit')
		  $buf = 'Transaction Alert (CR)';
		else if ($ctx = 'admin-debit')
		  $buf = 'Transaction Alert (DR)';
		else
		  $buf = 'OTP Code';
		return $buf;
	}
	function getContent ($ctx, $code)
	{
		$top = 'Dear <b>'.strtoupper($this->row->acct_name).'</b>, ';
		$end = 'please send an email immediately to our Fraud Team at '.$GLOBALS['glob_email'].'.';
		$ts = '<b>'.date('Y-m-d H:i:s').'</b>';
		
		if ($ctx = 'pre-login')
		 $buf = $top.' kindly use this code <b>'.$code.'</b> to access your account. 
		 The code was generated on '.$ts.'. If you did not initiate a login action or any  
		 third party asked you to supply it, '.$end;
		else if ($ctx = 'post-login')
		 $buf = $top.' please be informed that your account was access on '.$ts.'. 
		 If you did not logon to your account at the aforementioned date/time, '.$end;
		else if ($ctx = 'block-user')
		 $buf = $top.' please be informed that your account has been suspended as of '.$ts.' and
		 requires immediate administrative attention. Please contact Customer Care '.$glob_email;
		else if ($ctx = 'transfer-done')
		 $buf = $top.' <p></p>
		 <u><b>Electronic Notificaiton Service</b></u> <p></p>
		 We wish to inform you that a Debit (DR) transaction occurred on your account with us. <p></p>
		 The details of the transaction are shown below: <p></p>
		 <u><b>Transfer Completed</b></u> <p></p>
		 <table border="0">
			<tr><th colspan="2">Transaction Statement</th></tr>
			<tr><td>Bank Name :</td><td>'.$row->bank_name.'</td></tr>
			<tr><td>Account Name :</td><td>'.$row->acct_name.'</td></tr>
			<tr><td>Account Number :</td><td>'.$row->acct_no.'</td></tr>
			<tr><td>Amount (USD) :</td><td>'.toMoneyPlus($row->amount).' ('.$row->trans_type.')</td></tr>
			<tr><td>Narration :</td><td>'.$row->reason.'</td></tr>
			<tr><td>Transaction Date :</td><td>'.$row->date.'</td></tr>
			<tr><th>New Balance :</th><th>$ '.toMoneyPlus($row->balance).'</th></tr>
		 </table> <p></p>
		 The privacy and security of your bank account details is important to us. 
		 If you would prefer that we DO NOT display your account balance in every
		 transaction alert sent to you via email, '.$end.' <p></p>
		 Thank you for choosing '.$glob_appname;		 
		else if ($ctx = 'admin-credit')
		 $buf = $top.' <p></p>
		 <u><b>Electronic Notificaiton Service</b></u> <p></p>
		 We wish to inform you that a Credit (CR) transaction occurred on your account with us. <p></p>
		 The details of the transaction are shown below: <p></p>
		 <u><b>Transaction Notificaiton</b></u> <p></p>
		 <table border="0">
			 <tr><td>Account Number</td><td>&bnsp;</td></tr>
			 <tr><td>Location</td><td>E-CHANNELS</td></tr>
			 <tr><td>Description</td><td>&nbsp;</td></tr>
			 <tr><td>Amount</td><td>&nbsp;</td></tr>
			 <tr><td>Date</td><td>&nbsp;</td></tr>
			 <tr><td>Time</td><td>&nbsp;</td></tr>
			 <tr><td colspan="2">Account Balance as at '.date('H:i').' are as follows</td></tr>
			 <tr><td>Current Balance</td><td>&nbsp;</td></tr>
			 <tr><td>Available Balance</td><td>&nbsp;</td></tr>			 
		 </table> <p></p>
		 The privacy and security of your bank account details is important to us. 
		 If you would prefer that we DO NOT display your account balance in every
		 transaction alert sent to you via email, '.$end.' <p></p>
		 Thank you for choosing '.$glob_appname;
		else if ($ctx = 'admin-debit')
		 $buf = $top.' <p></p>
		 <u><b>Electronic Notificaiton Service</b></u> <p></p>
		 We wish to inform you that a Debit (DR) transaction occurred on your account with us. <p></p>
		 The details of the transaction are shown below: <p></p>
		 <u><b>Transaction Notificaiton</b></u> <p></p>
		 <table border="0">
			 <tr><td>Account Number</td><td>&bnsp;</td></tr>
			 <tr><td>Location</td><td>E-CHANNELS</td></tr>
			 <tr><td>Description</td><td>&nbsp;</td></tr>
			 <tr><td>Amount</td><td>&nbsp;</td></tr>
			 <tr><td>Date</td><td>&nbsp;</td></tr>
			 <tr><td>Time</td><td>&nbsp;</td></tr>
			 <tr><td colspan="2">Account Balance as at '.date('H:i').' are as follows</td></tr>
			 <tr><td>Current Balance</td><td>&nbsp;</td></tr>
			 <tr><td>Available Balance</td><td>&nbsp;</td></tr>			 
		 </table> <p></p>
		 The privacy and security of your bank account details is important to us. 
		 If you would prefer that we DO NOT display your account balance in every
		 transaction alert sent to you via email, '.$end.' <p></p>
		 Thank you for choosing '.$glob_appname;		 
		else
			$buf = $code;
		return $buf;
	}	
}


?>
