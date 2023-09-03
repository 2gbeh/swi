<?PHP
// INTERNAL
function dump ($args) {var_dump($args);}
function server () {var_dump($_SERVER);}
function filename () {return basename($_SERVER['PHP_SELF']);}
function online () {
	// website, port  (try 80 or 443)
	$connect = @fsockopen('www.fsockopen.com',80);
	if ($connect)	{return fclose($connect);}
	else return false;
}

// STRING
function toUpper ($args) {return strtoupper($args);}
function toLower ($args) {return strtolower($args);}
function toTitle ($args) {return ucwords(strtolower($args));}
function jscape ($args) {return str_replace(' ','%20',$args);}
function encrypt ($args) {return md5($args);}
function wrap ($str, $lmt = 160) {
	if (strlen($str) > $lmt) return substr($str,0,$lmt-3).'...';
	else return $str;
}

// NUMBER
function toMoney ($args) {return number_format($args);}
function toMoneyPlus ($args) {
	if (strlen($args) > 3) return number_format($args).'.00';
	else return $args;
}
function keygen ($args = 6) {
	$buff = '';
	for ($i = 0; $i < $args; $i++)
		$buff .= mt_rand(0,9);
	return $buff;
}

// DATA STRUCTURE
function toArray ($args) {return (array) $args;}
function toObject ($args) {return (object) $args;}
function toColumn ($args) {return array_map(current,$args);}

// DATE
function now () {return date('Y-m-d H:i:s');}
function format ($ts, $f = 'D, M d, Y') {return date($f,strtotime($ts));}

// TRANSLATE
function toSex ($args) {
	if ($args == 1) return 'M';
	else if ($args == 2) return 'F';
	else return $args;
}
function toGender ($args) {
	if ($args == 1) return 'Male';
	else if ($args == 2) return 'Female';
	else return $args;	
}

?>