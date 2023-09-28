<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Transition Effect</title> 
   <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTqVv8bnWtcApNQ7VCErEt8r2N5gPs5TM&callback=initialize">
    </script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <style>#map_canvas{
    width: 1330px;
    height: 700px;
}
.bus-marker {
      width: 50px;
      height: 50px;
      background-image: url('dumper.svg');
      background-size: contain;
      transform-origin: center center;
      transition: transform 0.5s ease-in-out;
    }
</style>
</head> 
<body>
<script type="text/javascript">

var map = undefined;
var marker = undefined;
var position = [22, 77];
var destination = undefined;
var rotationAngle = 0; // Initialize the rotation angle
    function initialize() {
            
        var latlng = new google.maps.LatLng(position[0], position[1]);
        var myOptions = {
            zoom: 10,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
     // Create a custom marker icon for the bus
  var busIcon = {
    url: 'bharat.png', // Replace with the actual path to your bus icon image
    scaledSize: new google.maps.Size(50, 50), // Adjust the size as needed
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(25, 50) // Adjust the anchor point
  };

        marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: busIcon,
            title: "Your current location!",
            rotation: rotationAngle // Initial rotation
        });
   
   // Create an info window for the marker
   var infoWindow = new google.maps.InfoWindow({
        content: "<div>This is the bus info window content.</div>"
    });

    // Attach a click event listener to the marker to show the info window
    marker.addListener('click', function() {
        infoWindow.open(map, marker);
    });
        google.maps.event.addListener(map, 'click', function(event) {
            var result = [event.latLng.lat(), event.latLng.lng()];
            transition(result);
            // console.log("Pointer Location",result);
        });
    }
   


  // let rotationAngle = 45; // Set the desired rotation angle

  function rotateMap() {
    const map = new google.maps.Map(document.getElementById('map'));

    // Set the new heading (rotation) for the map
    map.setHeading(rotationAngle);

    // You might want to adjust the map's center and zoom as needed here
  }


    var numDeltas = 100;
    var delay = 100; //milliseconds
    var i = 0;
    var deltaLat;
    var deltaLng;
    function transition(result){
        i = 0;
        deltaLat = (result[0] - position[0])/numDeltas;
        deltaLng = (result[1] - position[1])/numDeltas;
        moveMarker();
    }
    
    function moveMarker(){
        position[0] += deltaLat;
        position[1] += deltaLng;
        var latlng = new google.maps.LatLng(position[0], position[1]);
          // Calculate the rotation angle towards the destination
  if (destination) {
    rotationAngle = calculateBearing(latlng, new google.maps.LatLng(destination[0], destination[1]));
    marker.setRotation(rotationAngle);
  }
        marker.setPosition(latlng);
           console.log("lat=",position[0],"lng=",position[1]);
        if(i!=numDeltas){
            i++;
            setTimeout(moveMarker, delay);
        }
    }

    
</script>
<div id="map_canvas"></div>

<div><h2>click the map to animate</h2>
<p>When we Point the map then this make the last location of the point </p></div>
<!-- <button onclick="rotateMap()">Rotate Map</button> -->
</body>
</html>
