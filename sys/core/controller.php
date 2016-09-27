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
 * @location      /sys/core/controller.php
 * @package       core
 * @version		  MyPHPFrame(tm) v 1.01
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class Controller extends Common
{
    static $_instance;
        
    public function __construct()
    {
        parent::__construct();

        // Get current child class
        self::$_instance = get_called_class();

        // Assign the load system to the current controller
        $this->load = $this->load();
    }

    public static function &getInstance()
    {
        return self::$_instance;
    }
}