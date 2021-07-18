<?php

//Connection to DB
require_once '../config.php';
$table = 'post';

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Css -->
      <link rel="stylesheet" href="../css/style.css">
       <!-- font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">

    <title>Dashboard</title>
</head>
<body>
  <div class="wrapper-dash">

  <header class="header">
     <p class="header-title">Dashboard > <span class="current-dashboard">Products</span></p>
     <p class="header-user">Maurice Jahbless  <a href="../login.php">Logout</a></p>
    
  </header>

  <div class="wrapper-dash-div">
  <!-- Sidebar -->
  <div class="sidebar">
    <p class="add__product"><span><a href="../users/add_product.php" class='add'><i class='fa fa-plus'> </i>  Add Product </a></span> </p>
    <p class="view__products"><span><a href="" class='view'><i class='fa fa-th'></i> All Products </a></span> </p>
    <p class="logout"><span><a href="../index.php" class='view'><i class='fa fa-sign-out'></i> Logout </a></span> </p>
  </div>

  <!-- Products section -->
  <section class ="products">
    <div class="products__00">
       <div class="products__00-img">
         <img src="../img/food-00.png" alt="pix-img">
       </div>
       <p class="products__00-name">Rice</p>
       <p class="products__00-price">$2.00</p>
       <ul class = 'action'>
        <li> 
        <a href="" class='update'><i class='fa fa-pencil btn'></i> </a>
        <a href="" class='delete'><i class='fa fa-trash btn' ></i> </a>
        </li>
    </ul>
    </div>


      <!-- to display all -->
  <?php
  $sql = "SELECT *  FROM $table";
 $result = $conn->query($sql) or die($conn->error);

  while($data = $result->fetch_assoc()){


    ?>



  <div class="products__01">
<div class="products__01-img">
  <img src="../img/food-002.png" alt="pix-img">
</div>
<p class="products__01-name"><?php echo $data['name']; ?></p>
<p class="products__01-price"><?php echo $data['price']; ?></p>
<ul class = 'action'>
 <li> 
 <a href="" class='update'><i class='fa fa-pencil btn'></i> </a>
 <a href="" class='delete'><i class='fa fa-trash btn' ></i> </a>
 </li>
</ul>
</div>

<?php

  }

?>



<!-- end -->

  </section>
   
  
  
  </div>
  
  
  
  
  
  </div>




    
</body>
</html>