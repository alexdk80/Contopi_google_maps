<?php

 // include 'connect.php';
  
  /*$lat=56.263920;
	$long=9.501785;
	$zoom=8;*/
	
  
	if(!empty($_POST)&&isset($_POST['submit'])){
		//Path to the folder where imges will store 
		$target_path = "images/".basename($_FILES['image']['name']);
		$lat=$_POST['lat'];
		$long=$_POST['long'];
		$desc=$_POST['desc'];
		$image=$_FILES['image']['name'];
		$image_tmp=$_FILES['image']['tmp_name'];	
		

		$sql="INSERT INTO mab3(pointLat,pointLong,description,image)";
		$sql.="VALUES('{$con->real_escape_string($lat)}','{$con->real_escape_string($long)}','{$con->real_escape_string($desc)}','{$con->real_escape_string($image)}')";
		
		$insert =$con->query($sql);
		
	echo 'Yes';
	///print response from database
	/*if($insert){
		echo "Success! Row ID: {$con->insert_id}";
	}else{
		die("Error: {$con->errno}:{$con->error}");
	}*/
	
	if(move_uploaded_file($image_tmp,$target_path)){
		$msg="Image uploaded succesfully";
		echo $msg;
	}else{
		$msg="There was a problem uploading an image";
		echo $msg;
	}	
	
	
	//close connection
	//$con->close();
	
	}
	if(isset($_POST['submit2'])){
		$sql="SELECT image FROM mab3 WHERE id IN(1,2,3,4,5)";
		$select=$con->query($sql);
		
		if($select->num_rows>0){
			echo "<table>";
			while($row=$select->fetch_assoc()){
				echo "<td>";
				echo "<img src='images/".$row['image']."' alt='container1.jpg' height='100' width='100'>";// alt="container1.jpg" height="100" width="100" />';
				
				echo "</td>";
				
			}
			echo "</tr>";
			echo "</table>";
			
		}else{
			echo "0 results";
		}
	}
	
	
   ?>		

<!DOCTYPE html>
<html>
  <head>
    <!--<meta name="viewport" content="initial-scale=1.0, user-scalable=no">-->
	<meta name="viewport" content="width=device-width, ,height=device-height, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Simple markers</title>
	<link rel="stylesheet" type="text/css" href="style.css?version=1" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
	  
	  div#button{
		  -webkit-appearence:button;
		  -moz-appearence:button;
		  appearence:button;
		  
		  text-decoraton:none;
		  color:initial;
		  position: fixed; 
		  top:0px;
		  right:0px;
		  border:3px solid green;
		  margin:10px;	  
		  background-color:green;
	  }
	  a.button{
		  color:white;
		  text-decoration:none;
	  }
    </style>
	<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
  </head>
  <body>
  <!--<form method="post" action="map4.php" enctype="multipart/form-data">
		<input type="number" step="any" name="lat" />
		<input type="number" step="any" name="long" />
		<input type="text" name="desc" />
		<input type="file" name="image" />
		<input type="submit" name="submit" value="Upload" />
		<input type="submit" name="submit2" value="Display">
	</form>-->
    <div id="map"></div>
	<div id="button">
	<a href="loginmvc/index.php" class="button">Login</a>
	</div>
    <script>

      function initMap() {
        var myLatLng = {lat: 56.263920, lng: 9.501785};
		var markers=[];

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: myLatLng
        });
		

		<?php
	$getpoints="SELECT id, pointLat, pointLong, description, image, link FROM mab3";//points WHERE mapID=$id";
	
	if(!$result=$con->query($getpoints)){
		die('There was an arror running the points query[' .$con->error. ']');
	}else{		
		while($row=$result->fetch_assoc()){
			echo ' 
				//var myLatLng1=new google.maps.LatLng('.$row['pointLat'].', '.$row['pointLong'].');	
				
				var marker1=new google.maps.Marker({
					position: new google.maps.LatLng('.$row['pointLat'].', '.$row['pointLong'].'),
					draggable:true,
					map:map,					
					title:"'.$row['description'].'"
				});
				markers.push(marker1);
				google.maps.event.addListener(marker1, "dragend", function(event){								
					document.getElementById("latbox").value = this.getPosition().lat();
					document.getElementById("longbox").value = this.getPosition().lng();
					document.getElementById("markerid").value = '.$row['id'].';					
					
				});
				
				var infoWindow=new google.maps.InfoWindow({
				maxWidth:200,
				content:"'.$row['description'].'<br/>'.$row['pointLat'].'<br/>'.$row['pointLong'].'<br><a href='.$row['link'].'>See more</a><br><img src=/images/'.$row['image'].' alt=container1.jpg height=100 width=100>"});
					
				google.maps.event.addListener(marker1,"click",(function(marker1,infoWindow){
						return function(){
							infoWindow.open(map,this);
						};
					})(marker1,infoWindow)
				);				 
			';		
		}
		
	}
	
	?>	
