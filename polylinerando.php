<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Polyline Rando</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var polys = [];
var pts = [];
var map;  

function initialize() {          

        var France = new google.maps.LatLng(47.0067236, 2.7095064);
        var myOptions =
        {
                zoom: 7,
                center: France,
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);

        downloadUrl("creationxmlrando.php", function(data)
        {
               
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName("marker");


                for (var i = 0; i < markers.length; i++)
                {
                        pts[i] = new google.maps.LatLng(parseFloat(markers[i].getAttribute("lat")), parseFloat(markers[i].getAttribute("lng")));                  
                }
                var polyline = new google.maps.Polyline({
                        path:pts,
                        strokeColor:"blue",
                        strokeOpacity: 1,
                        strokeWeight: 2,                       
                        fillOpacity: 0
                });
                polyline.setMap(map);
                polys.push(poly);

               
        });
       
}


function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

        request.onreadystatechange = function() {
                if (request.readyState === 4) {
                        request.onreadystatechange = doNothing;
                        callback(request, request.status);
                }
        };

        request.open('GET', url, true);
        try {
                request.send(null);
        } catch (e) {
               
                console.log(e);
        }
       
}

function doNothing() {}
</script>      
</head>
<body onload="initialize()">
    <?php include('includes/menu.php');            ?>
<div id="map" style="width:950px; height:600px"> </div>  
</body>
</html>