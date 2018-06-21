<?php

error_reporting(E_ALL);
ini_set('display_errors','1');

class Install_m{
    
    public $arr_table_names;
    
    function __construct()
	{
		$this->arr_table_names=['container','user'];
	}
    
    private function contopi_create_tables($dbconn)
{

$sql="
    create table `container`(
    `ID`          bigint not null auto_increment primary key          comment ''
    ,`identifier` varchar(60)                                         comment ''    
    ,`description`         mediumtext                                 comment 'Some html like bold,italic is allowed'
    
    ,`isAvailableForRent`  tinyint not null default 0                 comment ''
    ,`certificate`       varchar(40) not null
    ,`bVisualInspectionOk` tinyint(1) not null default 0              comment 'Not markedplace ready unless this is == 1'

    ,`drawingsZipFile`                  blob default null
    ,`masterDrawingJpg`                 blob default null             comment 'Dette billede kan vises skalleret på skærmen.'
    ,`drawingsExistsAtContopi`          tinyint(1) not null default 0
    ,`termsAndConditionsExistsAtContopi`tinyint(1) not null default 0
    ,`termsAndConditionsZipFile`        blob
    ,`termsAndConditionsIsSinglePdf`    tinyint(1) not null default 0 

    ,`invoiceFrequency`                 varchar(255)                  comment 'Kan dette være en streng ?? - påvirker denne forsikring prisen som skal skrives i bunden af container beskrivelsen.'
    ,`paymentConditions`                varchar(255)                  comment 'Kan dette være en streng ??'
    ,`locationCountry`                  varchar(40) not null
    ,`locationCity`                     varchar(40) not null
    ,`locationLabel`                    mediumtext 
    ,`locationGoogleMapsUrl`            varchar(255)
    ,`longitude`                        numeric	not null default 0	  comment ''	
    ,`latitude`                 	numeric not null default 0        comment ''

    ,`condition`                      set('New','Slightly used','Used but good')

    ,`height`              numeric(15,2)
    ,`width`               numeric(15,2)
    ,`length`              numeric(15,2)
    ,`tare`                varchar(255)
    ,`payload`             numeric(15,2)
    ,`payloadUnit`         varchar(20)
    ,`mainGrossWeight`     numeric(15,2)      comment 'Calculated `tare`+`payload`'
    ,`state`               set('beeingCreated','createdNotMarkedAsMarkedPlaceReady','markedPlaceReady')

    ,`priceDay`            numeric(15,2) default null
    ,`priceHandling`       numeric(15,2) default null
    ,`priceReplacement`    numeric(15,2) default null
    
    ,`visualInspectionDate` datetime default null
    ,`certificateMasterID`  numeric(15,2) default null

    ,`DATE_LAST_UPDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ,`lastEdit_c_userID`          bigint not null default 0                  comment 'Use 0 if modified manually by a developer.'
    ,`viewCache`                  tinyint not null default 0                 comment '0=loadedFromDbNotChanged 1=insert, 2=update, 3=delete'  

    ,key(`visualInspectionDate`)  
    )DEFAULT CHARSET=utf8
    ";
	
$dbconn->query($sql,__LINE__);


$sql="CREATE TABLE `con_certificate_main` (
  `ID`                     bigint(20) NOT NULL AUTO_INCREMENT comment ''
  ,`con_container_mainID`  bigint(20) DEFAULT NULL            comment ''
  ,`dateNextInspection`    datetime not null                  comment ''
  ,`nameOfStandard`        varchar(255) DEFAULT NULL          comment ''
  ,`classificationCompany` varchar(255) DEFAULT NULL          comment ''
  ,`DATE_LAST_UPDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ,`lastEdit_c_userID`     bigint(20) NOT NULL DEFAULT '0'    comment 'Use 0 if modified manually by a developer.'
  ,`viewCache`             tinyint(4) NOT NULL DEFAULT '0'    comment '0=loadedFromDbNotChanged 1=insert, 2=update, 3=delete'  
  ,PRIMARY KEY (`ID`)
  ,key(`con_container_mainID`)
  ,key(`dateNextInspection`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

$dbconn->query($sql,__LINE__);


}//end of contopi_create_tables() method

private function delete_tables($dbconn)
	{
            echo "<pre>DROP TABLES[line:".__LINE__."][".basename(__FILE__)."]</pre>";
            
		foreach($this->arr_table_names as $tbl)
		{
                    echo "<pre>DROP one more[line:".__LINE__."][".basename(__FILE__)."]</pre>";
			try{    
			$sql='drop table ' . $tbl;
			$r=$dbconn->query($sql,__LINE__);
                        if(!$r){
                            echo "db-error:".$dbconn->error;                            
                        }                     
                        
                        echo 'deleted!!!';
			}
			catch (Exeption $e){
				echo 'Errrrroorrr!!!' . $e->getMessage(). "<br>";
			}
		}
	}//end of method
        
        function contopi_select_table($dbconn){
	
    echo "_Contopi container table_"."<br>";
	$sql="select id, description,latitude,longitude,image,link,user_id from `container`";
	$result=$dbconn->query($sql,__LINE__);
	
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			echo "Id: " .$row['id']."<br>". "Description: ".$row['description']."<br>".
                                "Latitude: ".$row['latitude']."<br>"."Longitude: ".$row['longittude']."<br>".
                                "Image :".$row['image']."<br>".
                                "Link :".$row['link']."<br>".
                                "User Id :".$row['user_id']."<hr><br>";
		}
	}else{
		echo '0 results in "Contopi container table"'."<br>";
	}
        
        echo "_Contopi certificate table_"."<br>";
        $sql="select ID, con_container_mainID, dateNextInspection
              ,nameOfStandard, classificationCompany from `con_certificate_main`";
        $result=$dbconn->query($sql,__LINE__);
        
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "Id: " .$row['ID']."br". "Container I: " .$row['con_container_mainID']. "<br>".
                        "Next Inspection: " .$row['dateNextInspection']."<br>"."Name Of Standard: " .$row['nameOfStandard']. "<br>".
                        "Classification Company: " .$row['classificationCompany']."<hr><br>";
            }           
            
        }else{
            echo '0 results in "Contopi certificate table"'."<br>";
        }
}//end of method

