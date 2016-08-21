/**
 * Created by Marejean on 8/21/16.
*/

//initialize();
var userLocation = "";
var geocoder;
if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
}

/*function getDistance(origin, destination) {
    console.log("origin passed = " + JSON.stringify(origin));
    console.log("destination passed = " + destination);
    var service = new google.maps.DistanceMatrixService;
    //alert("Getting the distance between: " + JSON.stringify(origin) + " and " + destination);
    console.log("here sa get distance uL = " + userLocation);
    service.getDistanceMatrix({
        origins: [userLocation],
        destinations: [destination],
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function(response, status) {
        if (status !== 'OK') {
            alert('Error was: ' + status);
        } else {
            var originList = response.originAddresses;
            //alert("=== " + JSON.stringify(response.originAddresses));
            console.log("origin list length = " + originList.length);
            for (var i = 0; i < originList.length; i++) {
                var results = response.rows[0].elements;
                $("#neededDistance").val(results[0].distance.value);
            }
        }
    });
}*/

function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Geocoder failed");
}

function initialize() {
    geocoder = new google.maps.Geocoder();
}

function codeLatLng(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            //console.log(results)
            if (results[1]) {
                //formatted address
                //userLocation = results[0].formatted_address;
                console.log("global = " + userLocation);
                //alert(userLocation)
                alert("Your are currently at " + results[0].formatted_address);
                //find country name
                for (var i=0; i<results[0].address_components.length; i++) {
                    for (var b=0;b<results[0].address_components[i].types.length;b++) {
                        //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                        if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                            //this is the object you are looking for
                            city= results[0].address_components[i];
                            break;
                        }
                    }
                }
                //city data
                //alert(city.short_name + " " + city.long_name)
                //$("#userLocation").val(results[0].formatted_address);
                //$("#address").val(results[0].formatted_address + " " + city.long_name);

            } else {
                alert("No results found");
            }
        } else {
            alert("Geocoder failed due to: " + status);
        }
    });
}
