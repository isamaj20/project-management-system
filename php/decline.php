
<?php
session_start();
include 'db_connection.php';
$staff_id=$_SESSION['user_id'];
  $topic_id=$_GET['id'];
  $decline= mysqli_query($mysqli, "delete from proposed_topic where id='$topic_id'");
  if($decline)
  {
  echo"<script> alert('Project topic declined !!!.')</script>";
  }else{echo"<script> alert('Failed to decline project topic.')</script>";}
  //redirect to previous page
  header('Location:approve_topic.php');
     // echo "Failed to approve project topic . ".mysqli_error($mysqli);
 // }