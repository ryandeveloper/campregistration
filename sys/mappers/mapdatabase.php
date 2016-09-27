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
 * @location      /sys/mappers/mapdatabase.php
 * @package       mapper
 * @version		  MyPHPFrame(tm) v 1.01
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 
class MapDatabase extends Common
{
	private $databaseInfo;
	private $driver;
	private $host;
	private $user;
	private $pass;	
	private $database;	
	private $prefix;	
	private $encoding;
	
	function __construct()		
	{
		$environment 		= strtolower(ENVIRONMENT);
		$this->databaseInfo = Database::$$environment;	
		
		$this->driver 		= $this->databaseInfo['driver'];
		$this->host 		= $this->databaseInfo['host'];
		$this->user 		= $this->databaseInfo['user'];
		$this->pass 		= $this->databaseInfo['pass'];
		$this->database		= $this->databaseInfo['database'];	
		$this->prefix 		= $this->databaseInfo['prefix'];	
		$this->encoding		= $this->databaseInfo['encoding'];
	}
	
	function load()
	{	
		$driver = $this->driver;
		
		// Get the database driver
		require_once SYSPATH.'database/'.$driver.'/'.$driver.'.php';	
		
		// Initialized database connect
		$dbInit = new $driver($this->databaseInfo);
		if($dbInit->connect())
		{
			if($dbInit->selectdb())
			{	
				return true;
			}
			else
			{
				throw new Exception(MapError::initialize()->get('EDB002'));
			}
		}
		else
		{
			throw new Exception(MapError::initialize()->get('EDB001'));	
		}
	}
}