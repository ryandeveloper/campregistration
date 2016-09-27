<?php
class Role_model extends Model
{
    function __construct() {
        parent::__construct();
        
        View::$footerscripts = array(
            'assets/js/jquery-3.1.0.min.js',
            'assets/js/bootstrap.min.js',
            'assets/js/xenon-api.js',
            'assets/js/xenon-toggles.js',
            'assets/js/xenon-custom.js'
            );  

        View::$styles = array(
            'http://fonts.googleapis.com/css?family=Arimo:400,700,400italic',
            'assets/css/fonts/linecons/css/linecons.css',
            'assets/css/fonts/fontawesome/css/font-awesome.min.css',
            'assets/css/bootstrap.css',
            'assets/css/xenon-core.css',
            'assets/css/xenon-forms.css',
            'assets/css/xenon-components.css',
            'assets/css/xenon-skins.css');

        View::$segments = $this->segment;
    }
    
    function getLevel($ID)
    {
        $sql = "SELECT * FROM userlevels WHERE UserLevelID = ".$ID." LIMIT 1";
        $userdata = $this->db->get_row($sql);
        
        return $userdata;
    } 
    
    function getLevels()
    {
        $sql = "SELECT * FROM userlevels";
        $query = &$this->db->prepare($sql);
        $query->execute();
        
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[] = $row;			
        }
        unset($query);
        
        return $data;
    } 
    
    function doSave()
    {
        if($this->post) { 
            if(isset($this->post['action'])) {
                switch($this->post['action']) {
                    case "updaterole": {
                        $data = $this->post;                    
                        $where = array('UserLevelID' => $this->post['roleid']);

                        unset($data['action']);
                        unset($data['roleid']);

                        $rowCount = $this->db->update("userlevels", $data, $where);

                        $this->setSession('error', false);
                        $this->setSession('message',"User role data has been saved.");

                    } break;
                    case "addrole": {
                        $data = $this->post;                    
                        
                        unset($data['action']);
                        
                        $levelID = $this->db->insert("userlevels", $data);
                        
                        if($levelID) {
                            $this->setSession('error', false);
                            $this->setSession('message',"New user role has been added!");
                        }
                        
                        View::redirect('role');
                    } break;
                } 
            }
            return (object) $this->post;
        } else {
            $this->setSession('error', false);
        }
    }   
    
    function doDelete($UserLevelID)
    {
        $where = array('UserLevelID' => $UserLevelID);
        $rowCount = $this->db->delete("userlevels", $where);
    }
    
    public function indexAssets()
    {
        
        View::$footerscripts[] = "assets/js/xenon-widgets.js";
        View::$footerscripts[] = "assets/js/TweenMax.min.js";
        View::$footerscripts[] = "assets/js/resizeable.js";
        View::$footerscripts[] = "assets/js/joinable.js";
        View::$footerscripts[] = "assets/js/fileinput.js";

        // Imported scripts on this page // REFER ON VENDORS SCRIPTS
        View::$footerscripts[] = "vendor/inputmask/jquery.inputmask.bundle.js";
        View::$footerscripts[] = "vendor/jquery-validate/jquery.validate.min.js";
        View::$footerscripts[] = "vendor/toastr/toastr.min.js";
        
        // Data Tables
        View::$footerscripts[] = "vendor/datatables/js/jquery.dataTables.min.js";
        View::$footerscripts[] = "vendor/datatables/dataTables.bootstrap.js";
        View::$footerscripts[] = "vendor/datatables/yadcf/jquery.dataTables.yadcf.js";
        View::$footerscripts[] = "vendor/datatables/tabletools/dataTables.tableTools.min.js";

        // Custom JS
        View::$footerscripts[] = 'assets/js/custom.js';
        View::$footerscripts[] = 'assets/js/table.js';

        // Styles
        View::$styles[] = "assets/css/custom.css";
        View::$styles[] = "vendor/datatables/dataTables.bootstrap.css";
        View::$styles[] = 'assets/css/fileinput.css';
    }
    
    function doLogout()
    {
        unset($_SESSION[SESSIONCODE]);
        View::redirect('users/login');
    }   
}