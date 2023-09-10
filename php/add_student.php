<?php
ob_start();
session_start();
if($_SESSION['role']=="coordinator")
{
include 'db_connection.php';
$msg="";
$staff_id=$_SESSION['user_id'];
$user_details= mysqli_query($mysqli, "select * from staff where staff_id='$staff_id'");
$details= mysqli_fetch_array($user_details);
$staff_dept=$details['dept'];
if(isset($_POST['register']))
{
 $student_id= mysqli_real_escape_string($mysqli, $_POST['student_id']);
 $surname= mysqli_real_escape_string($mysqli, $_POST['surname']);
 $f_name= mysqli_real_escape_string($mysqli, $_POST['f_name']);
 $m_name= mysqli_real_escape_string($mysqli, $_POST['m_name']);
 $gender= mysqli_real_escape_string($mysqli, isset($_POST['sex'])? $_POST['sex']:null);
 $phone_no= mysqli_real_escape_string($mysqli, $_POST['phone_no']);
 $dept= mysqli_real_escape_string($mysqli, $_POST['dept']);
 $level= mysqli_real_escape_string($mysqli, $_POST['level']);
 $assigned_supervisort= mysqli_real_escape_string($mysqli, $_POST['supervisor']);
 $session= mysqli_real_escape_string($mysqli, $_POST['session']);
 if($surname!="" && $f_name!="" && $gender!="" && $phone_no!="" && $dept!="" && $session!="" && $assigned_supervisort!="")
 { 
   $role="student";
   $sql= mysqli_query($mysqli, "insert into students values ('$student_id','$f_name','$m_name','$surname','$gender','$phone_no','$session','$dept','$level')");
   if($sql)
   {
       $activity="active";
       $status="offline";
$msg="New student <font color='green'>".$surname." ".$f_name. "</font> has been assigned to a Supervisor.";
$user= mysqli_query($mysqli, "insert into users values ('$student_id','$student_id','$student_id','$role','$status','$activity')");
$assigned= mysqli_query($mysqli, "insert into student_supervisor values ('$student_id','$assigned_supervisort','$session','$dept')");
   }else{
       $msg="an error occoured". mysqli_error($mysqli);
   }
 }else{
     $msg="fill all required fields";
 }
}

?>
<?php
include_once 'co_navigator.php';?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px;">
    <form method="POST">
        <table style="width: 90%; height: 95%;" border="0">
            <tr >
                <th colspan="4" style="border-bottom:1px dashed lightcoral; ">
                    <font color='grey'>ASSIGN STUDENT TO PROJECT SUPERVISOR</font>
                </th>
            </tr>
            <tr>
                <td colspan="4">
            <center><?php echo $msg; ?> </center> 
                </td>
            </tr>
            <tr>
                <td>
                    Surname :
                </td>
                <td style="border-right: 1px dashed lightcoral;">
                    <input type="text" name="surname"required="required"><font color="red">*</font> 
                </td>
                <td align="right">
                    Gender :
                </td>
                <td>
                    <font color="red">*</font> Male:<input type="radio" name="sex" checked="checked" value="Male"> Female:<input type="radio" name="sex" value="Female">
                </td>
            </tr>
            <tr>
                <td>
                    First Name :
                </td>
                <td style="border-right: 1px dashed lightcoral;">
                    <input type="text" name="f_name" required="required"><font color="red">*</font> 
                </td>
                <td align="right">
                    Phone Number :
                </td>
                <td>
                    +234<input type="number" name="phone_no" required="required"><font color="red">*</font>
                </td>
            </tr>
            <tr>
                <td>
                    Middle Name :
                </td>
                <td style="border-right: 1px dashed lightcoral;">
                    <input type="text" name="m_name" >
                </td>
                <td align="right">
                    Level:
                </td>
                <td>
                    <select name="level" required="required">
                        <option value="">...level...</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                        <option value="">spill 1</option>
                        <option value="">spill 2</option>
                    </select><font color="red">*</font>
                </td>
            </tr>
            <tr>
                <td>
                    Session:
                </td>
                <td>
                    <select name="session" required="required">
                        <option value="">...select..</option>
                        <?php $year1=date(Y)-2;
                        $year2= date('Y')-1;?>
          <option value="<?php echo $year1."/".$year2;?>"><?php echo $year1."/".$year2; ?></option>
                    </select>
                </td>
                <td align="right">
                    Department:
                </td>
                <td>
                    <textarea rows="2" cols="20" name="dept" readonly required="required"><?php echo $staff_dept; ?></textarea><font color="red">*</font> 
                </td>
            </tr>
            <tr>
                <th align="right">
                    Select Supervisor:
                </th>
                <th>
                    <select name="supervisor" required="required">
                        <option value="">...select...</option> 
     <?php 
  $sql= mysqli_query($mysqli, "select * from staff where dept='$staff_dept' && role='supervisor' ORDER BY session ASC");
        while($result= mysqli_fetch_array($sql))
                {  
            $staff_id=$result['staff_id'];
$count_sql= mysqli_query($mysqli, "select * from student_supervisor where staff_id='$staff_id'");
$count=mysqli_num_rows($count_sql);
            ?><option value="<?php echo $staff_id;?>">
<?php echo $result['title']." ".$result['surname']." ".$result['f_name']." [".$count."]";?> </option>
                <?php }?>
                    </select>
                </th>
                <th>
                    Student ID:
                </th>
                <td>
                    <input type="text" name="student_id" required="required" >  
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px dashed lightcoral; border-top: none;">
            <center><input type="submit" name="register" value="ASSIGN SUPERVISOR" style="color: red;"></center>
                </td>
            </tr>
        </table> 
    </form>
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}