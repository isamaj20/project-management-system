<?php
ob_start();
session_start();
if($_SESSION['role']=="student")
{
include 'db_connection.php';
$student_id=$_SESSION['user_id'];
$user_details= mysqli_query($mysqli, "select * from student_supervisor where student_id='$student_id'");
$details= mysqli_fetch_array($user_details);
$staff_id=$details['staff_id'];

 if(isset($_POST['proposed_topics']))
 {
     $topic1= mysqli_real_escape_string($mysqli,$_POST['topic1']);
     $synopsis1= mysqli_real_escape_string($mysqli,$_POST['synopsis1']);
     $topic2= mysqli_real_escape_string($mysqli, $_POST['topic2']);
     $synopsis2= mysqli_real_escape_string($mysqli,$_POST['synopsis2']);
     $topic3= mysqli_real_escape_string($mysqli,$_POST['topic3']);
     $synopsis3= mysqli_real_escape_string($mysqli,$_POST['synopsis3']);
if(($topic1!="" && $synopsis1!="") && ($topic2!="" && $synopsis2!="") && ($topic3!="" && $synopsis3!="") )
{
$min=0;
$max=1000000000;
$id1=mt_rand($min, $max)."std";
       $date= date('d/m/Y');
       $time1= date('H:i:s');
       $status="pending";
$sql1= mysqli_query($mysqli, "insert into proposed_topic values ('$id1','$topic1','$synopsis1','$student_id','$staff_id','$date','$time1','$status')");
$id2=mt_rand($min, $max)."std";
       $time2= date('H:i:s');
$sql2= mysqli_query($mysqli, "insert into proposed_topic values ('$id2','$topic2','$synopsis2','$student_id','$staff_id','$date','$time2','$status')");
$id3=mt_rand($min, $max)."std";
       $time3= date('H:i:s');
$sql3= mysqli_query($mysqli, "insert into proposed_topic values ('$id3','$topic3','$synopsis3','$student_id','$staff_id','$date','$time3','$status')");
if($sql1 && $sql2 && $sql2)
{
 echo"<script> alert('Topic No.1, 2 and 3 have been submitted for Aprroval.')</script>";   
}else{
    echo"<script> alert('failed to submit topics.')</script>";
     }
}else{
    echo"<script> alert('you must fill all fields to submit.')</script>";
     }
}
 //}
?>
<?php
include_once 'std_navigator.php';?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px; height: 70%; overflow: visible;">
    <table border="0" cellspacing='5' style="width: 98%; border-bottom: 1px dashed lightcoral;">
            <tr style="background-color:lightcoral;color: white;">
                <th colspan="3" style="border-bottom:1px dashed lightcoral;height: 35px; ">
                    SUBMIT PROJECT TOPICS FOR APPROVAL 
                </th>
            </tr>
    </table>
    <?php
$check=mysqli_query($mysqli, "select * from proposed_topic where student_id='$student_id'");
$check_reslt=mysqli_fetch_array($check);
$state=$check_reslt['status'];
$no= mysqli_num_rows($check);
if($no<1)
{   ?>
<div class="discus" style="height:125%;">
        <form method="POST" autocomplete="on">
        <table border="0" cellspacing='5' style="width: 98%; border-bottom: 1px dashed lightcoral; color: gray;">
            <tr>
                <th colspan="2" align="left"> TOPIC No. 1</th>
            </tr>
            <tr>
                <th style="border-bottom:1px dashed lightcoral;">
                    <fieldset>
                     <legend>Proposed Topic</legend>
<textarea rows="1" cols="40" name="topic1" required="required" placeholder="...write your first proposed topic here" style="border-radius:.6em; border: 1px solid red;padding:5px;"></textarea>
                    </fieldset>
                </th>
                <th>
                    <fieldset>
                     <legend>Topic Synopsis</legend>
<textarea rows="6" cols="50" name="synopsis1" required="required" placeholder="...write the topic synopis here" style="border-radius:.6em; border: 1px solid red;padding:5px;"></textarea>
                    </fieldset>
                </th>
            </tr>
            <tr>
                <th colspan="2" align="left">TOPIC No. 2</th>
            </tr>
            <tr>
                <th style="border-bottom:1px dashed lightcoral;">
                    <fieldset>
                     <legend>Proposed Topic</legend>
<textarea rows="1" cols="40" name="topic2" required="required" placeholder="...write your second proposed topic here" style="border-radius:.6em; border: 1px solid red;padding:5px;"></textarea>
                    </fieldset>
                </th>
                <th>
                    <fieldset>
                     <legend>Topic Synopsis</legend>
<textarea rows="6" cols="50" name="synopsis2" required="required" placeholder="...write the topic synopis here" style="border-radius:.6em; border: 1px solid red;padding:5px;"></textarea>
                    </fieldset>
                </th>
            </tr>
            <tr>
                <th colspan="2" align="left">TOPIC No. 3</th>
            </tr>
            <tr>
                <th style="border-bottom:1px dashed lightcoral;">
                    <fieldset>
                     <legend>Proposed Topic</legend>
<textarea rows="1" cols="40" name="topic3" required="required" placeholder="...write your third proposed topic here" style="border-radius:.6em; border: 1px solid red;padding:5px;"></textarea>
                    </fieldset>
                </th>
                <th>
                    <fieldset>
                     <legend>Topic Synopsis</legend>
<textarea rows="6" cols="50" name="synopsis3" required="required" placeholder="...write the topic synopis here" style="border-radius:.6em; border: 1px solid red;padding:5px;"></textarea>
                    </fieldset>
                </th>
            </tr>
            <tr>
                <th colspan="2">
<input type="submit" name="proposed_topics" value="SUBMIT TOPICS" style="color: red; border-radius: .2em;">
                </th>
            </tr>
        </table>
        </form>
</div>
<?php }else{
    if($state=="approved")
    {
   $topicSQL=mysqli_query($mysqli, "select * from proposed_topic where student_id='$student_id' && status='approved'");
   $topic_reslt=mysqli_fetch_array($topicSQL);
      echo "<br><br><center>Your Topic : <font color='green'>".$topic_reslt['topic']." </font>, Has Been <u>Approved</u>.<br><br> GOODLUCK IN YOUR RESEARCH</center>";  
    }else{
        echo "<br><br><center>YOUR TOPICS ARE AWAITING APPROVAL.<br><br>You will be notify when your topic is approved, if your topics are rejected you will be give a form to submit topics again</center>";
    }}?>
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}