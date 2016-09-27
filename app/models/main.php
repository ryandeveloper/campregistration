<?php
class Main_model extends Model
{
    public function __construct()
    {
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

    
    function getUserByID($ID)
    {
        $where = '';
        if($ID) {
            $where = " u.UserID = $ID AND ";
        }
        $sql = "SELECT u.UserID, um.FirstName, um.LastName, ul.Name as LevelName FROM users u LEFT JOIN user_meta um ON um.UserID = u.UserID LEFT JOIN userlevels ul ON u.Level = ul.UserLevelID WHERE $where u.Level IN(3,4) LIMIT 1";

        $query = &$this->db->prepare($sql);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_CLASS);
        unset($query);
        
        return json_encode($row);
    }
    
    function getUsersCount($where)
    {
        $value = "";
        if(!empty($where)) {
            $value = "WHERE $where";
        }
        $sql = "SELECT * FROM users $value";

        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[] = $row;         
        }
        unset($query);
        
        return $data;
    }
    
    function getAccounts()
    {
        $sql = "SELECT c.CaseFileID, u.UserID, a.AccountType, a.AccountStatus, a.CompanyName, um.FirstName, um.LastName, um.Phone, um.Address, um.Country FROM casefiles c LEFT JOIN users u ON u.UserID = c.UserID LEFT JOIN user_meta um ON u.UserID = um.UserID LEFT JOIN accounts a ON a.UserID = u.UserID LEFT JOIN bankaccounts b ON b.UserID = u.UserID WHERE u.Level = 5";
        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[] = $row;         
        }
        unset($query);
        
        return $data;
        
    } 
    
    function getCasePending()
    {
        $sql = "SELECT c.CaseFileID, u.UserID, a.AccountType, a.AccountStatus, a.CompanyName, um.FirstName, um.LastName, um.Phone, um.Address, um.Country FROM casefiles c LEFT JOIN users u ON u.UserID = c.UserID LEFT JOIN user_meta um ON u.UserID = um.UserID LEFT JOIN accounts a ON a.UserID = u.UserID LEFT JOIN bankaccounts b ON b.UserID = u.UserID WHERE AccountStatus = 'Pending'";
        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[] = $row;         
        }
        unset($query);
        
        return $data;
        
    } 
    
    function getCaseApproved()
    {
        $sql = "SELECT c.CaseFileID, u.UserID, a.AccountType, a.AccountStatus, a.CompanyName, um.FirstName, um.LastName, um.Phone, um.Address, um.Country FROM casefiles c LEFT JOIN users u ON u.UserID = c.UserID LEFT JOIN user_meta um ON u.UserID = um.UserID LEFT JOIN accounts a ON a.UserID = u.UserID LEFT JOIN bankaccounts b ON b.UserID = u.UserID WHERE AccountStatus = 'Approved'";
        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[] = $row;         
        }
        unset($query);
        
        return $data;
        
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
    
    function getSettings()
    {
        $sql = "SELECT * FROM settings";       
        $settingsData = $this->db->get_row($sql);
        
        return $settingsData;
    } 
    
    function updateSettings()
    {
        if($this->post) { 
            if(isset($this->post['action'])) {
                switch($this->post['action']) {
                    case "updatesettings": {
                        
                        $data = $this->post;
                        $this->setSession('error', false);
                        $this->setSession('message',"Settings has been updated!");
                        
                        $settings = $this->post['settings'];  
                        
                        $settings['Redirects'] = $this->arrayToString($settings['Redirects']);
                        $uwhere = array('SettingsID' => '1');
                        $settingsID = $this->db->update("settings", $settings, $uwhere); 

                        if($this->file['Favicon']['name'] != '') {
                            $filedata = $this->fileUpload($this->file,$uwhere);

                            if(count($filedata)) {
                                $rowCount = $this->db->update("settings", $filedata, $uwhere);
                            }
                        } elseif($this->file['Logo']['name'] != '') {
                            $filedata = $this->fileUpload($this->file,$uwhere);

                            if(count($filedata)) {
                                $rowCount = $this->db->update("settings", $filedata, $uwhere);
                            }
                        }

                    }
                } 
            }
            return (object) $this->post;
        } else {
            $this->setSession('error', false);
        }
        
    }

    public function indexAssets()
    {
        
        View::$footerscripts[] = "assets/js/xenon-widgets.js";
        View::$footerscripts[] = "assets/js/TweenMax.min.js";
        View::$footerscripts[] = "assets/js/resizeable.js";
        View::$footerscripts[] = "assets/js/joinable.js";

        // Imported scripts on this page // REFER ON VENDORS SCRIPTS
        View::$footerscripts[] = "vendor/jvectormap/jquery-jvectormap-1.2.2.min.js";
        View::$footerscripts[] = "vendor/jvectormap/regions/jquery-jvectormap-world-mill-en.js";
        //View::$footerscripts[] = "vendor/inputmask/jquery.inputmask.bundle.js";

        // Custom JS
        View::$footerscripts[] = 'assets/js/custom.js';

        // Custom CSS
        View::$styles[] = "assets/css/custom.css";
    }
}