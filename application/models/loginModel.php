<?php
class loginModel extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    function loginSuccess($login,$password)
    {
        $password = md5($password);
        $query=$this->db->query("select * from user where email='$login' and password='$password'");
        if($query->num_rows()==1){
            $data=$query->result_array();
            $this->session->set_userdata('type',$data[0]['type']);
            return $data[0];
        } 
        return FALSE;
    }

    function writeSession($idu)
    {
        $id = md5(rand(-10000,10000) . microtime()) . md5(crc32(microtime()) . $_SERVER['REMOTE_ADDR']);
        $this->db->query("delete from session where ID_user = $idu");     
        $this->db->query("insert into session (ID_user, id, ip, web) values ($idu,'$id','$_SERVER[REMOTE_ADDR]','$_SERVER[HTTP_USER_AGENT]')");
        $this->session->set_userdata('login',$_POST['login']);
        $this->session->set_userdata('userID',$idu);
        $this->session->set_userdata('logged', true);
    } 

    function logout()
    {
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('userID');
        $this->session->unset_userdata('type');
        $this->session->sess_destroy();
    }

    function checkVar() 
    {
        foreach ($_POST as $k=>$v) {$_POST[$k] = mysqli_real_escape_string($this->db->conn_id, $v);}
        foreach ($_POST as $k=>$v) {$_POST[$k] = htmlspecialchars($v);}
        foreach ($_SERVER as $k=>$v) {$_SERVER[$k] = mysqli_real_escape_string($this->db->conn_id, $v);}
    }
}