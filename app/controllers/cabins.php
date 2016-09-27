<?php
class Cabins extends Controller 
{
    public function __construct()
    {
        parent::__construct();

        // Protected yes

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
            View::redirect('cabins');
        };
        $cabins = $this->model->getCabins();
        View::page('cabins/list', get_defined_vars());
    }
    
    public function add()
    {
        if($this->model->doSave()){
            View::redirect('cabins');
        };
        $this->model->indexAssets();
        View::page('cabins/add', get_defined_vars());
    }
    
    public function edit()
    {
        $this->model->doSave();
        $this->model->indexAssets();
        $cabin = $this->model->getCabin($this->segment[2]);
        View::page('cabins/edit', get_defined_vars());  
    }
    
    public function delete()
    {
        $cabins = $this->model->doDelete($this->segment[2]);
        View::redirect('cabins');
    }
    

}