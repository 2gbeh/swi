<?PHP
// START SESSION
session_start();

// SUPRERSS ERROR
error_reporting(E_ALL ^ E_DEPRECATED);
set_error_handler (function(){});

// NO CACHE
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// EXTEND VAR_DUMP
ini_set('xdebug.var_display_max_children',-1);
ini_set('xdebug.var_display_max_data',-1);
ini_set('xdebug.var_display_max_depth',-1);

?>