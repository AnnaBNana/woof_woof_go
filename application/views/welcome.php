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
	
	<h1 class="titles">My Profile</h1>

	<div class="nav_buttons">
		<p class="edit button"><a href="/traffic/edit/<?= $id; ?>">edit</a> <a href="/traffic/map">view dog park map</a></p>
	</div>

	<div class="profile">

		<div class="me">
			<h1 class="small_title name"><?= $alias; ?> </h1>
			<?php if($about != null) { ?>
				<h3 class="small_title">About Me:</h3>
				<p><?= $about; ?></p>
			<?php } else { ?>
				<p>tell us about <a href="/traffic/edit/<?= $id; ?>">yourself!</a></p>
			<?php } ?>
			<?php if($img_name != null) { ?>
				<p class="profile_pic"><img src="../../uploads/<?= $img_name; ?>"></p>
			<?php } else { ?>
				<p>upload a <a href="/traffic/edit/<?= $id; ?>">profile picture!</a></p>
			<?php } ?>
		</div>

		<div class="pets">
		<h1 class="small_title"> My Pets </h1>
		<?php 
		if($pets != null) {
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
		
		<!-- <p><img src="../../assets/ani5.jpg"></p> -->
		<?php } } else { ?>
			<p><a href="/traffic/edit/<?= $id; ?>">add a pet</a> to view other users!</p>
		<?php } ?>
		</div>
	</div>
	
	<?php if($pets != null) { ?>
		<div class="browse">
			<h1>Browse other Users:</h1>
			<?php 
			// var_dump('welcome', $imgs);
			// 	die();
			foreach ($imgs as $img) {
				if($img['img_name'] != null) { ?>
					<a href="/traffic/profile/<?= $img['id']; ?>"><p class="pic_wrap"><img class="profile_img" src="../../uploads/<?= $img['img_name']; ?>"></p></a>
					<?php
				} 
			}
			?>
			<p class="browse_btn button"><a href="/traffic/browse/<?= $id; ?>">more</a></p>
		</div>

		<div class="mail">
			<h1>Messages:</h1>
			<p>message</p>
			<p>message</p>
			<p>message</p>
			<p class="messages button"><a href="/traffic/messages/<?= $id; ?>">go to my mailbox</a></p>
		</div>
	<?php } ?>

	<p class="logout button"><a href="/traffic/end">Log me out</a></p>
</body>
</html>