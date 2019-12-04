<?php namespace CM;

class CacheMiala
{
		
	protected $app_url = '';

	public static function mialanyCache($path)
	{
	    if (file_exists($file = $path))
	    {
	        $mtime     = microtime(true);
	        $pathParts = pathinfo($file);

	        return self::getBaseUrl().$pathParts['dirname'] .'/'. $pathParts['filename'] . '-' . hash('md5', $mtime) . '.' . $pathParts['extension'];
	    }

	    return $path;
	}

	/**
	 * Internal method
	 */

	public static function setBaseUrl($app_url='')
	{
		(new self)->app_url = $app_url ? $app_url : $_SERVER['REQUEST_URI'];
	}

	public static function getBaseUrl()
	{
		self::setBaseUrl();
		return (new self)->app_url;
	}
}

// use CM\CacheMiala;

// function cm($path,$app_url='')
// {
// 	$base_url = $app_url ? $app_url : CacheMiala::getBaseUrl();
// 	if (file_exists($file = $path))
// 	{
// 	    $mtime     = microtime(true);
// 	    $pathParts = pathinfo($file);

// 	    return $base_url. $pathParts['dirname'] .'/'. $pathParts['filename'] . '-' . hash('md5', $mtime) . '.' . $pathParts['extension'];
// 	}

// 	return $path;
// }

