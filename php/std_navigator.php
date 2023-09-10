<?php
?>
<?php include_once 'header.php';?>

            <div class="section">
                <div class="nav" style="margin-top: -15px;"><br>
                    <table style="width: 98%;" border='0'>
                        <tr><th>STUDENT MENU</th></tr>
<tr><td><li><a href="std_proposed_topic.php">Submit Project Topic</a></li></td></tr>
<tr><td><li><a href="std_download_upload.php">Upload/Download Project</a></li></td></tr>
<tr><td><li><a href="std_discussion.php">Discussion with Supervisor</a></li></td></tr>
                    </table>
                    <br> <br> <br> <br> <br>
                    <a href="javascript:history.go(-1);" id="back">
    <img src="../images/back.png" height="50" width="50">
</a>
<a href="javascript:history.go(+1);" id="back">
    <img src="../images/forward.png" height="50" width="50">
</a>
                </div>
                <!--        notifications        -->
<?php
include 'db_connection.php';
$student_id=$_SESSION['user_id'];
$stmt1= mysqli_query($mysqli, "select * from discussion where sender='supervisor' && student_id='$student_id' && status='unread' ORDER BY date ASC, time ASC");
$count=mysqli_num_rows($stmt1);
if($count>0)
{
?>
<div class="notifications">
    <table border="0" style="width: 90%;">
        <tr>
            <th style="border-bottom: 1px dashed lightcoral;">
                NOTIFICATIONS
            </th>
        </tr>
        <?php 
        while($result=mysqli_fetch_array($stmt1))
        {
        ?>
        <tr>
            <td>
                <?php
                $staff_id=$result['staff_id'];
                $sender= mysqli_query($mysqli, "select * from staff where staff_id='$staff_id'");
                $names=mysqli_fetch_array($sender);
                ?>
You have a new message from <font color='red'> <?php  echo $names['title']." ".$names['surname']." ".$names['f_name'];?></font>
<a href="std_discussion.php" style="float: right; color: green;">Read</a>
            </td>  
        </tr>
        <?php }?>
    </table>
</div>
<?php }else{}