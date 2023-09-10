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
$topic_id=$_GET['id'];
$sql= mysqli_query($mysqli, "select * from proposed_topic where id='$topic_id'");
$reslt=mysqli_fetch_array($sql);
$topic=$reslt['topic'];
$synopsis=$reslt['description'];
if(isset($_POST['edit_topic']))
{
 $new_topic= mysqli_real_escape_string($mysqli, $_POST['topic1']);
 $new_synopsis=mysqli_real_escape_string($mysqli, $_POST['synopsis']);
 $update=mysqli_query($mysqli, "update proposed_topic set topic ='$new_topic', description='$new_synopsis' where id='$topic_id'");
 header('Location:approve_topic.php');
}
?>
<?php
include_once 'sup_navigator.php';?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px;">
    <center><br>
<div style="border:1px solid lightgray; width:80%; height: 90%; border-radius: 1em; ">
        <form method="POST">
    <table border="0" cellspacing="3" cellpadding="5">
        <tr>
            <th>
                Edit Proposed Project Topic:
            </th>
            <th>
<textarea rows="2" cols="40" name="topic1" required="required" style="border-radius: .5em;padding: 5px; border:2px solid lightcoral;"> <?php echo $topic; ?> </textarea>
            </th>
        </tr>
        <tr>
            <th>
                Edit Topic Synopsis:
            </th>
            <th>
<textarea rows="10" cols="60" name="synopsis" required="required" style="border-radius: .5em;padding: 5px;border:2px solid lightcoral;"><?php echo $synopsis; ?></textarea>
            </th>
        </tr>
        <tr>
            <th colspan="2">
                <input type="submit" name="edit_topic" value="OK" style="border-radius: .2em; color:red;">
            </th>
        </tr>
    </table>
        </form>
    </div></center>
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}