<?php
session_start();
if(!(isset($_COOKIE['admin_id']) or isset($_COOKIE['vendor_id'])))
header("location:http://localhost/ci/index.php/My_controller/login");
include("assets/db/db.php");

if(isset($_POST['btn_save'])) 
{
    $cname=mysqli_real_escape_string($con, $_POST['cat_title']);

    $res=mysqli_query($con,"insert into categories(cat_title) values ('$cname')")or die("Query 213 23 is inncorrect..........");
    
    // header("location: productlist.php");
    header("location:category.php");
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
                <h5 class="title">Add Category</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Category Title</label>
                        <input type="text" id="cat_title" required name="cat_title" class="form-control" >
                      </div>
                    </div>
                    <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Add Category</button>
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