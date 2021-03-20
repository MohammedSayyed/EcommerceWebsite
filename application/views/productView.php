<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('links');?>

    <style>
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
    </style>
</head>


<body>
<?php $this->load->view('header');?>
<br>
<br>
<br>
<br>

<br>
<br>
<?php
    if(isset($result[0]))
    {
?>
<div class="row" >

    <?php foreach($result as $row): ?>
        <div class="col-sm-3">
            <div class="col-item">
                <div class="photo">
                    <img src="<?php echo base_url()?>product images/<?=$row['product_image']?>" class="img-responsive img" alt="a" />
                </div>
                <div class="info">
                    <div class="row">
                        <div class="price col-md-6">
                            <h5><b>
							<?=$row['product_title']?></b></h5><br>
							<h6 style="font-size:16px;">
							<?=$row['product_desc']?></h6><br>
                            <h5 class="price-text-color">
							₹<?=$row['product_price']?></h5>
                        </div>
                        <div class="rating hidden-sm col-md-6">
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
		<?php endforeach; ?>

    </div>
    <?php 
    }
else
    echo '<br><br><br><br><h1 style="text-align:center;">Product currently not available!<h1><br><br><br><br><br><br>';
?>

    <!--DIVISION OF ITEMS-->
    <!-- <div class="container division">
        <div class="row">
           -->
            <?php //foreach($result as $row): ?>
                <!-- <div class="col-md-3">
                <img src="<?php echo base_url()?>product images/<?=$row['product_image']?>" alt="..." class="img-thumbnail mt-5">
                <h5><?=$row['product_title']?></h5>
                <h6><?=$row['product_desc']?></h6>
                <h6>₹<?=$row['product_price']?></h6>
                </div> -->
            <?php //endforeach; ?>
            
            <!-- </div>
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div>
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div>
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div>
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div>
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div>
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div>
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div>
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div>
            <div class="col-md-3">
                <img src="<?php echo base_url()?>img/varun.jpg" alt="..." class="img-thumbnail mt-5">
                <h5>Clothe Type</h5>
                <h6>product description in one line</h6>
                <h6>price</h6>
            </div> -->
        <!-- </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-5">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div> -->
    <br>
<br>
<br>
<br>

<br>
<br>

    <?php $this->load->view('footer');?>
    
</body>

</html>
<?php 
    if(isset($_SESSION['cartSuccess']) && $_SESSION['cartSuccess']==1)
    {
        unset($_SESSION['cartSuccess']);
        echo '<script type="text/JavaScript">  
                alert("The Product is added successfully!!"); 
                </script>'; 
        
    }
    elseif(isset($_SESSION['cartSuccess']) && $_SESSION['cartSuccess']==2)
    {
        unset($_SESSION['cartSuccess']);
        echo '<script type="text/JavaScript">  
                alert("The Product Stock is not curently available!!"); 
                </script>';
    }

?>