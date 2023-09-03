<?php 
	require_once 'lib/jrad-php/@jrad_php.php';
	require_once 'src/_config_page.php';	
	require_once 'src/_config_app.php';
	include_once 'src/'.$page_action;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	include_once 'inc/meta.php';
	include_once 'inc/head.php';
?>
</head>
<body class="template">
<table border="0"><tr><td>
<header>
  <div class="container">
    <table border="0">
    <tr>
			<td>
      	<a href="index.php">
        	<img src="img/logo.png" title="Homepage" class="logo" alt="SWI" />
        </a>
     	</td>
			<td align="right">
      	<ul class="menu">
	        <li><a href="index.php">Home</a></li>
	        <li><a href="about.php">About SWI</a></li>
	        <li><a href="event.php">Our Events</a></li>
	        <li><a href="contact.php">Contact Us</a></li>
	        <li>|</li>
	        <li>
          	<a href="donate.php">
            	<i class="fa fa-hands-helping"></i>
            	&nbsp; Donate NOW
            </a>
          </li>
	        <li>
          	<a href="register.php">
            	<i class="fa fa-user-alt"></i>
            	&nbsp; Join SWI
            </a>
          </li>
        </ul>
      </td>
    </tr>
    </table>
  </div> 
</header>

<div id="google_translate_element" style="float:right;"></div>   
