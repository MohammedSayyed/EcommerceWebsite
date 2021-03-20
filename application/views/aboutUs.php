<html>
<head>
<?php $this->load->view('links');?> 
<style>
.aboutdes{
    margin:60px 0px 0px 0px;
    padding:150px;
    display:flex;
    justify-content:center;
}
.aboutdes1{
    display:flex;
    justify-content:center;

}
.cardabout{

    display:flex;
    justify-content:center;
    align-items:center;
}
</style>
</head>
<body>
<?php $this->load->view('header');?>    
    <div class="aboutdes bg-light">
        <h1 class="text-primary font-weight-bold">About Us</h1>   
    </div>
    <div class="aboutdes1">
    <h2 class="text-dark">share some good information about the Azam Deal </h2><br>
    </div>
    <div class="aboutdes1">
    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>

    </div>

    <hr>
    <div class=" aboutdes1 bg-dark">
        <h2 class="text-light font-weight-bold">Our Development Team</h2>    
    </div>

<div class="row">
    <div class="container">
        <div class="col-md-4">
            <div class="cardabout m-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url()?>img/member.png" class="card-img-top" alt="..." style="height:265px">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-primary">Prof.Khan Kamil</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                </div>
            </div>  
        </div>

        <div class="col-md-4">
            <div class="cardabout m-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url()?>img/members/khalid.jpg" class="card-img-top" alt="..." style="height:265px" style="height:265px">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-primary">Prof.Khalid Arshad</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                </div>
            </div>  
        </div>

        <div class="col-md-4">
            <div class="cardabout m-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url()?>img/member.png" class="card-img-top" alt="..." style="height:265px">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-primary">Shaikh Zahid</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

<!-- <div class="col-md-3">

    <div class="cardabout m-3">
    <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url()?>img/members/esmat.jpg" class="card-img-top" alt="..." style="height:265px">
            <div class="card-body">
            <h5 class="card-title font-weight-bold text-primary">Esmatullah Hashimi</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
    </div>
    </div>



<div class="col-md-3">
<div class="cardabout m-3">
    <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url()?>img/members/hakem.jpg" class="card-img-top" alt="..." style="height:265px">
            <div class="card-body">
            <h5 class="card-title font-weight-bold text-primary">Abdul Hakem Atai</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
    </div>
    </div>
</div>

<div class="col-md-3">
<div class="cardabout m-3">
    <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url()?>img/member.png" class="card-img-top" alt="..." style="height:265px">
            <div class="card-body">
            <h5 class="card-title font-weight-bold text-primary">Mohammad Sayed</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
    </div>
    </div>
</div>

<div class="col-md-3">
<div class="cardabout m-3">
    <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url()?>img/member.png" class="card-img-top" alt="..." style="height:265px">
            <div class="card-body">
            <h5 class="card-title font-weight-bold text-primary">Sasane Joel</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
    </div>
    </div>
</div> -->
<div class="container">
        <div class="col-md-3">
            <div class="cardabout m-4">
                <div class="card" style="width: 18rem;">
                <img src="<?php echo base_url()?>img/members/hakem.jpg" class="card-img-top" alt="..." style="height:265px">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Abdul Hakem Atai</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>  
        </div>

        <div class="col-md-3">
            <div class="cardabout m-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url()?>img/member.png" class="card-img-top" alt="..." style="height:265px">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-primary">Mohammed Sayyed</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                </div>
            </div>  
        </div>

        <div class="col-md-3">
            <div class="cardabout m-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url()?>img/member.png" class="card-img-top" alt="..." style="height:265px">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-primary">Sasane Joel</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="cardabout m-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url()?>img/member.png" class="card-img-top" alt="..." style="height:265px">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-primary">Esmatulla Farjad</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>






</body>
<?php $this->load->view('footer');?>
</html>
