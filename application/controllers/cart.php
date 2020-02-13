<?php

class cart extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('cartModel');
        $this->load->model('categoriesModel');
    }
    public function index(){
        $data['head']=$this->load->view('head','',true);
        $data['logged']=$this->load->view('loggedView','',true);
        $data['categories']=$this->categoriesModel->getAll();
        $data['navView']=$this->load->view('navView',$data,true);  
        $this->load->view('cartView',$data);
    }
    public function add($id){
        $towar=$this->cartModel->getOne($id);
        $data = array(
            'id'      => $towar['product_id'],
            'qty'     => 1,
            'price'   => $towar['product_price'],
            'name'    => $towar['product_name'],
        );

        $this->cart->insert($data);  
        redirect('cart');
    }

    public function update(){
        $i=1;
        foreach ($this->cart->contents() as $items ){
            $this->cart->update(array('rowid'=>$items['rowid'],'qty'=>$_POST[$i]['qty']));
            $i++;
        }
        redirect('cart');
    }
    public function delete($rowid){
        $data = array(
               'rowid' => $rowid,
               'qty'   => 0
        );

        $this->cart->update($data); 
        redirect('cart');
    }
    public function checkout(){
        $data['head']=$this->load->view('head','',true);
        $data['logged']=$this->load->view('loggedView','',true);
        $data['categories']=$this->categoriesModel->getAll();
        $data['navView']=$this->load->view('navView',$data,true);
        $this->load->view('orderView', $data);
    }
    public function place_order(){
        if($this->cart->total_items() > 0){
            $this->cartModel->checkVar();
            extract($_POST);
            $order = array(
                'user_id' => $this->session->userdata['userID'],
                'status_id' => 1,
                'order_date' => date("Y-m-d H:i:s")
            );
            $id=$this->cartModel->insert_order($order);
            $adres= array(
                'order_id'=>$id,
                'imie'=> $imie,
                'nazwisko'=> $nazwisko,
                'email'=>$mail,
                'adres'=>$adres,
                'kod'=>$kod,
                'miejscowosc'=>$miejscowosc,
                'telefon'=>$telefon
            );
            $this->db->insert('orders_address',$adres);
            foreach ($this->cart->contents() as $items){
                print_r($items);
                $data = array(
                    'order_id'=>$id,
                    'product_id'=>$items['id'],
                    'order_item_quantity'=>$items['qty'],
                    'order_item_price'=>$items['price'],
                    'order_total'=>$items['subtotal']
                );
                $this->db->insert('order_items',$data);
                
            }
            $this->cart->destroy();
        }
        redirect('main');
        
    }
}

