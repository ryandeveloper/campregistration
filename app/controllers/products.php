<?php
class Products extends Controller 
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
            View::redirect('products');
        };
        $products = $this->model->getProducts();
        View::page('products/list', get_defined_vars());
    }
    
    public function add()
    {
        if($this->model->doSave()){
            View::redirect('products');
        };
        $this->model->indexAssets();
        View::page('products/add', get_defined_vars());
    }
    
    public function edit()
    {
        $this->model->doSave();
        $this->model->indexAssets();
        $product = $this->model->getProduct($this->segment[2]);
        View::page('products/edit', get_defined_vars());  
    }
    
    public function delete()
    {
        $products = $this->model->doDelete($this->segment[2]);
        View::redirect('products');
    }
    

}