<?php 
include 'mycon.php';
$pid=$_GET['editid'];

if(isset($_POST['edit'])){
$title = $_POST['title'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$description = $_POST['description'];
$phase = $_POST['phase'];

$sql="UPDATE `projects` set pid=$pid, title='$title', start_date='$start_date',end_date='$end_date',description='$description',phase='$phase' WHERE pid=$pid";


if (mysqli_query($con,$sql)){
  echo '<script language="javascript" type="text/javascript">;
  alert("Edited successfully!");
  window.location = "table_view.php";
  </script>';
} else {
  echo ' error'.mysqli_error($con);
}
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <title>Create a project</title>
</head>
<body style ="background-color: #508bfc;">


    <section class="vh-100" style="background-color: #508bfc; height:fit-content;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center w-200">
                    
      
                    <img class="mb-5" src="logo.jpeg" alt="Aproject Logo" width="300px" height="200px">
                  <h3 class="mb-5">Edit Project</h3>

    
      <form method="post">
                  

                  <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="title" >Title</label>
                    <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter your title..." value=<?php echo $title;?> />
                  </div>
      
                   
                   <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="description">Description</label>
                    <input type="text" name="description" class="form-control form-control-lg" style="height:100px" value=<?php echo $description;?>/>
                  </div>
      
                   <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control form-control-lg value=<?php echo $start_date;?>" />
                   </div>

                   <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control form-control-lg value=<?php echo $end_date;?>" />
                   </div>

                   
                   <div class="form-outline mb-4" style="text-align: left;">
                    <label class="form-label" for="phase">Phase</label>
                    <select type="text" id="phase" name="phase" class="form-control form-control-lg" style="width:200px" placeholder="Phase..." value=<?php echo $phase;?>>
        
                      <option value="design">design</option>
                      <option value="development">development</option>
                      <option value="testing">testing</option>
                      <option value="deployment">deployment</option>
                      <option value="complete">complete</option>
        
                  </select>

                  
                  </div>
                  <button class="btn btn-primary btn-lg btn-block" type="submit" name="edit">Edit Project</button>
</form>
                
<a href ='table_view.php'><button class='btn btn-primary' style='background-color: black; margin-bottom:40px; border-color: black; color:white;'>Back to projects</button></a>
  
                  
                 
                
                 
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>



</html>

