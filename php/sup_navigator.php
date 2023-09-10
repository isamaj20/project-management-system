<?php
?>
<?php include_once 'header.php';?>

            <div class="section">
                <div class="nav" style="margin-top: -15px;"><br>
                    <table style="width: 98%;" border='0'>
                        <tr><th>SUPERVISOR MENU</th></tr>
       <tr><td><li><a href="view_assignd_sup_students.php">View Assigned Students</a></li></td></tr>
                    <tr><td><li><a href="approve_topic.php">Approve Topic</a></li></td></tr>
                    <tr><td><li><a href="download_upload.php">Download/Upload Project</a></li></td></tr>
                    <tr><td><li><a href="sup_discussion.php">Discussion with a Student</a></li></td></tr>
                    </table>
                    <br>
                    <form method="POST" action="sup_home.php" target="sup_home.php" autocomplete="on">
                    <table style="width: 98%;font-style: italic;" border='0'>
                        <tr>
                            <th style="border-bottom: none; ">
<input type="text" name="search_item" required="required" placeholder="...search previous projects" style="width: 90%; height: 30px; border-radius: 1em; padding: 2px; color:red;background-color:white;">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <input type="submit" name="search" value="SEARCH" style="color: red; border-radius: .3em;background-color: #cccccc;">
                            </th>
                        </tr>
                    </table>
                    </form>
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
$staff_id=$_SESSION['user_id'];
$stmt1= mysqli_query($mysqli, "select * from discussion where sender='student' && staff_id='$staff_id' && status='unread' ORDER BY date ASC, time ASC");
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
                $std_id=$result['student_id'];
                $sender= mysqli_query($mysqli, "select * from students where student_id='$std_id'");
                $names=mysqli_fetch_array($sender);
//$count_sql= mysqli_query($mysqli, "select * from discussion where student_id='$std_id' && sender='student' && status='unread'");
//$count= mysqli_num_rows($count_sql);
                ?>
You have a new message from <font color='red'> <?php  echo $names['surname']." ".$names['f_name'];?></font>
<a href="sup_discussion.php" style="float: right; color: green;">Read</a>
            </td>  
        </tr>
        <?php }?>
    </table>
</div>
<?php }else{} 