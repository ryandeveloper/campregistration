<?php
class Participants extends Controller 
{
    public function __construct()
    {
        parent::__construct();

        // Protected yes

        $auth = $this->load->model('auth', true);
        $this->load->model('products',false,true);
        if(!$auth->isLoggedIn() && $this->segment[0] != 'assets') {
            View::redirect('users/login');
        }
    }

    public function index()
    {
        // Table
        $this->model->indexAssets();
        if($this->model->doSave()){
            View::redirect('participants');
        };
        $totals = $this->model->getTotals();
        $participants = $this->model->getParticipants();
        $churches = $this->model->getChurches();
        $statuses = $this->model->getStatus();
        $cabins = $this->model->getCabins();
        $tents = $this->model->getTents();
        $products = $this->products_model->getProducts();
        View::page('participants/list', get_defined_vars());
    }
    
    public function add()
    {
        if($this->model->doSave()){
            View::redirect('participants');
        };
        $this->model->indexAssets();
        $churches = $this->model->getChurches();
        $statuses = $this->model->getStatus();
        $cabins = $this->model->getCabins();
        $tents = $this->model->getTents();
        $products = $this->products_model->getProducts();
        View::page('participants/add', get_defined_vars());
    }
    
    public function edit()
    {
        $this->model->doSave();
        $this->model->indexAssets();
        $churches = $this->model->getChurches();
        $statuses = $this->model->getStatus();
        $cabins = $this->model->getCabins();
        $tents = $this->model->getTents();
        $products = $this->products_model->getProducts();
        $user = $this->model->getParticipant($this->segment[2]);
        View::page('participants/edit', get_defined_vars());  
    }
    
    public function delete()
    {
        $participants = $this->model->doDelete($this->segment[2]);
        View::redirect('participants');
    }
    

}