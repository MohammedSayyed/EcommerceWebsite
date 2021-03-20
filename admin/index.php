
    <?php
session_start();
if(!(isset($_COOKIE['admin_id']) or isset($_COOKIE['vendor_id'])))
  // die("Direct Access not permitted!!");
  header("location:http://localhost/ci/index.php/My_controller/login");
include("assets/db/db.php");

include "topheader.php";
include "sidenav.php";

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="panel-body">
		<a>
            <?php  //success message
            if(isset($_POST['success']))
            {
              $success = $_POST["success"];
              if($success==1)
                // echo $success;
                {
                  echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
                  unset($success);
                }
                else if($success==2)
                  {
                    echo "<h1 style='color:#0C0'>Your Product was updated successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
                    unset($success);    
                  }
            }
            ?></a>
                </div>
                <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Users List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Email</th><th>Password</th><th>Contact</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                      if(isset($_COOKIE['vendor_id']))                      
                        $result=mysqli_query($con,"select DISTINCT user_info.* FROM user_info, orders_info,order_products,products where orders_info.order_id=order_products.order_id and products.product_id=order_products.product_id and user_info.user_id=orders_info.user_id and products.vendor_id=".$_COOKIE['vendor_id'])or die ("query 1 incorrect.....");
                      else
                        $result=mysqli_query($con,"select * from user_info");
                      $i=1;
                      while(list($user_id,$first_name,$last_name,$email,$password,$phone,$address1,$address2)=mysqli_fetch_array($result))
                      {	
                      echo "<tr><td>$i</td><td>$first_name</td><td>$last_name</td><td>$email</td><td>".md5($password)."</td><td>$phone</td>
                      
                      </tr>";
                      $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Categories List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Categories</th><th>Count</th>
                    </tr></thead>
                    <tbody>
                      <?php
                      if (isset($_COOKIE['vendor_id']))
                      {
                        $result=mysqli_query($con,"select categories.cat_id from categories")or die ("query 1 incorrect.....");
                        $i=1;
                        while(list($cat_id)=mysqli_fetch_array($result))
                        {	
                          $result2=mysqli_query($con,"select categories.cat_title, COUNT(products.product_id) FROM products,categories WHERE categories.cat_id=products.product_cat and categories.cat_id=$cat_id and products.vendor_id=".$_COOKIE['vendor_id']) or die("Query 2 incorrect.....");
                          list($cat_title,$cat_count)=mysqli_fetch_array($result2);
                          if($cat_count==0)
                            continue;
                          echo "<tr><td>$cat_id</td><td>$cat_title</td><td>$cat_count</td></tr>";
                        }
                      }
                      else
                      {
                        $result=mysqli_query($con,"select * from categories")or die ("query 1 incorrect.....");
                        $i=1;
                        while(list($cat_id,$cat_title)=mysqli_fetch_array($result))
                        {	
                            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
                            $query = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($query);
                            $count=$row["count_items"];
                            
                            if($count==0)
                            continue;
                            echo "<tr><td>$i</td><td>$cat_title</td><td>$count</td></tr>";
                            $i++;
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Brands List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Brands</th><th>Count</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                      if (isset($_COOKIE['vendor_id']))
                      {
                        $result=mysqli_query($con,"select brand_id from brands")or die ("query 1 incorrect.....");
                        $i=1;
                        while(list($brand_id)=mysqli_fetch_array($result))
                        {	
                          $result2=mysqli_query($con,"select brands.brand_title,COUNT(products.product_id) FROM products,brands WHERE brands.brand_id=products.product_brand and brands.brand_id=$brand_id and products.vendor_id=".$_COOKIE['vendor_id']) or die("Query 2 incorrect.....");
                          list($brand_title,$brand_count)=mysqli_fetch_array($result2);
                          if($brand_count==0)
                            continue;
                          echo "<tr><td>$i</td><td>$brand_title</td><td>$brand_count</td></tr>";
                          $i++;
                        }
                      }
                      else
                      {
                        $result=mysqli_query($con,"select * from brands")or die ("query 1 incorrect.....");
                        $i=1;
                        while(list($brand_id,$brand_title)=mysqli_fetch_array($result))
                        {	
                            
                            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
                            $query = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($query);
                            $count=$row["count_items"];

                            if($count==0)
                              continue; 
                            
                        echo "<tr><td>$i</td><td>$brand_title</td><td>$count</td></tr>";
                        $i++;  
                        }

                        }
                        ?>
                      </tbody>
                    </table>
                  <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                </div>
              </div>
            </div>
            </div>
            
        </div>
        <?php
  include "footer.php";
?>