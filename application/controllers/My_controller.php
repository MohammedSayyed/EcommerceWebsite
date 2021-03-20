<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$_SESSION['url']="";
class My_controller extends CI_Controller{
    
    function index()
    {
        // $this->load->model("my_model");
        // $this->load->helper("html");
        // $result['result']=$this->my_model->userdata();
        // $this->load->helper('url');
        // $this->load->view("homepage");
        $this->load->helper('url');
        $this->load->model("my_model");
        $res['res']=$this->my_model->getDetails();
        $this->load->view("homepage",$res);
        $_SESSION['url']=$this->currenturl();

    }
    function login()
    {
        
        $this->load->helper('url'); 
        $this->load->view("login");
    }
    function validateLogin()
    {
        $this->load->helper('url'); 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email1','email','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run())
        {
            $email=$this->input->post('email1');
            $password=md5($this->input->post('password'));
            $this->load->model('My_model');
            if($this->My_model->canLogin($email,$password))
            {
                $sessionData=array(
                    'email'=>$email,
                    'password'=>$password
                );
                $result=$this->My_model->getDataUser($email,$password);
               
                $this->session->set_userdata($result[0]);
                // print_r($_SESSION);
                if ($this->session->has_userdata('error'))
                    unset($_SESSION['error']);
                // echo $this->session->userdata('username');
            //$this->session->unset_userdata('username ');
                // unset(
                //     $_SESSION['result']
                // );
            // echo $this->session->userdata('username');
            // echo $this->session->userdata('password');
            if($this->session->has_userdata('cart_item'))
                redirect(base_url()."index.php/My_controller/cart");
            else
                redirect(base_url());
            } 
            else if($this->My_model->canLoginVendor($email,$password))
            {
                $result=$this->My_model->getDataVendor($email,$password);
                foreach($result[0] as $key=>$val)
                    setcookie($key,$val, time() + (86400 * 30),"/");

                setcookie("flag",2,time() + (86400 * 30),"/");
                if ($this->session->has_userdata('error'))
                    unset($_SESSION['error']);
                    // print_r($_COOKIE);
                redirect(base_url()."admin/");
            }
            else if($this->My_model->canLoginAdmin($email,$password))
            {
                // $sessionData=array(
                //     'email'=>$,
                //     'password'=>$password
                // );
                // $this->session->set_userdata($sessionData);
                $result=$this->My_model->getDataAdmin($email,$password);
            
                setcookie("flag",1,time() + (86400 * 30),"/");
                if ($this->session->has_userdata('error'))
                    unset($_SESSION['error']);
                // print_r($_COOKIE);
                if (isset($_SERVER['HTTP_COOKIE'])) {
                    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                    foreach($cookies as $cookie) {
                        $parts = explode('=', $cookie);
                        $name = trim($parts[0]);
                        if ($name=="flag")
                            continue;
                        setcookie($name, '', time()-1000);
                        setcookie($name, '', time()-1000, '/');
                    }
                }
                foreach($result[0] as $key=>$val)
                    setcookie($key,$val, time() + (86400 * 30),"/");
                // print_r($_COOKIE);
                redirect(base_url()."admin/");  
            }
           
            else
            {

                $this->session->set_userdata("error","incorrect Password or username"); 
                redirect(base_url()."index.php/My_controller/login");
            }
                 
        }
        else
        {
            $this->login();
        }
    }
    function aboutus()
    {
        $this->load->helper('url'); 
        $this->load->view('aboutUs');
    }
    function search2($key)
    {
        $this->load->helper('url'); 
        if($key=="t%20shirt")
            $key="t shirt";
        elseif($key=="Samsung%20mobile")
            $key="samsung mobile";
        $_SESSION['SEARCH']=$key;
        // $key=$_POST['keyword'];
        $this->load->model('My_model');
        $result['result']=$this->My_model->searchResult($key);
        // $result['result2']=$this->My_model->suggstion($result['result'][0]['cat_title']);
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre>';
        $_SESSION['url']=$this->currenturl();
        $this->load->view('productView',$result);
        
        
    }
    function buyNow($product_id)
    {
        $this->load->helper('url'); 

        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre><br><br>';
            $this->load->model('My_model');
            $product =  $this->My_model->getProductDetails($product_id);
            $itemArray = array($product[0]['product_title']=>array('name'=>$product[0]["product_title"],'p_id'=>$product[0]["product_id"], 'quantity'=>1, 'price'=>$product[0]["product_price"], 'image'=>$product[0]["product_image"]));
            // echo '<pre>';
            // print_r($itemArray);
            // echo '</pre><br><br>';
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($product[0]["product_title"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($product[0]["product_title"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += 1;
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
            $this->load->view('checkout');
    }
    function getProduct($id)
    {
        $this->load->helper('url');
        $this->load->model('My_model');
        $result['result']=$this->My_model->retrieveProduct($id);

        $this->load->view('buying',$result);
    }
    function search()
    {
        $this->load->helper('url'); 
        if (isset($_POST['keyword']))
            $key=$_POST['keyword'];
        else
            $key=$_SESSION['SEARCH'];
        $_SESSION['SEARCH']=$key;
        $this->load->model('My_model');
        $result['result']=$this->My_model->searchResult($key);
        // $result['result2']=$this->My_model->suggstion($result['result'][0]['cat_title']);
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre>';
        $this->load->view('productView',$result);
        $_SESSION['url']=$this->currenturl();
    }
    function currenturl() {
        $pageURL = 'http';
        // if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
    function cart()
    {
        $this->load->helper('url'); 
        $this->load->view('checkout');
    }
    function addCart($product_id)
    { 
        $this->load->helper('url'); 

        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre><br><br>';
            $this->load->model('My_model');
            $product =  $this->My_model->getProductDetails($product_id);
            if ($product[0]['stock_status']==1)
            {
                $itemArray = array($product[0]['product_title']=>array('name'=>$product[0]["product_title"],'p_id'=>$product[0]["product_id"], 'quantity'=>1, 'price'=>$product[0]["product_price"], 'image'=>$product[0]["product_image"]));
            // echo '<pre>';
            // print_r($itemArray);
            // echo '</pre><br><br>';
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($product[0]["product_title"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($product[0]["product_title"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += 1;
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
            $_SESSION['cartSuccess']=1;
            redirect($_SERVER['HTTP_REFERER']);
            // echo '<script type="text/JavaScript">  
            //     alert("The Product is added successfully!!"); 
            //     </script>'; 
        }
        else
        {
            $_SESSION['cartSuccess']=2;
            redirect($_SERVER['HTTP_REFERER']);
        }
            // unset($_SESSION['cart_item']);
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre><br><br>';
        // redirect(base_url()."index.php/My_controller/search/".$_SESSION['SEARCH']);
        // redirect($url);
        // redirect($_SESSION['url']);
        // 
    }
    function removeCartItem($p_id)
    {       $this->load->helper('url');  
            // unset($_SESSION['cart_item'][$_GET['title']]);
            if(!empty($_SESSION["cart_item"])) {
                
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($p_id == $v['p_id'])
                        unset($_SESSION["cart_item"][$k]);				
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
                
            }
            // redirect(base_url()."index.php/My_controller/cart");\
            redirect($_SERVER['HTTP_REFERER']);
    }
    function addQuantity($p_id)
    {
        $this->load->helper('url');
        foreach($_SESSION["cart_item"] as $k => $v) {
            if($p_id == $v['p_id'])
            { 
                $_SESSION['cart_item'][$k]['quantity']+=1;
                break;
                // echo "<PRE>";
                // print_r($_SESSION['cart_item'][$k]['quantity']."<br>");
                // print_r($v);
                // echo "</PRE>";
            }
        }
        // echo "<PRE>";
        // print_r($_SESSION['cart_item']);
        // echo "</PRE>";
        redirect($_SERVER['HTTP_REFERER']);
    }
    function subQuantity($p_id)
    {
        $this->load->helper('url');
        foreach($_SESSION["cart_item"] as $k => $v) {
            if($p_id == $v['p_id'])
            { 
                if($_SESSION['cart_item'][$k]['quantity']>1)
                {
                    $_SESSION['cart_item'][$k]['quantity']-=1;
                    break;
                }
                // echo "<PRE>";
                // print_r($_SESSION['cart_item'][$k]['quantity']."<br>");
                // print_r($v);
                // echo "</PRE>";
            }
        }
        // echo "<PRE>";
        // print_r($_SESSION['cart_item']);
        // echo "</PRE>";
        redirect($_SERVER['HTTP_REFERER']);
    }
    function logout()
    {
        $this->load->helper('url');
        unset(
            $_SESSION['user_id'],
                $_SESSION['first_name'],
                $_SESSION['password'],
                $_SESSION['last_name'],
                $_SESSION['email'],
                $_SESSION['mobile'],
                $_SESSION['address1'],
                $_SESSION['address2']
            );
        redirect(base_url()); 
        // print_r($_SESSION);
    }
    function payment()
    {
        $this->load->helper('url');
        $this->load->view('payment');
        
    }
    function addOrderCard()
    {
        $this->load->helper('url');
        $this->load->model('My_model');
        $data=$_SESSION;
        $data['cardname']=$this->input->post('name');
        $data['cardnumber']=$this->input->post('number');
        $data['cvv']=$this->input->post('security-code');
        $data['expdate']=$this->input->post('expiration-month-and-year');
        //  echo '<pre>';
        // print_r($data);
        // echo '</pre><br><br>';
        $result=$this->My_model->addOrder2($data);
        if ($result==true)
            $this->load->view('successPayment');

    }
    function clearSession()
    {
        $this->load->helper('url');
        unset(
            $_SESSION['cart_item'],
            $_SESSION['address'],
            $_SESSION['state'],
            $_SESSION['city'],
            $_SESSION['zip'],
            );
        // print_r($_SESSION);
        redirect(base_url());
    }
    function addOrderCOD()
    {
        $this->load->helper('url');
        $this->load->model('My_model');
        $data=$_SESSION;
        $result=$this->My_model->addOrder1($data);
        if ($result==true)
            $this->load->view('successPayment');

    }
    function addAddress()
    {
        $this->load->helper('url');
        if($this->session->has_userdata('user_id'))
        {
             
        $data=array(
            'address'=>$this->input->post('address'),
            'state'=>$this->input->post('state'),
            'zip'=>$this->input->post('zip'),
            'city'=>$this->input->post('city')
        );
        // print_r($data);
        $this->session->set_userdata($data);
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre><br><br>';
        $this->load->view("payment");
        }
        else
        {   
            $this->load->view("login");
        }
        
    }
    function getOrders($user_id)
    {
        $this->load->helper('url'); 
        $this->load->model('My_model');
        $result['result']=$this->My_model->getOrderData($user_id);
        $this->load->view("orders",$result);
        // echo '<pre>';
        // print_r($result);
        // echo '</pre><br><br>';
    }
    function addUser()
    {
        $this->load->helper('url'); 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        
        // if($this->form_validation->run())
        // {
            $data=array(
                'first_name'=>$this->input->post('firstname'),
                'last_name'=>$this->input->post('lastname'),
                'password'=>md5($this->input->post('password1')),
                'email'=>$this->input->post('email'),
                'mobile'=>$this->input->post('phone')
            );
            // print_r($data);
            $this->load->model('My_model');

            if($this->My_model->add($data))
            {   $result=$this->My_model->getDataUser($data['email'],$data['password']);
                $this->session->set_userdata($result[0]);
                // print_r($_SESSION); 
                if ($this->session->has_userdata('error'))
                    unset($_SESSION['error']);
                redirect(base_url());
            }
            else
                echo "unsucessfull";

        // }
    }
}
?>