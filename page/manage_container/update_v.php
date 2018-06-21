<?php
  
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
  public $latitute="latitute";  	  

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
  
  }

  
  
?>

<!DOCTYPE html>
<html>
  <head>
      <link href="style/style_form1.css" rel="stylesheet" type="text/css" > 
  <script>
  function adjust_textaria(h){
  h.style.height="20px";
  h.style.height=(h.scrollHeight)+"px";
  }   
  </script>   
  </head>
  <body>
  
  <h2 style="text-align: center;">Fill the Container Form</h2>  
  <form class="form1" action="<?=$_SERVER["PHP_SELF"];?>" method="post">
  <?php $g=new Insert_container_v_r(); ?>
  <input type="hidden" name="command" value="insert" />
  <ul>
  <li>
    <label for="identifier">Identifier: </label><input type="text" name="<?=$g->identifier;?>">
    <span>Enter a container identifier</span>
  </li>
  <li>
    <label for="link container type">Link container type: </label><input type="text" name="link_container_type">
    <span>Enter a link container type</span>
  </li>
  <li><label for="description">Description: </label><input type="text" name="description">
    <span>Enter a container description</span>
  </li>
  
  <li><label for="certificate ID">Certificate ID: </label><input type="number" name="certificateID">
    <span>Enter Certificate ID</span>
  </li>
  <li>
    <label for="invoiceFrequency">Identifier: </label><input type="text" name="invoiceFrequency">
    <span>Enter an invoice frequency</span>
  </li>  
  <li>
    <label for="paymentConditions">Identifier: </label><input type="text" name="paymentConditions">
    <span>Enter a payment conditions</span>
  </li>
  <li>
    <label for="locationCountry">Identifier: </label><input type="text" name="locationCountry">
    <span>Enter a location country</span>
  </li>
  <li>
    <label for="locationCity">Identifier: </label><input type="text" name="locationCity">
    <span>Enter a location city</span>
  </li>
  <li>
    <label for="locationLabel">Identifier: </label><input type="text" name="locationLabel">
    <span>Enter a location label</span>
  </li>
  <!---->
  <li>
    <label for="locationGoogleMapsUrl">Identifier: </label><input type="text" name="locationGoogleMapsUrl">
    <span>Enter a location Google Maps Url</span>
  </li>
  <li>
    <label for="longitude">Identifier: </label><input type="number" name="longitude">
    <span>Enter a longitude</span>
  </li>
  <li>
    <label for="latitute">Identifier: </label><input type="number" name="latitute">
    <span>Enter a latitute</span>
  </li>
  <li>
    <label for="conditionID">Identifier: </label><input type="number" name="conditionID">
    <span>Enter a condition ID</span>
  </li>
  <li>
    <label for="height">Identifier: </label><input type="number" name="height">
    <span>Enter a height</span>
  </li>
  <li>
    <label for="width">Identifier: </label><input type="number" name="width">
    <span>Enter a width</span>
  </li>
  <li>
    <label for="length">Identifier: </label><input type="number" name="length">
    <span>Enter a length</span>
  </li>
  <li>
    <label for="tare">Identifier: </label><input type="number" name="tare">
    <span>Enter a tare</span>
  </li>
  <li>
    <label for="payload">Identifier: </label><input type="number" name="payload">
    <span>Enter a payload</span>
  </li>
  <li>
    <label for="payloadUnit">Identifier: </label><input type="number" name="payloadUnit">
    <span>Enter a payload unit</span>
  </li>
  <li>
    <label for="mainGrossWeight">Identifier: </label><input type="number" name="mainGrossWeight">
    <span>Enter a main gross weight</span>
  </li>
  <li>
    <label for="state">Identifier: </label><input type="number" name="state">
    <span>Enter a state</span>
  </li>
  <li>
    <label for="priceDay">Identifier: </label><input type="number" name="priceDay">
    <span>Enter a price per day</span>
  </li>
  <li>
    <label for="priceHandling">Identifier: </label><input type="number" name="priceHandling">
    <span>Enter a price handling</span>
  </li>
  <li>
    <label for="priceReplacement">Identifier: </label><input type="number" name="priceReplacement">
    <span>Enter a price replacement</span>
  </li>
  <li>
    <label for="certificateMasterID">Identifier: </label><input type="number" name="certificateMasterID">
    <span>Enter a certificate master ID</span>
  </li>
  <li>
    <label for="visualInspectionDate">Identifier: </label><input type="date" name="visualInspectionDate">
    <span>Enter a Visual Inspection date</span>
  </li>
  <li><label for="drawings zip file">Drawings Zip File: </label><input type="text" name="drawingsZipFile">
    <span>Upload Drawings Zip File</span>
  </li>
  <li>
    <label for="master drawing">Master Drawing Jpg: </label><input type="image" name="masterDrawingJpg">
    <span>Upload Master Drawing</span>
  </li>
  <li>
    <label for="terms and aonditions zip file">Terms And Conditions Zip File: </label><input type="text" name="">
    <span>Upload Terms And Conditions Zip File</span>
  </li>
  <li><label for="isAvailableForRent"  data-on="Yes" data-off="No">Is Available For Rent: </label><input type="radio" id="isAvailableForRent" class="yes-no" name="isAvailableForRent" value="yes" checked>Yes
    <input type="radio" id="isAvailableForRent" class="yes-no" name="isAvailableForRent" value="yes" checked>No
    <span>Enter if available For Rent</span>  
  </li>
  <li><label for="visual inspection">Visual Inspection: </label><input type="radio" name="bVisualInspectionOk" value="yes" checked>Yes
    <input type="radio" name="bVisualInspectionOk" value="no" checked>No
    <span>Enter if there is Visual Inspection</span>
  
    
  </li>
  <li>
    <label for="drawings exists at contopi">Drawings Exists At Contopi: </label><input type="radio" name="drawingsExistsAtContopi" value="yes" checked>Yes
   <input type="radio" name="drawingsExistsAtContopi" value="no" checked>No
    <span>Is Drawings Exists At Contopi</span>
   
   
  </li>
  <li>
    <label for="terms and conditions exists at contopi">Terms And Conditions Exists At Contopi: </label><input type="radio" name="termsAndConditionsExistsAtContopi" value="yes" checked>Yes
    <input type="radio" name="termsAndConditionsExistsAtContopi" value="no" checked>No
    <span>Is Terms And Conditions Exists</span>
    
    
  </li>
  <li>
    <input type="submit" value="Update">
  </li>
  </ul>
  </form>
  
  </body>
</html>  