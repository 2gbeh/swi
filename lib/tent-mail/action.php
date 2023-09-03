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

// IMPORT LIBRARY
include_once 'model.php';
$beanMail = new BeanMail($user);
$display = $beanMail->Send();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link type="image/png" href="favicon.png"  sizes="32x32" rel="icon" />
  <title>Test Mail</title>
  <link type="text/css" href="master.css" rel="stylesheet" />
  <script type="text/javascript" src="master.js"></script>
</head>
<body class="template" onLoad="tent_foobar()">
<?php echo $display; ?>
</body>
</html>