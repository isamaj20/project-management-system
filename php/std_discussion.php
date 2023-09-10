<?php
ob_start();
session_start();
if($_SESSION['role']=="student")
{
include 'db_connection.php';
$msg="";
$student_id=$_SESSION['user_id'];
$user_details= mysqli_query($mysqli, "select * from student_supervisor where student_id='$student_id'");
$details= mysqli_fetch_array($user_details);
$staff_id=$details['staff_id'];
?>
<?php
include_once 'std_navigator.php';?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px; height: 70%; overflow: visible;">
<!--     <a href="" onclick="javascript(-1);">Back</a>-->
    <table border="0" cellspacing='5' style="width: 98%; border-bottom: 1px dashed lightcoral;">
            <tr style="background-color:lightcoral;color: white;">
                <th colspan="3" style="border-bottom:1px dashed lightcoral;height: 35px; ">
                    DISCUSSION WITH SUPERVISOR 
                </th>
            </tr>
    </table>
<?php
 if(isset($_POST['msg']))
 {
     $comment= str_replace("'", "_", $_POST['comment']);
    // $student_id=$_SESSION['std'];
     if($student_id!="" && $comment!="")
     {
$min=0;
$max=1000000000;
$discussion_id=mt_rand($min, $max)."std";
       $sender="student";
       $date= date('d/m/Y');
       $time= date('H:i:s');
       $status="unread";
$sql= mysqli_query($mysqli, "insert into discussion values ('$discussion_id','$student_id','$staff_id','$comment','$sender','$time','$date','$status')");
if($sql)
{
 //do nothing    
}else{$msg="failed to send message";}
     }else{ $msg="write your message to send";}
 }?>
    <div class="discus" style="height: 99%;">
        <?php
include 'std_message.php';
?>
    </div>
<!--<iframe src="sup_message.php" style="width: 98%; height: 60%; border: none;top: 10%;"></iframe>-->
    <form method="POST" >
    <table border="0" style="width: 98%; height: 10%; " >
        <tr>
            <th style="width: 98%; border-bottom: 1px dashed lightcoral;">
        <center>
<textarea rows="2" cols="50" name="comment" required="required" placeholder="...write your message here" style="border-radius:.6em; margin-top: 10px; border: 1px solid red;"></textarea>
            <input type="submit" name="msg" value="SEND" style="border-radius:.6em; margin-top: 10px; border: 1px solid red; color: red;"><a href="std_discussion.php" style="float: right; color: red; margin-top: 3%; margin-right: 2%;">Refresh Chat</a>
</center>
            </th>
        </tr>
    </table>
    </form>
<?php //}?>
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}