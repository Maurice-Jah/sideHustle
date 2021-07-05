<?php

session_start();


 $passwordLogin = $emailLogin = "";
 $emailLoginErr = $passwordLoginErr = "";

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     if(empty($_POST['emailLogin'])){
        $emailLoginErr = "Email in required";
     } else{
         $emailLogin = test_input($_POST['emailLogin']);
             // check if e-mail address is well-formed
    if (!filter_var($emailLogin, FILTER_VALIDATE_EMAIL)) {
        $emailLoginErr = "Invalid email format";
      }
     }

     if(empty($_POST['passwordLogin'])){
         $passwordLoginErr = "Password is required";
     } else{
         $passwordLogin = test_input($_POST['passwordLogin']);
     }

     //To confirm the password and email
    if(($emailLoginErr == "" && $emailLogin == $_SESSION['email']) && ($passwordLoginErr=="" && $passwordLogin == $_SESSION['password'])){
        header('Location: welcome.php');
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
    <title>Login</title>



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

<h1>Login</h1>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<label for="email">Email <p>
   <input type="text" name="emailLogin" id= "email" placeholder = "Enter your Email"> <span class="error">* <?php echo $emailLoginErr;?></span>
   </p>
   </label>

  
   <label for="password">Password <p>
   <input type="password" name="passwordLogin" id= "password"  placeholder = "Enter your password"> <span class="error">* <?php echo $passwordLoginErr;?></span>
    </p>
   </label>

   <p> <input type="submit" value="submit" name="submit">  </p>

   </form>
    
</body>
</html>