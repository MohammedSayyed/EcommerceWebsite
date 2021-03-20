<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('links');?>
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
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <a href="#"><img src="<?php echo base_url()?>img/fabindia.jpg" alt="" width="300px" height="350px"> </a>
            </div>
            <div class="col-lg-4 col-sm-12  justify-content-center">
                <a href="#"><img src="<?php echo base_url()?>img/bush.jpg" alt="" width="300px" height="350px"> </a>
            </div>
            <div class="col-lg-4 col-sm-12 justify-content-center">
                <a href="#"><img src="<?php echo base_url()?>img/global.jpg" alt="" width="300px" height="350px"> </a>
            </div>
            <div class="col-lg-4 col-sm-12">
                <a href="#"><img src="<?php echo base_url()?>img/toteteca.jpg" alt="" width="300px" height="350px"> </a>
            </div>
            <div class="col-lg-4 col-sm-12  justify-content-center">
                <a href="#"><img src="<?php echo base_url()?>img/JACK&JONES.jpg" alt="" width="300px" height="350px"> </a>
            </div>
            <div class="col-lg-4 col-sm-12 justify-content-center">
                <a href="#"><img src="<?php echo base_url()?>img/roadster.jpg" alt="" width="300px" height="350px"> </a>
            </div>
        </div>
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

    <?php $this->load->view('footer');?>
   
</body>

</html>