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

    function getTotals()
    {
        $sql = "SELECT p.PPID, pi.ProductItemID, 
        (SELECT SUM(pi1.Balance) FROM participant_items pi1) as TotalUnpaidAmt, 
        (SELECT SUM(pi2.PaidAmount) FROM participant_items pi2) as TotalPaidAmount, 
        (SELECT SUM(pi3.TotalAmount) FROM participant_items pi3) as TotalAmountToPay, 
        (SELECT SUM(pi4.Excess) FROM participant_items pi4) as TotalAmountExcess, 
        (SELECT SUM(f1.Amount) FROM finances f1 WHERE f1.Type = 1) as TotalCollection,
        (SELECT SUM(f2.Amount) FROM finances f2 WHERE f2.Type = 0) as TotalWithdraw, 
        (SELECT SUM(pi5.TotalAmount) FROM participant_items pi5 LEFT JOIN participants p5 ON p5.PPID = pi5.PPID WHERE p5.StatusID = 1) as TotalAmtPackage, 
        (SELECT SUM(pi6.PaidAmount) FROM participant_items pi6 LEFT JOIN participants p6 ON p6.PPID = pi6.PPID WHERE p6.StatusID = 1) as TotalPackagePaid, 
        (SELECT SUM(pi7.Excess) FROM participant_items pi7 LEFT JOIN participants p7 ON p7.PPID = pi7.PPID WHERE p7.StatusID = 1) as TotalPackageExcess, 
        (SELECT SUM(pi8.Balance) FROM participant_items pi8 LEFT JOIN participants p8 ON p8.PPID = pi8.PPID WHERE p8.StatusID = 1) as TotalPackageBal, 

        (SELECT SUM(pi9.TotalAmount) FROM participant_items pi9 LEFT JOIN participants p9 ON p9.PPID = pi9.PPID WHERE p9.StatusID = 2) as TotalCabAmt, 
        (SELECT SUM(pi10.PaidAmount) FROM participant_items pi10 LEFT JOIN participants p10 ON p10.PPID = pi10.PPID WHERE p10.StatusID = 2) as TotalCabPaid, 
        (SELECT SUM(pi11.Excess) FROM participant_items pi11 LEFT JOIN participants p11 ON p11.PPID = pi11.PPID WHERE p11.StatusID = 2) as TotalCabExcess, 
        (SELECT SUM(pi12.Balance) FROM participant_items pi12 LEFT JOIN participants p12 ON p12.PPID = pi12.PPID WHERE p12.StatusID = 2) as TotalCabBal, 

        (SELECT SUM(pi13.TotalAmount) FROM participant_items pi13 LEFT JOIN participants p13 ON p13.PPID = pi13.PPID WHERE p13.StatusID = 3) as TotalTentAmt, 
        (SELECT SUM(pi14.PaidAmount) FROM participant_items pi14 LEFT JOIN participants p14 ON p14.PPID = pi14.PPID WHERE p14.StatusID = 3) as TotalTentPaid, 
        (SELECT SUM(pi15.Excess) FROM participant_items pi15 LEFT JOIN participants p15 ON p15.PPID = pi15.PPID WHERE p15.StatusID = 3) as TotalTentExcess, 
        (SELECT SUM(pi16.Balance) FROM participant_items pi16 LEFT JOIN participants p16 ON p16.PPID = pi16.PPID WHERE p16.StatusID = 3) as TotalTentBal, 

        (SELECT SUM(pi17.TotalAmount) FROM participant_items pi17 LEFT JOIN participants p17 ON p17.PPID = pi17.PPID WHERE p17.StatusID = 4) as TotalWIAmt, 
        (SELECT SUM(pi18.PaidAmount) FROM participant_items pi18 LEFT JOIN participants p18 ON p18.PPID = pi18.PPID WHERE p18.StatusID = 4) as TotalWIPaid, 
        (SELECT SUM(pi19.Excess) FROM participant_items pi19 LEFT JOIN participants p19 ON p19.PPID = pi19.PPID WHERE p19.StatusID = 4) as TotalWIExcess, 
        (SELECT SUM(pi20.Balance) FROM participant_items pi20 LEFT JOIN participants p20 ON p20.PPID = pi20.PPID WHERE p20.StatusID = 4) as TotalWIBal, 

        (SELECT COUNT(p21.StatusID) FROM participants p21 WHERE p21.StatusID = 1) as HeadCountPackage, 
        (SELECT COUNT(p22.StatusID) FROM participants p22 WHERE p22.StatusID = 2) as HeadCountCab, 
        (SELECT COUNT(p23.StatusID) FROM participants p23 WHERE p23.StatusID = 3) as HeadCountTent, 

        (SELECT COUNT(pi24.TentOwned) FROM participant_items pi24 WHERE pi24.TentOwned = 1) as HeadCountTentOwn, 
        (SELECT COUNT(p25.StatusID) FROM participants p25 WHERE p25.StatusID = 4) as HeadCountWI, 
        (SELECT COUNT(p26.StatusID) FROM participants p26 WHERE p26.StatusID = 5) as HeadCountInf, 

        (SELECT COUNT(pi27.Cabin1) FROM participant_items pi27 WHERE pi27.Cabin1 > 0) as Day1CountCab, 
        (SELECT COUNT(pi28.Cabin2) FROM participant_items pi28 WHERE pi28.Cabin2 > 0) as Day2CountCab, 
        (SELECT COUNT(pi29.Cabin3) FROM participant_items pi29 WHERE pi29.Cabin3 > 0) as Day3CountCab, 

        (SELECT COUNT(pi30.Tent1) FROM participant_items pi30 WHERE pi30.Tent1 > 0 AND pi30.TentOwned = 0) as Day1CountTent, 
        (SELECT COUNT(pi31.Tent2) FROM participant_items pi31 WHERE pi31.Tent2 > 0 AND pi31.TentOwned = 0) as Day2CountTent, 
        (SELECT COUNT(pi32.Tent3) FROM participant_items pi32 WHERE pi32.Tent3 > 0 AND pi32.TentOwned = 0) as Day3CountTent, 

        (SELECT COUNT(pi33.Tent1) FROM participant_items pi33 WHERE pi33.Tent1 > 0 AND pi33.TentOwned = 1) as Day1CountTentOwn, 
        (SELECT COUNT(pi34.Tent2) FROM participant_items pi34 WHERE pi34.Tent2 > 0 AND pi34.TentOwned = 1) as Day2CountTentOwn, 
        (SELECT COUNT(pi35.Tent3) FROM participant_items pi35 WHERE pi35.Tent3 > 0 AND pi35.TentOwned = 1) as Day3CountTentOwn, 

        (SELECT COUNT(pi36.Entrance1) FROM participant_items pi36 WHERE pi36.Entrance1 > 0) as Day1CountWI, 
        (SELECT COUNT(pi37.Entrance2) FROM participant_items pi37 WHERE pi37.Entrance2 > 0) as Day2CountWI, 
        (SELECT COUNT(pi38.Entrance3) FROM participant_items pi38 WHERE pi38.Entrance3 > 0) as Day3CountWI, 

        (SELECT COUNT(m1.Meal1) FROM participant_items m1 WHERE m1.Meal1 > 0) as CountMeal1, 
        (SELECT COUNT(m2.Meal2) FROM participant_items m2 WHERE m2.Meal2 > 0) as CountMeal2, 
        (SELECT COUNT(m3.Meal3) FROM participant_items m3 WHERE m3.Meal3 > 0) as CountMeal3, 
        (SELECT COUNT(m4.Meal4) FROM participant_items m4 WHERE m4.Meal4 > 0) as CountMeal4, 
        (SELECT COUNT(m5.Meal5) FROM participant_items m5 WHERE m5.Meal5 > 0) as CountMeal5, 
        (SELECT COUNT(m6.Meal6) FROM participant_items m6 WHERE m6.Meal6 > 0) as CountMeal6, 
        (SELECT COUNT(m7.Meal7) FROM participant_items m7 WHERE m7.Meal7 > 0) as CountMeal7, 
        (SELECT COUNT(m8.Meal8) FROM participant_items m8 WHERE m8.Meal8 > 0) as CountMeal8, 
        (SELECT COUNT(m9.Meal9) FROM participant_items m9 WHERE m9.Meal9 > 0) as CountMeal9, 
        (SELECT COUNT(*) FROM participants p9) as TotalAllCount
        FROM participants p LEFT JOIN participant_items pi ON p.PPID = pi.PPID";

        $data = $this->db->get_row($sql);

        return $data;
    }

    function getChurchTotalCounts()
    {
        $sql = "SELECT c.ChurchID, c.Name, 
        (SELECT COUNT(c1.ChurchID) FROM participants c1 WHERE c1.ChurchID = c.ChurchID) as ChurchCount, 
        (SELECT COUNT(c2.ChurchID) FROM participants c2 WHERE c2.ChurchID = c.ChurchID AND c2.StatusID = 1) as ChurchPackCount, 
        (SELECT COUNT(c3.ChurchID) FROM participants c3 WHERE c3.ChurchID = c.ChurchID AND c3.StatusID = 2) as ChurchCabCount, 
        (SELECT COUNT(c4.ChurchID) FROM participants c4 WHERE c4.ChurchID = c.ChurchID AND c4.StatusID = 3) as ChurchTentCount, 
        (SELECT COUNT(c5.ChurchID) FROM participants c5 WHERE c5.ChurchID = c.ChurchID AND c5.StatusID = 4) as ChurchWICount, 
        (SELECT COUNT(c6.ChurchID) FROM participants c6 WHERE c6.ChurchID = c.ChurchID AND c6.StatusID = 5) as ChurchInfCount, 
        (SELECT SUM(ci7.TotalAmount) FROM participant_items ci7 LEFT JOIN participants c7 ON c7.PPID = ci7.PPID WHERE c7.ChurchID = c.ChurchID) as ChurchTotalDue, 
        (SELECT SUM(ci8.PaidAmount) FROM participant_items ci8 LEFT JOIN participants c8 ON c8.PPID = ci8.PPID WHERE c8.ChurchID = c.ChurchID) as ChurchTotalPaid, 
        (SELECT SUM(ci9.Balance) FROM participant_items ci9 LEFT JOIN participants c9 ON c9.PPID = ci9.PPID WHERE c9.ChurchID = c.ChurchID) as ChurchTotalBal 
        FROM churches c";

        $query = &$this->db->prepare($sql);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_CLASS)){
            $data[] = $row;
        }
        unset($query);

        return $data;
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
    
    public function indexAssets()
    {
        View::$footerscripts[] = "assets/js/xenon-widgets.js";
        View::$footerscripts[] = "assets/js/TweenMax.min.js";
        View::$footerscripts[] = "assets/js/resizeable.js";
        View::$footerscripts[] = "assets/js/joinable.js";

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

        // Custom CSS
        View::$styles[] = "assets/css/custom.css";
        View::$styles[] = "vendor/datatables/dataTables.bootstrap.css";
        View::$styles[] = "vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css";
        View::$styles[] = "vendor/yadcf-master/jquery.dataTables.yadcf.css";
        View::$styles[] = 'assets/css/fileinput.css';
     
    }
}