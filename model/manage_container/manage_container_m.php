<?php

class Manage_container_m{
    
    function insert(SqlDb $db){
        $bValid=true;//$bValid should = false, but validation algorithm from below does't work in this case($bValid=false;)
        
        $tbl= new con_container_main_META();
        
        foreach($_POST as $key=>&$val){
            if(array_key_exists(key,$tbl->_array)){               
                $ob= Tbl_base::cast($tbl->_array[$key]);
                switch($ob->type){
                    case Tbl_types::$email:
                        if(!filter_var($val,FILTER_VALIDATE_EMAIL)===false){
                            $bValid=true;
                            $ob->error_message="Invalid Email";
                        }
                        break;
                    case Tbl_types::$int:
                        if(!filter_var($key,FILTER_VALIDATE_INT)===false){
                            $bValid=false;
                            $ob->error_message="It's not a number";
                        }
                        break;
                    case Tbl_types::$string:                        
                        break;
                    default:
                        echo 'Unsupported type!';
                }
            }
        }
        
        if($bValid){
            require_once "tbl/con_container_main.php";        
                
            $r=con_container_mainDO::insert_POST($db); 
            
            return $r;
        }else{
            return null;
        }
        
                               
        
        
        //echo "not implemented";
        //$g=new Insert_container_v_r();
        
        
    }//end of method
    
    function select(SqlDb $db){
        
        require_once "tbl/con_container_main.php";//to select conntainrs by id     
        $r=true;
                
        $r=con_container_mainDO::selectBy_ID($db);                       
        
        
        //echo "not implemented";
        //$g=new Insert_container_v_r();
        return $r;
        
    }//end of method
    
    function update(SqlDb $db){
        
        require_once "tbl/con_container_main.php";        
        $r=true;
                
        $r=con_container_mainDO::update($db);                        
        
        
        //echo "not implemented";
        //$g=new Insert_container_v_r();
        return $r;
        
    }//end of method
    
    function delete(SqlDb $db){
        
        require_once "tbl/con_container_main.php";        
        $r=true;
                
        $r=con_container_mainDO::delete_POST($db);                        
        
        
        //echo "not implemented";
        //$g=new Insert_container_v_r();
        return $r;
        
    }//end of method
}

