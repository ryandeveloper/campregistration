<?php
class Products_model extends Model
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


    function getProduct($ID)
    {
        $sql = "SELECT * FROM products WHERE ProductID = ".$ID." LIMIT 1";
        $userdata = $this->db->get_row($sql);

        return $userdata;
    }

    function getProducts($inactive = '')
    {
        $sql = "SELECT * FROM products";

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
                    case "updateproduct": {
                        $prid = $this->post['prid'];
                        $data = $this->post;
                        unset($data['action']);
                        unset($data['prid']);

                        $this->setSession('error', false);
                        $this->setSession('message',"Product has been updated!");

                        $productID = $this->db->update("products", $data, array('ProductID' => $prid));

                    } break;
                    case "addproduct": {

                        $data = $this->post;
                        unset($data['action']);

                        $productID = $this->db->insert("products", $data);

                        if($productID) {
                            $this->setSession('error', false);
                            $this->setSession('message',"New Product has been added!");
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
        $where = array('ProductID' => $ID);
        $this->setSession('message',"Product has been deleted!");
        $rowCount = $this->db->delete("products", $where);
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