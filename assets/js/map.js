$(document).ready(function(){

	var map;

	var request;
	var service;
	var markers = [];
	var center;


	function initialize() {

		if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(function(position) {
		var pos = {
	        lat: position.coords.latitude,
	        lng: position.coords.longitude
		}
	      lat_usr = pos.lat;
	      lng_usr = pos.lng;
	      console.log(lat_usr);

		userCords = new google.maps.LatLng(lat_usr, lng_usr);

		map = new google.maps.Map(document.getElementById('map'), {
			center: userCords,
			zoom: 11
		});

		request = {
			location: userCords,
			radius: 16093,
			keyword: 'dog+park'
		};
		infowindow = new google.maps.InfoWindow();

		service = new google.maps.places.PlacesService(map);

		service.nearbySearch(request, callback);

		google.maps.event.addListener(map, 'rightclick', function(event) {
			map.setCenter(event.latLng)
			clearResults(markers)

			var request = {
				location: event.latLng,
				radius: 24140,
				keyword: 'dog+park'
			};
			service.nearbySearch(request, callback);
		});
		  });
		}

	}

	function callback(results, status) {
		if(status == google.maps.places.PlacesServiceStatus.OK) {
			for (var i = 0; i < results.length; i++) {
				markers.push(createMarker(results[i]));
			}
		}
	}

	function createMarker(place) {
		var placeLoc = place.geometry.location;
		var marker = new google.maps.Marker ({
			map: map,
			position: place.geometry.location,
			icon: {
        path: fontawesome.markers.TREE,
        scale: 0.4,
        strokeWeight: 0.5,
        strokeColor: '#ffffff',
        strokeOpacity: 1,
        fillColor: 'olive',
        fillOpacity: 1
	    }
		});

		google.maps.event.addListener(marker, 'click', function() {
			console.log(place);
			infowindow.setContent('<a class="infoWindowText" href="/traffic/park/' + place.place_id + '">' + place.name + '</a>');
			infowindow.open(map, this);
		});
		return marker;
	}

	function clearResults(markers) {
		for (var m in markers) {
			markers[m].setMap(null)
		}
		markers = []
	}
	google.maps.event.addDomListener(window, 'load', initialize);

});
