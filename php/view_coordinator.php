<?php
ob_start();
session_start();
if($_SESSION['role']=="admin")
{
include 'db_connection.php';
$msg="";

?>
<?php
include_once 'adm_navigator.php';?>
<div class="mid_section" style="margin-top: -15px; padding-left: 10px;">
    <table border="0" cellspacing='5' style="width: 98%;">
            <tr style="background-color:lightcoral;color: white;">
                <th colspan="5" style="border-bottom:1px dashed lightcoral; ">
                    <font color='white'> ALL COORDINATORS</font>
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
        $sql= mysqli_query($mysqli, "select * from staff where role='coordinator' ORDER BY session ASC");
        $sn=0;
        while($result= mysqli_fetch_array($sql))
        { 
            $sn++;
        ?>
        <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $result['title']." ".$result['surname']." ".$result['f_name'];?></td>
            <td><?php echo $result['gender'];?></td>
            <td><?php echo $result['dept'];?></td>
            <td><?php echo $result['session'];?></td>
        </tr>
        <tr>
        <td colspan="5" align="right" style="border-bottom: 1px dashed lightcoral;">
            <a href="remove_coordinator.php?id=<?php echo $result['staff_id']?>" style="text-decoration: none; color: red; background-color: lightgray; padding: 5px;padding-bottom: 0px;border: 1px solid #666666;" onclick="window.confirm('Are sure you want to proceed?  Notce: This action cannot be UNDO.');">REMOVE</a></td>
        </tr>
        <?php }?>
    </table>
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}