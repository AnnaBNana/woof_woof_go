<!DOCTYPE html>
<html>
<head>
	<title>Woof Woof Go!</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://use.typekit.net/zzk6kht.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	 <script language="javascript" type="text/javascript" src="../assets/map.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=###&libraries=places"></script>
	</script>

	<style type="text/css">
      html, body { height: 80%; margin: 0; padding: 0; }
      #map { height: 100%; }
    </style>

</head>
<body>
	<p><a href = "/traffic/tester">tester</a></p>
	<div class="start button">
		<a href="/traffic/login">Login or Sign Up</a>
	</div>
	<div class="main_header">
		<p class="titles"> Woof  Woof  Go! </p>
		<p class="subtitle">the social networking site for dogs and their humans</p>
		<p>enable location services to see dog parks near you</p>
		<p>right click on a new map area to see dog parks within a 10 mile radius of the selected point, then click on a marker for details</p>
	</div>

	<!-- <form method="get" id="chooseZip">
		<button type="submit" class="learnButton">Use current location</button>
		<button type="button" id="searchZip" class="learnButton">Search by Zip Code</button>
		<div class="clear"></div>
		<div class="zipSearch">
			<input id="textZip" type="text" name="zip" placeholder="enter your zip code" autofocus>
			<button type="submit" class="learnButton">Search</button>
		</div>
		<div class="clear"></div>
	</form> -->

	<div id="map">
	</div>

</body>
</html>
