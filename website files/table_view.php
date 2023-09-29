<?php 

include 'mycon.php';
session_start();

if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "<div style='text-align:center;'><h1 style='padding:10px'>Welcome, " . $username . "!</h1></div>";
echo "<div style='text-align:center;'><form action='signout.php' method='post'><button class='btn btn-primary' type='submit' style='background-color: black; color:white; margin-bottom:40px; border-color: black;'>signout</button></form></div>";

} else{

}

$username = $_SESSION['username'];
$sql = "SELECT uid FROM users WHERE username ='$username'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
$row = mysqli_fetch_assoc($result);
$uid = $row['uid'];
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <title>Aproject Projects</title>
  </head>
  <body>
 
  
    <div class="image" style="height: 200px;">
        <div class="centered" 
        style="width: 100%;
        height: 200px;
        background-color: #fefefe;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 50px;">
            <img src="logo.jpeg"  alt="logo img" height="200px" width="300px" />
        </div>
    </div>

    
    <div class="container" style="padding: 30px; text-align: center;">


    <!-- search sec-->
    <form method="post" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search by title or start date..." name="search" style=width:300px>
  <br>
  <button type="submit" name="submit" class="btn btn-primary">Search</button>
</form>

<br>
<table class="table table-bordered" style="margin-left: auto; margin-right: auto;">
<?php 

if(isset($_POST['submit'])){

  $mysearch=$_POST['search'];

  $query = "SELECT projects.*, users.email FROM projects JOIN users ON projects.uid = users.uid
  WHERE title LIKE '%" . $mysearch . "%'
  OR start_date LIKE '%" . $mysearch . "%'";

  $res=mysqli_query($con,$query);

if($res){
  if(mysqli_num_rows($res)>0){
    echo '<thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">title</th>
    <th scope="col">description</th>
    <th scope="col">owner</th>
    <th scope="col">start date</th>
    <th scope="col">end date</th>
    <th scope="col">phase</th>
    <tr>
    </thead>';

    $row=mysqli_fetch_assoc($res);
    echo '
    <tbody>
    <tr>
    <td>'.$row['pid'].'</td>
    <td>'.$row['title'].'</td>
    <td>'.$row['description'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['start_date'].'</td>
    <td>'.$row['end_date'].'</td>
    <td>'.$row['phase'].'</td>
    </tr>
    </tbody>
    ';
  } else {
  echo '<script language="javascript" type="text/javascript">;
  alert("No match found!");
  window.location = "table_view.php";
  </script>';
}
}
}


?>




</table>
<br>
<br>
    
<hr class="my-4">

<br>
       <?php echo " <a href ='createproject.php'><button class='btn btn-primary' style='background-color: black; margin-bottom:40px; border-color: black;'>Create project</button></a>";
 ?>
       
        <table class="table table-bordered" style="margin-left: auto; margin-right: auto;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">owner</th>
      <th scope="col">start date</th>
      <th scope="col">end date</th>
      <th scope="col">phase</th>
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
    


  <?php 
  
  $sql="SELECT projects.*, users.email FROM projects JOIN users ON projects.uid = users.uid";
  
  
  $result=mysqli_query($con,$sql);

  if($result){
while($row=mysqli_fetch_assoc($result)){
  $pid=$row['pid'];
  $title=$row['title'];
  $description=$row['description'];
  $email=$row['email'];
  $start_date=$row['start_date'];
  $end_date=$row['end_date'];
  $phase=$row['phase'];

  if ($uid==$row['uid']){
echo'
<tr>
  <th scope="row">'.$pid.'</th>
  <td>'.$title.'</td>
  <td>'.$description.'</td>
  <td>'.$email.'</td>
  <td>'.$start_date.'</td>
  <td>'.$end_date.'</td>
  <td>'.$phase.'</td>
  <td>
  <button class="btn btn-warning" "><a style="color:white;"href="edit.php?editid='.$pid.'">edit</a></button>
  <button class="btn btn-danger"><a style="color:white;" href="delete.php?deleteid='.$pid.'">delete</a></button>
  </td>
</tr>';
} else {
  echo'
  <tr>
    <th scope="row">'.$pid.'</th>
    <td>'.$title.'</td>
    <td>'.$description.'</td>
    <td>'.$email.'</td>
    <td>'.$start_date.'</td>
    <td>'.$end_date.'</td>
    <td>'.$phase.'</td>
    </tr>';
}
}
  }

  ?>

   
  </tbody>
</table>

</div>
</body>
</html>

