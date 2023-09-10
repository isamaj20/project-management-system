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
include_once 'sup_navigator.php';
?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px; height: auto">
        <table border="0" cellspacing='5' style="width: 99%;">
            <tr style="background-color:lightcoral;color: white; height: 35px;">
                <th colspan="6" style="border-bottom:1px dashed lightcoral; ">
PROPOSED PROJECT TOPICS FROM STUDENTS SUPERVISED BY <font color='black'> <?php echo $details['title']." ".$details['surname']." ".$details['f_name'];?> </font> 
                </th>
            </tr>
        </table>
    <div class="discus">
<form method="POST" >
        <table border="0" cellspacing='5' style="width: 99%;">
            
            <tr style="background-color:lightcoral;color: white;">
                <th>
                    SN
                </th>
                <th>
                    SENDER
                </th>
                <th>
                    TOPIC
                </th>
                <th>
                    SYNOPSIS
                </th>
                <th>
                    OPTIONS
                </th>
            </tr> 
            <?php
$sql= mysqli_query($mysqli, "select * from student_supervisor where staff_id='$staff_id'");
$count= mysqli_num_rows($sql);
if($count>0)
{
while($std_sup=mysqli_fetch_array($sql))
{ 
$student_id=$std_sup['student_id'];
$student= mysqli_query($mysqli, "select * from students where student_id='$student_id' && dept='$staff_dept'");
    $student_result=mysqli_fetch_array($student);
   
$sql1= mysqli_query($mysqli, "select * from proposed_topic where staff_id='$staff_id' && student_id='$student_id' && status='pending' ORDER BY date ASC, time ASC ");
$num=mysqli_num_rows($sql1);
if($num>0)
{ $sn=0;
 while($topic_reqst=mysqli_fetch_array($sql1))
 {$sn++;
 $topic_id=$topic_reqst['id'];
 $topic=$topic_reqst['topic'];
 ?>
            <tr>
                <td style="border-bottom:1px dashed lightcoral; "><?php echo $sn ;?></td>
                <td style="border-bottom:1px dashed lightcoral; "><?php echo $student_result['surname']." ".$student_result['f_name'] ;?></td>
                <td>
<a href="edit_topic.php?id=<?php echo $topic_id; ?>" style="font-size: 12px; font-style:italic; color: green;">edit topic</a>
 <br>
 <textarea rows="3" cols="20" name="topic" readonly style="border-radius:.6em; border: 1px solid red;padding:5px;"><?php echo $topic_reqst['topic'];?></textarea>
                </td>
                <td>
 <textarea rows="6" cols="50"  name="synopsis" readonly style="border-radius:.6em; border: 1px solid red;padding:5px;"><?php echo $topic_reqst['description'];?></textarea>
                </td>
                <td style="border-bottom:1px dashed lightcoral; ">
<a href="approve.php?id=<?php echo $topic_id; ?>" style="color: green;padding: 3px;text-decoration: none; background-color:lightgray;border:1px inset gray; border-radius: .2em;">APPROVE</a><br><br>
<a href="decline.php?id=<?php echo $topic_id; ?>" style="color: red; border-radius: .2em; padding: 3px;text-decoration: none; background-color:lightgray;border:1px inset gray;">DECLINE</a>
                </td>
            </tr>
<?php }}else{?>
            <tr>
<th colspan="6">
    <font color='red'>None of your project students have submitted topic for approval yet.</font>
</th>
        </tr>
<?php }}}else{ ?>
        <tr>
<th colspan="6"><font color='red'>Sorry, no project student has been assigned to you.</font></th>
        </tr>
<?php } ?>
    </table>
        </form>
    </div>
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php 
}else{
     header('Location:login.php'); 
}   