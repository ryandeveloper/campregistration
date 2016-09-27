<?php
class Tents extends Controller 
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
            View::redirect('tents');
        };
        $tents = $this->model->getTents();
        View::page('tents/list', get_defined_vars());
    }
    
    public function add()
    {
        if($this->model->doSave()){
            View::redirect('tents');
        };
        $this->model->indexAssets();
        View::page('tents/add', get_defined_vars());
    }
    
    public function edit()
    {
        $this->model->doSave();
        $this->model->indexAssets();
        $tent = $this->model->getTent($this->segment[2]);
        View::page('tents/edit', get_defined_vars());  
    }
    
    public function delete()
    {
        $tents = $this->model->doDelete($this->segment[2]);
        View::redirect('tents');
    }
    

}