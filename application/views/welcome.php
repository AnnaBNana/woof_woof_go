<div class="wrapper">

	<h1 class="titles">My Profile</h1>

	<div class="profile">

		<div class="me">
			<h1 class="small_title name"><?= $alias; ?> </h1>
			<?php if($about != null) { ?>
				<h3 class="small_title">About Me:</h3>
				<p><?= $about; ?></p>
			<?php } else { ?>
				<p>tell us about <a href="/traffic/edit/<?= $id; ?>">yourself!</a></p>
			<?php } ?>
			<?php if($primary_city != null) { ?>
			<h3 class="small_title">My location:</h3>
				<p><?= $primary_city; ?></p>
			<?php } else { ?>
				<p></p>
			<?php } ?>
			<?php if($availability != null) { ?>
			<h3 class="small_title">My availability:</h3>
				<p><?= $availability; ?></p>
			<?php } else { ?>
				<p></p>
			<?php } ?>
			<?php if($img_name != null) { ?>
				<p class="profile_pic"><img class="ui centered circular image" src="../../uploads/<?= $thumb_name; ?>"></p>
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
				<?php if($pet['about'] != null) { ?>
					<p class="small_title">ABOUT:</p>
					<p><?= $pet['about']; ?></p>
				<?php } ?>
				<?php if($pet['img_name'] != null) { ?>
					<p class="pet_pic"><img class="ui circular image" src="../../uploads/<?= $pet['img_name']; ?>"></p>
				<?php } else { ?>
					<p>add a <a href="/traffic/edit/<?= $id; ?>">picture of your pet!</a</p>
				<?php } ?>
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
					<a href="/traffic/profile/<?= $img['id']; ?>"><p class="pic_wrap"><img class="ui circular image" class="profile_img" src="../../uploads/<?= $img['img_name']; ?>"></p></a>
					<?php
				}
			}
			?>
			<p class="browse_btn button"><a href="/traffic/browse/<?= $id; ?>">more</a></p>
		</div>

	<?php } ?>

	<p class="logout button"><a href="/traffic/end">Log me out</a></p>
	
</div>
