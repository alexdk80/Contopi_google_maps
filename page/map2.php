<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../resources/style/googleStyle.css">
</head>

<body>
    <h3>My Google Maps Demo</h3>    
    <div id="map"></div>
    
    Lat: <input type="text" id="lat"><br>
    Lng: <input type="text" id="lng">
    <!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_BF8TmbXQMSy1N2b6LTBPAtO2-kXdjmo&callback=initMap"
  type="text/javascript"></script>-->
    
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script>
    var inforWindow=null;
    function initialize() {
    //var center = new google.maps.LatLng(37.4419, -122.1419);
    var center = new google.maps.LatLng(55, 8.56);

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: center,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var markers = [];

    var macDoList = [
     {lat:55.476466,lng:8.459405,link:'<a href="http://www.contopi.com">contopi.com</a>',image:'<img src="../resources/image/closed_container_014322.png" style="width:200px;height:150px;">'},
     {lat:55.09135,lng:8.43588,link:'<a href="http://www.contopi.com">contopi.com</a>',image:'<img src="../resources/image/container1.jpg" style="width:200px;height:150px;">'},
     {lat:55.19135,lng:8.43588,link:'<a href="http://www.contopi.com">contopi.com</a>',image:'<img src="../resources/image/containerDNV2.7-1.png" style="width:200px;height:150px;">'},
     {lat:56.00408,lng:8.56228,data:{drive:false,zip:93290,city:"TREMBLAY-EN-FRANCE"}},
     {lat:56.00308,lng:8.56219,data:{drive:false,zip:93290,city:"TREMBLAY-EN-FRANCE"}},
     {lat:53.93675,lng:8.35237,data:{drive:false,zip:93200,city:"SAINT-DENIS"}},
     {lat:53.93168,lng:8.39858,data:{drive:true,zip:93120,city:"LA COURNEUVE"}},
     {lat:53.91304,lng:8.38027,data:{drive:true,zip:93300,city:"AUBERVILLIERS"}},
    ];
    var content="";
    var link="";
    var image="";
    var ob=null;
    
    for(var j=0;j<macDoList.length;j++){
      ob=macDoList[j];      
      content="Link: "+ob.link+"<br>"+"Image: "+ob.image+"<br>"+"Latitude: "+ob.lat+"<br>"+"Longitude: "+ob.lng;
      ob.content=content;
      //console.log("CONTENT: " + ob.content);
    }

    for(var i=0;i<macDoList.length;i++){
      ob=macDoList[i];
      //console.log(macDoList[i].lat)
      var latLng = new google.maps.LatLng(
        ob.lat,
        ob.lng
      );
      var marker = new google.maps.Marker({
      position: latLng,
      draggable:true,
        map: map,
      });
      markers.push(marker);
      infoWindow=new google.maps.InfoWindow({
        maxWidth:200,
        content:ob.content
      });
      console.log("CONTENT: ",ob.content);

      
       /*google.maps.event.addListener(marker,'click',
          function(){
          infoWindow.open(map,this);
       });*/
      
      
      google.maps.event.addListener(marker,'click',
        (function(marker,infoWindow){
          return function(){
            //infoWindow.setContent(content);
            infoWindow.open(map,this);
          };
        })(marker,infoWindow)
      );
      
      google.maps.event.addListener(marker,'dragend',function(event){
        document.getElementById('lat').value=event.latLng.lat();
        document.getElementById('lng').value=event.latLng.lng();
      });
      //console.log(infoWindow);
      
      ob.lat=google.maps.event.addListener(marker,'dragend',function(event){
        this.marker =event.latLng.lat();        
      });
      lat=ob.lat;
      console.log(lat);
      
    }//end of for

    var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}
	</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjMa65TaPnIycSKteDKZsz7nxgXG0p5us&callback=initialize"></script>

</body>

</html>