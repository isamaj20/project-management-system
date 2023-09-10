
<?php
//Approve or Decline project topic
//if(isset($_POST['approve']))//approve
//{
session_start();
include 'db_connection.php';
$staff_id=$_SESSION['user_id'];
  $topic_id=$_GET['id']; 
 // $synopsis=$_POST['synopsis'];
  //update proposed topic, change topic status to 'approved'
  $update= mysqli_query($mysqli, "update proposed_topic set status='approved' where id='$topic_id'");
  if($update)
  {
      //get student's id and project topic
  $sql= mysqli_query($mysqli, "select * from proposed_topic where id='$topic_id'");
  $result=mysqli_fetch_array($sql);
  $student_id=$result['student_id'];
  $topic=$result['topic']; 
       //get student's session and department
  $student= mysqli_query($mysqli, "select * from students where student_id='$student_id'");
  $student_rslt=mysqli_fetch_array($student);
  $session=$student_rslt['session'];
  $date= date('d/m/Y');
  $time= date('H:i:s');
  $finish_date="pending";
  $dept=$student_rslt['dept'];
     //populate project table
  $insert_project= mysqli_query($mysqli, "insert into projects values ('$topic_id','$topic','$student_id','$date','$session','$finish_date','$staff_id','$dept')");
  if($insert_project)
  {
  $sql2= mysqli_query($mysqli, "delete from proposed_topic where student_id='$student_id' && status!='approved'");
  }else{echo"<script> alert('Failed to process project topic.')</script>"; }
  }else{echo"<script> alert('Failed to approve project topic.')</script>";}
  //redirect to previous page
  header('Location:approve_topic.php');
     // echo "Failed to approve project topic . ".mysqli_error($mysqli);
 // }