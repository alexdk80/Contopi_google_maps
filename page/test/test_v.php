<?php

error_reporting(E_ALL);
ini_set("display_errors", "1");

class Insert_container_v_r{
  
  public $identifier="identifier";
  public $createdAs_link_container_typedof_mainID="createdAs_link_container_typedof_mainID";
  public $description="description"; 
  public $isAvailableForRent="isAvailableForRent";  
  public $certificateID="certificateID"; 
  public $bVisualInspectionOk="bVisualInspectionOk"; 

  public $drawingsZipFile="drawingsZipFile";  
  public $masterDrawingJpg="masterDrawingJpg";  
  public $drawingsExistsAtContopi="drawingsExistsAtContopi";
  public $termsAndConditionsExistsAtContopi="termsAndConditionsExistsAtContopi";
  public $termsAndConditionsZipFile="termsAndConditionsZipFile";  
  public $termsAndConditionsIsSinglePdf="termsAndConditionsIsSinglePdf";  

  public $invoiceFrequency="invoiceFrequency";  
  public $paymentConditions="paymentConditions";  
  public $locationCountry="locationCountry";  
  public $locationCity="locationCity";    
  public $locationLabel="locationLabel";  
  public $locationGoogleMapsUrl="locationGoogleMapsUrl";  
  public $longitude="longitude";    	
  public $latitude="latitude";  	  

  public $conditionID="conditionID";   
	
  public $height="height";  
  public $width="width";  
  public $length="length";  
  public $tare="tare";  
  public $payload="payload";  
  public $payloadUnit="payloadUnit"; 
  public $mainGrossWeight="mainGrossWeight"; 
  public $state="state";

  public $priceDay="priceDay";  
  public $priceHandling="priceHandling"; 
  public $priceReplacement="priceReplacement"; 
  public $certificateMasterID="certificateMasterID";
  public $visualInspectionDate="visualInspectionDate";
  
  }//end of class

  require_once 'sql_db.php';
  require_once 'config.php';
  $db=new SqlDb();
  
$foo=new Insert_container_v_r();

$reflect=new ReflectionClass($foo);
$props=$reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);



$myArr=[];

foreach ($props as $prop){
    $myArr[]=$prop->getName();
}

foreach ($myArr as $str){
    if(!isset($_POST[$str])){
        $_POST[$str]="";
    }
}

foreach ($myArr as $str){
    $_POST[$str]=$db->escape($_POST[$str]);   
}
$s="";

$i=0;
foreach ($myArr as $str){
    if($i==0){
        $s.="`$str`='".$db->escape($_POST[$str])."'\n";
    }  else {
        $s.=",`$str`='".$db->escape($_POST[$str])."'\n";
    }
    $i++;
}

$sql="insert into `con_container_main` SET \n".$s;

echo  "<pre>".$sql."</pre>" ;
//var_dump($props);