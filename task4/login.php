<?php
// 

// Start the session
session_start();

//Connection to DB
require_once 'config.php';

//declare variables
$email = $password = "";
$emailErr = $passwordErr =  "";

//check information by the user
if($_SERVER['REQUEST_METHOD'] == 'POST'){

///Email
if(empty($_POST['email'])){
  $emailErr = "Email is required";
} else{
  $email = test_input($_POST['email']);

  // check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}
}

// for the password
if(empty($_POST['password'])){
  $passwordErr = "Password is Required";
} else{
  // $password = test_input (password_hash($_POST['password'],PASSWORD_DEFAULT));
  $password = test_input ($_POST['password']);
  $token = bin2hex(random_bytes(50));  //generates random link of 100 variables
  $verified = false;
}

if ($emailErr == "" && $passwordErr=="") {
    //Check if email and password matches
    $sql = "SELECT * FROM  users WHERE email = '$email' and user_password = '$password'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
          echo "<script> alert('Successfully Logged in') </script>";

          header("Refresh:0; url= users/dashboard.php");
         

    } else{
      $emailErr = "Email or Password Does not match!";
    }
    

}

//   if($result===True){
    
//     echo "<script> alert('Your details have been taken') </script>";
//     echo "redirecting...";
//   }else{
//     echo "<script> alert('Unable to create account') </script>";
//   }
//   header("Refresh:1; url= login.php");
//   exit();
// } 

}







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
     <link rel="stylesheet" href="css/style.css">
     <!-- font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">


    <title>Login</title>
</head>
<body>

<div class="wrapper">


<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<h2 class='heading'>Login</h2>

  <label for="email">
  <span class="error">  <?php echo $emailErr;?>
   <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email ?>">
  </label>

  <label for="password">
  <span class="error"> <?php echo $passwordErr;?>
  <input type="password" name="password" id="password" placeholder="Password">
  </label>

  <input type="submit" value="Login" name="login">

  <p> Don't have an account? <span class="link"><a href="register.php">Register Here.</a></span> </p>

  <p class="forgot-password"> <a href="reset_link.php"> Forgot Password?</a> </p>



  </form>

  

</div>
    
</body>
</html>