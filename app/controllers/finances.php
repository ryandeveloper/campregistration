<?php
class Finances extends Controller 
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
            View::redirect('finances');
        };
        $finances = $this->model->getFinances();
        View::page('finances/list', get_defined_vars());
    }
    
    public function add()
    {
        if($this->model->doSave()){
            View::redirect('finances');
        };
        $this->model->indexAssets();
        View::page('finances/add', get_defined_vars());
    }
    
    public function edit()
    {
        $this->model->doSave();
        $this->model->indexAssets();
        $finance = $this->model->getFinance($this->segment[2]);
        View::page('finances/edit', get_defined_vars());  
    }
    
    public function delete()
    {
        $finances = $this->model->doDelete($this->segment[2]);
        View::redirect('finances');
    }
    

}