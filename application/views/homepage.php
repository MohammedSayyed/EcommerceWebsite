<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('links');?>
<style>
/* modal */

.botn{
  position:fixed;
  top: 8px;
  right: 16px;
  z-index:4;
  box-shadow: 0 0 10px #000;  
}
.close{
    size:3x;
}

/* end of modal */
.row
{
	display:flex;
}
img {
  width: 100%;
  height: auto;
  vertical-align: middle;
}	
 .col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}
.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}

.col-item .price h5
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color: #219FD1;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
.img {
    float:  left;
    width:  100px;
    height: 300px;
    background-size: cover;
}
[data-slide="prev"]
{
    margin-right: 10px;
}
h1 {text-align:center;}
/* modal */
.botn{
  position:fixed;
  top: 8px;
  right: 16px;
  z-index:4;
  box-shadow: 0 0 10px #000;  
}
.close{
    size:3x;
}
</style>
</head>

<body>
<?php $this->load->view('header');?>


    <div id="carouselExampleCaptions" class="carousel slide  mb-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url()?>img/shopp3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url()?>img/shopp2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url()?>img/shopp4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>SHOP YOUR OWN WAY</h1>
                    <p>for all your lastest fashion desires and love for shopping</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

<div class="container">

<?php
if(isset($res[0]))
{
 ?>   

<div class="row" >
<?php  foreach($res as $row): ?>
 
        <div class="col-sm-3">
            <div class="col-item">
                <div class="photo">
                    <img src="<?php echo base_url()?>product images/<?=$row['product_image']?>" class="img-responsive img" alt="a" style="width:auto; height:300px;"/>
                </div>
                <div class="info">
                    <div class="row">
                        <div class="price col-md-7">
                            <h5><b>
							<?=$row['product_title']?></b></h5><br>
							
                            <h5 class="price-text-color">
							₹<?=$row['product_price']?></h5>
                        </div>
                        <div class="rating hidden-sm col-md-5">
                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                            </i><i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="separator clear-left">
                        <p class="btn-add">
                            <i class="fa fa-shopping-cart"></i><a href="<?php echo base_url()?>index.php/My_controller/addCart/<?=$row['product_id']?>" class="hidden-sm">Add to cart</a></p>

                        <p class="btn-details">
                            <i class="fa fa-list"></i><a href="<?php echo base_url()?>index.php/My_controller/getProduct/<?=$row['product_id']?>" class="hidden-sm">More details</a></p>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        <?php if($row['product_id']==8){
            break;
        }
        ?>
        <?php endforeach;?>

    </div>
    <?php
     
    }
else
    echo '<br><br><br><br><h1 style="text-align:center;">Product currently not available!<h1><br><br><br><br><br><br>';
?>         
</div>






    <div class="container ">
        <h2> WE CURATE,YOU SHOP</h2>
        <H4 class="thiner">Hand Picked Favorites Just For You</H4>
        <div class="row  mt-4 mb-4">
            <div class="col-lg-6 mb-2">
                <a href="#"><img src="<?php echo base_url()?>img/dress.jpg" alt="" width="500px" height="650px"> </a>
            </div>
            <div class="col-lg-6">
                <div class="row-lg-6">
                    <a href="#"><img src="<?php echo base_url()?>img/linen shirts.jpg" alt="" width="600px" height="350px"> </a>

                </div>
                <div class="row-lg-6">
                    <a href="#"><img src="<?php echo base_url()?>img/pool sliders.jpg" alt="" width="600px" height="300px"> </a>

                </div>
            </div>
        </div>
    </div>





    <div class="container">
        <h2> STYLES TO STEAL</h2>
        <H4 class="thiner">Inspired By Influencers</H4>
        <div class="row  mt-4 mb-4 ">
            <div class="col-lg-4 col-sm-12 mb-4">
                <a href="#"><img src="<?php echo base_url()?>img/prerna.jpg" alt="" width="300px" height="350px"> </a>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4 ">
                <a href="#"><img src="<?php echo base_url()?>img/karishma.jpg" alt="" width="300px" height="350px"> </a>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <a href="#"><img src="<?php echo base_url()?>img/angelia.jpg" alt="" width="300px" height="350px"> </a>
            </div>

            <div class="col-lg-4 col-sm-12">
                <a href="#"><img src="<?php echo base_url()?>img/varun.jpg" alt="" width="300px" height="350px"> </a>
            </div>
            <div class="col-lg-4 col-sm-12 ">
                <a href="#"><img src="<?php echo base_url()?>img/harnoor.jpg" alt="" width="300px" height="350px"> </a>
            </div>
            <div class="col-lg-4 col-sm-12">
                <a href="#"><img src="<?php echo base_url()?>img/sid.jpg" alt="" width="300px" height="350px"> </a>
            </div>
        </div>
    </div>
    <span id="cartchk"><button class="btn btn-outline-dark botn" data-toggle="modal" data-target="#myModal">your cart<i class="fas fa-shopping-cart"></i></button></span>

<?php $this->load->view('footer');?>


</body>
</html>