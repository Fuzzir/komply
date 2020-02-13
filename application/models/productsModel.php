<?php

class productsModel extends CI_Model{

    public $perPage=2;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAll(){
        $query= $this->db->query("select * from product order by product_id desc");
        foreach ($query->result_array() as $row){
            $data[]=$row;
        }
        return $data;
    }
    
    function getPage($page=0){
        $offset=$page*$this->perPage;
        $query=$this->db->query("select * from product order by product_name limit $offset, $this->perPage");
        foreach ($query->result_array() as $row){
            $data[]=$row;
        }
        return $data;
    }

    function checkString($string) {
        $string = mysqli_real_escape_string($this->db->conn_id, $string);
        $string = htmlspecialchars($string);
        return $string;
    }

    function getParameters() {
        $query = $this->db->query("SHOW COLUMNS from product_parameters");
        foreach ($query->result_array() as $row){
            $data[]=$row['Field'];
        }
        unset($data[0]);
        return $data;
    }

    function totalRows(){
        return $this->db->count_all('product');
    }

    function getOneCategory($categoriesId,$page){
        $offset = $page ? ($page - 1) * $this->perPage : 0;
        $query=$this->db->query("select * from product where categoriesID=$categoriesId order by product_name limit $offset, $this->perPage");
        if($query->num_rows()){
            foreach ($query->result_array() as $row) {
                $data[]=$row;
            }
            return $data;
        }
    }

    function search($query) {
        $query=$this->db->query("select * from product where product_name LIKE '%".$query."%'");
        if($query->num_rows()){
            foreach ($query->result_array() as $row) {
                $data[]=$row;
            }
            return $data;
        } else return FALSE;

    }

    function totalRowsInCategory($categoriesId){
        $query=$this->db->query("select count(*) as rowss from product where categoriesID=$categoriesId");
        foreach ($query->result_array() as $row) {
            $data['i']=$row;
        }
        return $data['i']['rowss'];
    }

    function getProductById($id) {
        $query=$this->db->query("select * from product_desc where product_id = $id");
        if($query->num_rows()){
            foreach ($query->result_array() as $row) {
                $data[]=$row;
            }
            return $data;
        }
        else return FALSE;
    }

    function delete($id){
        $this->db->query("DELETE FROM product WHERE product_id = $id");
        redirect('main');
    }

    function dodaj($data){
        if($data['nazwa']){
            $this->db->query("insert into product_parameters (proccessor, ram_amount, drive_type, drive_size, screen_size, screen_resolution, os, graphics_card) VALUES ('$data[proccessor]', '$data[ram_amount]', '$data[drive_type]', '$data[drive_size]', '$data[screen_size]', '$data[screen_resolution]', '$data[os]', '$data[graphics_card]' )");
            $param_id = $this->db->insert_id();
            $this->db->query("INSERT INTO product (product_name, product_amount, parameters_id, product_price, categoriesID, product_img) VALUES ('$data[nazwa]',$data[ilosc], $param_id, $data[cena], $data[kategoria], '". $_FILES["img"]["name"] . "')");
        }
        if(isset($_FILES['img'])){
            move_uploaded_file($_FILES['img']['tmp_name'], "img/".$_FILES['img']['name']);
        }
        redirect('main');
    }
}

