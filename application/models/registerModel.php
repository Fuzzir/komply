<?php
class registerModel extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function index(){
        
    }

    function validate() {
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {

    		if ($_POST['password'] == $_POST['repassword']) {

	        	$email = mysqli_real_escape_string($this->db->conn_id ,$_POST['email']);

				$query=$this->db->query("select * from user where email='$email'");
        		if($query->num_rows()==1) {
        			$_SESSION['message'] = 'Konto z tym adresem e-mail już istnieje.';
        			return;
        		}	  

	        	$password = md5($_POST['password']);
	        	$sql = "INSERT INTO user (email, password, type) "
                . "VALUES ('$email', '$password', 'user')";


	        	if ($this->db->query($sql) === true) {
    				$_SESSION[ 'message' ] = "Rejestracja przebiegła pomyślnie!";
    			} else {
    				$_SESSION[ 'message' ] = "Błąd podczas dodawania!";
    			}
  
    			header( "location: main" );


	    	} else {
	    		$_SESSION['message'] = 'Hasła nie są takie same.';
	    	}
		}

    }

}