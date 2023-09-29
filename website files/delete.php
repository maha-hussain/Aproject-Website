<?php 

include 'mycon.php';

if(isset($_GET['deleteid'])){
    $pid=$_GET['deleteid'];

    $query="DELETE FROM `projects` WHERE pid=$pid";
    $results=mysqli_query($con,$query);
    if($result){
        header("Location: table_view.php");
    } 
}
?>