<?php
class main extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('productsModel');
        $this->load->model('categoriesModel');
        $this->load->library('pagination');
        $this->load->helper('url');
    }
    
    function index($categoriesID=1, $page=1) {
        $data['head']=$this->load->view('head','',true);
        $data['logged']=$this->load->view('loggedView','',true);
        $data['categories']=$this->categoriesModel->getAll();
        $data['navView']=$this->load->view('navView',$data,true);
        if(isset($_GET['logout'])){
            $data['logout']=$this->load->view('logoutMassage','', true);
        }
        $data['categoriesView']=$this->load->view('categoriesView',$data,true);       
        $data['products']=$this->productsModel->getOneCategory($categoriesID, $page);
        $data['totalRows']=$this->productsModel->totalRowsInCategory($categoriesID);
        $data['perPage']=$this->productsModel->perPage;
        $data['page']=$page;
        $data['categoriesId']=$categoriesID;
        $data['contextView']=$this->load->view('productsView',$data,true);

        $this->load->view('userView',$data);
        
    }

    function search() {
        if(isset($_GET['query'])) {
            $query = $_GET['query'];
            $this->load->model('productsModel');
            $this->productsModel->checkString($query);
            $data['products'] = $this->productsModel->search($query);
        }
        $data['head']=$this->load->view('head','',true);
        $data['logged']=$this->load->view('loggedView','',true);
        $data['categories']=$this->categoriesModel->getAll();
        $data['navView']=$this->load->view('navView',$data,true);
        $data['contextView']=$this->load->view('searchP',$data,true);
        $this->load->view('search_view',$data);
    }
}
