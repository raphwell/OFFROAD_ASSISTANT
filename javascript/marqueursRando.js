/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* global google */

function initialize() {
    var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(47.08, 2.40),
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

var icon = '../images/hiker.png';
var infoWindow = new google.maps.InfoWindow;

var pseudo = document.rando.pseudo.value;
downloadUrl("../xml/creationxmlrando.php?pseudo=" + pseudo, function (data) {
    var xml = data.responseXML;
    var position = xml.documentElement.getElementsByTagName("marker");
    for (var i = 0; i < position.length; i++) {
        var nom = pseudo;
        var latitude = position[i].getAttribute("lat");
        var longitude = position[i].getAttribute("lng");
        var date = position[i].getAttribute("date");
        //var type = position[i].getAttribute("type");
        var point = new google.maps.LatLng(
                parseFloat(position[i].getAttribute("lat")),
                parseFloat(position[i].getAttribute("lng")));
        var html = "randonneur: " + nom + "<br> lat: " + latitude + "<br> long: " + longitude + "<br>" + date;
        //var icon = customIcons[type] || {};
        var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon
        });
        bindInfoWindow(marker, map, infoWindow, html);
    }
});

function bindInfoWindow(marker, map, infoWindow, html) {
    google.maps.event.addListener(marker, 'click', function () {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
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
      request.send(null);
    }

    function doNothing() {}
}