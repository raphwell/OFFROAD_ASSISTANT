/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var polys = [];
var pts = [];
var map;  

function initialize() {          

        var toulon = new google.maps.LatLng(43.116667, 5.933333);
        var myOptions =
        {
                zoom: 12,
                center: toulon,
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);

        var departement = document.parcours.departement.value;
        downloadUrl("../xml/creationXmlParcours.php?departement=" + departement, function(data)
        {
               
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName("marker");
                

                for (var i = 0; i < markers.length; i++)
                {
                        pts[i] = new google.maps.LatLng(parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));                  
                }
                var polyline = new google.maps.Polyline({
                        path:pts,
                        strokeColor:"red",
                        strokeOpacity: 1,
                        strokeWeight: 3,                       
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