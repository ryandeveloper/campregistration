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
 * @location    /sys/core/view.php
 * @package     sys
 * @version     MyPHPFrame(tm) v 1.01
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


class View
{
    const environment = ENVIRONMENT;
   
    public static $scripts = array();
    public static $styles = array();
    public static $footerscripts = array();
    public static $footerstyles = array();
    public static $iescripts = array();
    public static $iestyles = array();
    public static $title = '';
    public static $segments = array();
    public static $bodyclass = '';

    public static function url($path=false,$echo=false)
    {
        $environment = strtolower(self::environment);
        $url = ($path) ? RDS.$path : '';
        
        if($echo) {
            echo Routes::$$environment .$url;
        } else {
            return Routes::$$environment .$url;	
        }
    }
    
    public static function image($f=false,$a=false,$c=false,$i=false,$e=true)
    {
        $file = ($f) ? self::url('assets/images/'.$f) : '';
        $alt = ($a) ? 'alt="'.$a.'"' : '';
        $cls = ($c) ? 'class="'.$c.'"' : '';
        $id = ($i) ? 'id="'.$i.'"' : '';
        
        if($e) {
            echo '<img src="'.$file.'" '.$alt.' '.$cls.' '.$id.'>';
        } else {
            return '<img src="'.$file.'" '.$alt.' '.$cls.' '.$id.'>';
        }
    }
    
    public static function photo($f=false,$a=false,$c=false,$i=false,$e=true)
    {
        $file = ($f) ? self::url('assets/'.$f) : '';
        $alt = ($a) ? 'alt="'.$a.'"' : '';
        $cls = ($c) ? 'class="'.$c.'"' : '';
        $id = ($i) ? 'id="'.$i.'"' : '';
        
        if($e) {
            echo '<img src="'.$file.'" '.$alt.' '.$cls.' '.$id.'>';
        } else {
            return '<img src="'.$file.'" '.$alt.' '.$cls.' '.$id.'>';
        }
    }
    
    public static function header($folder=false)
    {        
        $fold = ($folder) ? DS.$folder : '';
        self::fetch(APPPATH.'views'.DS.Routes::$_template.$fold.DS.'header'.DOT.Routes::$_ext[0], 'ro');
    }
    
    public static function footer($folder=false)
    {
        $fold = ($folder) ? DS.$folder : '';
        self::fetch(APPPATH.'views'.DS.Routes::$_template.$fold.DS.'footer'.DOT.Routes::$_ext[0], 'ro');
    }
    
    public static function sidebar($folder=false)
    {
        $fold = ($folder) ? DS.$folder : '';
        self::fetch(APPPATH.'views'.DS.Routes::$_template.$fold.DS.'sidebar'.DOT.Routes::$_ext[0], 'ro');
    }

    public static function template($filename = NULL, $data = array(), $inctype = 'ro')
    {
        self::fetch(APPPATH.'views'.DS.Routes::$_template.DS.$filename.DOT.Routes::$_ext[0], $inctype, $data);
    }
    
    public static function page($filename = NULL, $data = array())
    {
        self::fetch(APPPATH.'views'.DS.Routes::$_template.DS.$filename.DOT.Routes::$_ext[0], 'ro', $data);
    }
        
    public static function fetch($file = NULL, $load = 'ro', $data = array())
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
    
    public static function reset($t)
    {
        self::$$t = array();
    }
    
    public static function style($path=false)
    {
        $environment = strtolower(self::environment);
        $url = ($path) ? RDS.$path : '';
        
        echo '<link href="'.self::url(APPDIR.'/views/'.Routes::$_template.$url).'" rel="stylesheet" />';
    }
    
    public static function styles($paths=array())
    {
        $environment = strtolower(self::environment);
        if(count($paths)) {
            foreach($paths as $path) {
                $url = ($path) ? RDS.$path : '';        
                echo '<link href="'.self::url(APPDIR.'/views/'.Routes::$_template.$url).'" rel="stylesheet" />';
            }
        }
    }
    
    public static function script($path=false)
    {
        $environment = strtolower(self::environment);
        $url = ($path) ? RDS.$path : '';
        
        echo '<script src="'.self::url(APPDIR.'/views/'.Routes::$_template.$url).'" tyle="text/javascript"></script>';
    }
    
    public static function scripts($paths=array())
    {
        $environment = strtolower(self::environment);
        if(count($paths)) {
            foreach($paths as $path) {
                $url = ($path) ? RDS.$path : '';        
                echo '<script src="'.self::url(APPDIR.'/views/'.Routes::$_template.$url).'" tyle="text/javascript"></script>';
            }
        }
    }
    
    public static function headers()
    {
        if(count(self::$styles)) {
            self::styles(self::$styles);
        } else {
            self::styles( (count(Configuration::$styles) ? Configuration::$styles : array()) );
        }
        
        if(count(self::$scripts)) {
            self::scripts(self::$scripts);
        } else {
            self::styles( (count(Configuration::$scripts) ? Configuration::$scripts : array()) );
        }
    }
    
    public static function footers()
    {
        if(count(self::$footerstyles)) {
            self::styles(self::$footerstyles);
        }
        
        if(count(self::$footerscripts)) {
            self::scripts(self::$footerscripts);
        }
    }
    
    public static function redirect($path=false)
    {
        if($path) {
            $environment = strtolower(self::environment);
            $url = ($path) ? $path : '';
        
            header('location: '.self::url($url));
        } else {
            header('location: '.self::url());
        }
    }
    
