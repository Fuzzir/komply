<?php

class ordersModel extends CI_Model{
    public function getForUser(){
        $id=$this->session->userdata('userID');
        $query=$this->db->query("select order_id, order_date, (select status_description from order_status where orders.order_status=order_status.order_code) as status ,(select sum(order_total) from order_items where order_items.order_id=orders.order_id) as total from orders where user_id=$id order by order_date desc");
        return $query->result_array();
    }
    public function getAll(){
        $query=$this->db->query("select order_id, order_date, (select status_description from order_status where orders.order_status=order_status.order_code) as status , (select email from user where user.ID_user=orders.user_id) as login,(select sum(order_total) from order_items where order_items.order_id=orders.order_id) as total from orders order by order_date desc");
        return $query->result_array();
    }
    public function details($id){
        $query=$this->db->query("select (select product_name from product where product.product_id=order_items.product_id) as name, order_items.order_item_quantity,order_items.order_item_price,order_items.order_total,order_id from order_items where order_id=$id");
        $tab[0] = $query->result_array();
        $tab[1] = $this->db->query("select * from orders_address where order_id = $id")->result_array();
        $tab[2]= $id;
        return $tab;
    }
    public function statusy(){
        $query=$this->db->query("select * from order_status");
        return $query->result_array();
    }
    public function zmienstatus($id,$status){
        $query=$this->db->query("UPDATE orders SET order_status=$status WHERE order_id=$id");
        redirect('orders');
    }
}

