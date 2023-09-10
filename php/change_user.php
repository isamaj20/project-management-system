<?php
 ob_start();
 require 'db_connection.php';
?>
<?php
 session_start();
                            //comment: Changing User login details
if(isset($_POST['change']))
{
    $old_user=$_POST['old_user'];
    $new_user=$_POST['new_user'];
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
    $id=$_POST['id'];
    $new_pass2=$_POST['new_pass2'];
if($new_user!="" && $new_pass!="" && $new_pass2!="" && $id!="" && $old_pass!="" && $old_user!="")
    {
    if($new_pass!=$new_pass2)//comment: check if the password matches
    {
        echo"<script> alert('Error, password mismatched');</script>";
    }else{
       if(strlen($new_pass)<6)
        {
            echo "<script> alert('password length too short (6 characters min)');</script>";
        }else{
if(preg_match('/[A-Za-z]/', $new_pass) && preg_match('/[0-9]/', $new_pass))
{
$usernSQL= mysqli_query($mysqli, "select * from users where username='$old_user' && password='$old_pass' && id='$id'");
$userResult=mysqli_num_rows($usernSQL);
if($userResult>0)
{
    $new= mysqli_query($mysqli, "select * from users where username='$new_user'");
    $num=mysqli_num_rows($new);
    if($num>0)
    {
      echo "<script> alert('Username already Exist, please choose another Username');</script>";   
    }else{
$update= mysqli_query($mysqli, "update users set username='$new_user', password='$new_pass' where id='$id'");
if($update)
{   //login if success
$sql= mysqli_query($mysqli, "select * from users where username='$new_user' && password='$new_pass'");
        $count= mysqli_num_rows($sql);
        if($count>0)
        {
            $result=mysqli_fetch_array($sql);
            $role=$result['role'];
            if($role=="student")
            {
                $_SESSION['user_id']=$result['id'];
                $_SESSION['role']=$result['role'];
                header('Location:std_home.php');
            }else if($role=="supervisor")
            {
                $_SESSION['user_id']=$result['id'];
                $_SESSION['role']=$result['role'];
                header('Location:sup_home.php');
            }else if($role=="coordinator")
            {
                $_SESSION['user_id']=$result['id'];
                $_SESSION['role']=$result['role'];
                header('Location:co_home.php');
            }else if($role=="admin")
            {
                $_SESSION['user_id']=$result['id'];
                $_SESSION['role']=$result['role']; 
                header('Location:adm_home.php');
            }else{
                echo "<script> alert('Username/password doess not exist');</script>";
                 }
        }else{
            echo "<script> alert('Invalid username/password');</script>";
             }
        }else{echo "<script> alert('Failed to change login details'); </script>";}
    } }else{
            echo "<script> alert('Invalid Old Login Details provided');</script>";
             }
}else{
            echo "<script> alert('Pass must be combination of alphabets and numbers');</script>";
             }
    }
    }
    }else{
            echo "<script> alert('Fill all fields.');</script>";
             }
}
?>
<html>
    <head>
        <title>Home</title>
             <link href="../css/design.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="title_holder">
                    <br><br><br>
                    <center> <div id="title">Project Supervision System</div></center>
                </div>
                <div class="ul_holder">
                    <ul style="border-top: 1px black dashed;box-shadow: 5px -5px 5px #D3D3D3;">
                        <li><a href="login.php">HOME</a></li>
                        <li><a href="login.php">LOGIN</a></li>
                    </ul>
                </div>
            </div> 
<div class="section" style="">
    <br>
    <center>
        <div style="margin: 0 auto; width: 85%;height: 92%; border: 1px solid gray;overflow: auto;border-radius: 1em;s"><form method="POST">
             <table border="0"  cellspacing="5"cellpadding="5" style="height: 90%; width: 90%; ">
                    <tr>
                    <th colspan="4" style="border-bottom: 1px dashed #333;">
                        <font color="grey"> CHANGE YOUR LOGIN DETAILS </font> 
                    </th>
                    </tr>
<!--                    <tr>
                        <th colspan="4" style="font-style:  initial; color: red; font-size: large;">
                            <?php// echo $msg; ?>
                        </th>
                    </tr>-->
                    <tr>
                        <td colspan="4"><font color="red">*</font><font size='3' color='grey'>All fields are required and <u>Password</u> must combination of <u>Letter</u> and <u>Numbers</u></font></td>
                    </tr>
                    <tr>
                        <td>
                         Old username:
                        </td>
                    <td>
                        <input  type="text" name="old_user" required="required"   placeholder="old username" id="creUS" style=" width:60%; height: auto;"><font color="red">*</font>
                    </td><td>
                         New username:
                        </td>
                    <td>
                        <input  type="text" name="new_user" required="required"   placeholder="new username" id="creUS" style=" width:60%; height: auto;"><font color="red">*</font>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    Old Password:
                    </td>
                    <td>
<input type="password" name="old_pass"  placeholder="old password"  required="required" style=" width:60%; height: auto;"><font color="red">*</font>
                    </td>
                    <td>
                    New Password:
                    </td>
                    <td>
                        <input type="password" name="new_pass"  placeholder="new password"  title="minimum of 6 characters required" pattern=".{6,}" required="required" style=" width:60%; height: auto;"><font color="red">*</font><br>
                        <font color='grey' size='3'><i>minimum of six(6) characters.</i></font>
                    </td>
                    </tr>
                      <tr>
                        <td>
            Your ID
                        </td>
                        <td>
                            <input type="text" name="id"  placeholder="your user id" required="required" style=" width:60%; height: auto;"><font color="red">*</font>
                        </td>
                        <td>
                  Confirm Password: 
                        </td>
                    <td>
              <input type="password" name="new_pass2" required="required" placeholder="re-type new password" style=" width:60%; height: auto;"><font color="red">*</font>
                    </td>
                    </tr>
                     <tr>
                         <th colspan="4">
<input id="cre" style="color:red; border-radius: .2em;" type="submit" name="change" value="CHANGE">
                        </th>
                    </tr>
             </table></form>
        </div>
    </center>
           </div>
<?php            include 'footer.php';?>
  </div>
    </body>
</html>