<div class="wrapper">

	<h1 class="titles">Find a new play buddy:</h1>
	<div class="nav_buttons">
		<p class="edit button"><a href="/traffic/success/<?= $id; ?>">back to my profile</a><a href="/traffic/map">view dog park map</a></p>
	</div>

	<div class="user_profiles">
		<?php foreach ($user_profiles as $user_profile) {
			if($user_profile['img_name'] != null) { ?>
					<a href="/traffic/profile/<?= $user_profile['id']; ?>"><p class="pic_wrap"><img class="profile_img" src="../../uploads/<?= $user_profile['img_name']; ?>"></p></a>
		<?php } } ?>
	</div>

	<p class="logout button"><a href="/traffic/end">Log me out</a></p>
</div>
