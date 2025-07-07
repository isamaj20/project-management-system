<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$host="localhost";
$user="root";
$password="yourpassword";//leave blank if no password set
$dbName="projectmgt_system";//or your db name
$mysqli= new mysqli($host,$user,$password, $dbName);
//mysqli_select_db($con,$dbName);