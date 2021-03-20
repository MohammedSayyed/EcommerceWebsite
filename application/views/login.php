<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('links');?>
</head>
	
<body>
    <!--Header-->
    <?php $this->load->view('header');?> 

<div class="w3_login">
			<h3 class=" m-4">Sign In & Sign Up</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle bg-dark"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h1 class="log">Login to your account</h1>
					<form action="<?php echo base_url();?>index.php/My_controller/validateLogin" method="post">
                      <input class="form-control" type="text" name="email1" placeholder="Email" required=" ">
                      <span class='text-danger'><?php echo form_error('email'); ?></span>
					  <input class="form-control" type="password" name="password" placeholder="Password" required=" ">
					  <?php
						  if ($this->session->has_userdata('error'))
						  	echo '<h6 class="text-danger text-sm">'.$this->session->userdata('error').'</h6>';
					  ?>
                      <input class="form-control" type="submit" value="Login">
					</form>
				  </div>
				  <div class="form">
					<h2 class="cls "><b>Create an account</b></h2>
					<form action="<?php echo base_url();?>index.php/My_controller/addUser" method="post">
					  <input class="form-control" type="email" name="email" placeholder="Email Address" required=" ">
					  <input class="form-control" type="text" name="firstname" placeholder="FirstName" required=" ">
					  <input class="form-control" type="text" name="lastname" placeholder="LastName" required=" ">
					  <input class="form-control" type="password" name="password1" placeholder="Password" required=" ">
					  <input class="form-control" type="text" name="phone" placeholder="Phone Number" required=" ">
					  <input class="form-control" 	type="submit" value="Register">
					</form>
				  </div>
				  <div class="cta bg-dark mb-2"><a href="#">Forgot your password?</a></div>
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
    <?php $this->load->view('footer');?>
    </body>
</html>