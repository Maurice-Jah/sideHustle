<?php










// Start the session
session_start();

//Connection to DB
require_once 'config.php';

//declare variables
  $email ="";
  $emailErr ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // //Token to autheticate the user
  // $selector = bin2hex(random_bytes(8));
  // $token = random_bytes(32);

  // $url = "http://localhost:8090/sideHustle/task4/reset_password.php?selector" .$selector . "$validator=" . bin2hex($token);
  // //Expiry date for the token
  // $expires = date('U') + 1800;

  ///Email
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST['email']);
        //delete all token to this mail

        // $sql = "DELETE FROM pwdRest WHERE pwdResetEmail = ?";
        // $stmt = $conn->prepare($sql);

        // if(!$stmt){
        //   echo "There was an error";
        //   exit();
        // } else{
        //   $stmt->bind_param("s", $email);
        //   $stmt->execute();
        // }
  
        // $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";

        // if(!$stmt){
        //   echo "There was an error";
        //   exit();
        // } else{
        //   $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        //   $stmt->bind_param("ssss", $email, $selector, $hashedToken, $expires);
        //   $stmt->execute();
        // }
  
        // $stmt->close();
        // $conn->close();

        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }

        echo "<script> alert('An email has been sent to your email') </script>";
    }


    // $to = $email;

    // $subject = 'Reset your password for market_place';

    // $message = '<p>We received a password request. The link to reset your password. The link to reset your password is below. If you did not make this request , you can ignore this email </p>';
    // $message .= '<p> Here is your password reset link: </br>';
    // $message .= '<a href="' .$url . '">'. $url. '</a> </p>';

    // $headers = "From: market_place <mauricecourses@gmail.com>\r\n";
    // $headers .= "Reply-To: mauricecourses@gmail.com\r\n";
    // $headers .= "Content-type: text\html\r\n";


    // mail($to, $subject, $message, $headers);

    // header("Location: reset_password.php?reset=success");






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


    <title>Reset Password</title>
</head>
<body>

<div class="wrapper">



<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<h2 class='heading'>Recover your Password</h2>

<p>Please enter your email address you used to sign up on this site and we will assist you in recovering your password.</p>

  <label for="email">
  <?php echo $emailErr;?>
   <input type="email" name="email" id="email" placeholder="Email">
  </label>

  <input type="submit" value="Submit" name="reset">

  <?php


?>



  </form>

  

</div>
    
</body>
</html>