<?php
 ob_start();
 require 'db_connection.php';
?>
<?php
 session_start();
   $msg="";                                           //comment: user Login section
 if(isset($_POST['login'])!="")
     {
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($password!="" && $username!="")
        {
        $sql= mysqli_query($mysqli, "select * from users where username='$username' && password='$password'");
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
                $msg="username/password doess not exist";
                 }
        }else{
            $msg="invalid username/password";
             }
        }else{$msg="fill all fields";}
     }
?>
<html>
    <head>
        <title>Home</title>
             <link href="../css/design.css" type="text/css" rel="stylesheet">
             <link href="../css/popUpsStyles.css" type="text/css" rel="stylesheet">
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
                        <li><a href="#"onmouseover="document.getElementById('contact').style.visibility='visible';" onmouseout="document.getElementById('contact').style.visibility='hidden';">CONTACT</a></li>
                        <li><a href="#"onmouseover="document.getElementById('about').style.visibility='visible';" onmouseout="document.getElementById('about').style.visibility='hidden';">ABOUT</a></li>
                    </ul>
                    <?php 
                include 'contactUs.php';
                include 'about.php';
                    ?>
                </div>
            </div> 
<div class="section" style="background-image: url('../images/nature-hd-background-4.jpg');background-repeat: no-repeat; background-size: 100% 100%;">
    <br>
    <center>
        <div style="margin: 0 auto; width: 30%;">
        <form method="POST">
            <fieldset>
                <legend><font color='red'>LOGIN</font></legend>
                <center><font color="red"><?php echo $msg; ?></font></center>
<input type="text" name="username" required="required" placeholder="...username..."style="height: 30px;width: 200px; border-radius: .5em"><br><br>
<input type="password" name="password" required="required" placeholder="...password..." style="height: 30px;width: 200px; border-radius: .5em">
<br><br>
<input type="submit" name="login" value="Login" style="color: red; border-radius: .2em;">
            </fieldset>
           </form>
            <a href="change_user.php" style="color:white;">CHANGE YOUR LOGIN DETAILS</a>
        </div>
    </center>
<!--            <div class="mid_section">
                yeah
            </div>-->
           </div>
<?php            include 'footer.php';?>
        </div>
</div>
    </body>
</html>