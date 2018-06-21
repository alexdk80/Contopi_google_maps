<?php
require_once 'dbconfig.php';

if($user->is_loggedin()!="")
{
    $user->redirect('home.php');
}

if(isset($_POST['register']))
{
   $uname = trim($_POST['name']);
   $umail = trim($_POST['email']);
   $upass = trim($_POST['password']); 
 
   if($uname=="") {
      $error[] = "provide username !"; 
   }
   else if($umail=="") {
      $error[] = "provide email id !"; 
   }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($upass=="") {
      $error[] = "provide password !";
   }
   else if(strlen($upass) < 6){
      $error[] = "Password must be atleast 6 characters"; 
   }
   else
   {
      try
      {
         $stmt = $DB_con->prepare("SELECT name,email FROM user WHERE name=:uname OR email=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['name']==$uname) {
            $error[] = "sorry username already taken !";
         }
         else if($row['email']==$umail) {
            $error[] = "sorry email id already taken !";
         }
         else
         {
            //if($user->register($fname,$lname,$uname,$umail,$upass)) 
             if($user->register($uname,$umail,$upass))
            {
                $user->redirect('register_c.php?joined');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}
include 'page/register.php';
?>
