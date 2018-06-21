<?php

class SqlDb{
    /**
     *
     * @var mysqli
     */
    private $dbconn=null;
    
    function __construct(){
        
        $this->dbconn=new mysqli( Config::$dbhost,  Config::$dbusername,  Config::$dbpassword,  Config::$dbdatabase);
        if($this->dbconn==null){
            echo 'No connection!!!';
        }
    }
    
            
    function escape($v){
        return $this->dbconn->escape_string($v);
    }
            
    function query($sql,$__LINE__){
        
        $r= $this->dbconn->query($sql);
        if(!$r){
            echo '<pre>Failed to execute! '.htmlentities($sql)."<br>".$__LINE__.$this->dbconn->error."</pre>";
        }
        return $r;
    }//end of method
    
    function  _error()
    {
        return $this->dbconn->error;
    }//end of method
    
    function num_rows(mysqli_result $r){
        
        return $r->num_rows;
    }//end of method
    
    function fetch_assoc(mysqli_result $r){
        
        return $r->fetch_assoc();
    }
    
    
}//end of class

