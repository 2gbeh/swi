<?PHP
$ctx = new jrad_page_context();
$ctx->def(
	null,
	'index.php'
);
$ctx->def(
	'About Us',
	'about.php'
);
$ctx->def(
	'Our Events',
	'event.php'
);
$ctx->def(
	'Contact Us',
	'contact.php'
);
$ctx->def(
	'Become a Member',
	'register.php'
);
$ctx->def(
	'Admin Login',
	'login.php'
);
$ctx->def(
	'Donate to SWI',
	'donate.php'
);

//$ctx->map();
extract($ctx->get());
?>



