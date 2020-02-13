<?php

class orders extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('categoriesModel');
        $this->load->model('ordersModel');
    }
    public function index(){
        if(isset($_SESSION['logged'])){
        $data['head']=$this->load->view('head','',true);
        $data['logged']=$this->load->view('loggedView','',true);
        $data['categories']=$this->categoriesModel->getAll();
        $data['navView']=$this->load->view('navView',$data,true);
        if(isset($_SESSION['type']) && $_SESSION['type']=="admin"){
            $data['orders']=$this->ordersModel->getAll();
            $this->load->view('ordersHistoryAdmin',$data);
        } else {
            $data['orders']=$this->ordersModel->getForUser();
            $this->load->view('ordersHistoryView',$data);
        }
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Nie jesteś zalogowany!
          </div>';
        }
    }
    public function details($id){
        if(isset($_SESSION['logged'])){
            $data['head']=$this->load->view('head','',true);
            $data['logged']=$this->load->view('loggedView','',true);
            $data['categories']=$this->categoriesModel->getAll();
            $data['navView']=$this->load->view('navView',$data,true);
            $data['items']=$this->ordersModel->details($id);
            $data['statusy']=$this->ordersModel->statusy();
            $this->load->view('orderDetails',$data);  
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Nie jesteś zalogowany!
          </div>';
        }  
    }
    public function changestatus(){
        print_r($_POST);
        $this->ordersModel->zmienstatus($_POST['orderID'],$_POST['status']);
        $query=$this->db->query("select email from orders_address where order_id=".$_POST['orderID'])->result_array();
    }
}

