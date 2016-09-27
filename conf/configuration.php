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
 * @location      conf/config.php
 * @package       conf
 * @version	  MyPHPFrame(tm) v 1.01
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 *  Include the necessary configuration files
 */
require_once CONFPATH.'database.php';
require_once CONFPATH.'errorcodes.php';
require_once CONFPATH.'routes.php';

class Configuration extends Common
{	
    const sitetitle = 'CAMP MEETING REGISTRATION.';
    const copyright = '&copy; 2016 All Rights Reserved. COTF. Privacy and Terms';
    
    // Set a global styles and scripts
    static $scripts = array();
    static $styles = array(
        'assets/css/bootstrap.css',
        'assets/css/xenon.css',
        'assets/css/xenon-components.css',
        'assets/css/xenon-core.css',
        'assets/css/xenon-forms.css',
        'assets/css/xenon-skins.css');
            
    static $footerscripts = array();
    static $footerstyles = array();
    
    // Encryption key
    static $hashphrase = '4e52820c817c12ece280ffe0f0b395bb';
    
    function __construct()	
    {

    }

    /**
     * Error reporting
     *
     * @access	public, static
     * @return	void
     */
    function errorReporting()
    {			
        if(defined('ENVIRONMENT'))
        {
            switch(strtolower(ENVIRONMENT))
            {
                case Database::development:
                {
                    error_reporting(E_ALL);
                } break;
                case Database::staging:
                {
                    error_reporting(1);
                } break;
                case Database::production:
                {
                    error_reporting(0);
                } break;
                default:
                {
                    die('Please set your application environtment...');
                } break;
            }

            return true;
        }
    }
}