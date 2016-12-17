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

    function getTotals()
    {
        $sql = "SELECT p.*, pi.*, 
        (SELECT SUM(pi1.Balance) FROM participant_items pi1) as TotalBalance, 
        (SELECT SUM(pi2.PaidAmount) FROM participant_items pi2) as TotalPaidAmount, 
        (SELECT SUM(pi3.TotalAmount) FROM participant_items pi3) as TotalAmountToPay, 
        (SELECT COUNT(p4.StatusID) FROM participants p4 WHERE p4.StatusID = 1) as TotalPackage, 
        (SELECT COUNT(p5.StatusID) FROM participants p5 WHERE p5.StatusID = 2) as TotalCabin, 
        (SELECT COUNT(p6.StatusID) FROM participants p6 WHERE p6.StatusID = 3) as TotalTent, 
        (SELECT COUNT(p7.StatusID) FROM participants p7 WHERE p7.StatusID = 4) as TotalWalkin, 
        (SELECT COUNT(p8.StatusID) FROM participants p8 WHERE p8.StatusID = 5) as TotalInfant, 
        (SELECT COUNT(*) FROM participants p9) as TotalAllCount
        FROM participants p LEFT JOIN participant_items pi ON p.PPID = pi.PPID";

        $data = $this->db->get_row($sql);

        return $data;
    }


    function getParticipant($ID)
    {
        $sql = "SELECT p.*, pi.*, um.FirstName as encoderFirstName, um.LastName as encoderlastName FROM participants p 
        LEFT JOIN participant_items pi ON p.PPID = pi.PPID
        LEFT JOIN user_meta um ON p.UserID = um.UserID 
        WHERE p.PPID = ".$ID." LIMIT 1";
        $userdata = $this->db->get_row($sql);

        return $userdata;
    }

    function getParticipants($inactive = '')
    {
        $sql = "SELECT p.*, pi.*, cc.Name as churchName, cab.Name as cabinName, t.Name as tentName, stats.Name as statsName, stats.Notes as statsNotes, um.FirstName as encoderFirstName, um.LastName as encoderlastName FROM participants p 
        LEFT JOIN participant_items pi ON p.PPID = pi.PPID 
        LEFT JOIN churches cc ON p.ChurchID = cc.ChurchID 
        LEFT JOIN cabins cab ON p.CabinID = cab.CabinID 
        LEFT JOIN tents t ON p.TentID = t.TentID 
        LEFT JOIN statuses stats ON p.StatusID = stats.StatusID 
        LEFT JOIN user_meta um ON p.UserID = um.UserID";

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
        $sql = "SELECT ChurchID,Name,City FROM churches ORDER BY Name";
        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[] = $row;          
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
            $data[] = $row;
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
            $data[] = $row;        
        }
        unset($query);
        
        return $data;
    }

    function getStatus()
    {
        $sql = "SELECT StatusID,Name,Notes FROM statuses";
        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
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
                    case "updateparticipant": {
                        $data = $this->post; 
                        $pid = $this->post['pid'];
                        $pp = $this->post['pp'];                    
                        $ppmeta = $this->post['ppmeta'];

                        if(isset($ppmeta['Cleard']) || $data['clearpaid'] == 1){ $ppmeta['Cleard'] = 1;  }else{ $ppmeta['Cleard'] = 0; }

                        // Package
                        if($pp['StatusID'] == 1){
                            $pp['TentID'] = 0; 
                            $ppmeta['TentOwned'] = 0;
                            $ppmeta['Tent1'] = 0;
                            $ppmeta['Tent2'] = 0;
                            $ppmeta['Tent3'] = 0;
                            $ppmeta['Cabin1'] = 0;
                            $ppmeta['Cabin2'] = 0;
                            $ppmeta['Cabin3'] = 0;

                            $ppmeta['Meal1'] = 0;
                            $ppmeta['Meal2'] = 0;
                            $ppmeta['Meal3'] = 0;
                            $ppmeta['Meal4'] = 0;
                            $ppmeta['Meal5'] = 0;
                            $ppmeta['Meal6'] = 0;
                            $ppmeta['Meal7'] = 0;
                            $ppmeta['Meal8'] = 0;
                            $ppmeta['Meal9'] = 0;
                            $ppmeta['Entrance1'] = 0;
                            $ppmeta['Entrance2'] = 0;
                            $ppmeta['Entrance3'] = 0; 
                        }

                        // Cabin
                        if($pp['StatusID'] == 2){
                            $ppmeta['Package'] = 0;
                            $pp['TentID'] = 0; 
                            $ppmeta['TentOwned'] = 0;
                            $ppmeta['Tent1'] = 0;
                            $ppmeta['Tent2'] = 0;
                            $ppmeta['Tent3'] = 0;

                            if(isset($ppmeta['Entrance1'])){ $ppmeta['Entrance1'] = $ppmeta['Entrance1'];  }else{ $ppmeta['Entrance1'] = 0; }
                            if(isset($ppmeta['Entrance2'])){ $ppmeta['Entrance2'] = $ppmeta['Entrance2'];  }else{ $ppmeta['Entrance2'] = 0; }
                            if(isset($ppmeta['Entrance3'])){ $ppmeta['Entrance3'] = $ppmeta['Entrance3'];  }else{ $ppmeta['Entrance3'] = 0; }

                            if(isset($ppmeta['Cabin1'])){ $ppmeta['Cabin1'] = $ppmeta['Cabin1'];  }else{ $ppmeta['Cabin1'] = 0; }
                            if(isset($ppmeta['Cabin2'])){ $ppmeta['Cabin2'] = $ppmeta['Cabin2'];  }else{ $ppmeta['Cabin2'] = 0; }
                            if(isset($ppmeta['Cabin3'])){ $ppmeta['Cabin3'] = $ppmeta['Cabin3'];  }else{ $ppmeta['Cabin3'] = 0; }

                            if(isset($ppmeta['Meal1'])){ $ppmeta['Meal1'] = $ppmeta['Meal1'];  }else{ $ppmeta['Meal1'] = 0; }
                            if(isset($ppmeta['Meal2'])){ $ppmeta['Meal2'] = $ppmeta['Meal2'];  }else{ $ppmeta['Meal2'] = 0; }
                            if(isset($ppmeta['Meal3'])){ $ppmeta['Meal3'] = $ppmeta['Meal3'];  }else{ $ppmeta['Meal3'] = 0; }
                            if(isset($ppmeta['Meal4'])){ $ppmeta['Meal4'] = $ppmeta['Meal4'];  }else{ $ppmeta['Meal4'] = 0; }
                            if(isset($ppmeta['Meal5'])){ $ppmeta['Meal5'] = $ppmeta['Meal5'];  }else{ $ppmeta['Meal5'] = 0; }
                            if(isset($ppmeta['Meal6'])){ $ppmeta['Meal6'] = $ppmeta['Meal6'];  }else{ $ppmeta['Meal6'] = 0; }
                            if(isset($ppmeta['Meal7'])){ $ppmeta['Meal7'] = $ppmeta['Meal7'];  }else{ $ppmeta['Meal7'] = 0; }
                            if(isset($ppmeta['Meal8'])){ $ppmeta['Meal8'] = $ppmeta['Meal8'];  }else{ $ppmeta['Meal8'] = 0; }
                            if(isset($ppmeta['Meal9'])){ $ppmeta['Meal9'] = $ppmeta['Meal9'];  }else{ $ppmeta['Meal9'] = 0; }
                        }

                        // Tent
                        if($pp['StatusID'] == 3){
                            $ppmeta['Package'] = 0;
                            $pp['CabinID'] = 0;
                            $ppmeta['Cabin1'] = 0;
                            $ppmeta['Cabin2'] = 0;
                            $ppmeta['Cabin3'] = 0;

                            if(isset($ppmeta['TentOwned'])){ $ppmeta['TentOwned'] = 1; }else{ $ppmeta['TentOwned'] = 0; }

                            if(isset($ppmeta['Entrance1'])){ $ppmeta['Entrance1'] = $ppmeta['Entrance1'];  }else{ $ppmeta['Entrance1'] = 0; }
                            if(isset($ppmeta['Entrance2'])){ $ppmeta['Entrance2'] = $ppmeta['Entrance2'];  }else{ $ppmeta['Entrance2'] = 0; }
                            if(isset($ppmeta['Entrance3'])){ $ppmeta['Entrance3'] = $ppmeta['Entrance3'];  }else{ $ppmeta['Entrance3'] = 0; }

                            if(isset($ppmeta['Tent1'])){ $ppmeta['Tent1'] = $ppmeta['Tent1'];  }else{ $ppmeta['Tent1'] = 0; }
                            if(isset($ppmeta['Tent2'])){ $ppmeta['Tent2'] = $ppmeta['Tent2'];  }else{ $ppmeta['Tent2'] = 0; }
                            if(isset($ppmeta['Tent3'])){ $ppmeta['Tent3'] = $ppmeta['Tent3'];  }else{ $ppmeta['Tent3'] = 0; }

                            if(isset($ppmeta['Meal1'])){ $ppmeta['Meal1'] = $ppmeta['Meal1'];  }else{ $ppmeta['Meal1'] = 0; }
                            if(isset($ppmeta['Meal2'])){ $ppmeta['Meal2'] = $ppmeta['Meal2'];  }else{ $ppmeta['Meal2'] = 0; }
                            if(isset($ppmeta['Meal3'])){ $ppmeta['Meal3'] = $ppmeta['Meal3'];  }else{ $ppmeta['Meal3'] = 0; }
                            if(isset($ppmeta['Meal4'])){ $ppmeta['Meal4'] = $ppmeta['Meal4'];  }else{ $ppmeta['Meal4'] = 0; }
                            if(isset($ppmeta['Meal5'])){ $ppmeta['Meal5'] = $ppmeta['Meal5'];  }else{ $ppmeta['Meal5'] = 0; }
                            if(isset($ppmeta['Meal6'])){ $ppmeta['Meal6'] = $ppmeta['Meal6'];  }else{ $ppmeta['Meal6'] = 0; }
                            if(isset($ppmeta['Meal7'])){ $ppmeta['Meal7'] = $ppmeta['Meal7'];  }else{ $ppmeta['Meal7'] = 0; }
                            if(isset($ppmeta['Meal8'])){ $ppmeta['Meal8'] = $ppmeta['Meal8'];  }else{ $ppmeta['Meal8'] = 0; }
                            if(isset($ppmeta['Meal9'])){ $ppmeta['Meal9'] = $ppmeta['Meal9'];  }else{ $ppmeta['Meal9'] = 0; }
                        }

                        // Walk In 
                        if($pp['StatusID'] == 4){
                            $ppmeta['Package'] = 0;
                            $pp['TentID'] = 0; 
                            $ppmeta['TentOwned'] = 0;
                            $ppmeta['Tent1'] = 0;
                            $ppmeta['Tent2'] = 0;
                            $ppmeta['Tent3'] = 0;

                            $pp['CabinID'] = 0;
                            $ppmeta['Cabin1'] = 0;
                            $ppmeta['Cabin2'] = 0;
                            $ppmeta['Cabin3'] = 0;

                            if(isset($ppmeta['Entrance1'])){ $ppmeta['Entrance1'] = $ppmeta['Entrance1'];  }else{ $ppmeta['Entrance1'] = 0; }
                            if(isset($ppmeta['Entrance2'])){ $ppmeta['Entrance2'] = $ppmeta['Entrance2'];  }else{ $ppmeta['Entrance2'] = 0; }
                            if(isset($ppmeta['Entrance3'])){ $ppmeta['Entrance3'] = $ppmeta['Entrance3'];  }else{ $ppmeta['Entrance3'] = 0; }

                            if(isset($ppmeta['Tent1'])){ $ppmeta['Tent1'] = $ppmeta['Tent1'];  }else{ $ppmeta['Tent1'] = 0; }
                            if(isset($ppmeta['Tent2'])){ $ppmeta['Tent2'] = $ppmeta['Tent2'];  }else{ $ppmeta['Tent2'] = 0; }
                            if(isset($ppmeta['Tent3'])){ $ppmeta['Tent3'] = $ppmeta['Tent3'];  }else{ $ppmeta['Tent3'] = 0; }

                            if(isset($ppmeta['Meal1'])){ $ppmeta['Meal1'] = $ppmeta['Meal1'];  }else{ $ppmeta['Meal1'] = 0; }
                            if(isset($ppmeta['Meal2'])){ $ppmeta['Meal2'] = $ppmeta['Meal2'];  }else{ $ppmeta['Meal2'] = 0; }
                            if(isset($ppmeta['Meal3'])){ $ppmeta['Meal3'] = $ppmeta['Meal3'];  }else{ $ppmeta['Meal3'] = 0; }
                            if(isset($ppmeta['Meal4'])){ $ppmeta['Meal4'] = $ppmeta['Meal4'];  }else{ $ppmeta['Meal4'] = 0; }
                            if(isset($ppmeta['Meal5'])){ $ppmeta['Meal5'] = $ppmeta['Meal5'];  }else{ $ppmeta['Meal5'] = 0; }
                            if(isset($ppmeta['Meal6'])){ $ppmeta['Meal6'] = $ppmeta['Meal6'];  }else{ $ppmeta['Meal6'] = 0; }
                            if(isset($ppmeta['Meal7'])){ $ppmeta['Meal7'] = $ppmeta['Meal7'];  }else{ $ppmeta['Meal7'] = 0; }
                            if(isset($ppmeta['Meal8'])){ $ppmeta['Meal8'] = $ppmeta['Meal8'];  }else{ $ppmeta['Meal8'] = 0; }
                            if(isset($ppmeta['Meal9'])){ $ppmeta['Meal9'] = $ppmeta['Meal9'];  }else{ $ppmeta['Meal9'] = 0; }


                        }

                        // Infant
                        if($pp['StatusID'] == 5){
                            $ppmeta['Package'] = 0;
                            $pp['TentID'] = 0; 
                            $ppmeta['TentOwned'] = 0;
                            $ppmeta['Tent1'] = 0;
                            $ppmeta['Tent2'] = 0;
                            $ppmeta['Tent3'] = 0;

                            $pp['CabinID'] = 0;
                            $ppmeta['Cabin1'] = 0;
                            $ppmeta['Cabin2'] = 0;
                            $ppmeta['Cabin3'] = 0;

                            $ppmeta['Meal1'] = 0;
                            $ppmeta['Meal2'] = 0;
                            $ppmeta['Meal3'] = 0;
                            $ppmeta['Meal4'] = 0;
                            $ppmeta['Meal5'] = 0;
                            $ppmeta['Meal6'] = 0;
                            $ppmeta['Meal7'] = 0;
                            $ppmeta['Meal8'] = 0;
                            $ppmeta['Meal9'] = 0;
                            $ppmeta['Entrance1'] = 0;
                            $ppmeta['Entrance2'] = 0;
                            $ppmeta['Entrance3'] = 0;
                        } 

                        unset($data['action']);
                        unset($data['pid']);

                        // echo "<pre>";
                        // print_r($ppmeta);
                        // echo "</pre>";

                        $this->setSession('error', false);
                        $this->setSession('message',"Participant has been updated!");

                        $participantID   = $this->db->update("participants", $pp, array('PPID' => $pid));
                        $participantItem = $this->db->update("participant_items", $ppmeta, array('PPID' => $pid));


                    } break;
                    case "addparticipant": {

                        $data = $this->post;
                        $pp = $this->post['pp'];
                        $ppmeta = $this->post['ppmeta'];

                        if(isset($ppmeta['Cleard']) || $data['clearpaid'] == 1){ $ppmeta['Cleard'] = 1;  }else{ $ppmeta['Cleard'] = 0; }
                        
                        unset($data['action']);

                        $participantID = $this->db->insert("participants", $pp);

                        if($participantID) {
                            $this->setSession('error', false);
                            $this->setSession('message',"New participant has been added!");

                            $ppmeta['PPID'] = $participantID;
                            $pitemID = $this->db->insert("participant_items", $ppmeta);
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
        $where = array('PPID' => $ID);
        $this->setSession('message',"Participant has been deleted!");
        $rowCount = $this->db->delete("participants", $where);
        $rowCounts = $this->db->delete("participant_items", $where);
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
        View::$footerscripts[] = "vendor/datatables/tabletools/dataTables.tableTools.min.js";
        View::$footerscripts[] = "vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js";
        View::$footerscripts[] = "vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js";
        View::$footerscripts[] = "vendor/yadcf-master/jquery.dataTables.yadcf.js";
        View::$footerscripts[] = "vendor/jquery-validate/jquery.validate.min.js";

        // Custom JS
        View::$footerscripts[] = 'assets/js/custom.js';
        View::$footerscripts[] = 'assets/js/table.js';

        // Styles
        View::$styles[] = "assets/css/custom.css";
        View::$styles[] = "vendor/datatables/dataTables.bootstrap.css";
        View::$styles[] = "vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css";
        View::$styles[] = "vendor/yadcf-master/jquery.dataTables.yadcf.css";
        View::$styles[] = 'assets/css/fileinput.css';
    }
}