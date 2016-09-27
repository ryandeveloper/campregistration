<?php  
/**
 * PHP 4, 5
 *
 * MyPHPFrame(tm) : Rapid Development Framework (http://cutearts.org)
 * Copyright (c) CuteArts Web Solutions (http://cutearts.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @location      /sys/mappers/maperrors.php
 * @package       mapper
 * @version		  MyPHPFrame(tm) v 1.01
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 
class MapError extends Common
{
	var $codes;
	
	function __construct()		
	{
		
	}
	
	function get($code)		
	{
		$this->codes = ErrorCodes::$errorCodes;	
		return isset($this->codes[$code]) ? "ERROR $code: ".$this->codes[$code] : "";
	}
}