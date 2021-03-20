<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('links');?>
</head>
<body>
<?php $this->load->view('header');?>
    
    <p><br/></p>
    <p><br/></p>
    <p><br/></p>
    <div class="container-fluid">
    
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <h1>Thank You </h1>
                        <hr/>
                        <p>Hello <?php echo "<b>".$_SESSION["first_name"]."</b>"; ?>,Your payment process is 
                        successfully completed</b><br/>
                        you can continue your Shopping <br/></p><br>
                        <a href="<?=base_url()?>index.php/My_controller/clearSession" class="btn btn-success btn-lg">Continue Shopping</a>
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <br><br><br><br>
    <?php $this->load->view('footer');?>
</body>
</html>