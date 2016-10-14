<?php
class Participants_model extends Model
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


    function getParticipant($ID)
    {
         $sql = "SELECT p.*, pi.*, cc.Name as churchName, cab.Name as cabinName, t.Name as tentName, prod.Name as productName, prod.Description as productDesciption, um.FirstName as encoderFirstName, um.LastName as encoderlastName FROM participants p 
        LEFT JOIN participant_items pi ON p.PPID = pi.PPID 
        LEFT JOIN churches cc ON p.ChurchID = cc.ChurchID 
        LEFT JOIN cabins cab ON p.CabinID = cab.CabinID 
        LEFT JOIN tents t ON p.TentID = t.TentID 
        LEFT JOIN products prod ON p.ProductID = prod.ProductID 
        LEFT JOIN users u ON p.UserID = u.UserID 
        LEFT JOIN user_meta um ON p.UserID = um.UserID 
        WHERE PPID = ".$ID." LIMIT 1";
        $userdata = $this->db->get_row($sql);

        return $userdata;
    }

    function getParticipants($inactive = '')
    {
        $sql = "SELECT p.*, pi.*, cc.Name as churchName, cab.Name as cabinName, t.Name as tentName, prod.Name as productName, prod.Description as productDesciption, um.FirstName as encoderFirstName, um.LastName as encoderlastName FROM participants p 
        LEFT JOIN participant_items pi ON p.PPID = pi.PPID 
        LEFT JOIN churches cc ON p.ChurchID = cc.ChurchID 
        LEFT JOIN cabins cab ON p.CabinID = cab.CabinID 
        LEFT JOIN tents t ON p.TentID = t.TentID 
        LEFT JOIN products prod ON p.ProductID = prod.ProductID 
        LEFT JOIN user_meta um ON p.UserID = um.UserID";
//        $where = " WHERE Active = 1";
//        if($inactive == 'yes') {
//            $where = " WHERE Active != 1";
//        }
//        $sql .= $where;

        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[] = $row;
        }
        unset($query);

        return $data;
    }

    function getChurches()
    {
        $sql = "SELECT ChurchID,Name,City FROM churches";
        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[$row->UserLevelID] = $row->Name;          
        }
        unset($query);
        
        return $data;
    }

    function getCabins()
    {
        $sql = "SELECT CabinID,Name FROM cabins";
        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[$row->UserLevelID] = $row->Name;          
        }
        unset($query);
        
        return $data;
    }

    function getTents()
    {
        $sql = "SELECT TentID,Name FROM tents";
        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[$row->UserLevelID] = $row->Name;          
        }
        unset($query);
        
        return $data;
    }

    function getProducts()
    {
        $sql = "SELECT ProductID,Name,Description FROM products";
        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
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
                    case "updateparticipant": {

                        $data = $this->post; 
                        $pid = $this->post['pid'];
                        $ptps = $this->post['ptps'];                    
                        $pitems = $this->post['pitem'];

                        unset($data['action']);
                        unset($data['pid']);

                        $this->setSession('error', false);
                        $this->setSession('message',"Participant has been updated!");

                        $participantID   = $this->db->update("participants", $data, array('PPID' => $pid));
                        $participantItem = $this->db->update("participant_items", $data, array('PPID' => $pid));

                    } break;
                    case "addparticipant": {

                        $data = $this->post; 
                        $ptps = $this->post['ptps'];                    
                        $pitems = $this->post['pitem'];
                        
                        unset($data['action']);

                        $participantID = $this->db->insert("participants", $ptps);

                        if($participantID) {
                            $this->setSession('error', false);
                            $this->setSession('message',"New participant has been added!");

                            $pitems['PPID'] = $participantID;
                            $pitemID = $this->db->insert("participant_items", $pitems);
                        }

                        //View::redirect('agency');
                    } break;
                }
            }
            return (object) $this->post;
        } else {
            $this->setSession('error', false);
        }
    }

    function doDelete($ID)
    {
        $where = array('CabinID' => $ID);
        $this->setSession('message',"Cabin has been deleted!");
        $rowCount = $this->db->delete("cabins", $where);
    }

    public function indexAssets()
    {
        // Default from asset Scripts
        View::$footerscripts[] = "assets/js/xenon-widgets.js";
        View::$footerscripts[] = "assets/js/TweenMax.min.js";
        View::$footerscripts[] = "assets/js/resizeable.js";
        View::$footerscripts[] = "assets/js/joinable.js";
        View::$footerscripts[] = "vendor/toastr/toastr.min.js";

        // Imported scripts on this page // REFER ON VENDORS SCRIPTS
        View::$footerscripts[] = "vendor/datatables/js/jquery.dataTables.min.js";
        View::$footerscripts[] = "vendor/datatables/dataTables.bootstrap.js";
        View::$footerscripts[] = "vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js";
        View::$footerscripts[] = "vendor/datatables/yadcf/jquery.dataTables.yadcf.js";
        View::$footerscripts[] = "vendor/datatables/tabletools/dataTables.tableTools.min.js";

        // Custom JS
        View::$footerscripts[] = 'assets/js/custom.js';
        View::$footerscripts[] = 'assets/js/table.js';

        // Styles
        View::$styles[] = "assets/css/custom.css";
        View::$styles[] = "vendor/datatables/dataTables.bootstrap.css";
        View::$styles[] = "vendor/datatables/yadcf/jquery.dataTables.yadcf.css";
        View::$styles[] = 'assets/css/fileinput.css';
    }
}