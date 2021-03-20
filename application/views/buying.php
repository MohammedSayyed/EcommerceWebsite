<!DOCTYPE html>
<html>

<head>
<?php $this->load->view('links');?>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <!-- <script src="<?php //echo base_url('assets/js/jquery-3.4.1.js'); ?>"></script> -->
    <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/css/version.css'); ?>"> -->
    <!-- <script src="<?php //echo base_url('assets/js/bootstrap.min.js'); ?>"></script> -->
   <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->
    <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/css/bootstrap.min.css'); ?>"> -->
    <!--<link rel="stylesheet" href=".\fontawesome-free-5.12.0-web\css\all.css">-->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <style>
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
[data-slide="prev"]
{
    margin-right: 10px;
}
    </style>

</head>

<body>
<?php $this->load->view('header');?>




    <!--DIVISION OF ITEMS-->
    <div class="division-buying">
<?php
foreach($result as $row)
{
?>
        <div class="row">

            <div class="col-md-7">
            <div class="container col-9">
            <img src="<?php echo base_url()?>product images/<?=$row['product_image']?>" alt="..." height="421" width="350" class="img-thumbnail m-1" style="height:350px; width:auto;" >
                <img src="<?php echo base_url()?>product images/<?=$row['product_image']?>" alt="..." height="421" width="350" class="img-thumbnail m-1" style="height:350px; width:auto;" >
                <img src="<?php echo base_url()?>product images/<?=$row['product_image']?>" alt="..." height="421" width="350" class="img-thumbnail m-1" style="height:350px; width:auto;" >
                <img src="<?php echo base_url()?>product images/<?=$row['product_image']?>" alt="..." height="421" width="350" class="img-thumbnail m-1" style="height:350px; width:auto;" >

            </div>
            </div>
            <div class="col-md-5 ">
                <div>
                    <h1>
                    <?=$row['brand_title']?>
                    </h1>
                    <h4 class="thiner"><?=$row['product_desc']?></h4>
                    <hr>
                    <h4>Rs.<?=$row['product_price']?></h4>
                    <h3 class="tax">inclusive of all taxes</h3>
                    <br>
                    <?php
                    if ($row['stock_status']==1)
                        echo "<h4 class='text-success'>IN STOCK</h4>";
                    else
                        echo "<h4 class='text-danger'>OUT OF STOCK</h4>";
                    ?>
                </div>
               

<?php
}
?>
        <?php if(strpos(strtolower($result[0]['cat_title']),"wear")!==false )
            {
          ?>
                 <div>
                   <h5>Select Size</h5>
                    <button class=" btn btn-outline-dark ml-1"><b> S</b></button>
                    <button class=" btn btn-outline-dark ml-1"><b> M</b></button>
                    <button class=" btn btn-outline-dark ml-1"><b> L</b></button>
                    <button class=" btn btn-outline-dark ml-1"><b> Xl</b></button>
                    <button class=" btn btn-outline-dark ml-1"><b> XXL</b></button>
                    <br>
                </div>
            <?php
            }
            ?>
                <div>
                    <a href="<?php echo base_url()?>index.php/My_controller/addCart/<?=$row['product_id']?>"><button class=" btn btn-dark mt-4" > <i class="fas fa-shopping-cart mr-3"></i>Add To Cart</button></a>
                    <a href="<?php echo base_url()?>index.php/My_controller/buyNow/<?=$row['product_id']?>"><button class=" btn btn-warning mt-4 ml-2"> <i class="fas fa-shopping-bag mr-3"></i><b>BUY NOW</b></button></a>
                </div>
                <hr>
                <DIV class="delivery">
                    <h4>DELIVERY OPTIONS <i class="fas fa-truck"></i></h4>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ENTER YOUR PIN CODE" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-dark mr-5" type="button" id="">CHECK</button>
                        </div>
                        <h6 class="font-weight-normal pintext">Please enter PIN code to check delivery time & Cash/Card on Delivery Availability</h6>
                    </div>
                    <div class="font-weight-normal">100% Original Products</div>
                    <div class="font-weight-normal">Free Delivery on order above <span>Rs.price</span> </div>
                    <div class="font-weight-normal">Cash on delivery might be available</div>
                    <div class="font-weight-normal">Easy 30 days returns and exchanges</div>
                    <div class="font-weight-normal">Try & Buy might be available</div><br>
                    <div class="font-weight-normal">Product Code: <span><?=$row['product_id']?></span> </div>
                    <div class="font-weight-normal">Sold by: <span><b><?=$row['first_name']?> <?=$row['last_name']?></b></span></div>
                    <!-- <div class="font-weight-bold textinfo"><span onClick="show()"> View Supplier Information</span></div> -->
                    <!-- <div id="tag" class="font-weight-normal wy-text-small"> </div><br>
                    <div class="font-weight-normal text-sm"> country or origin</div>
                    <div class="font-weight-normal pintext ">country name.....</div> -->

                </div>
            </div>
        </div>
        <script>
            function show() {
                var a = "information about supplier is shown here";
                document.getElementById("tag").innerHTML = a;
            }
        </script>
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