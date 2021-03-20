<?php
session_start();
if(!(isset($_COOKIE['admin_id']) or isset($_COOKIE['vendor_id'])))
header("location:http://localhost/ci/index.php/My_controller/login");
include("assets/db/db.php");
error_reporting(0);


///pagination

$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        
        <!-- SELECT brands.brand_title,COUNT(products.product_id) from brands,products WHERE brands.brand_id=products.product_brand and brands.brand_id=3 -->
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Brands List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Brand Name</th><th>Product   &nbsp&nbsp  Count</th><th>&nbsp&nbsp&nbsp&nbsp&nbsp
	<a class=" btn btn-primary" href="addBrand.php">Add New</a></th></tr></thead>
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
        
                          ?>

                        <tr>
                            <td><?=$brand_title?></td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?=$brand_count?></td>
                        <td>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href='editbrand.php?Brand_id=<?=$brand_id?>' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit Brand'>
                        <i class='material-icons'>edit</i>
                      
                        </td></tr>
                        
                        <?php
                        }
                      }
                      else
                      {
                        $result2=mysqli_query($con,"select brands.brand_id FROM brands Limit $page1,10")or die ("query 2  incorrect.....");
                        //   list($product_id,$image,$product_name,$price,$stock)=mysqli_fetch_array($result)
                        while(list($bid)=mysqli_fetch_array($result2))
                        {
                            $result=mysqli_query($con,"select brands.brand_title,COUNT(products.product_id) from brands,products WHERE brands.brand_id=products.product_brand and brands.brand_id=".$bid);
                            list($bname,$bcount)=mysqli_fetch_array($result);
                          ?>

                        <tr>
                            <td><?=$bname?></td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?=$bcount?></td>
                        <td>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href='editbrand.php?Brand_id=<?=$bid?>' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit Brand'>
                        <i class='material-icons'>edit</i>
                      
                        </td></tr>
                        
                        <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center ">
                <li class="page-item">
                <a class="page-link" href="brand.php?page=<?php echo $page>1?$page-1:1;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging
            
                $paging=mysqli_query($con,"select brand_id from brands");
                $count=mysqli_num_rows($paging);
                $a=$count/10;
                $a=ceil($a);
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="brand.php?page=<?php echo $b;?>"><font size=4 ><?php echo $b." ";?></font></a></li>
                <?php	
                  }
                  ?>
                <li class="page-item">
                  <a class="page-link" href="brand.php?page=<?php echo $page<$a?$page+1:$a;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <?php
include "footer.php";
?>