private function show_tables(SqlDb $dbconn){
	$sql = "show tables";
	$result=$dbconn->query($sql, __LINE__);
	$r=[];
	
	while($row=$result->fetch_row()){
		$r[]=$row[0];
	}
        echo "<pre>show tables:[line".__LINE__."][".basename(__FILE__)."]";
        print_r($r);
        echo "</pre>";
	return $r;
}//end of method

function installer(SqlDb $dbconn){    
  	
  $this->delete_tables($dbconn);
  //exit;
  $arr=$this->show_tables($dbconn);
  $foundAll=true;
  foreach($this->arr_table_names as $tbl){
    $found=false;
    foreach($arr as $e){
      if($e==$tbl){			
        $found=true;
      }
    }
    if(!$found){
	  $foundAll=false;
    }
  }
  
  //$this->contopi_update_table($myconn);
  //con_container_mainDO::_insert($dbconn);
  //con_certificate_mainDO::_insert($dbconn);
  $this->contopi_create_tables($dbconn);
  if(!$foundAll){
	  echo "Vi fandt ikke alle tabeller";	  
	  //$this->contopi_select_table($dbconn);
	  //$this->contopi_create_tables($dbconn);
          //con_container_mainDO::_insert($dbconn);
          
  }else{
      
	  echo "line:".__LINE__." Vi fandt alle tabeller, så vi behøver ikke at oprette"."<br>";
  }
 
  return true;
  //$this->select_table($myconn);
}//end of method
        
        
}//end of class

