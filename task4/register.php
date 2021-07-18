<?php

// Start the session
session_start();

//Connection to DB
require_once 'config.php';

//declare variables
$firstname = $lastname = $email = $password = $cpassword = "";
$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $cpasswordErr = "";

//check information by the user
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(empty($_POST['firstname'])){
    $firstnameErr = "Firstname is Required";
  } else{
    $firstname = test_input($_POST['firstname']);

     // Set session variables
     $_SESSION["firstname"] = $firstname;
 
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white spaces are allowed";
    }
  }

//LAstname===============
  if(empty($_POST['lastname'])){
    $lastnameErr = "Lastname is Required ";
} else{
    $lastname = test_input($_POST['lastname']);
          // check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
    $lastnameErr = "Only letters and white space allowed";
  } 
  
   // Set session variables
   $_SESSION["lastname"] = $lastname;
}


///Email
if(empty($_POST['email'])){
  $emailErr = "Email is required";
} else{
  $email = test_input($_POST['email']);

  // check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}
 //Check for availbality of email
 $sql = "SELECT email FROM users WHERE email = '$email'";
 $result = $conn->query($sql);
 if($result->num_rows>0){
  $emailErr = "Email Exists";
 }

}


// for the password
if(empty($_POST['password'])){
  $passwordErr = "Password is Required";
} else{
  $password = test_input($_POST['password']);
}

// for the password
if(empty($_POST['cpassword'])){
  $cpasswordErr = "Confirm your Password";
} else{
  $cpassword = test_input($_POST['cpassword']);

  if($password !== $cpassword){
    $cpasswordErr = "Password does not match";
  }
}


if($firstnameErr == "" && $lastnameErr =="" && $emailErr == "" && $passwordErr=="" && $cpasswordErr =="" ){
  //insert into database

  $sql = "INSERT INTO users (firstname, lastname, email, user_password) VALUES ('$firstname', '$lastname', '$email', '$password')";
  $result = $conn->query($sql);

 

  if($result===True){
    
    echo "<script> alert('Your details have been taken') </script>";
    echo "redirecting...";
  }else{
    echo "<script> alert('Unable to create account') </script>";
  }
  header("Refresh:1; url= index.php");
  exit();
} 

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

    <title>Register</title>
</head>
<body>

  <div class="wrapper">

    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
    <h2 class="heading">Register</h2>

    <label for="firstname">
    <span class="error"> <?php echo $firstnameErr;?>
      <input type="text" name="firstname" id="firstname" placeholder="Firstname" value="<?php echo $firstname ?>">
    </label>

    <label for="lastname">
    <span class="error">  <?php echo $lastnameErr;?>
      <input type="text" name="lastname" id="lastname" placeholder="Lastname" value="<?php echo $lastname ?>">
    </label>


    <label for="email">
    <span class="error">  <?php echo $emailErr;?>
      <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email ?>">
    </label>

    <label for="password">
    <span class="error"> <?php echo $passwordErr;?>
      <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $password?>">
    </label>

    <label for="cpassword">
    <span class="error"> <?php echo $cpasswordErr;?>
      <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" value="<?php echo $cpassword ?>" >
    </label>

    <input type="submit" value="Register" name="submit">
    
    <p> Have an account? <span class="link"> <a href="index.php">Login Here.</a> </span> </p>
    </form>
  
  
  
  
  
  
  
  </div>
    
</body>
</html>