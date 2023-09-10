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
<div class="mid_section" style="margin-top: -15px; padding-left: 10px;background-image: url('../images/admin.jpg');background-repeat: no-repeat; background-size: 100% 102%;">
    
            </div>
           </div>
           <?php include_once 'footer.php';?>
<?php }else{
     header('Location:login.php'); 
}