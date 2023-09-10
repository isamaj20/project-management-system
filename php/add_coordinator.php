<?php
ob_start();
session_start();
if($_SESSION['role']=="admin")
{
include 'db_connection.php';
$msg="";
if(isset($_POST['register']))
{
 $surname= mysqli_real_escape_string($mysqli, $_POST['surname']);
 $f_name= mysqli_real_escape_string($mysqli, $_POST['f_name']);
 $m_name= mysqli_real_escape_string($mysqli, $_POST['m_name']);
 $gender= mysqli_real_escape_string($mysqli, isset($_POST['sex'])? $_POST['sex']:null);
 $title= mysqli_real_escape_string($mysqli, $_POST['title']);
 $dept= mysqli_real_escape_string($mysqli, $_POST['dept']);
 $session= mysqli_real_escape_string($mysqli, $_POST['session']);
 if($surname!="" && $f_name!="" && $gender!="" && $title!="" && $dept!="" && $session!="")
 { 
$min=0;
$max=1000000000;
$staff_id="pMs".mt_rand($min, $max)."co";
   $role="coordinator";
   $check= mysqli_query($mysqli, "select * from staff where dept='$dept' AND role='$role'");
   $count=mysqli_num_rows($check);
   if($count>0)
   {
       $result=mysqli_fetch_array($check);
       $t=$result['title'];
       $snme=$result['surname'];
       $d=$result['dept'];
       $msg="Sorry, <font color='green'>".$t." ".$snme."</font> is the current project co-ordinator of <br> <font color='green'>".$d."</font> Department. If you wish to remove the above person, kindly use the appropriate link.";
   }else{
   $sql= mysqli_query($mysqli, "insert into staff values ('$staff_id','$f_name','$m_name','$surname','$role','$title','$session','$dept','$gender')");
   if($sql)
   {
       $activity="active";
       $status="offline";
$msg="New project Co-ordinator added to <font color='green'>".$dept. "</font> Department.<br> Staff ID:<font color='green'> ".$staff_id."</font>";
$user= mysqli_query($mysqli, "insert into users values ('$staff_id','$staff_id','$staff_id','$role','$status','$activity')");
   }else{
       $msg="an error occoured". mysqli_error($mysqli);
   }}
 }else{
     $msg="fill all required fields";
 }
}

?>
<?php
include_once 'adm_navigator.php';?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px;">
    <form method="POST" autocomplete="on">
        <table style="width: 90%; height: 90%;" border="0">
            <tr >
                <th colspan="4" style="border-bottom:1px dashed lightcoral; ">
                    <font color='grey'>NEW PROJECT CO-ORDINATOR</font>
                </th>
            </tr>
            <tr>
                <td colspan="4">
            <center><?php echo $msg; ?> </center> 
                </td>
            </tr>
            <tr>
                <td colspan="4">
                   <font color="red">*</font> <font color="gray"> Required fields</font> 
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
                  <font color="red">*</font>  Gender :
                </td>
                <td>
                     Male:<input checked="yes"type="radio" name="sex" value="Male"> Female:<input type="radio" name="sex" value="Female">
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
                    Title :
                </td>
                <td>
                    <select name="title" required="required">
                        <option value="">...select...</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Prof.">Prof.</option>
                    </select><font color="red">*</font> 
                </td>
            </tr>
            <tr>
                <td>
                    Middle Name :
                </td>
                <td style="border-right: 1px dashed lightcoral;">
                    <input type="text" name="m_name" >
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
                    </select> <font color="red">*</font>
                </td>
                <td align="right">
                    Department:
                </td>
                <td>
                    <textarea rows="3" cols="20" name="dept" required="required"></textarea><font color="red">*</font> 
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px dashed lightcoral; border-top: none;">
            <center><input type="submit" name="register" value="ADD COORDINATOR" style="color: red;"></center>
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