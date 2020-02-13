<?php
class cartModel extends CI_Model
{
    public function getOne($id)
    {
        $query= $this->db->query("select * from product where product_id=$id");
        foreach ($query->result_array() as $row){
            return $data[]=$row;
        }
    }

    public function insert_order($data)
    {
        $this->db->insert('orders',$data);
        $id = $this->db->insert_id();
        return $id;
    }

    function checkVar() 
    {
        foreach ($_POST as $k=>$v) {$_POST[$k] = mysqli_real_escape_string($this->db->conn_id, $v);}
        foreach ($_POST as $k=>$v) {$_POST[$k] = htmlspecialchars($v);}
    }
}

?>

