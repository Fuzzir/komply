<?php

class users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersModel');
		$this->load->model('categoriesModel');
	}

	public function index() {
		if(isset($_SESSION['logged'])){
			$data['head']=$this->load->view('head','',true);
			$data['logged']=$this->load->view('loggedView','',true);
			$data['categories']=$this->categoriesModel->getAll();
			$data['navView']=$this->load->view('navView',$data,true);
			if(isset($_SESSION['type']) && $_SESSION['type']=="admin"){
				$data['users']=$this->usersModel->getUsers();
				$this->load->view('usersView',$data);
			}
		} else {
			$this->load->view('notLogged');
		}
	}

	public function delete($id) {
		if(isset($_SESSION['logged']) && $_SESSION['type']=="admin")
		{
			$this->usersModel->deleteUser($id);
			redirect(base_url('users'));
		}
	}
}
