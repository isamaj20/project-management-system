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
<div class="mid_section" style="margin-top: -15px; padding-left: 10px;  background-image: url('../images/crack.jpg'); background-repeat: no-repeat; background-size: 100% 105%;">
    <?php 
    if(!isset($_POST['search']))
    {
    ?>
    <?php
    // show this part 
    }else{
        $topic= str_replace("'", "_", $_POST['search_item']);
$sql= mysqli_query($mysqli, "select * from projects where topic like '%$topic%' && dept='$staff_dept'");
        $count=mysqli_num_rows($sql);
       if($count>0)
       { ?>
        <table border="0" cellspacing='5' style="width: 99%;">
            <tr style="background-color:lightcoral;color: white; height: 35px;">
                <th colspan="6" style="border-bottom:1px dashed lightcoral; ">
                  SEARCH RESULT 
                </th>
            </tr>
            <tr style="background-color:lightcoral;color: white;">
                <th>
                    SN
                </th>
                <th>
                    TOPIC
                </th>
                <th>
                    STUDENT
                </th>
                <th>
                    SUPERVISOR
                </th>
                <th>
                    SESSION
                </th>
            </tr>   
      <?php
      $k=0;
        while($result=mysqli_fetch_array($sql))
        { 
          $student_id=$result['student_id'];
  $sql2= mysqli_query($mysqli, "select * from student_supervisor where student_id='$student_id'");
          $reslt=mysqli_fetch_array($sql2);
          $staff_id=$reslt['staff_id'];
$student= mysqli_query($mysqli, "select * from students where student_id='$student_id' && dept='$staff_dept'");
    $student_result=mysqli_fetch_array($student);
$staff= mysqli_query($mysqli, "select * from staff where staff_id='$staff_id'");
    $staff_result=mysqli_fetch_array($staff);
    $k++;
        ?>
          <tr>
            <td style="border-bottom: 1px dashed lightcoral;"><?php echo $k; ?></td>            
            <td>
<textarea rows="3" cols="30" name="topic" readonly style="border-radius:.6em; border: 1px solid red;padding:5px;"><?php echo $result['topic'];?></textarea>
            </td>
<td style="border-bottom: 1px dashed lightcoral;"><?php echo $student_result['surname']." ".$student_result['f_name'];?></td>
<td><?php echo $staff_result['title']." ".$staff_result['surname']." ".$staff_result['f_name'];?></td>
            <td><?php echo $result['session'];?></td>
        </tr> 
     <?php }}else{ ?>
        <tr>
<th colspan="6"><font color='red'>No Result Found for <font color="green"><?php echo str_replace("_","'", $topic) ?></font><br>
<a href="" style="margin-left:300px; background-color: #cccccc;color: red; border: 1px solid #666666; padding: 3px; border-radius: .2em;">Refresh Page</a>
</th>
        </tr>
       <?php } ?>
        </table>
<?php }?>
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}