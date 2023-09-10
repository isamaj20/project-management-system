<?php
session_start();
if($_SESSION['role']=="admin")
{
 include 'db_connection.php';
?>
<?php
 $staff_id=$_GET['id'];
 $sql= mysqli_query($mysqli, "delete from staff where staff_id='$staff_id' && role='coordinator'");
 if($sql){
 $sql1=mysqli_query($mysqli, "delete from users where id='$staff_id' && role='coordinator'");
     header('Location:view_coordinator.php');
 }
 }else{
     header('Location:login.php'); 
}