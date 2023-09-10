<?php
session_start();
$_SESSION['std']="no student";
//unset($_SESSION['id']);
header('Location:sup_home.php');
