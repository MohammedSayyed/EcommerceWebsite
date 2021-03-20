<?php 
   class Redirect_controller extends CI_Controller { 
	
      public function index() { 
         /*Load the URL helper*/ 
         $this->load->helper('url'); 
   
        //  /*Redirect the user to some site*/ 
        //  redirect('http://www.tutorialspoint.com'); 
      }
		
      public function login() { 
         /*Load the URL helper*/ 
         $this->load->helper('url'); 
         redirect('redirect/login'); 
      } 
  
      public function version2() { 
         /*Load the URL helper*/ 
         $this->load->helper('url'); 
   
         /*Redirect the user to some internal controller’s method*/ 
         redirect('redirect/computer_graphics'); 
      } 
		
   } 
?>