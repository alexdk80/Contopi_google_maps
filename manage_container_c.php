<?php
if(isset($_SESSION['user_session'])){
    include 'page/login.php';
    die();
}

require_once 'tbl/con_container_main.php';
require_once 'tbl/con_certificate_main.php';
require_once 'model/manage_container/manage_container_m.php';
require_once 'page/manage_container/insert_v_c.php';
require_once 'config.php';
require_once 'sql_db.php';
//require_once 'dbconfig.php';
//$_POST['identifier']="bnb";

class Manage_container_c{
    
    /** return con_container_main[] */
    static $v_arr_container;
            
    function __construct() {
        //echo "<pre>line:".__LINE__."file:".basename(__FILE__)."</pre>";
       $db=new SqlDb();
	  
        if(!isset($_POST['command'])){
            //echo "<pre>line:".__LINE__."file:".basename(__FILE__)."</pre>";
            if(isset($_GET['command'])){
                $_POST['command']=$_GET['command'];
                //echo "<pre>line:".__LINE__."file:".basename(__FILE__)."</pre>";
            }else{
                $_POST['command']="";    
                //echo "<pre>line:".__LINE__."file:".basename(__FILE__)."</pre>";
            }
        }
        $action=$_POST['command'];
        //echo "<pre>line:".__LINE__."file:".basename(__FILE__)."action=".$action."</pre>";
        if($action==""){
            require_once 'page/manage_container/index_v.php';
            //require_once 'page/install';
        
        }else if($action=="display_insert"){
            require_once 'page/manage_container/insert_v.php';
        }else if($action=="display_update"){
            require_once 'page/manage_container/update_v.php';    
        }else if($action=="display_delete"){
            require_once 'page/manage_container/delete_v.php';
        }else if($action=="insert"){
            $controller=new Manage_container_m();
            $r=$controller->insert($db);
            if($r){
                //echo "<pre>line:".__LINE__."file:".basename(__FILE__)."</pre>";
                require_once 'page/manage_container/redirect_v.php';                
            }else{
                require_once 'page/manage_container/redirect_v_validate.php';
                //echo 'Error i insert installer($db)';
            }           
            
        }else if($action=="update"){
            $controller=new Manage_container_m();
            $r=$controller->update($db);
              if($r){
                require_once 'page/manage_container/redirect_v.php';                

            }else{
                echo 'Error i update installer($db)';
            }
        }
        else if($action=="delete"){
                $controller=new Manage_container_m();
                $r=$controller->delete($db);
                if($r){
                require_once 'page/manage_container/redirect_v.php';
            }else{
                echo 'Error to delete installer($db)';
            }
        }
        
        else if($action=="select"){
            $controller=new Manage_container_m();
            $r=$controller->select($db);
            if($r){
                //require_once 'page/manage_container/redirect_v.php';
            }  else {
                echo 'Error to select installer($db)';
            }
            
        }
        else{
            echo 'Unexpected action'.$action;
        }
        
    }//end of constractor
}//end of class

$ob=new Manage_container_c();