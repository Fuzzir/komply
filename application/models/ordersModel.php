<?php

class ordersModel extends CI_Model
{
    public function getForUser()
    {
        $id=$this->session->userdata('userID');
        $query=$this->db->query("
        select orders.order_id, order_date, status_description as status, sum(order_total) as total
        from orders
        join order_status on orders.status_id=order_status.status_id 
        join order_items on orders.order_id=order_items.order_id
        where orders.user_id = $id
        group by orders.order_id
        order by order_date desc");
        
        return $query->result_array();
    }
    public function getAll()
    {
        $query=$this->db->query("
        select o.order_id, order_date, status_description as status, email as login, sum(order_total) as total
        from orders o
        join order_status os on o.status_id=os.status_id
        join user u on u.ID_user=o.user_id
        join order_items oi on o.order_id=oi.order_id
        group by o.order_id
        order by order_date desc");

        return $query->result_array();
    }
    public function details($id)
    {
        $query1=$this->db->query("
        select product_name as name, order_item_quantity, order_item_price, order_total, order_id  
        from product p
        join order_items oi on p.product_id=oi.product_id
        where order_id = $id")->result_array();

        $query2 = $this->db->query("select * from orders_address where order_id = $id")->result_array();
        
        return array($query1, $query2, $id);
    }

    public function statusy()
    {
        $query=$this->db->query("select * from order_status");
        return $query->result_array();
    }

    public function zmienstatus($id, $status)
    {
        $query=$this->db->query("UPDATE orders SET status_id=$status WHERE order_id=$id");
        redirect('orders');
    }
}

