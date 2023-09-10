<?php
ob_start();
session_start();
if($_SESSION['role']=="supervisor")
{
include 'db_connection.php';
$msg="";
$staff_id=$_SESSION['user_id'];
$user_details= mysqli_query($mysqli, "select * from staff where staff_id='$staff_id'");
$details= mysqli_fetch_array($user_details);
$staff_dept=$details['dept'];
?>
<?php
include_once 'sup_navigator.php';?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px; height: 65%; overflow: visible;">
    <form method="POST" >
    <table border="0" cellspacing='5' style="width: 98%; border-bottom: 1px dashed lightcoral;">
            <tr style="background-color:lightcoral;color: white;">
                <th colspan="3" style="border-bottom:1px dashed lightcoral;height: 35px; ">
                    DISCUSSION WITH A STUDENT 
                </th>
            </tr>
        <tr>
            <th style="width: 40%;" align="right">
                Select a Student for discussion:
            </th>
            <th>
                <select name="student_id" required="required" style="border: 2px solid red; width: 90%;">
                    <option value="">...select...</option>
<?php
$std_sup_sql= mysqli_query($mysqli, "select * from student_supervisor where staff_id='$staff_id'");
while($reslt=mysqli_fetch_array($std_sup_sql))
{
$std_id=$reslt['student_id'];
$std= mysqli_query($mysqli, "select * from students where student_id='$std_id'");
$std_rslt=mysqli_fetch_array($std);
            ?><option value="<?php echo $std_id;?>">
<?php echo $std_rslt['surname']." ".$std_rslt['f_name'];?> </option>
<?php }?>
                </select>
            </th>
            <th align="left" >
                <input type="submit" name="submit" value="START" style="color: red;">
            </th>
        </tr>
    </table>
    </form>
<?php
if(isset($_POST['submit']))
{
    $student_id=$_POST['student_id'];
    $_SESSION['std']=$student_id;
}
 if(isset($_POST['msg']))
 {
     $comment= str_replace("'", "_", $_POST['comment']);
     $student_id=$_SESSION['std'];
     if($student_id!="" && $comment!="")
     {
$min=0;
$max=1000000000;
$discussion_id=mt_rand($min, $max)."su";
       $sender="supervisor";
       $date= date('d/m/Y');
       $time= date('H:i:s');
       $status="unread";
$sql= mysqli_query($mysqli, "insert into discussion values ('$discussion_id','$student_id','$staff_id','$comment','$sender','$time','$date','$status')");
if($sql)
{
 //do nothing    
}else{$msg="failed to send message";}
     }else{ $msg="No student selected";}
 }?>
    <div class="discus">
        <?php
include 'sup_message.php';
?>
    </div>
<!--<iframe src="sup_message.php" style="width: 98%; height: 60%; border: none;top: 10%;"></iframe>-->
    <form method="POST" act>
    <table border="0" style="width: 98%; height: 10%; " >
        <tr>
            <th style="width: 98%; border-bottom: 1px dashed lightcoral;">
        <center>
<textarea rows="2" cols="50" name="comment" required="required" placeholder="...write your message here" style="border-radius:.6em; margin-top: 10px; border: 1px solid red;"></textarea>
            <input type="submit" name="msg" value="SEND" style="border-radius:.6em; margin-top: 10px; border: 1px solid red; color: red;">
            <a href="sup_discussion.php" style="float: right; color: red; margin-top: 3%; margin-right: 3%;">Refresh Chat</a><a href="exit_chat.php" style="float: right; color: red; margin-top: 3%; margin-right: 3%;">Exit Chat</a></center>
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