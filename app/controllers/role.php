<?php
class Role extends Controller 
{
    public function __construct()
    {
        parent::__construct();
        
        // Load model Auth
        $auth = $this->load->model('auth', true);
        if(!$auth->isLoggedIn()) {
            View::redirect('user/login');
        } 
    }

    public function index()
    {    
        $this->model->indexAssets();
        $roles = $this->model->getLevels();        
        View::page('role/list', get_defined_vars());
    }
    
    public function capabilities()
    {    
        $this->model->indexAssets();
        $roles = $this->model->getLevels();        
        View::page('role/list', get_defined_vars());
    }
    
    public function delete()
    {
        $user = $this->model->doDelete($this->segment[2]);
        View::redirect('role');
    }
    
    public function edit()
    {
        $this->model->doSave();
        $this->model->indexAssets();
        $role = $this->model->getLevel($this->segment[2]);
        View::page('role/edit', get_defined_vars());
    }
    
    public function add()
    {
        $pdata = $this->model->doSave();
        $this->model->indexAssets();
        View::page('role/add', get_defined_vars());
    }
}