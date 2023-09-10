<?php
//session_start();
if($_SESSION['role']!="")
{
?>
<html>
    <head>
        <title>PSS: Project Supervision System</title>
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
                        <li><a href="#" onmouseover="document.getElementById('contact').style.visibility='visible';" onmouseout="document.getElementById('contact').style.visibility='hidden';">CONTACT</a></li>
                        <li><a href="#"onmouseover="document.getElementById('about').style.visibility='visible';" onmouseout="document.getElementById('about').style.visibility='hidden';">ABOUT</a></li>
                    </ul>
                    <?php 
                    //include 'services.php';
                include 'contactUs.php';
                include 'about.php';
                    ?>
                    <div id="home_logout">
<a href="login.php" id="hme" >HOME</a>
                    </div>
<a href="logout.php" id="logout" >LOGOUT</a>

                </div>
                
            </div>
            <?php }else{
     header('Location:login.php'); 
}