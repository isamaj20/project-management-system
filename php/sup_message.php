 <?php
  include 'db_connection.php';
  $staff_id=$_SESSION['user_id'];
  $student_id="";
if($_SESSION['std']=="")
{
  $_SESSION['std']="Nobody"; 
  $student_id=$_SESSION['std'];
}else{
  $student_id=$_SESSION['std'];
}
  $sql= mysqli_query($mysqli, "update discussion set status='read' where student_id='$student_id' && sender='student'");
  ?>
<html>
    <head>
<!--        <meta http-equiv="refresh" content="5" />-->
        <title>hh</title></head>
    <body>
        <?php
      $stmt1= mysqli_query($mysqli, "select * from discussion where student_id='$student_id' && staff_id='$staff_id' ORDER BY date ASC, time ASC");
      $count=mysqli_num_rows($stmt1);
      if($count>0)
      {
       while($message= mysqli_fetch_array($stmt1))
       { 
           if($message['sender']=="supervisor")
         {
echo'<textarea name="CTmsg" rows="3" cols="40" style="color:white;border:0px;border-radius:2em; float: right; background-color:gray;padding:5px;">'.$message['time'].":--->".str_replace("_","'",$message['message']).'</textarea><br><br><br><br><br>';
          } else 
          {
echo'<textarea name="CRmsg" rows="3" cols="40" style="color:#333;border:0px;border-radius:1em; float:2eft; background-color:lightgray;padding:5px">'.$message['time'].":--->".str_replace("_","'",$message['message']).'</textarea><br>';
      }}}else{ echo "<center><font color='red'>No previous message to display</font></center>";}
   ?>  
    </body>
</html>