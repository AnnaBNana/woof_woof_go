$(document).ready(function(){

	var map;
	var request;
	var service;
	var markers = [];
	var center;
	var position;
	var geocoder;
	//custom map styling
	var styles = [
	  {
	    "featureType": "water",
	    "elementType": "geometry.fill",
	    "stylers": [
	      { "visibility": "on" },
	      { "color": "#0b91b5" },
	      { "saturation": -62 },
	      { "lightness": 22 }
	    ]
	  },{
	    "featureType": "landscape.natural.terrain",
	    "stylers": [
	      { "visibility": "off" }
	    ]
	  },{
	    "featureType": "poi.park",
	    "stylers": [
	      { "visibility": "on" },
	      { "color": "#b9cd18" }
	    ]
	  },{
	    "featureType": "road.highway",
	    "elementType": "labels",
	    "stylers": [
	      { "color": "#808080" },
	      { "visibility": "off" }
	    ]
	  },{
	    "featureType": "road.highway",
	    "elementType": "geometry",
	    "stylers": [
	      { "visibility": "on" },
	      { "color": "#808080" }
	    ]
	  },{
	    "featureType": "road"  },
			{
		    "featureType": "poi.park",
		    "elementType": "labels.text.fill",
		    "stylers": [
		      { "color": "#4e4c4c" }
		    ]
		  }
	]
	//pre-loading graphic, since g-maps is sometimes slow to respond, listens for all tiles to be loaded before hiding animation
	var loading = function() {
		google.maps.event.addListener(map, 'tilesloaded', function() {
			// console.log('testing');
			$('#loading').transition('fade out');
		});
	}

	//settings to initialize basic zoomed out map of entire US
	function initialize() {
		//initial map settings
		var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

		map = new google.maps.Map(document.getElementById('map'), {
			center: new google.maps.LatLng(37.09024, -100.712891),
			zoom: 5,
			zoomControl: true,
			zoomControlOptions: {
				position: google.maps.ControlPosition.RIGHT_TOP
			},
			mapTypeControl: false
		});
		loading();
		//define geocoder for later use with zip code
		geocoder = new google.maps.Geocoder();
		map.mapTypes.set('map_style', styledMap);
	  map.setMapTypeId('map_style');
	}
	//initialize map
	google.maps.event.addDomListener(window, 'load', initialize);

	//geocode settings and call to new map function
	function geoCode() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				position = {
							lat: position.coords.latitude,
							lng: position.coords.longitude
				}
				// userCords = new google.maps.LatLng(pos);
				newMap(position);
			});
		} else {
			alert('geocoding is disabled or unavailable in your browser');
		}
	}
	//if user clicks use my location, call geocode function
	$('.location_button').click(function() {
		geoCode();
	})
	//retrieves geocode information when user submits zip code,
	//uses lat lng from retrieved data as lat lng parameter for new map
	function useZip(zip) {
		$.get('https://maps.googleapis.com/maps/api/geocode/json?components=postal_code:' + zip + '&country:US&key=###', function(res) {
			newMap(res.results[0].geometry.location);
		}, 'json');
	}
	//get entered value from zip input field when zip submit button pressed, call use zip function
	$('.zip_search').click(function() {
		var zip = $('.zip_input').val();
		// console.log('my zip code', zip);
		useZip(zip);
	})
	//zooms in to new map location based on coord parameter, then queries db using key words to place markers on map
	function newMap(position) {
		//new map
		var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});
		map = new google.maps.Map(document.getElementById('map'), {
			center: position,
			zoom: 11,
			zoomControl: true,
			zoomControlOptions: {
				position: google.maps.ControlPosition.RIGHT_TOP
			},
			mapTypeControl: false
		});
		map.mapTypes.set('map_style', styledMap);
		map.setMapTypeId('map_style');
		//query settings
		request = {
			location: position,
			radius: 16093,
			keyword: 'dog+park'
		};
		//creates new instance of window for marker clicks
		infowindow = new google.maps.InfoWindow();
		//sets var service to be an instance of google places
		service = new google.maps.places.PlacesService(map);
		//searches area shown in map using above settings
		service.nearbySearch(request, callback);
		//right click moves map, replaces markers
		google.maps.event.addListener(map, 'rightclick', function(event) {
			map.setCenter(event.latLng)
			clearResults(markers)
			//reset request settings
			request = {
				location: event.latLng,
				radius: 24140,
				keyword: 'dog+park'
			};
			//new service search
			service.nearbySearch(request, callback);
		});
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
	      scale: 0.5,
	      strokeWeight: 1,
	      strokeColor: '#b9cd18',
	      strokeOpacity: 1,
	      fillColor: '#626e05',
	      fillOpacity: 1
	    }
		});

		google.maps.event.addListener(marker, 'click', function() {
			console.log(place);
			infowindow.setContent('<a class="infoWindowText" href="/traffic/park/' + place.place_id + '">' + place.name + '</a>');
			console.log(place.place_id);
			infowindow.open(map, this);
		});

		return marker;
	}

	function clearResults(markers) {
		for (var m in markers) {
			markers[m].setMap(null)
		}
		markers = [];
	}

	$('.zip_button').click(function(){
		$('.zip_div').transition('fade');
	});

	$('.message .close').on('click', function() {
    $(this).closest('.message').transition('fade');
  });

});
