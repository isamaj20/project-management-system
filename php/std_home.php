<?php
ob_start();
session_start();
if($_SESSION['role']=="student")
{
include 'db_connection.php';
$msg="";
$student_id=$_SESSION['user_id'];
$user_details= mysqli_query($mysqli, "select * from students where student_id='$student_id'");
$details= mysqli_fetch_array($user_details);
$student_dept=$details['dept'];
?>
<?php
include_once 'std_navigator.php';?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px;background-image: url('../images/mm.jpg');background-repeat: no-repeat; background-size: 100% 100%;">

    

            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}