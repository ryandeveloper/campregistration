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
 * @location    /sys/core/Common.php
 * @package     sys
 * @version     MyPHPFrame(tm) v 1.01
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


class Loader
{
    private $_view_dir;
    private $_controller_dir;
    private $_library_dir;
    private $_helper_dir;
    private $_ext;        
		
    function __construct()	
    {
        $this->_view_dir = APPPATH.'views'.DS.Routes::$_template.DS;
        $this->_controller_dir = APPPATH.'controllers'.DS;
        $this->_library_dir = APPPATH.'controllers'.DS;
        $this->_model_dir = APPPATH.'models'.DS;
        $this->_helper_dir = APPPATH.'helpers'.DS;
        $this->_ext = Routes::$_ext[0];
    }
	
    function controller($classname = NULL)
    {
        $this->fetcher($this->_controller_dir.$classname.DOT.$this->_ext, 'ro');

        if(class_exists($classname))
        {
            return new $classname();
        }
        else 
        {
            return false;
        }
    }

    function view($classname = NULL, $data = array())
    {
        $this->fetcher($this->_view_dir.$classname.DOT.$this->_ext, 'ro', $data);
    }	
            
    function model($modelname = NULL, $init = false, $suffix = false)
    {
        global $models;
        $modelnames = is_array($modelname) ? $modelname : array($modelname);
        foreach($modelnames as $modelname)
        {
            $modelcname = $modelname;
            if($suffix) {
                $modelcname = $modelname.'_model';
            } 
            
            if($this->fetcher($this->_model_dir.$modelname.DOT.$this->_ext, 'ro')) {   
                $models[$modelcname] = $modelcname;
            }
        }
        
        if($init) {
            $modelcname = $modelname;
            if($suffix) {
                $modelcname = $modelname.'_model';
            } 
            return $modelcname::initialize();
        }        
    }
        
    function library($libraryname = NULL)
    {
        $this->fetcher($this->_library_dir.$libraryname.DOT.$this->_ext, 'ro');
    }
        
    function fetcher($file = NULL, $load = 'ro', $data = array())
    {            
        if(file_exists($file))
        {
            extract($data);

            switch(strtolower($load))
            {
                case 'require':
                case 'r':
                {
                        require($file);
                } break;
                case 'require_once':
                case 'ro':
                {
                        require_once($file);
                } break;
                case 'include':
                case 'i':
                {
                        include($file);
                }
                case 'include_once':
                case 'io':
                {
                        include_once($file);
                }
            }

            return true;
        }
        else 
        {
            return false;
        }
    }
}