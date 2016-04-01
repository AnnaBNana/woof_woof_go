$(document).ready(function() {
  var place_id = $(".id").html();
  console.log(place_id);

  //call to google places api, using a div element as a node, instead of placing on a map
  var service = new google.maps.places.PlacesService(document.getElementById('park'));

  service.getDetails({
    placeId: place_id
  }, function(place, status) {
    console.log(place);
    $(".name").html(place.name);
    $(".address").html(place.adr_address);
    if (place.website) {
      var web = "<p>Website: <a target='_blank' href='" + place.website + "'>" + place.website + "</a></p>";
      $(".website").html(web)
    }
    if(place.formatted_phone_number) {
      $(".phone").html("Phone: " + place.formatted_phone_number);
    }
    if (place.opening_hours) {
      if(place.opening_hours.weekday_text) {
        $(".hours").append("<div class='ui inverted divider'></div><h3>Hours:</h3>");
        $.each(place.opening_hours.weekday_text, function(i, val) {
          $(".hours").append("<p>" + val + "</p>" );
        })
      }
    }
    if(place.photos) {
      var photo_url = place.photos[0].getUrl({maxWidth: 800, maxheight: 1000});
      $(".park_image").html("<img class='ui fluid image google_park_photo' src='" + photo_url + "'>");
    } else {
      $(".park_image").html("<p>there are no photos for this park</p>")
    }
    if(place.rating && place.user_ratings_total) {
      var rounded_rating = Math.round(place.rating);
      var rating = place.rating;
      $(".dynamic").attr("data-rating", rounded_rating);
      $('.dynamic').rating('disable');
      $(".number_rating").html("Rated " + rating + " out of " + place.user_ratings_total + " total reviews");
      console.log(rounded_rating);
    } else {
      $(".number_rating").html("there is no rating total for this park");
    }
    if (place.reviews) {
      for (var i = 0; i < place.reviews.length; i++) {
        var review_html = "<h3 class='ui olive header'>" + place.reviews[i].author_name + ": </h3><div class='ui inverted small heart rating sub_rating' data-rating='" + place.reviews[i].rating + "'data-max-rating='5'></div><p>" + place.reviews[i].text + "</p>";
        $(".reviews").append(review_html);
        $('.sub_rating').rating('disable');
      }
    }
    var url = place.url;
    var url_html = "<a href='" + url + "' target='_blank'><button class='ui large olive button'>view in Places</button></a>";
    $(".visit_button").html(url_html);
  });

});
