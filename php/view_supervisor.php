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
?>
<?php
include_once 'co_navigator.php';?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px;">
    <table border="0" cellspacing='5' style="width: 98%;">
            <tr style="background-color:lightcoral;color: white;">
                <th colspan="5" style="border-bottom:1px dashed lightcoral; ">
                    ALL PROJECT SUPERVISORS OF <font color='black'> <?php echo $staff_dept;?> </font>DEPT
                </th>
            </tr>
        <tr style="background-color:lightcoral;color: white;">
            <th>SN</th>
            <th>FULL NAME</th>
            <th>GENDER</th>
            <th>DEPARTMENT</th>
            <th>SESSION APPOINTED</th>
        </tr>
        <?php
        $sql= mysqli_query($mysqli, "select * from staff where dept='$staff_dept' && role='supervisor' ORDER BY session ASC");
        $sn=0;
        $no=mysqli_num_rows($sql);
        if($no>0)
        {
        while($result= mysqli_fetch_array($sql))
        { 
            $sn++;
        ?>
        <tr>
            <td style="border-bottom: 1px dashed lightcoral;"><?php echo $sn; ?></td>
            <td style="border-bottom: 1px dashed lightcoral;"><?php echo $result['title']." ".$result['surname']." ".$result['f_name'];?></td>
            <td><?php echo $result['gender'];?></td>
            <td><?php echo $result['dept'];?></td>
            <td><?php echo $result['session'];?></td>
        </tr>
        <?php }}else {?>
        <tr>
            <th colspan="5">
                <font color="red"> <?php echo "No Co-ordinator Added to this Department yet.";?> </font>
            </th>
        </tr>
        <?php }?>
    </table>
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}