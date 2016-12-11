<?php
class Churches extends Controller 
{
    public function __construct()
    {
        parent::__construct();

        // Protected yes
        $this->load->model('participants',false,true);
        $this->load->model('products',false,true);

        $auth = $this->load->model('auth', true);
        if(!$auth->isLoggedIn() && $this->segment[0] != 'assets') {
            View::redirect('users/login');
        }
    }

    public function index()
    {
        // Table
        $this->model->indexAssets();
        if($this->model->doSave()){
            View::redirect('churches');
        };
        $churches = $this->model->getChurches();
        View::page('churches/list', get_defined_vars());
    }

    public function add()
    {
        if($this->model->doSave()){
            View::redirect('churches');
        };
        $this->model->indexAssets();
        View::page('churches/add', get_defined_vars());
    }

    public function view()
    { 
        $this->model->indexAssets();

        if($this->participants_model->doSave()){
            View::redirect('churches/view/'.$this->segment[2]);
        };
        $segment = $this->segment[2];
        $participants = $this->model->getChurchMembers($this->segment[2]);
        $churches = $this->participants_model->getChurches();
        $statuses = $this->participants_model->getStatus();
        $cabins = $this->participants_model->getCabins();
        $tents = $this->participants_model->getTents();
        $products = $this->products_model->getProducts();
        View::page('churches/churchlist', get_defined_vars());
    }

    public function edit()
    {
        $this->model->doSave();
        $this->model->indexAssets();
        $church = $this->model->getChurch($this->segment[2]);
        View::page('churches/edit', get_defined_vars());  
    }

    public function delete()
    {
        $churches = $this->model->doDelete($this->segment[2]);
        View::redirect('churches');
    }


}