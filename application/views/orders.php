
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
		if(!empty($result))
		{
	?>
	
		<div class="privacy about">
			<h3>Your <span>Orders</span></h3>
			
	      <div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product Image</th>
							<th>Name</th>
							<th>Price</th>
                            <th>Quantity</th>
                            <th>Order Date and Time</th>
                            <th>Payment Method</th>
                            <th>Total Cost</th> 
                            <th>Delivery Status
						</tr>
					</thead>
				<tbody>
                    <?php 
					$c=1;
				
					foreach($result as $row)
                    {
					?>
                    <tr class="rem1">
						<td class="invert"><?=$c?></td>
						<td class="invert-image"><a href="#"><img style='width:75px; height:75px; border:groove #000' src="<?php echo base_url()?>product images/<?=$row['product_image']?>" alt=" " class="img-responsive" ></a></td>
						<td class="invert"><?=$row['product_title']?></td>
						<td class="invert">Rs.<?=$row['product_price']?></td>
                        <td class="invert"><?=$row['qty']?></td>
                        <td class="invert"><?=$row['order_time']?></td>
                        <td class="invert"><?=$row['payement_type']?></td>
                        <td class="invert">Rs.<?=$row['qty']*$row['product_price']?></td>
                        <td class="invert"><?php echo $row['Delivery_status']==1 ? "Delivered" : "Processing Order" ?></td>
                        
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
           
		<?php
		}
		else
		{
		?>
		<div class="privacy about">
			<h3>Your <span>Orders</span></h3>
			
	     	<div class="checkout-right">
				<h4 style="text-align:center;">You have not Purchased anything yet!! </h4>
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