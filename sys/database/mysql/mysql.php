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
 * @location      /sys/database/mysql.php
 * @package       database
 * @version		  MyPHPFrame(tm) v 1.01
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class Mysql extends Common 
{
	private $databaseInfo;
	private $driver;
	private $host;
	private $user;
	private $pass;	
	private $database;	
	private $prefix;	
	private $encoding;	
	
	function __construct($info)
	{		
		$this->driver 	= $info['driver'];
		$this->host 	= $info['host'];
		$this->user 	= $info['user'];
		$this->pass 	= $info['pass'];
		$this->database	= $info['database'];	
		$this->prefix 	= $info['prefix'];	
		$this->encoding	= $info['encoding'];
		$this->connId	= 1234567890;	
	}
	
	function connect()
	{
		return @mysql_connect($this->host, $this->user, $this->pass);
	}
	
	function selectdb()
	{
		return @mysql_select_db($this->database);
	}
	
	function query($string)
	{
		return @mysql_query($string);
	}
}