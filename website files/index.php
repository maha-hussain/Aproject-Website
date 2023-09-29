<?php

session_start();

include 'mycon.php';

if(isset($_POST['sign_in'])){
  $username=$_POST['typeUsername'];
  $password=$_POST['typePassword'];
 

if(!$con){
  die("connection failed".mysqli_connect_error());
}


$sql = "SELECT * FROM users WHERE username = '$username'";
$res = mysqli_query($con,$sql);


if(mysqli_num_rows($res) == 1){
$row = mysqli_fetch_assoc($res);
$hashed_password = $row['password'];

if(password_verify($password,$hashed_password)){
$_SESSION['username'] = $username;
$_SESSION['uid'] = $uid;
header("Location: table_view.php");

$sql2 = "SELECT uid FROM users WHERE username ='$username'";
$uid = mysqli_query($con,$sql2);

if($uid){
  $_SESSION['uid'] = $uid;
}
} else {
  echo '<script language="javascript" type="text/javascript">;
  alert("Error, invalid username or password!");
  window.location = "index.php";
  </script>';

}
} else{
  echo '<script language="javascript" type="text/javascript">;
  alert("Error, invalid username or password!");
  window.location = "index.php";
  </script>';
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Aproject</title>
</head>
<body style ="background-color: #508bfc;">


    <section class="vh-100" style="background-color: #508bfc; height:fit-content;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center w-200">
      
                    <img class="mb-5" src="logo.jpeg" alt="Aproject Logo" width="300px" height="200px">
                  <h3 class="mb-5">Sign in</h3>

    
    <form method="post" >
                  <!-- username field-->
                  <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="typeUsername">Username</label>
                    <input type="text" name="typeUsername" class="form-control form-control-lg" placeholder="Enter your username..." />
                    
                  </div>
      
                  <!-- password field-->
                  <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="typePassword">Password</label>
                    <input type="password" name="typePassword" class="form-control form-control-lg"  placeholder="Enter your password..." />
                   </div>

                 
      
                  <button class="btn btn-primary btn-lg btn-block" type="submit" name="sign_in">Sign in</button>
                  </form>



                  <hr class="my-4">
      
                  <a href ='table_view.php'><button class='btn btn-primary' style='background-color: black; margin-bottom:40px; border-color: black; color:white;'>View Projects As Guest</button></a>
 
                  <br>
                  <a href="register.php" >Don't have an account? Register here</u></a>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>



</html>


