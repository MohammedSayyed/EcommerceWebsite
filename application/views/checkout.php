
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('links');?>

</head>

<body>
<?php $this->load->view('header');?>
<br><br><br><br>
<!-- header -->
		<!-- <div class="w3l_banner_nav_right"> -->
<!-- about -->
	<?php
		if (isset($_SESSION['cart_item']))
		{
	?>
	
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>
			
	      <div class="checkout-right">
					<h4>Your shopping cart contains: </h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
						
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
				<tbody>
                    <?php 
					$c=1;
				
					foreach($_SESSION['cart_item'] as $row)
                    {
					?>
                    <tr class="rem1">
						<td class="invert"><?=$c?></td>
						<td class="invert-image"><a href="#"><img style='width:75px; height:75px;' src="<?php echo base_url()?>product images/<?=$row['image']?>" alt=" " class="img-responsive" ></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
								<a href="<?php echo base_url()?>index.php/My_controller/subQuantity/<?=$row['p_id']?>">	<div class="entry value-minus">&nbsp;</div></a>
									<div class="entry value"><?=$row['quantity']?><span></span></div>
								<a href="<?php echo base_url()?>index.php/My_controller/addQuantity/<?=$row['p_id']?>">	<div class="entry value-plus active">&nbsp;</div></a>
								</div>
							</div>
						</td>
						<td class="invert"><?=$row['name']?></td>
						
						<td class="invert">Rs.<?=$row['price']?></td>
						<td class="invert">

							<a href="<?php echo base_url()?>index.php/My_controller/removeCartItem/<?=$row['p_id']?>"><i class="fa fa-trash-o fa-3x" aria-hidden="true"></i></a>
						</td>
					</tr>

					<?php
						$c+=1;
					}
					?>
					<!-- <tr class="rem2">
						<td class="invert">2</td>
						<td class="invert-image"><a href="single.html"><img src="images/3.png" alt=" " class="img-responsive"></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">Basmati Rise (5 Kg)</td>
					
						<td class="invert">$250.00</td>
						<td class="invert">
							<div class="rem">
								<div class="close2"> </div>
							</div>

						</td>
					</tr>
					<tr class="rem3">
						<td class="invert">3</td>
						<td class="invert-image"><a href="single.html"><img src="images/2.png" alt=" " class="img-responsive"></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">Pepsi Soft Drink (2 Ltr)</td>
						
						<td class="invert">$15.00</td>
						<td class="invert">
							<div class="rem">
								<div class="close3"> </div>
							</div>
	
						</td>
					</tr> -->

				</tbody></table>
			</div>
			
			<div class="checkout-right-basket">
				        	<a href="<?php echo base_url()?>index.php/">Continue Shopping <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div>
			<br><br>
			<div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Summary</span>
          </h4>
          <ul class="list-group mb-3">
		  <?php 
			$total=0;
			$tot_quantity=0;
			foreach($_SESSION['cart_item'] as $row)
			{?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?=$row['name']?></h6>
				<small class="text-muted">Qty:<?=$row['quantity']?> * <?=$row['price']?></small>
              </div>
              <span class="text-muted">Rs.<?=$row['price']*$row['quantity']?></span>
            </li>
			
			<?php 
			$total+=$row['price']*$row['quantity'];
			$tot_quantity+=$row['quantity'];
			}
			$_SESSION['total']=$total;
			$_SESSION['tot_quantity']=$tot_quantity;
			?>
			
			
            <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li> -->
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (INR)</span>
              <strong>Rs.<?=$total?></strong>
            </li>
          </ul>
        </div>
		<div class="col-md-6 address_form_agile">
					  <h4>Add Address Details</h4>
				<form id="form1" action="<?=base_url()?>index.php/My_controller/addAddress" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Address</label>
													<input class="billing-address form-control" type="text" name="address" placeholder="Address" required>
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">State:</label>
														    <input class="form-control" type="text" placeholder="State" name="state" required>
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Zipcode: </label>
														 <input class="form-control" type="text" placeholder="4100XXX" name="zip" required> 
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Town/City: </label>
												 <input class="form-control" type="text" placeholder="Town/City" name="city" required>
												</div>
											</div>
											<div class="checkout-right-basket">
												<!-- <a href="#" onclick="document.getElementById('form1').submit();">Make Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
												 -->
												 <input type="submit" class="btn btn-warning " value="Make payment">
										 </div>
										</div>
									</section>
								</form>
							</div>
				<!-- <div class="col-md-8 address_form_agile"> -->
					  
				
									
					<!-- </div> -->
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
		<?php
		}
		else
		{
		?>
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>
			
	     	<div class="checkout-right">
				<h4 style="text-align:center;">Your shopping cart is Empty!! </h4>
			</div>
		<div class="checkout-right-basket">
			<a href="<?php echo base_url()?>index.php/">Continue Shopping <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
		</div><br><br><br><br>
		<?php
		}
		?>
<!-- //about -->
		<!-- </div>
		<div class="clearfix"></div>
	</div> -->
<!-- //banner -->


<!-- newsletter -->
	
<!-- //newsletter -->
<!-- footer -->
	
<!-- //footer -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
							 <!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
							<script>$(document).ready(function(c) {
								$('.close2').on('click', function(c){
									$('.rem2').fadeOut('slow', function(c){
										$('.rem2').remove();
									});
									});	  
								});
						   </script>
						  	<script>$(document).ready(function(c) {
								$('.close3').on('click', function(c){
									$('.rem3').fadeOut('slow', function(c){
										$('.rem3').remove();
									});
									});	  
								});
						   </script>

<!-- //js -->
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
	<br><br><br><br><br><br><br><br>
        <?php $this->load->view('footer');?>
</body>
</html>