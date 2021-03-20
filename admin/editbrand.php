<?php
session_start();
if(!(isset($_COOKIE['admin_id']) or isset($_COOKIE['vendor_id'])))
header("location:http://localhost/ci/index.php/My_controller/login");
include("assets/db/db.php");
$bid=$_REQUEST['Brand_id'];

$result=mysqli_query($con,"select brands.brand_title from brands where brand_id=".$bid)or die ("query 1 incorrect.......");

list($brand)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
    $bname=$_POST['brand_title'];
    mysqli_query($con,"update brands set brand_title='".$bname."' where brand_id=".$bid)or die("Query 3 is inncorrect..........");
    
    // header("location: productlist.php");
    header("location:brand.php");
    mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>

     <!-- End Navbar -->
     <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Update Brand</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Brand Title</label>
                        <input type="text" id="brand_title" required name="brand_title" value='<?=$brand?>' class="form-control">
                      </div>
                    </div>
                    <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Brand</button>
              </div>
                  </div>
              </div>
            </div>
          </div>
          
              
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
      <?php
include "footer.php";
?>