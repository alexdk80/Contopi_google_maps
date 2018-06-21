<?php
//include '../manage_container_c.php';

require_once 'dbconfig.php';

if($user->is_loggedin()!="")
{
 $user->redirect('manage_container_c.php');
}

if(isset($_POST['login']))
{
 $uname = $_POST['name_email'];
 $umail = $_POST['name_email'];
 $upass = $_POST['password'];
  
 if($user->login($uname,$umail,$upass))
 {
  $user->redirect('manage_container_c.php');
  //echo 'Logged in';
 }
 else
 {
  $error = "Wrong Details !";
 } 
}
require_once 'page/login.php';
?>