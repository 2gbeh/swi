<?PHP
class jrad_entity
{
	private $jrad_mysql;
	function __construct ($jrad_mysql, $table) 
	{
		$this->jrad_mysql = $jrad_mysql;
		$jrad_mysql->set_table($table);
	}
	final public function prototype()
	{
		$arr = array();
		$arr['struct'] = $this->struct();
		$arr['fields'] = $this->fields();
		$arr['size'] = $this->size();
		$arr['num_rows'] = $this->num_rows();
		$arr['rows'] = $this->rows();
		$arr['first'] = $this->first();
		$arr['last'] = $this->last();
		$arr['recent'] = $this->recent();
		$arr['last_id'] = $this->last_id();
		return (object)$arr;
	}
	final public function struct() {return $this->jrad_mysql->tb_struct();}
	final public function fields() {return $this->jrad_mysql->show_fields();}	
	final public function size() {return $this->jrad_mysql->tb_size();}
	final public function num_rows() {return $this->jrad_mysql->get_num_rows();}
	final public function rows() {return $this->jrad_mysql->select();}	
	final public function first() {return $this->jrad_mysql->get_first();}	
	final public function last() {return $this->jrad_mysql->get_last();}
	final public function recent() {return $this->jrad_mysql->sel_recent();}	
	final public function last_id() {return $this->jrad_mysql->get_last_id();}		
}

?>