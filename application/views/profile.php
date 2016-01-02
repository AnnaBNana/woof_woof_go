<!DOCTYPE html>
<html lang="en">
<head>
	<title>Woof Woof Go!</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://use.typekit.net/zzk6kht.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" type="text/css" href="../../assets/style.css">
	 <script language="javascript" type="text/javascript" src="../assets/map.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsU9iilPcFFDwBg5viGoImP5IGx5LOUJY&libraries=places"></script>
	</script>
	
</head>
<body>
	
	<h1 class="titles"><?= $alias ?></h1>
	<div class="nav_buttons">
		<p class="edit button"><a href="/traffic/success/<?= $this->session->userdata('id'); ?>">back to my profile</a><a href="/traffic/map">view dog park map</a></p>
	</div>

	<div class="me">
		<h1 class="small_title name"><?= $alias; ?> </h1>
		<h3 class="small_title">About Me:</h3>
		<p><?= $about; ?></p>
		<p class="profile_pic"><img src="../../uploads/<?= $img_name; ?>"></p>
	</div>

	<div class="pets">
		<h1 class="small_title"> My Pets </h1>
		<?php 
		foreach ($pets as $pet) {
		?>
			<div class="pet">
				<h2 class="small_title"><?= $pet['name']; ?></h2>
				<p class="small_title">SPECIES:</p><p><?= $pet['species']; ?></p>
				<p class="small_title">BREED:</p><p><?= $pet['breed']; ?></p>
				<p class="small_title">ABOUT:</p>
				<p><?= $pet['about']; ?></p>
				<p class="pet_pic"><img src="../../uploads/<?= $pet['img_name']; ?>"></p>
			</div>
		<?php } ?>
		</div>

	<p class="logout button"><a href="/traffic/end">Log me out</a></p>
</body>
</html>