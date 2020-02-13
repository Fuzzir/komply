<?php
class login extends CI_Controller{
	public function __construct(){
		parent::__construct();
        $this->load->model('loginModel');
        $this->load->model('categoriesModel');
		$this->load->helper('url');
	}
	function index(){
        $data['head']=$this->load->view('head','',true);
        $data['logged']=$this->load->view('loggedView','',true);
        $data['categories']=$this->categoriesModel->getAll();
        $data['navView']=$this->load->view('navView',$data,true);
        if (!isset($_SESSION['logged'])){
            $data['loginForm']=$this->load->view('loginFormView','',true);
        } else if ($_SESSION['logged']){
            $data['loginForm']=$this->load->view('loggedAlert','', true);
        } else if ($_SESSION['logged']==false) {
            $data['loginForm']=$this->load->view('loginFailedView','',true);
            $this->session->unset_userdata('logged');
        }
        
        $this->load->view('loginView', $data);
        
        $this->loginModel->checkVar();
        if(isset($_POST['login'])){  
            if($id=$this->loginModel->loginSuccess($_POST['login'],$_POST['pass'])){
                $this->loginModel->writeSession($id['ID_user']);
                redirect('main');
            } else {
                $this->session->set_userdata('logged', false);
                redirect('login');
            }
        }
	}
    function logout(){
        $this->loginModel->logout();
        redirect('main/?logout');
    }
}