var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});	
        
      }
    </script>	
	<div id="output" align="center">
	<div style="position:fixed; bottom:0; margin-left:10px; margin-bottom:10px; padding: 5px; border: 3px solid #73AD21; max-width:235px; max-height:135px;" id="latlong">
	<!--<form method="POST" action="map4.php" id="form">-->
	<form method="POST" action="map4.php" id="form">
	<input type="hidden" id="markerid" name="markerid">
    <p style="color:red;"><label>Latitude: </label><input style="margin-left:13px" type="number" step="any" id="latbox" name="latbox" /></p>
    <p style="color:red;"><label>Longitude: </label><input type="number" step="any" id="longbox" name="longbox" /></p>
	<p><input id="saveposition" name="saveposition" value="Save new coordinates" /></p><!-- onClick="javascript:ajax_post()"/></p>-->
	<!--<input id="goback" type="button" onclick="location.href='loginmvc/index.php';" value="Go to Login" />-->
	</form>
	
	<script>
	 $(document).ready(function(){
		 
			$('#ssaveposition').click(function(){
				console.log("Works");
				var lat=$('#latbox').val();
				var lng=$('#longbox').val();				
				var id=$('#markerid').val();	
				
				$.post("update.php",{
					latitude:lat,
					longitude:lng,
					markerid:id
				},function(data){
					alert(data);
					//$('#form')[0].reset();
				}
				);
	 });
			});
	 
	</script>
	
	<script>
			$(document).ready(function(){
			$('#saveposition').click(function(e){
				var lat=$('#latbox').val();
				var lng=$('#longbox').val();
				var data1='latitude='+lat;
				var data2='&longitude='+lng;	
				var id=$('#markerid').val();	
				if(lat != '' && lng != ''){
				$.ajax({
					url:"update.php",
					type:"POST",
					async:true,
					data:{latitude:lat,
					longitude:lng,
					markerid:id},
					cache:false,
					success:function(data){
						alert(data);
				},
					
					/*success:function(data){
						$('#output').html(data);
					}*/
				});		}
				//e.preventDefault
			});
		});		
	</script>
	<?php
	if(isset($_POST['ssaveposition'])){
		//if(isset($_POST['latitude'])&&isset($_POST['longitude'])&&isset($_POST['markerid'])){
		$latbox=$_POST['latbox'];
		$longbox=$_POST['longbox'];
		$id=$_POST['markerid'];
		
		$sql="UPDATE mab3 SET pointLat={$con->real_escape_string($latbox)}, pointLong={$con->real_escape_string($longbox)} WHERE id={$con->real_escape_string($id)}";
		
		echo $sql;
		
		$update=$con->query($sql);
		echo "UPDATE";
		if($update){
			echo "Succcess..updated";
		}else{
			echo "Failed to update";
		}
	}
	?>
  </div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initMap">
    </script>	

  </body>
</html>