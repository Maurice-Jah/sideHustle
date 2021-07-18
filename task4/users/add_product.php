<?php

// Start the session
session_start();

//Connection to DB
require_once '../config.php';

//declare variables
$price = $textarea ="" ;
$priceErr ="";

//check information by the user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['price'])) {
        $priceErr = "price is Required";
    } else {
        $price = test_input($_POST['price']);

  
 
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $price)) {
            $priceErr = "Only letters and white spaces are allowed";
        }
    }
}

// if($priceErr== ""  ){
//   //insert into database

// //   $sql = "INSERT INTO users (firstname, lastname, email, user_password) VALUES ('$firstname', '$lastname', '$email', '$password')";
// //   $result = $conn->query($sql);

 

//   if($result===True){
    
//     echo "<script> alert('Your details have been taken') </script>";
//     echo "redirecting...";
//   }else{
//     echo "<script> alert('Unable to create account') </script>";
//   }
//   header("Refresh:1; url= login.php");
//   exit();
// } 

// }







//To clean the data
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




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

    <title>Register</title>

    <style>
        textarea{
            width: 100%;
            padding: 10px 20px;
            margin: 20px auto;
            border-radius: 100px;
            outline: none;
        }

        input[type='file']{
            outline: none;
            /* background-color: red; */
            /* border: none; */
        }

    </style>
</head>
<body>

  <div class="wrapper">

    <!-- <form action="" method="POST" enctype="multipart/form-data"> -->

    <form action="../upload.php" method="POST" enctype="multipart/form-data">
    <h2 class="heading">ADD A PRODUCT</h2>

    <input type="file" name="file" id="file">

    <textarea name="textarea" id="textarea" placeholder="Name of product..."></textarea>

     <label for="price">
      <span class="error"> <?php echo $priceErr;?>
      <input type="text" name="price" id="price" placeholder="Price">
    </label>


    <input type="submit" value="ADD" name="submit">

    </form>
  
  
  
  
  
  
  
  </div>
    
</body>
</html>