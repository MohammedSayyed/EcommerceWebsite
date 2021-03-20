<!doctype html>
<html lang="en">

<head>
  <title>Admin</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="assets/css/Material+Icons.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="assets/css/black-dashboard.css" rel="stylesheet" />
  <style>
  .navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%; /* Full width */
  }
  </style>
</head>

<body class="dark-edition">
  <div class="wrapper ">
     <div class="sidebar" data-color="orange" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
  
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="3a8db1f4-24d8-4dbf-85c9-4f5215c1b29a">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="productlist.php">
              <i class="material-icons">list</i>
              <p>Product List</p>
            </a>
            
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="orders.php">
              <i class="material-icons">library_books</i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="addproduct.php">
              <i class="material-icons">add</i>
              <p>Add Products</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="brand.php">
              <i class="material-icons">apps</i>
              <p>Brands</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="category.php">
              <i class="material-icons">category</i>
              <p>category</p>
            </a>
          </li>
          
          <?php if($_COOKIE['flag']==1)
          {
          ?>
          <li class="nav-item ">
            <a class="nav-link" href="adduser.php">
              <i class="material-icons">person</i>
              <p>Add vendor</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="manageuser.php">
              <i class="material-icons">edit_user</i>
              <p>Manage User</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="managevendor.php">
              <i class="material-icons">edit_user</i>
              <p>Manage Vendor</p>
            </a>
          </li>
          <?php
          }
          ?>
          <li class="nav-item ">
            <a class="nav-link" href="logout.php">
              <i class="material-icons">logout</i>
              <p>Logout</p>
            </a>
          </li>
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    
    