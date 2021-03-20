 <?php
session_start();
if(!(isset($_COOKIE['admin_id']) or isset($_COOKIE['vendor_id'])))
  header("location:http://localhost/ci/index.php/My_controller/login");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include("assets/db/db.php");
include "sidenav.php";
include "topheader.php";
if(isset($_POST['btn_save']))
{
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$user_password=md5($_POST['password']);
$mobile=$_POST['phone'];
$address1=$_POST['city'];
$address2=$_POST['country'];

$res=mysqli_query($con,"insert into vendor_info(first_name, last_name,email,password,mobile,address1,address2) values ('$first_name','$last_name','$email','$user_password','$mobile','$address1','$address2')") 
			or die ("Query 1 is inncorrect........");
// header("location: manageusers.php"); 
// header("location: sumit_form.php?success=1");


mysqli_close($con);
}


?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
        <?php if($res) echo "<h1 style='color:#0C0'>Vendor was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";?>
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Vendors</h4>
                  <p class="card-category">Complete Vendor profile</p>
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" style="font-size:15px" id="first_name" name="first_name" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" style="font-size:15px" name="last_name" id="last_name"  class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">phone number</label>
                          <input type="text" style="font-size:15px" id="phone" name="phone" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" style="font-size:15px" name="city" id="city"  class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" style="font-size:15px" name="country" id="country" class="form-control" required>
                        </div>
                      </div>
                      
                    </div>
                    
                    <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">ADD vendor</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <?php
include "footer.php";
?>