<?PHP
class jrad_notice
{
	private $error, $errno, $sign;
	final public function set_error ($error) {$this->error = $error;}
	final public function set_errno ($errno) {$this->errno = $errno;}	
	final public function parse ($err)
	{		
		$this->sign = substr($err,0,1);
		$this->error = substr($err,1);
  }			
	final public function display ($bypass = NULL)
	{
		if (isset($_GET['error'])) {
			$this->error = $_GET['error'];
			$this->errno = $_GET['errno'];
		}		
		$message = is_null($bypass)? $this->error: $bypass;
		if ($this->errno == 400 || $this->sign == '!') $color = 'DANGER'; // !bad request
		else if ($this->errno == 300 || $this->sign == '?') $color = 'WARNING'; // ?multiple choices
		else if ($this->errno == 100 || $this->sign == '@') $color = 'ATTENTION'; // @continue
		else $color = 'SUCCESS'; // OK	
		
//		var_dump($_GET['errno'],$this->errno,$color);
		
		if ($message && $color) {
			return '<div class="notice '.$color.'" id="notice">
				<i onClick="document.getElementById(\'notice\').style.display=\'none\'" title="Close">&times;</i>
				<var>'.$message.'</var>
			</div>';
		}
	}	
}



?>
