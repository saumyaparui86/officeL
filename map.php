<!DOCTYPE html>
<html>

<body>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiplaedu";
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$con=mysql_connect("localhost","root","");
if(!$con)
echo "connection error:".mysql_error();

$db=mysql_select_db("hiplaedu",$con);
if(!$db)
echo "database selection error:".mysql_error();

    $google_map_sql = "SELECT * FROM google_map_location WHERE 1";
    $google_map_res = mysql_query($google_map_sql);


 // $google_map_row = mysql_fetch_object($google_map_res);
// print_r($google_map_row);
// die;

while ($row= mysql_fetch_object($google_map_res))
		{

?>


<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
	var lat = '<?php echo $row->lat;?>';
	var long = '<?php echo $row->long;?>';

  var myCenter = new google.maps.LatLng(lat,long);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  google.maps.event.addListener(marker,'click',function() {
    var infowindow = new google.maps.InfoWindow({
      content:"Hello World!"
    });
  infowindow.open(map,marker);
  });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_rltYmZkUvHeJq_cLlnl0bMf7yhWcxa8&signed_in=true&libraries=places&callback=myMap" async defer></script>


<?php } ?>

</body>
</html>
