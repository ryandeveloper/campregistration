<?php
class Users_model extends Model
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
    
    function doLogin()
    {
        if(isset($this->post['action']) && $this->post['action'] == 'login') {
            $sql = "SELECT u.*, um.*, ul.Name FROM users u LEFT JOIN user_meta um ON um.UserID = u.UserID LEFT JOIN userlevels ul ON ul.UserLevelID = u.Level  WHERE u.UserID = '".$this->post['usr']."' LIMIT 1";
            $userdata = $this->db->get_row($sql);
            
            if($userdata) {
                if($this->decrypt($userdata->Password) == $this->post['pwd']) {
                    //unset($_SESSION[SESSIONCODE]);
                    $udata = (array) $userdata;
                    $this->setSession('loggedin', true);
                    $this->setSession('userdata', $udata);
                    $this->setSession('error', false);
                    $this->setSession('message', 'Login sucessful!');
                    View::redirect();                    
                } else {
                    $this->setSession('error', 'Invalid password!');
                }
            } else {
                $this->setSession('error', 'User ID doesn\'t exists!');
            }
        }
    }   
    
    function updateUserInfo()
    {
        $userinfo = View::userInfo();
        $sql = "SELECT * FROM users u LEFT JOIN user_meta um ON um.UserID = u.UserID WHERE u.UserID = '".$userinfo->UserID."' LIMIT 1";
        $userdata = $this->db->get_row($sql);
        $udata = (array) $userdata;
        $this->setSession('userdata', $udata);
    } 
    
    function getUser($ID)
    {
        $sql = "SELECT u.*,um.*,ul.Name FROM users u LEFT JOIN user_meta um ON um.UserID = u.UserID LEFT JOIN userlevels ul ON u.Level = ul.UserLevelID WHERE u.UserID = ".$ID." LIMIT 1";
        $userdata = $this->db->get_row($sql);
        
        return $userdata;
    } 
    
    function getUsers($inactive = '')
    {
        
        $sql = "SELECT u.*,um.*,ul.Name FROM users u LEFT JOIN user_meta um ON um.UserID = u.UserID LEFT JOIN userlevels ul ON u.Level = ul.UserLevelID";
        $where = " WHERE u.Active = 1";
        if($inactive == 'yes') {
            $where = " WHERE u.Active != 1";
        } 
        $sql .= $where;
        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[] = $row;         
        }
        unset($query);
        
        return $data;
    } 
    
    function getTrashedUsers()
    {
        return $this->getUsers('yes');
    }
    
    function getUserLevels()
    {
        $sql = "SELECT UserLevelID,Name FROM userlevels";
        $query = &$this->db->prepare($sql);
        $query->execute();
        
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[$row->UserLevelID] = $row->Name;          
        }
        unset($query);
        
        return $data;
    }
    
    function doSave()
    {
        if($this->post) { 
            if(isset($this->post['action'])) {
                switch($this->post['action']) {
                    case "updateuser": {
                        
                        $this->setSession('error', false);
                        $this->setSession('message',"User has been updated!");                            
                            
                        $data = $this->post;                    
                        $uwhere = array('UserID' => $this->post['userid']);
                        $mwhere = array('UserMetaID' => $this->post['metaid']);
                   
                        $user = $this->post['user'];
                        $meta = $this->post['meta'];
                        
                        unset($data['action']);
                                                
                        if(isset($this->post['Password']) && $this->post['Password'] != '') {
                            $pass = $this->encrypt($this->post['Password']);
                            $user['Password'] = $pass;
                        }

                        $userID = $this->db->update("users", $user, $uwhere);
                        $metaID = $this->db->update("user_meta", $meta, $mwhere);
                        
                        if($this->file['Avatar']['name'] != '') {                        
                            $filedata = $this->fileUpload($this->file,$this->post['userid']);
                            if(count($filedata)) {
                                $this->removeUploadedFiles($this->post['avatarid']);
                                $rowCount = $this->db->update("user_meta", $filedata, $mwhere);
                            }
                        }
                        
                        $this->updateUserInfo();
                        
                    } break;
                    case "adduser": {
                        
                        $data = $this->post;                    
                        $user = $this->post['user'];
                        $meta = $this->post['meta'];
                        
                        unset($data['action']);
                        
                        $user['Password'] = $this->generatePw(10);
                        $user['Active'] = 1;
                        $user['HashKey'] = md5(microtime());
                        $user['DateAdded'] = date('Y-m-d H:i:s');

                        $userID = $this->db->insert("users", $user);
                        
                        if($userID) {
                            $this->setSession('error', false);
                            $this->setSession('message',"New user has been added!");
                        
                            $where = array('UserID' => $userID);
                            
                            // TO DO: send email
                            //$filedata = $this->sendEmail($userID);
                            $meta['UserID'] = $userID;
                            $metaID = $this->db->insert("user_meta", $meta);
                            
                            if($this->file['Avatar']['name'] != '') {
                                $filedata = $this->fileUpload($this->file,$userID);

                                if(count($filedata)) {
                                    $rowCount = $this->db->update("user_meta", $filedata, $where);
                                }
                            }
                        }
                        
                        View::redirect('users');
                    } break;
                    case "savepassword" : {
                        $sql = "SELECT * FROM users WHERE UserID = '".$this->post['userid']."' LIMIT 1";
                        $userdata = $this->db->get_row($sql);

                        if($userdata) {
                            if($this->decrypt($userdata->Password) == $this->post['OldPassword']) {
                                $where = array('UserID' => $this->post['userid']);
                                $data = array('Password' => $this->encrypt($this->post['NewPasswordConfirm']));
                                $this->db->update("users", $data, $where);                            
                                $this->setSession('error', false);
                                $this->setSession('message', 'Login sucessful!');                   
                            } else {
                                $this->setSession('error', 'Invalid password!');
                            }
                        }
                    } break;
                } 
            }
            return (object) $this->post;
        } else {
            $this->setSession('error', false);
        }
    }   
    
    function doTrash($UserID)
    {
        $where = array('UserID' => $UserID);
        $data = array('Active' => 0);
        $rowCount = $this->db->update("users",$data, $where);
    }
    
    function doRestore($UserID)
    {
        $where = array('UserID' => $UserID);
        $data = array('Active' => 1);
        $rowCount = $this->db->update("users",$data, $where);
    }
    
    function doDelete($UserID)
    {
        $where = array('UserID' => $UserID);
        $rowCount = $this->db->delete("users", $where);
    }
    
    function doEmptyTrash($UserID)
    {
        $where = array('Active' => 0);
        $rowCount = $this->db->delete("users", $where);
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