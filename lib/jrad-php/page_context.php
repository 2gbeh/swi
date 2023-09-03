<?PHP
class jrad_page_context
{
	private static $context = array();
	function __construct () 
	{
		$this->page = basename($_SERVER['PHP_SELF']);
	}		
	public function map ()
	{
		var_dump(self::$context);	
	}
	public final function def ($title, $filename, $action = NULL, $restrict = NULL, $viewport = NULL)
	{	
		$arr = array();
		$arr['page_title'] = $title;		
		$arr['page_file'] = $filename;
		$arr['page_name'] = str_replace('.php','',$filename);
		$arr['page_action'] = is_null($action)? 'action_'.$filename: $action;
		$arr['page_restrict'] = $restrict;			
		$arr['page_viewport'] = $viewport;
		self::$context[$filename] = $arr;
	}
	public final function get ($filename = NULL)
	{
		$key = is_null($filename)? $this->page: $filename;
		return self::$context[$key];
	}
	public final function set_title ($args) {self::$context[$this->page]['page_title'] = $args;}
	public final function set_filename ($args) {self::$context[$this->page]['page_file'] = $args;}
	public final function set_name ($args) {self::$context[$this->page]['page_name'] = $args;}	
	public final function set_action ($args) {self::$context[$this->page]['page_action'] = $args;}
	public final function set_restrict ($args) {self::$context[$this->page]['page_restrict'] = $args;}
	public final function set_viewport ($args) {self::$context[$this->page]['page_viewport'] = $args;}			
}



