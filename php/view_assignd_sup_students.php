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
<div class="mid_section" style="margin-top: -15px; padding-left: 10px;">
    <form method="POST">
    <table border="0" cellspacing='5' style="width: 99%;">
            <tr style="background-color:lightcoral;color: white;">
                <th colspan="6" style="border-bottom:1px dashed lightcoral; ">
ALL PROJECT STUDENTS SUPERVISED BY <font color='black'> <?php echo $details['title']." ".$details['surname']." ".$details['f_name'];?> </font> 
                </th>
            </tr>
            <tr style="background-color: whitesmoke;">
                <td colspan="2" align="right">
                    Session:
                </td>
                <td colspan="2">
                    <select name="session" required="required">
                        <option value="">...year/year...</option>
                        <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { 
                            $year1=$year-1;?>
	<option value="<?php echo $year1."/".$year; ?>"><?php echo $year1."/".$year; ?></option>
	<?php } ?>
                    </select>
                </td>
                <td colspan="2">
                    <input type="submit" name="view" value="VIEW" style="color: red;">
                </td>
            </tr>
        <tr style="background-color:lightcoral;color: white;">
            <th>SN</th>
            <th>FULL NAME</th>
            <th>GENDER</th>
            <th>LEVEL</th>
            <th>SESSION</th>
            <th>PROJECT TOPIC</th>
            <th>PHONE NUMBER</th>
        </tr>
        <?php
        $sn=0;
if(isset($_POST['view']))
{
$session=$_POST['session'];
$sql= mysqli_query($mysqli, "select * from student_supervisor where staff_id='$staff_id' && session='$session'");
$count= mysqli_num_rows($sql);
if($count>0)
{
while($std_sup=mysqli_fetch_array($sql))
{
$student_id=$std_sup['student_id'];
$student= mysqli_query($mysqli, "select * from students where student_id='$student_id' && dept='$staff_dept'");
    $student_result=mysqli_fetch_array($student);
            $sn++;
            $topic= mysqli_query($mysqli, "select * from projects where student_id='$student_id'");
            $n=mysqli_num_rows($topic);
            if($n>0)
            {
                $top=mysqli_fetch_array($topic);
                $student_topic=$top['topic'];
            }else{$student_topic="No Topic Available";}
        ?>
        <tr>
            <td style="border-bottom: 1px dashed lightcoral;"><?php echo $sn; ?></td>
            <td style="border-bottom: 1px dashed lightcoral;"><?php echo $student_result['surname']." ".$student_result['f_name'];?></td>
            <td><?php echo $student_result['gender'];?></td>
            <td><?php echo $student_result['level'];?></td>
            <td><?php echo $student_result['session'];?></td>
            <td><textarea rows="2" cols="30" readonly style="border-radius:1em;padding: 2px;"><?php echo $student_topic;?></textarea></td>
            <td><?php echo "+234".$student_result['phone_no'];?></td>
            </tr>
<!--        <tr>
        <td colspan="5" align="right" style="border-bottom: 1px dashed lightcoral;"><a href="remove_coordinator.php?id=<?php //echo $result['staff_id']?>" style="text-decoration: none; color: red; background-color: lightgray; padding: 5px;padding-bottom: 0px;border: 1px solid #666666;">REMOVE</a></td>
        </tr>-->
<?php }}else{ ?>
        <tr>
            <th colspan="6"><font color='red'>No record available for the selected session</font></th>
        </tr>
<?php
}}
?>
    </table>
    </form>
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}