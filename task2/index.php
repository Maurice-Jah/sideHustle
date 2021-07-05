<?php

// Start the session
session_start();


$firstname = $lastname = $password = $email = $gender = "";
$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $genderErr =  "";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['firstname'])){
        $firstnameErr = "Name is Required";
    }else{
        $firstname = test_input($_POST['firstname']);

        // Set session variables
        $_SESSION["firstname"] = $firstname;


         // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
        $firstnameErr = "Only letters and white space allowed";
      }  
    }

    if(empty($_POST['lastname'])){
        $lastnameErr = " ";
    } else{
        $lastname = test_input($_POST['lastname']);
              // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
        $lastnameErr = "Only letters and white space allowed";
      } 
      
       // Set session variables
       $_SESSION["lastname"] = $lastname;
    }

    
    if(empty($_POST['email'])){
        $emailErr = "Email is required";
    } else{
        $email = test_input($_POST['email']);

            // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
      
        // Set session variables
        $_SESSION["email"] = $email;
      
    }

// for the password
    if(empty($_POST['password'])){
        $passwordErr = "Password is Required";
    } else{
        $password = test_input($_POST['password']);
        
        // Set session variables
        $_SESSION["password"] = $password;
    }


    // To check for the gender
    if(empty($_POST['gender'])){
        $genderErr = "Gender is required";
    } else{
        $gender = test_input($_POST['gender']);
        
    }


    if( $firstnameErr == "" && ($lastnameErr =="" || $lastnameErr != "") && $emailErr == "" && $passwordErr=="" && $genderErr == "" ){
        header('Location: login.php');
        exit();
    }
   
}




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
    <title>Form</title>

    <style>
      body{
          background-color:powderblue;
      }

      .welcome_text{
          text-align:center;
      }

      .error{
          color:red;
      }

      form{
          padding: 40px;
          max-width:480px;
          margin:0 auto;
          border:2px solid #ccc;
      }

      input{
          padding: 10px 20px;
      }

      input[type ='submit']{
          background: red;
          color:white;
          border-radius: 5px;
          border:none;
      }

      input[type ='submit']:hover{
          cursor: pointer;
      }

    </style>
</head>
<body>

   <h1 class="welcome_text">Register Here</h1>
   <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

    <label for="firstname">FirstName <p>
   <input type="text" name="firstname" id="firstname" placeholder = "Enter your firstname"> <span class="error">* <?php echo $firstnameErr;?></span>
   </p>
   </label>
  


   <label for="lastname">LastName <p>
   <input type="text" name="lastname" id= "lastname" placeholder = "Enter your lastname"> <span class="error"> <?php echo $lastnameErr;?></span>
   </p>
   </label>


   <label for="email">Email <p>
   <input type="text" name="email" id= "email" placeholder = "Enter your Email"> <span class="error">* <?php echo $emailErr;?></span>
   </p>
   </label>

  
   <label for="password">Password <p>
   <input type="password" name="password" id= "password"  placeholder = "Enter your password"> <span class="error">* <?php echo $passwordErr;?></span>
    </p>
   </label>

  
   <label for="gender">Gender</label> 

   <label for="male">
    <input type="radio" name="gender" value="male" id="male"> male
    </label>

    
   <label for="female"> 
    <input type="radio" name="gender" value="female" id="female"> Female 
    <span class="error">* <?php echo $genderErr;?></span>
    
   <p> <input type="submit" value="submit" name="submit">  </p>
   </form>
    
</body>
</html>