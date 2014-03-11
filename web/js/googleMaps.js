var geocoder;
var map;
function initialize() {
    geocoder = new google.maps.Geocoder();
    var mapOptions = {
        center: new google.maps.LatLng(52.415303, -4.082920),
        zoom: 13
    };
    map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

    var input = /** @type {HTMLInputElement} */(
            document.getElementById('inputLocation'));

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); 
        }
        marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
    });

    codeAddress();
}
function codeAddress() {

    $.getJSON("/app_dev.php/admin/map_add_markers",
            function(users) {
                for (var i = 0; i < users.length; i++) {
                    if (users[i].address != null) {
                        geocoder.geocode({'address': users[i].address.address}, makeCallback(users[i]));
                    }
                }
            });
}

function makeCallback(user) {
    var geocodeCallBack = function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            console.log(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                title: user.personal.first_name + ' ' + user.personal.lastname + ' ' + user.address.tel
            });
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    };
    return geocodeCallBack;
}

google.maps.event.addDomListener(window, 'load', initialize);