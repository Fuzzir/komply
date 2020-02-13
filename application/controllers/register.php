<?php
class register extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('registerModel');
		$this->load->model('categoriesModel');
		$this->load->helper('url');
	}
	function index(){
    	$_SESSION['message'] = '';

    	$this->registerModel->validate();

        $data['head']=$this->load->view('head','',true);
		$data['logged']=$this->load->view('loggedView','',true);
		$data['categories']=$this->categoriesModel->getAll();
        $data['navView']=$this->load->view('navView',$data,true);
        $this->load->view('registerView',$data);
	}
}