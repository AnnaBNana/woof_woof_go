$(document).ready(function() {
  var place_id = $('.id').html();
  // console.log(place_id);

  //call to google places api, using a div element as a node, instead of placing on a map
  var service = new google.maps.places.PlacesService(document.getElementById('park'));

  service.getDetails({
    placeId: place_id
  }, function(place, status) {
    $('.name').html(place.name);
    $('.address').html(place.adr_address);
    if (place.website) {
      var web = "<p>Website: <a target='_blank' href='" + place.website + "'>" + place.website + "</a></p>";
      $('.website').html(web)
    }
    if (place.opening_hours.weekday_text) {
      $('.hours').append('<h3>Hours:</h3>');
      $.each(place.opening_hours.weekday_text, function(i, val) {
        $('.hours').append('<p>' + val + '</p>' );
      })
    }
    console.log(place);
  });

});
