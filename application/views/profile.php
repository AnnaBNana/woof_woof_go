<div class="wrapper">

	<h1 class="titles"><?= $alias ?></h1>
	<div class="nav_buttons">
		<p class="edit button"><a href="/traffic/success/<?= $this->session->userdata('id'); ?>">back to my profile</a><a href="/traffic/messages/<?= $this->session->userdata('id'); ?>">go to my mailbox</a><a href="/traffic/map">view dog park map</a></p>
	</div>

	<div class="flash"><?= $this->session->flashdata('msg_return'); ?></div>

	<div class="me">
		<h1 class="small_title name"><?= $alias; ?> </h1>
		<h3 class="small_title">About Me:</h3>
		<p><?= $about; ?></p>
		<?php if($about == null) { ?>
			<p>This user has not entered a description</p>
		<?php } ?>
		<h3 class="small_title">My Location:</h3>
		<p><?= $primary_city; ?></p>
		<?php if($primary_city == null) { ?>
			<p>This user has not entered a location</p>
		<?php } ?>
		<h3 class="small_title">My Availability:</h3>
		<p><?= $availability; ?></p>
		<?php if($availability == null) { ?>
			<p>This user has not entered times when they are available to meet</p>
		<?php } ?>
		<p class="profile_pic"><img src="../../uploads/<?= $img_name; ?>"></p>
		<div class="profile_msg">
			<form action="/queries/sendMail/<?= $this->session->userdata('id'); ?>" method="post">
				<h1 class="send">send me a message</h1>
				<p>To:<input type="text" name="alias" value="<?= $alias; ?>" class="to"></p>
				<p>Subject: <input type="text" name="subject" class="subject"></p>
				<textarea type="text" name="text" class="text"></textarea>
				<p><input type="submit" value="send new message"></p>
			</form>
		</div>
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
				<?php if ($pet['img_name'] != null) { ?>
				<p class="pet_pic"><img src="../../uploads/<?= $pet['img_name']; ?>"></p>
				<?php } ?>
			</div>
		<?php } ?>
	</div>

	<p class="logout button"><a href="/traffic/end">Log me out</a></p>

</div>
