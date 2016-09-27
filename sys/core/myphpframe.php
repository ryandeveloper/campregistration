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
 * @location      /sys/core/MyPHPFrame.php
 * @package       sys
 * @version	  MyPHPFrame(tm) v 1.01
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// Start php session
session_start();

/**
 *  Define version
 */
define('APPVERSION', '0.01');

/**
 *  Define constants for directories
 */
define('APPDIR',  'app');
define('SYSDIR',  'sys');
define('CONFDIR', 'conf');
define('DS', DIRECTORY_SEPARATOR);
define('RDS', '/');
define('DOT', '.');
define('APPPATH',  ROOTDIR . DS . APPDIR . DS);
define('SYSPATH',  ROOTDIR . DS . SYSDIR . DS);
define('CONFPATH', ROOTDIR . DS . CONFDIR . DS);
define('HASHPHRASE','4e52820c817c12ece280ffe0f0b395bb');
define('SESSIONCODE','m015e520c654c12ece321ffe0f0b395cc');


/**
 *  Include database class
 */
require_once SYSPATH.'database/db.php';	

/**
 *  Include common class
 */
require_once SYSPATH.'core/common.php';

/**
 *  Include configuration class
 */
require_once CONFPATH.'configuration.php';

/**
 *  Include error mapper class
 */
require_once SYSPATH.'mappers/maperrorcodes.php';	

/**
 *  Include loader
 */
require_once SYSPATH.'core/loader.php';	

/**
 *  Include controller
 */
require_once SYSPATH.'core/controller.php';

/**
 *  Include model
 */
require_once SYSPATH.'core/model.php';

/**
 *  Include view
 */
require_once SYSPATH.'core/view.php';	

if(!class_exists('MyPHPFrame'))
{
    class MyPHPFrame extends Common
    {
        public $is_connected;
        public $is_reporting;

        function __construct()	
        {
            // Inherit parent construct
            parent::__construct();

            // @return 	true if success or null
            $this->is_reporting = Configuration::initialize()->errorReporting();
            $this->pageRouter();	
        }
    }
}       

/**
 * Load MyPHPFrame environment
 */
MyPHPFrame::initialize();