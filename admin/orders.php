
    <?php
session_start();
if(!(isset($_COOKIE['admin_id']) or isset($_COOKIE['vendor_id'])))
header("location:http://localhost/ci/index.php/My_controller/login");
include("assets/db/db.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($con,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
} 

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='updateDelivery')
{
  $ord_pro_id=$_GET['orderproid'];
  $result=mysqli_query($con,"select delivery_status from order_products where order_pro_id='$ord_pro_id'") or die("query 3 is incorrect........");
  list($d_status)=mysqli_fetch_array($result);
  if($d_status==0)
  {
    mysqli_query($con,"update order_products set delivery_status=1 where order_pro_id='$ord_pro_id'")or die("Query 4 is inncorrect..........");
  } 
  else
    mysqli_query($con,"update order_products set delivery_status=0 where order_pro_id='$ord_pro_id'")or die("Query 5 is inncorrect..........");
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
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Orders /page:<?=$page?></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>SR.no</th><th>Customer Name</th><th>Products</th><th>Contact | Email</th><th >Address</th><th>Details</th><th>Quantity</th><th>Amount</th><th>&nbsp&nbsp&nbspTime</th><th>Delivery Status</th><?php echo isset($_COOKIE['vendor_id'])!=NULL ? '<th>Delivery update</th>' : ""  ?>
                    </tr></thead>
                    <tbody>
                      <?php 
                      if(isset($_COOKIE['vendor_id']))
                        $result=mysqli_query($con,"sELECT orders_info.order_id,products.product_title,user_info.first_name,user_info.mobile,user_info.email,orders_info.address,orders_info.payement_type,orders_info.zip,orders_info.order_time,order_products.qty,order_products.Delivery_status,order_products.order_pro_id,order_products.amt FROM orders_info,user_info,order_products, products WHERE products.product_id=order_products.product_id and orders_info.order_id=order_products.order_id and user_info.user_id=orders_info.user_id and products.vendor_id=".$_COOKIE['vendor_id']." ORDER BY orders_info.order_time DESC Limit $page1,10")or die ("query 1 incorrect.....");
                      else
                      $result=mysqli_query($con,"sELECT orders_info.order_id,products.product_title,user_info.first_name,user_info.mobile,user_info.email,orders_info.address,orders_info.payement_type,orders_info.zip,orders_info.order_time,order_products.qty,order_products.Delivery_status,order_products.order_pro_id,order_products.amt FROM orders_info,user_info,order_products, products WHERE products.product_id=order_products.product_id and orders_info.order_id=order_products.order_id and user_info.user_id=orders_info.user_id ORDER BY orders_info.order_time DESC Limit $page1,10")or die ("query 1 incorrect.....");
                      static $i=1;
                        while(list($order_id,$p_names,$cus_name,$contact_no,$email,$address,$details,$zip_code,$time,$quantity,$delivery,$orderproid,$amt)=mysqli_fetch_array($result))
                        {	
                          ?>
                        <tr><td><?=$i?></td>
                        <td><?=$cus_name?></td><td><?=$p_names?></td><td><?=$email?><br><?=$contact_no?></td><td><?=$address?><br>ZIP: <?=$zip_code?></td><td><?=$details?></td><td><?=$quantity?></td><td><?=$amt?></td><td><?=$time?></td><td><?=$delivery==0?'Processing<br> Order':'Delivered'?></td>
                        
                        <?php 
                        if(isset($_COOKIE['vendor_id']))
                        {
                        ?>
                        <td>
                        <a href='orders.php?orderproid=<?=$orderproid?>&action=updateDelivery' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Change Delivery Status'>
                        <i class='material-icons'>local_shipping</i>
                        </td>
                        <?php
                        }
                        echo "</tr>";
                        
                        $i++;
                        }
                        ?>
                        <!-- <td>
                        <a class=' btn btn-danger' href='orders.php?order_id=$order_id&action=delete'>Delete</a>
                        </td> -->
                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center ">
                <li class="page-item">
                  <a class="page-link" href="orders.php?page=<?php echo $page>1?$page-1:1;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging
                if(isset($_COOKIE['vendor_id']))
                  $paging=mysqli_query($con,"sELECT * FROM orders_info,user_info,order_products, products WHERE products.product_id=order_products.product_id and orders_info.order_id=order_products.order_id and user_info.user_id=orders_info.user_id and products.vendor_id=".$_COOKIE['vendor_id']);
                else
                  $paging=mysqli_query($con,"select * from order_products");
                        
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="orders.php?page=<?php echo $b;?>"><font size=4 ><?php echo $b." ";?></font></a></li>
                <?php	
                  }
                  ?>
                <li class="page-item">
                  <a class="page-link" href="orders.php?page=<?php echo $page<$a?$page+1:$a;?>" aria-label="Next">
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