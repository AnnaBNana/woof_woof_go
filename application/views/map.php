<!DOCTYPE html>
<html>
<head>
	<title>Woof Woof Go!</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://use.typekit.net/zzk6kht.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	 <script language="javascript" type="text/javascript" src="../assets/map.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsU9iilPcFFDwBg5viGoImP5IGx5LOUJY&libraries=places"></script>
	</script>

	<style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; }
    </style>

</head>
<body>
	<p class="back button"><a href="/traffic/success/<?= $this->session->userdata('id'); ?>">back to my profile</a></p>
	<div id="map">
	</div>

</body>
</html>