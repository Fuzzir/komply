<?php
class categoriesModel extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll()
    {
        $query=$this->db->query("select * from categories");
        foreach ($query->result_array() as $row){
            $data[]=$row;
        }
        return $data;
	}
}
?>