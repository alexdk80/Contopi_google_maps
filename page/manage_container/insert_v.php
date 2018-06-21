<?php if(isset($_SESSION['user_session'])){
    include 'page/login.php';
    die();
}
?>
<?php
  
  /*class Insert_container_v_r{
  
  public $description="description";
  public $latitute="latitute";
  public $longitude="longitude";
  public $image="image";   
	
  public $link="link";  
  public $user_id="user_id";  
  
  }  */
  // connect to the database

include('dbconfig.php');



// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['insert']))

{
echo "Insert";
// get form data, making sure it is valid

$latitude = $con->real_escape_string(htmlspecialchars($_POST['latitude']));
$longitude = $con->real_escape_string(htmlspecialchars($_POST['longitude']));
$description = $con->real_escape_string(htmlspecialchars($_POST['description']));
$image = $con->real_escape_string(htmlspecialchars($_POST['image']));
$link = $con->real_escape_string(htmlspecialchars($_POST['link']));
$user_id=$_SESSION['user_session'];



// check to make sure both fields are entered

if ($latitude == '' || $longitude == '')

{

// generate error message

$error = 'Please fill in all required fields!';



// if either field is blank, display the form again

//renderForm($latitude, $longitude, $description, $image, $link, $error);

}

else

{

// save the data to the database

$insert=$con->query("INSERT container SET latitude='$latitude', longitude='$longitude', description='$description', image='$image', link='$link', user_id=$user_id")

or die(mysqli_error());



// once saved, redirect back to the view page

header("Location: view.php");

}

}

else

// if the form hasn't been submitted, display the form

{

//renderForm('','','','','','');

}

?>


<?php

/*if(isset($_FILES['image'])){
    
    $errors=array();
    $file_name=$_FILES['image']['name'];
    $file_tmp=$_FILES['image']['tmp_name'];
    $file_size=$_FILES['image']['size'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $expensions=array("jpeg","jpg","png");
    
    if(in_array($file_ext,$expensions)===false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";        
    }
    
    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"../image/".$file_name);
        echo "Success";
    }else{
        print_r($errors);
    }
}*/
        

?>

<!DOCTYPE html>
<html>
  <head>
      <link href="resources/style/style_form1.css" rel="stylesheet" type="text/css" >  
  <script>
  function adjust_textaria(h){
  h.style.height="20px";
  h.style.height=(h.scrollHeight)+"px";
  }   
  </script>   
  </head>
  <body>
  
  <h2 style="text-align: center;">Fill the Container Form</h2>  
  <form class="form1" action="<?=$_SERVER["PHP_SELF"];?>" enctype="multipart/form-data" method="post">
  <!--<form class="form1" action="<?//php echo $uploadHandler ?>" method="post">-->
  <?php //$g=new Insert_container_v_r(); ?>
  <input type="hidden" name="command" value="insert" />
  <ul>
    
  <li><label for="description">Description: </label><input type="text" name="description">
    <span>Enter a container description</span>
  </li>    
  
  <li>
    <label for="latitude">Latitude: </label><input type="number" step="any" name="latitude">
    <span>Enter a latitude</span>
  </li>
  <li>
    <label for="longitude">Longitude: </label><input type="number" step="any" name="longitude">
    <span>Enter a longitude</span>
  </li>    
  
  <li>
    <label for="image">Image: </label><input type="text" name="image">
    <span>Enter an image</span>
  </li>    
  
  <li><label for="link">Link: </label><input type="text" name="link">
    <span>Enter a link</span>  
  </li>
  
  <li>
    <label for="user_id">User Id: </label><input type="number" name="user_id">
    <span>Enter User Id</span>       
  </li>
  
  <li>
    <input type="submit" name="insert" value="Insert">
  </li>
  </ul>
  
  <!--<ul>
        <li>Sent file: <?php echo $_FILES['image']['name'];  ?></li>
        <li>File size: <?php echo $_FILES['image']['size'];  ?></li>
        <li>File type: <?php echo $_FILES['image']['type'] ?></li>
    </ul>-->
  
    </form>
  
  </body>
</html>  