    public static function common()
    {
        $common = new Common();
                
        return $common;
    }
    
    public static function userInfo()
    {
        $common = new Common();
        $userinfo = (object) $common->getSession('userdata');
        
        return $userinfo;
    }
    
    public static function getError()
    {
        $common = new Common();
        return $common->getSession('error');
    }
    
    public static function getMessage()
    {
        $common = new Common();
        $e = $common->getSession('error');
        
        if($e) {
            return '<div class="alert alert-danger fade in">'.$e.'</div>';
        } else {
            if($common->post) {
                return '<div class="alert alert-success fade in">'.$common->getSession('message').'</div>';
            }
        }
    }
    
    public static function getSalutation()
    {
        return array("Mr","Ms","Mrs","Dr","Dato","Datin","Dato Seri","Tan Sri");
    }
    
    public static function getCivilStatus()
    {
        return array("SINGLE","MARRIED","SEPARATED","DIVORCED","WIDOWED");
    }
    
    public static function getCountries()
    {
        return array("China", "Hong Kong", "Taiwan", "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    }
    
    public static function getDay()
    {
        $d = array();
        $d[] = 'Day';
        for($i=1;$i<32;$i++){
            $d[] = $i;
        }
        return $d;
    }
    
    public static function getMonth()
    {
        $months = array(
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July ',
            'August',
            'September',
            'October',
            'November',
            'December'
        );

        $m = array();
        $i = 0;
        $m[] = ':Month';
        foreach($months as $month) {
            $i++;
            $m[] = $i.':'.$month;
        }
        return $m;
    }
    
    public static function getYear()
    {
        $cy = date('Y');
        $fr = $cy - 10;
        $to = $cy - 110;
        $y = array();
        $y[] = 'Year';
        for($i = $fr;$i > $to; $i--){
            $y[] = $i;
        }
        return $y;
    }
    
    public static function getCurrentPage()
    {
        $common = new Common();
        return implode('/',$common->segment);
    }

        /**
     * Form field.
     * 
     * @since   revised from Mo's framework
     * @access  public
     */	
    public static function form($type = 'text', $args, $e = true) {
        $label = isset($args['label']) ? '<label>'.$args['label'].'</label>' : '';	
        $name = isset($args['name']) ? ' name="'.$args['name'].'"' : '';	
        $value = isset($args['value']) ? ' value="'.$args['value'].'"' : '';	
        $class = isset($args['class']) ? ' class="'.$args['class'].'"' : '';	
        $id = isset($args['id']) ? ' id="'.$args['id'].'"' : ' id="'.$args['name'].'"';	
        $placeholder = isset($args['placeholder']) ? ' placeholder="'.$args['placeholder'].'"' : '';	
        $options = isset($args['options']) ? $args['options'] : array();	
        $rel = isset($args['rel']) ? ' rel="'.$args['rel'].'"' : '';
        $multi = isset($args['multiple']) ? ' multiple="true"' : '';
        $style = isset($args['style']) ? ' style="'.$args['style'].'"' : '';
        $readonly = isset($args['readonly']) ? ' readonly' : '';
        $inarray = isset($args['inarray']) ? $args['inarray'] : false;
        $custom = isset($args['custom']) ? $args['custom'] : false;

        switch($type){	
            case 'hidden':	
                    $return = $label.'<input type="hidden"'.$name.$value.$class.$id.' '.$custom.' />';	
            break;

            case 'text':	
                    $return = $label.'<input type="text"'.$name.$value.$class.$id.$rel.$placeholder.$style.$readonly.' '.$custom.' />';	
            break;	
            case 'textarea':	
                    $return = $label.'<textarea'.$name.$class.$id.$placeholder.$style.' '.$custom.' >'.stripslashes($args['value']).'</textarea>';	
            break;	
            case 'select':	
                    $return = $label.'<select'.$name.$id.$class.$rel.$multi.$style.' '.$custom.' >';	
                    foreach($options as $option) {	
                        $val = explode(':', $option);	
                        $sel = $args['value'] == $val[0] ? 'selected="selected"' : '';					
                        if(count($val) > 1) {	
                            $return .= '<option value="'.$val[0].'" '.$sel.'>'.$val[1].'</option>';	
                        } else {	
                            $return .= '<option value="'.$val[0].'" '.$sel.'>'.$val[0].'</option>';	
                        }	
                    }	
                    $return .= '</select>';	
            break;
            case 'selecta':	
                    $return = $label.'<select'.$name.$id.$class.$rel.$multi.$style.' '.$custom.' >';	
                    $options = (array) $options;
                    foreach($options as $k => $v) {	
                        $sel = $args['value'] == $k ? 'selected="selected"' : '';
                        if($inarray) {
                            if( (count($inarray) && in_array($k,$inarray)) || count($inarray) < 1 ) {
                                $return .= '<option value="'.$k.'" '.$sel.'>'.$v.'</option>';		
                            }
                        } else {
                            $return .= '<option value="'.$k.'" '.$sel.'>'.$v.'</option>';
                        }
                    }	
                    $return .= '</select>';	
            break;
        }
        $return = $type != 'hidden' ? $return.'<div class="clearfix"></div>' : $return;
        
        if($e) {
            echo $return;
        } else {
            return $return;	
        }
    }
}