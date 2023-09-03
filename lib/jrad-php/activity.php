<?PHP
class jrad_activity
{
	private $jrad_mysql;	
	protected $appstate = 'whois';
	public $landing = 'index.php';
	
	function __construct ($jrad_mysql) 
	{
		$this->jrad_mysql = $jrad_mysql;
	}	
  final public function redirect ($page)
	{	
		$page = is_null($page)? $this->landing: $page;
		echo '<script type="text/javascript">location.assign("'.$page.'")</script>';	
	}	
	final public function filter ($post) 
	{
		$exclude = array('insert','update','postback','id');
		$new = array();
		foreach ($post as $key => $value) 
		{
			if (!is_array($value) && !in_array($key,$exclude))
			{
				$value = trim($value);
				$value = stripslashes($value);
				$value = htmlspecialchars($value);
				$new[$key] = $value;				
			}
		}
		return $new;
	}			
	final public function sign_up ($post, $next_page = NULL)
	{
		$result = $this->jrad_mysql->insert($post);
		// returns insert_id if successful
		if (is_numeric($result))
		{
			$row = $this->jrad_mysql->get_row($result);
			$this->set_whois($row);
			return is_null($next_page)? $row: $this->redirect($next_page);
		}
		else
			return $result;
	}
  final public function sign_in ($post, $next_page = NULL)
	{
		$name = array_keys($post);
		$value = array_values($post);
		// search username
		$row = $this->jrad_mysql->get_first_where($name[0],$value[0]); 
		if (is_array($row))
		{
			// compare password
			if ($row[$name[1]] == $value[1]) 
			{
				$row['ip'] = $this->get_ip();
				$row['proxy'] = $this->get_proxy($row['date'],$row['id']);		
				$this->set_whois($row);
				return is_null($next_page)? $row: $this->redirect($next_page);
			}
			else
				return 409; 
			// invalid password
		}
		else
			return 404; 
			// invalid username
  }
  final public function sign_in_alt ($post, $next_page = NULL)
	{
		$name = array_keys($post);
		$value = array_values($post);
		// search username
		$row = $this->jrad_mysql->get_first_where($name[0],$value[0]); 
		if (is_array($row))
		{
			// compare password
			if ($row[$name[1]] == $value[1]) 
			{
				$row['ip'] = $this->get_ip();
				$row['proxy'] = $this->get_proxy($row['date'],$row['id']);		
				$this->set_whois($row);
				if (!is_null($next_page))
				{
					echo '<script type="text/javascript">
						alert("Sign in successful!");
						location.assign("about.php");
					</script>';
				}
				else
					return $row;
			}
			else
				echo '<script type="text/javascript">alert("Password not correct!");</script>';
			// invalid password
		}
		else
			echo '<script type="text/javascript">alert("Username not found!");</script>';		
			// invalid username
	}
  final public function sign_out ($next_page = NULL)
	{	
		if (isset($_GET['logout']))
		{
			session_destroy();
			return $this->redirect($next_page);
		}	
	}	
  final public function page_lock ($next_page = NULL)
	{	
		if (!isset($GLOBALS['page_lock']) && !isset($_SESSION[$this->appstate]))
			return $this->redirect($next_page);
	}	
	final public function set_whois ($row)
	{	
		$_POST = NULL;
		$_SESSION[$this->appstate] = $row;
	}		
  final public function get_whois ()
	{	
		return $_SESSION[$this->appstate];
	}	
  final public function get_proxy ($date, $id)
	{	
		// 2020-04-21 12:47:00
		$date = str_replace('-','',$date); // 20200421 12:47:00
		$date = str_replace(' ','',$date); // 2020042112:47:00
		$date = str_replace(':','',$date); // 20200421124700
		return $date.$id; // 202004211247001
	}		
  final public function get_ip ()
	{	
		// get IP
		if ($_SERVER['HTTP_CLIENT_IP']) $ip = $_SERVER['HTTP_CLIENT_IP'];
		else if ($_SERVER['HTTP_X_FORWARDED_FOR']) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if ($_SERVER['HTTP_X_FORWARDED']) $ip = $_SERVER['HTTP_X_FORWARDED'];
		else if ($_SERVER['HTTP_FORWARDED_FOR']) $ip = $_SERVER['HTTP_FORWARDED_FOR'];
		else if ($_SERVER['HTTP_FORWARDED']) $ip = $_SERVER['HTTP_FORWARDED'];
		else if ($_SERVER['REMOTE_ADDR']) $ip = $_SERVER['REMOTE_ADDR'];
		else $ip = $_SERVER['SERVER_ADDR'];
		// validate IP
		if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) return $ip;
		else if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) return $ip;
		else return $ip;
	}
	
}

?>
