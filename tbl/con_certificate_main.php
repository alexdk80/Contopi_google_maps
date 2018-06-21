<?php

class con_certificate_main{

  public $id;                  
  public $con_container_mainID;
  public $dateNextInspection;
  public $nameOfStandard;
  public $classificationCompany;
  
}//end of class

class con_certificate_mainDO{
    
    static function _insert(SqlDb $dbconn){
        $sql="INSERT INTO `con_certificate_main`(
                
        con_container_mainID
        ,dateNextInspection
        ,nameOfStandard
        ,classificationCompany)
        VALUES(1
        ,'2016-12-05 00:00:00'
        ,'Standard1'
        ,'Special Container'
        
    )";
        
        if($dbconn->query($sql,__LINE__)){
			echo "New record created succesfully";
		}else{
			echo "Eroor: " . $sql. "br" .$dbconn->_error();
		}
    }//end of method
    
    static function _insertSet(SqlDb $dbconn, con_certificate_main $row){
        
        $sql="INSERT `con_certificate_main` SET
        #`ID`=".$row->id."
        ,``='".$row->con_container_mainID."'
        ,``='".$row->dateNextInspection."'
        ,``='".$row->nameOfStandard."'
        ,``='".$row->classificationCompany."'         
        
";
        
        if($dbconn->query($sql,__LINE__)){
			echo "New record created succesfully";
		}else{
			echo "Eroor: " . $sql. "br" .$dbconn->_error();
		}
    }//end of method
}//end of class