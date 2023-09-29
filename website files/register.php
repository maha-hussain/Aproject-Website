<?php 
include 'mycon.php';
if(isset($_POST['register'])){
  $username=$_POST['typeUsername'];
  $email=$_POST['typeEmail'];
  $password=$_POST['typePassword'];
  $confirmpassword=$_POST['confirmPassword'];

  if(!$con){
    die("connection failed".mysqli_connect_error());
  }
 
if(empty($username)|| empty($email)||empty($password)||empty($confirmpassword)){
  echo '<script language="javascript" type="text/javascript">;
  alert("Error, all fields are required!");
  window.location = "register.php";
  </script>';

} else if ($password!=$confirmpassword){
    echo '<script language="javascript" type="text/javascript">;
  alert("Error, passwords do not match!");
  window.location = "register.php";
  </script>';

}

   // check if username exists already

  $query = "SELECT * FROM users WHERE username ='$username'";
  $result = mysqli_query($con,$query);

  if(mysqli_num_rows($result)>0){
    echo '<script language="javascript" type="text/javascript">;
  alert("Error, username already exists, please choose a different one!");
  window.location = "register.php";
  </script>';
  } else {

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $sql="insert into `users` (username,email,password) 
  values('$username','$email','$hashed_password')";
  $res=mysqli_query($con,$sql);

  echo '<script language="javascript" type="text/javascript">;
  alert("Registration success!");
  window.location = "register.php";
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
    <title>Register</title>
</head>
<body style ="background-color: #508bfc;">


    <section class="vh-100" style="background-color: #508bfc; height:fit-content;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center w-200">
                    
      
                    <img class="mb-5" src="logo.jpeg" alt="Aproject Logo" width="300px" height="200px">
                  <h3 class="mb-5">Register</h3>

    
      <form method="post">
                  <!-- username field-->
                  <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="typeUsername" >Username</label>
                    <input type="text" name="typeUsername" class="form-control form-control-lg" placeholder="Enter your username..." />
                  </div>
      
                   <!-- email field-->
                   <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="typeEmail">Email</label>
                    <input type="email" name="typeEmail" class="form-control form-control-lg" placeholder="Enter your email..." />
                  </div>

                  <!-- password field-->
                  <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="typePassword">Password</label>
                    <input type="password" name="typePassword" class="form-control form-control-lg" placeholder="Enter your password..." />
                   </div>

                   <!-- confirm password field-->
                  <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="confirmPassword">Confirm Password</label>
                    <input type="password" name="confirmPassword" class="form-control form-control-lg" placeholder="Confirm your password..." />
                   </div>
                   <button class="btn btn-primary btn-lg btn-block" type="submit" name="register">Register</button>
                 
</form>
                 
                  <hr class="my-4">
      
                  <a href ='table_view.php'><button class='btn btn-primary' style='background-color: black; margin-bottom:40px; border-color: black; color:white;'>View Projects As Guest</button></a>";
 
                  <br>
                  <a href="index.php" >Already have an account? Sign in here</u></a>
      
                 
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>



</html>

