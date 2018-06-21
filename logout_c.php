<?php
session_start();
require_once 'class.user.php';
$user = new USER();


if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if($user->is_loggedin()!="")
{
 $user->logout(); 
 $user->redirect('index.php');
}
//require_once 'page/manage_container/index_v.php';
?>