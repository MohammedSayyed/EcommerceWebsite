<?php
class My_model extends CI_Model{
    function userdata(){
        $this->load->database();
        $query=$this->db->query("select * from user_info where email=");
        return $query->result_array();
    }
    function canLogin($email,$password){
        // $this->db->where('email',$username);
        // $this->db->where('password',$password);
        // $query=$this->db->get('user_info');
        $query=$this->db->query("select * from user_info where email='".$email."' and password='".$password."'");
        if($query->num_rows()!=1)
            return false;
        else
            return true;

    }
    function getOrderData($user_id)
    {
        $query=$this->db->query("select products.product_image
        ,products.product_title,products.product_price,order_products.qty,orders_info.order_time,orders_info.payement_type
        ,order_products.Delivery_status from orders_info,order_products,products where orders_info.order_id=order_products.
        order_id and products.product_id=order_products.product_id and orders_info.order_id in (SELECT orders_info.order_id
         from orders_info WHERE orders_info.user_id=".$user_id.") ORDER BY orders_info.order_time DESC");
        return $query->result_array();
    }
    function getDetails()
    {
        $query=$this->db->query("select products.*, cat_title  from products,categories where products.product_cat=categories.cat_id");
        return $query->result_array();
    }
    function canLoginAdmin($email,$password)
    {
        // $this->db->where('email',$username);
        // $this->db->where('password',$password);
        // $query=$this->db->get('user_info');
        $query=$this->db->query("select * from admin_info where admin_email='".$email."' and admin_password='".$password."'");
        if($query->num_rows()!=1)
            return false;
        else
            return true;   
    }
    function canLoginVendor($email,$password)
    {
        $query=$this->db->query("select * from vendor_info where email='".$email."' and password='".$password."'");
        if($query->num_rows()!=1)
            return false;
        else
            return true;  
    }
    function getDataUser($email,$password)
    {
        $query=$this->db->query("select * from user_info where email='".$email."' and password='".$password."'");
        return $query->result_array();
    }
    function getDataadmin($email,$password)
    {
        $query=$this->db->query("select * from admin_info where admin_email='".$email."' and admin_password='".$password."'");
        return $query->result_array();
    }
    function getDataVendor($email,$password)
    {
        $query=$this->db->query("select * from vendor_info where email='".$email."' and password='".$password."'");
        return $query->result_array();
    }
    function add($data)
    {
        $this->db->query("insert INTO `user_info`( `first_name`, `last_name`, `email`, `password`, `mobile`) VALUES ('".$data['first_name']."','".$data['last_name']."','".$data['email']."','".$data['password']."','".$data['mobile']."')");
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    function searchResult($key1)
    {
        // SELECT products.*, cat_title from products,categories WHERE products.product_cat=categories.cat_id
        $query=$this->db->query("select products.*, cat_title  from products,categories where products.product_cat=categories.cat_id and (product_title like '%".$key1."%' or product_keywords like '%".$key1."%')" );
        // echo $key;
        // echo '<pre>';
        // print_r($query->result_array());
        // echo '</pre>';
         return $query->result_array();
    }
    function retrieveProduct($id)
    {
        $query=$this->db->query("select * from products, brands, categories, vendor_info where brands.brand_id=products.product_brand and categories.cat_id=products.product_cat and vendor_info.vendor_id=products.vendor_id and products.product_id=$id");
        return $query->result_array();
    }   
    function getProductDetails($p_id)
    {
        $query=$this->db->query("select * from products where product_id=".$p_id);
        return $query->result_array();
    }
    function addOrder1($info)
    {
        $this->db->query("insert into azamdeal.orders_info (user_id,f_name, email, address, city, state, zip, prod_count, total_amt, payement_type)values('".$info['user_id']."', '".$info['first_name']."', '".$info['email']."', '".$info['address']."', '".$info['city']."', '".$info['state']."', '".$info['zip']."', '".$info['tot_quantity']."', '".$info['total']."','COD')");
        // echo "added sucessfully";
        $result=$this->db->query("select max(order_id) AS max_val from orders_info");
        // echo '<pre>';
        // print_r($info['cart_item']);
        // echo '</pre>';
        $order_id=$result->result_array();
        // print_r($order_id[0]['max_val']);
        foreach($info['cart_item'] as $k=>$v)
            {
              $this->db->query("insert into order_products(order_id,product_id,qty,amt)values('".$order_id[0]['max_val']."','".$v['p_id']."','".$v['quantity']."','".$v['price']*$v['quantity']."')");
            }
        return true;
    }
    function addOrder2($info)
    {
        $this->db->query("insert into orders_info(user_id, f_name, email, address, city, state, zip, cardname, cardnumber, expdate, prod_count, total_amt, cvv, payement_type) values('".$info['user_id']."', '".$info['first_name']."', '".$info['email']."', '".$info['address']."', '".$info['city']."', '".$info['state']."', '".$info['zip']."','".$info['cardname']."','".$info['cardnumber']."','".$info['expdate']."', '".$info['tot_quantity']."', '".$info['total']."','".$info['cvv']."','CARD')");
        // echo "added sucessfully";
        $result=$this->db->query("select max(order_id) AS max_val from orders_info");
        // echo '<pre>';
        // print_r($info['cart_item']);
        // echo '</pre>';
        $order_id=$result->result_array();
        // print_r($order_id[0]['max_val']);
        foreach($info['cart_item'] as $k=>$v)
            {
              $this->db->query("insert into order_products(order_id,product_id,qty,amt)values('".$order_id[0]['max_val']."','".$v['p_id']."','".$v['quantity']."','".$v['price']*$v['quantity']."')");
            }
        return true;
    }
}
?>