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
 * @location      conf/routes.php
 * @package       configuration
 * @version       MyPHPFrame(tm) v 1.01
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 
class Routes
{	
    // Absolute Path without trailing slash
    static $production      = 'http://portal.campregistration.com';
    static $staging         = 'http://staging.campregistration.com';
    static $development     = 'http://campregistration.loc';
    
    // Default controller
    static $_controller     = 'main';
    static $_404            = '404';

    // Front-end template (Views)
    static $_template       = 'default';

    // Allowed controllers other than default, this is for security purposes
    // @To-Do   Put this in the database table
    // @Goal    Future CMS | Unused
    static $_controllers    = array('main', 'user');

    // File extensions
    static $_ext            = array('php'); 
}