<?php
/**
 * PHP 4, 5
 *
 * MyPHPFrame(Beta) : Rapid Development Framework (http://cutearts.org)
 * Copyright (c) MyPHPFrame Solutions (http://cutearts.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @location      /index.php
 * @package       app
 * @version		  MyPHPFrame(tm) v 1.01
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 *  App Environment
 *  @required     true
 *  @values       development, staging, production.
 *  @To-Do        set this somewhere.
 */
define('ENVIRONMENT', 'development');

/**
 *  Get root directory, must be defined here
 */
define('ROOTDIR', dirname(__FILE__));

/**
 * Include core library
 */
require_once 'sys/core/myphpframe.php';