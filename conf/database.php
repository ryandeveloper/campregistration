<?php
/**
 * PHP 4, 5
 *
 * MyPHPFrame(tm) : Rapid Development Framework (http://cutearts.org)
 * Copyright (c) MyPHPFrame Solutions (http://cutearts.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @location      conf/database.php
 * @package       configuration
 * @version		  MyPHPFrame(tm) v 1.01
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 
class Database 
{
    const development 	= 'development';
    const staging       = 'staging';
    const production 	= 'production';

    static $production  = array(
        'driver' 	=> 'mysql',
        'host' 		=> 'localhost',
        'user' 		=> 'u3v8n3b4_camp',
        'pass' 		=> 'camp2016',
        'database' 	=> 'u3v8n3b4_camp',
        'prefix' 	=> '',
        'encoding' 	=> 'utf8'
    );

    static $staging  = array(
        'driver' 	=> 'mysql',
        'host' 		=> 'localhost',
        'user' 		=> 'camp_reg',
        'pass' 		=> 'cotfQWE!@#4',
        'database' 	=> 'camp_reg',
        'prefix' 	=> '',
        'encoding' 	=> 'utf8'
    );

    static $development  = array(
        'driver' 	=> 'mysql',
        'host' 		=> 'localhost',
        'user' 		=> 'root',
        'pass' 		=> '',
        'database' 	=> 'camp_reg',
        'prefix' 	=> '',
        'encoding' 	=> 'utf8'
    );
}