<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Markers</title> 
   <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTqVv8bnWtcApNQ7VCErEt8r2N5gPs5TM&callback=initialize">
    </script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <style>#map_canvas{
    width: 530px;
    height: 400px;
}
</style>
</head> 
<body>
<button onclick="rotateMap()">Rotate Map</button>
  <div id="map_canvas"></div>

  <script type="text/javascript">
    var map;
    var marker;
    var position = { lat: -34.397, lng: 150.644 };

    function initialize() {
      var myOptions = {
        zoom: 10,
        center: position,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

      marker = new google.maps.Marker({
        position: position,
        map: map,
        title: "Your current location!"
      });
    }

    let rotationAngle = 90; // Set the desired rotation angle
    map = new google.maps.document.getElementById('map_canvas').style.transform = `rotate(${rotationAngle}deg)`;

    // function rotateMap() {
    //   rotationAngle += 180; // Increment the rotation angle by 45 degrees

    //   // Apply rotation using CSS transform
    // }
  </script>

  <div>
    <h2>Click the button to rotate the map</h2>
    <p>When you click the button, the map will rotate by 45 degrees each time.</p>
  </div>
</body>
</html>
