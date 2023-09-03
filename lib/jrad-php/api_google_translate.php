<?PHP
class jrad_api_google_translate
{
	// ADD THIS <div id="google_translate_element" style="float:right;"></div>
	const CDN = '<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>';
	function __construct ($layout = 'inside', $isset = true) 
	{
		if ($isset == true)
		{
			if ($layout == 'right')
				$function = $this->right();
			else if ($layout == 'bottom')
				$function = $this->bottom();
			else
				$function = $this->inside();
			echo $function.self::CDN;
		}
	}
	
	final private function inside() 
	{
		return '<script type="text/javascript">
			function googleTranslateElementInit() 
			{
				new google.translate.TranslateElement ({
						pageLanguage: "en", 
						layout: google.translate.TranslateElement.InlineLayout.SIMPLE
					}, "google_translate_element"
				);
			}
		</script>';
	}
		
	final private function right() 
	{
		return '<script type="text/javascript">
			function googleTranslateElementInit() 
			{
				new google.translate.TranslateElement ({
						pageLanguage: "en", 
						layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
					}, "google_translate_element"
				);
			}
		</script>';
	}
	
	final private function bottom() 
	{
		return '<script type="text/javascript">
			function googleTranslateElementInit() 
			{
				new google.translate.TranslateElement ({
						pageLanguage: "en"
					}, "google_translate_element"
				);
			}
		</script>';
	}	
}



