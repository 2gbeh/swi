<?PHP
// CONSTANTS
define('APPNAME', 	'Social Welfare Initiative');
define('ALIAS', 		'SWI');
define('CATEGORY', 	'NGO Website');
define('CAPTION', 	'Social welfare for the less privileged');
define('COMPANY', 	'Social Welfare Initiative');
define('SUMMARY', 	'Providing education and better living to the less privileged children in our local districts.');
define('KEYWORDS', 	'swi, swi.org, social welfare initiative, ngo in benin, charity in benin, ngo in edo state, charity in edo state');
define('COPYRIGHT',	'Copyright &copy; 2020 '.COMPANY);
define('THEME_PRI',	'#590660');
define('THEME_SEC',	'#9E9C2B');
define('THEME_ALT', '#03B664');
define('INDEX', 		'index.php');
define('INTRO', 		'Welcome to Social Welfare Initiative (SWI)');
define('ACTION', 		'action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="post" autocomplete="off" enctype="multipart/form-data"');

// DATABASE
define('DATABASE',	'socialwe_db');	
if ($_SERVER['SERVER_NAME'] == 'localhost')
{
	define('USERNAME',	'root');
	define('PASSWORD',	'');
}
else
{
	define('USERNAME',	'socialwe_root');
	define('PASSWORD', 	'_Strongp@ssw0rd');
}

// ISP
define('DOMAIN', 		'socialwelfareinitiative.com');
define('SERVER', 		'socialwe');
define('WEBMAIL_1',	'info@socialwelfareinitiative.com');
define('WEBMAIL_2',	'support@socialwelfareinitiative.com');
define('WEBMAIL_3',	'admin@socialwelfareinitiative.com');
define('PHONE_1',		'+234(0) 81-4294-4738');
define('PHONE_2',		'+234(0) 70-1651-4301');
define('PHONE_3',		'+234(0) 80-6392-3993');
define('ADDRESS',		'Anabul Estate, Afowah Uzairue, <br/>Auchi, Edo State.');
define('CREATED',		'2020-10-14');
define('EXPIRES',		'2021-10-13');
define('REVISED',		'2020-10-20');

// META TAGS
$m = array();
$m['author'] =					'HWP Labs';
$m['classification'] = 	CATEGORY;
$m['copyright'] = 			date('Y');
$m['coverage'] = 				'Nigeria';
$m['description'] = 		SUMMARY;
$m['designer'] = 				'Tugbeh, E.O.';
$m['keywords'] = 				KEYWORDS;
$m['language'] = 				'en';
$m['owner'] = 					COMPANY;
$m['reply_to'] = 				WEBMAIL_1;
$m['revised'] = 				REVISED;
$m['robots'] = 					'index,follow';
$m['url'] = 						'http://'.DOMAIN.'/';
$m['viewport'] = 				isset($page_viewport)? '': 'width=device-width, initial-scale=1.0';
$m['title'] = 					isset($page_title)? $page_title.' - '.APPNAME: INTRO;
$META = (object)$m;

// APPSTATE
$mysql = new jrad_mysql(DATABASE,USERNAME,PASSWORD);
$activity = new jrad_activity($mysql);
$notice = new jrad_notice();

?>


