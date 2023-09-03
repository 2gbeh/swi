<?PHP
class jrad_bean
{
	private $jrad_mysql, $table, $id;
	function __construct ($jrad_mysql, $table, $id) 
	{
		$this->jrad_mysql = $jrad_mysql;
		$this->table = $table;
		$this->id = $id;
		$jrad_mysql->set_table($table);		
	}
	final public function prototype()
	{
		$arr = array();
		$arr['row'] = $this->row();
		$arr['relation'] = $this->relation();
		return (object)$arr;
	}
	final public function row() 
	{
		return $this->jrad_mysql->get_row($this->id);
	}
	final public function relation($field = 'user_id') 
	{
		$tables =  $this->jrad_mysql->show_tables();
		$new = array();
		foreach ($tables as $table)
		{
			$row = $this->jrad_mysql->sel_where($field,$this->id,$table);
			if (is_array($row))
				$new[$table] = $row;
		}
		return $new;
	}	
}

?>