<?PHP
// ENUMERATED TYPES
abstract class jrad_enum
{
	const 
		ADMIN = array (NULL,'Default Admin','Super Admin','Web Master'),
		USER = array (NULL,'Default User','Verified User','Subscribed User','Super User','Deactivated'),
		TITLE = array (NULL,'Dr.','Esq.','Hon.','Jr.','Mr.','Mrs.','Ms.','Msgr.','Prof.','Rev.','Sr.','St.'),
		GENDER = array (NULL,'Female','Male'),
		MAR_STATUS = array(NULL,'Single','Married','Separated','Divorced','Widowed'),
		STATE = array(NULL,'Abia','Abuja','Adamawa','Akwa Ibom','Anambra','Bauchi','Bayelsa','Benue','Borno','Cross River','Delta','Ebonyi','Edo','Ekiti','Enugu','Gombe','Imo','Jigawa','Kaduna','Kano','Katsina','Kebbi','Kogi','Kwara','Lagos','Nasarawa','Niger','Ogun','Ondo','Osun','Oyo','Plateau','Rivers','Sokoto','Taraba','Yobe','Zamfara'),
		BANK = array(NULL,'Access Bank','Citi Bank','Diamond Bank (Access)','Ecobank','FCMB','Fidelity Bank','FirstBank','GTBank','Heritage Bank','Jaiz Bank','Jubilee Bank','Keystone Bank','Mainstreet Bank','Skye Bank (Polaris)','Stanbic IBTC','Standard Chartered Bank','Sterling Bank','Suntrust Bank','UBA','Union Bank','Unity Bank','WEMA Bank','Zenith Bank'),
		CHANNEL = array(NULL,'Cash Deposit','Bank Transfer','ATM/POS Payment','Mobile/Internet Banking','SMS/USSD Code'),
		ERROR = array(NULL,'ATTENTION','SUCCESS','WARNING','DANGER'),
		DAY_SHORT = array(NULL,'Sun','Mon','Tue','Wed','Thu','Fri','Sat'),		
		DAY = array(NULL,'Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'),	
		MONTH_SHORT = array(NULL,'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'),
		MONTH = array(NULL,'January','February','March','April','May','June','July','August','September','October','November','December'),
		COLOR = array(NULL,'red','pink','purple','indigo','light blue','cyan','green','light green','amber','orange','deep orange'),		
		HEXCODE = array(NULL,'#F44336','#E91E63','#9C27B0','#3F51B5','#03A9F4','#00BCD4','#4CAF50','#8BC34A','#FFC107','#FF9800','#FF5722'),
		DELIVERY_MODE = array(NULL,'Home Delivery','Pickup Station'),
		PAYMENT_MODE = array(NULL,'Pay on Delivery','Pay Online'),
		ORDER_STATUS = array(NULL,'Cancelled','Confirmed','Packaged','Enroute','Arrived','Delivered')
	;
	public static function is_key ($enums, $i)
	{
		return array_key_exists($i,$enums);
	}
	public static function is_value ($enums, $e)
	{
		$e = strtolower($e);
		$new = array_map('strtolower',$enums);
		return in_array($e,$new);
	}
	public static function translate ($enums, $e)
	{
		if (is_numeric($e))
			return $enums[$e];			
		else
		{
			$e = strtolower($e);
			$new = array_map('strtolower',$enums);			
			return array_search($e,$new);
		}
	}
	public static function option ($enums, $selected = NULL)
	{
		$buffer = '';
		foreach ($enums as $key => $value)
		{
			if (!is_null($value))
			{
				if ($selected == $key)
					$buffer .= '<option value="'.$key.'" selected>'.$value.'</option>';
				else
					$buffer .= '<option value="'.$key.'">'.$value.'</option>';
			}
		}
		return $buffer;
	}
}

?>