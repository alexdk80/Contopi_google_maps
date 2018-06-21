<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

class USER
{
    private $db;	
 
   function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
 
    //public function register($fname,$lname,$uname,$umail,$upass)
    public function register($uname,$umail,$upass)
    {
       try
       {
           $new_password = $upass;//password_hash($upass, PASSWORD_DEFAULT);// PASSWORD_DEFAULT);
   
           $stmt = $this->db->prepare("INSERT INTO user(name,email,password) 
                                                       VALUES(:uname, :umail, :upass)");
              
           $stmt->bindparam(":uname", $uname);
           $stmt->bindparam(":umail", $umail);
           $stmt->bindparam(":upass", $new_password);            
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function login($uname,$umail,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM user WHERE name=:uname OR email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
			  echo 'OKs';
             //if(password_verify($upass, $userRow['password']))
				 if($upass===$userRow['password'])
             {
				 echo "OK";
                $_SESSION['user_session'] = $userRow['id'];
                return true;
             }
             else
             {
				 echo "Not Ok";
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>