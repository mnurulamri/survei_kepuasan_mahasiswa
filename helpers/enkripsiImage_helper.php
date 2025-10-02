<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('enkripsiImage'))
{
	function enkripsiImage($image, $mime = '')
	{
		return 'data: '.(function_exists('mime_content_type') ? mime_content_type($image) : $mime).';base64,'.base64_encode(file_get_contents($image));
	}
}