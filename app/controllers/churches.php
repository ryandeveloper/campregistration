<?php
class Churches extends Controller 
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