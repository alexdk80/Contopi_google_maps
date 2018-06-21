<?php
require_once 'tbl/con_container_main.php';
require_once 'tbl/con_certificate_main.php';
require_once 'model/install/install_m.php';
require_once 'page/install/install_v_c.php';
require_once 'config.php';
require_once 'sql_db.php';

class Install_c{
    
    function __construct() {
        $db=new SqlDb();
        if(!isset($_POST['command'])){
            $_POST['command']="";
        }
        $action=$_POST['command'];
        
        if($action==""){
            require_once 'page/install/install_v.php';
            require_once 'page/install';
        }else if($action=="install"){
            $controller=new Install_m();
            $r=$controller->installer($db);
            if($r){
                echo 'Alt er i orden!:)';
            }else{
                echo 'Error i installer($db)';
            }
        }else{
            echo 'Unexpected action'.$action;
        }
        
    }//end of constractor
}//end of class

$ob=new Install_c();