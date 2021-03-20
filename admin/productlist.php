 <?php
session_start();
if(!(isset($_COOKIE['admin_id']) or isset($_COOKIE['vendor_id'])))
header("location:http://localhost/ci/index.php/My_controller/login");
include("assets/db/db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$product_id=$_GET['product_id'];
///////picture delete/////////
$result=mysqli_query($con,"select product_image from products where product_id='$product_id'")
or die("query 1 is incorrect...");

list($picture)=mysqli_fetch_array($result);
$path="../product_images/$picture";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*this is delet query*/
mysqli_query($con,"delete from products where product_id='$product_id'")or die("query 2 is incorrect...");
header("location:".$_SERVER['HTTP_REFERER']);
}
elseif(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='updateStock')
{
  $product_id=$_GET['product_id'];
  $result=mysqli_query($con,"select stock_status from products where product_id='$product_id'") or die("query 3 is incorrect........");
  list($stock_status)=mysqli_fetch_array($result);
  if($stock_status==0)
  {
    mysqli_query($con,"update products set stock_status=1 where product_id='$product_id'")or die("Query 4 is inncorrect..........");
  } 
  else
    mysqli_query($con,"update products set stock_status=0 where product_id='$product_id'")or die("Query 5 is inncorrect..........");
    header("location:".$_SERVER['HTTP_REFERER']);

}

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
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Products List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Image</th><th>Name</th><th>Price</th><th>Stock Status</th><th>&nbsp&nbsp&nbsp&nbsp&nbsp
	<a class=" btn btn-primary" href="addproduct.php">Add New</a></th></tr></thead>
                    <tbody>
                      <?php 
                        if(isset($_COOKIE['vendor_id']))
                          $result=mysqli_query($con,"select product_id,product_image, product_title,product_price,stock_status from products where vendor_id=".$_COOKIE['vendor_id']." Limit $page1,10")or die ("query 1 incorrect.....");
                        else
                          $result=mysqli_query($con,"select product_id,product_image, product_title,product_price,stock_status from products Limit $page1,10")or die ("query 2  incorrect.....");

                        while(list($product_id,$image,$product_name,$price,$stock)=mysqli_fetch_array($result))
                        {
                          ?>

                        <tr><td><img src='../product images/<?=$image?>' style='width:50px; height:50px; border:groove #000'></td><td><?=$product_name?></td>
                        <td><?=$price?></td>
                        <?php
                        if($stock==1)
                          echo "<td class='text-success'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIn Stock</td>";
                        else
                          echo "<td class='text-danger'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOut of Stock</td>";
                        ?>
                        <td>
                        <a href='productlist.php?product_id=<?=$product_id?>&action=updateStock' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Change Stock Status'>
                        <i class='material-icons'>update</i>
                        <a href='editProduct.php?product_id=<?=$product_id?>' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit Product'>
                        <i class='material-icons'>edit</i>
                      <div class='ripple-container'></div></a>
                <a href='productlist.php?product_id=<?=$product_id?>&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete Product'>
                        <i class='material-icons'>close</i>
                      <div class='ripple-container'></div></a>
                        </td></tr>
                        
                        <?php
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
                  <a class="page-link" href="productlist.php?page=<?php echo $page>1?$page-1:1;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging
                if(isset($_COOKIE['vendor_id']))
                  $paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products where vendor_id=".$_COOKIE['vendor_id']);
                else
                  $paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products");
                        
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="productlist.php?page=<?php echo $b;?>"><font size=4 ><?php echo $b." ";?></font></a></li>
                <?php	
                  }
                  ?>
                <li class="page-item">
                  <a class="page-link" href="productlist.php?page=<?php echo $page<$a?$page+1:$a;?>" aria-label="Next">
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