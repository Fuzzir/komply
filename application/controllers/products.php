<?php

class products extends CI_Controller{
    public function index(){      
        $this->load->model('productsModel');
        $data['products']=$this->productsModel->getAll();
        $data['parent']=$this;
        if($this->session->userdata('type')=="admin"){
            $this->load->view('productsAdmin',$data);
        } else {
            $this->load->view('productsView',$data);
        }
    }
    public function delete($id){
        $this->load->model('productsModel');
        $this->productsModel->usun($id);
    }
    public function add(){
        $this->load->model('categoriesModel');
        $this->load->model('productsModel');
        $this->load->model('loginModel');
        $data['head']=$this->load->view('head','',true);
        $data['logged']=$this->load->view('loggedView','',true);
        $data['categories']=$this->categoriesModel->getAll();
        $data['navView']=$this->load->view('navView',$data,true);
        $data['parameters'] = $this->productsModel->getParameters();

        if(isset($_SESSION['type']) && $_SESSION['type']=='admin'){
            $this->load->view('addProduct', $data, FALSE);
            
            if (isset($_POST['nazwa'])) {
                $this->loginModel->checkVar();
                $this->productsModel->dodaj($_POST);
            }

        } else {
            echo '<div class="alert alert-danger">
            <strong>Błąd!</strong> Nie posiadasz wymaganych uprawnień
          </div>';
        }
    }
    public function details($id)
    {
        $this->load->model('productsModel');
        $this->load->model('categoriesModel');
        $this->productsModel->checkString($id);
        $data['head']=$this->load->view('head','',true);
        $data['logged']=$this->load->view('loggedView','',true);
        $data['categories']=$this->categoriesModel->getAll();
        $data['navView']=$this->load->view('navView',$data,true);
        $data['product'] = $this->productsModel->getProductById($id);
        
        $this->load->view('product_details', $data, FALSE);
        
    }
}

?>