<?PHP
$base = 'uploads/';	
$gallery_idp = get_media($base.'idp/');
$gallery_orp = get_media($base.'orp/');
$gallery_old = get_media($base.'old/');
$gallery_don = get_media($base.'don/');
$gallery_fee = get_media($base.'fee/');
$gallery_cul = get_media($base.'cul/');


function get_media ($dir)
{
	if (is_dir($dir) && $dh = opendir($dir))
	{
		$buf = '';
		while (($file = readdir($dh)) !== false)
		{
			$media = $dir . $file;
			if (strpos($file,'.jpg'))
			{
				$buf .= "\r\n".'<li style=background-image:url("'.$media.'");>&nbsp;</li>';
			}
			if (strpos($file,'.mp4'))
			{
				$buf .= "\r\n".'<li> 
					<video controls>
						<source src="'.$media.'" type="video/mp4" />
						Your browser does not support the video tag.
					</video>
				</li>';		
			}
		}
	}
	closedir($dh);
	return '<ul>'.$buf.'</ul>';
}
?>  
