<div class="wrapper">

	<?php if($this->session->flashdata('msg_return') || $this->session->flashdata('errors')) {?>
		<div class="ui stackable padded center aligned grid">
			<div class="ten wide column">
				<div class="ui compact olive message">
					<p><?= $this->session->flashdata('msg_return'); ?></p>
					<p><?= $this->session->flashdata('errors'); ?></p>
				</div>
			</div>
		</div>
	<?php } ?>

	<h1 class="ui center aligned olive header"><?= $alias; ?>'s Profile </h1>
	<div class="ui inverted divider"></div>

	<div class="ui stackable padded grid">

		<div class="eight wide column">
			<div class="ui center aligned inverted padded segment">
				<?php if($about == null) { ?>
					<p></p>
				<?php }  else { ?>
					<h2 class="ui inverted header">"<?= $about; ?>"</h2>
				<?php } ?>
				<p class="profile_pic"><img class="ui centered circular image" src="../../uploads/<?= $img_name; ?>"></p>
				<?php if($primary_city == null) { ?>
					<p></p>
				<?php } else {?>
					<h4 class="ui inverted header"><?= $alias; ?> hails from: <?= $primary_city; ?></h4>
				<?php } ?>
			</div>
		</div>

		<div class="eight wide column">
			<div class="ui center aligned inverted padded segment">
				<?php if($pets == null) { echo "<h3 class='ui inverted header'>This user has not registered any pets</h3>"; } else {?>
				<h1 class="ui olive header"> My Pets </h1>
				<div class="ui inverted divider"></div>
				<div class="ui right aligned grid">
					<?php
					foreach ($pets as $pet) {
					?>
						<div class="six wide column">
							<h2><?= $pet['name']; ?></h2>
							<p>SPECIES:</p><p><?= $pet['species']; ?></p>
							<p>BREED:</p><p><?= $pet['breed']; ?></p>
							<?php if($pet['about']) { ?>
							<p>ABOUT:</p>
							<p><?= $pet['about']; ?></p>
							<?php } else { ?>
								<p></p>
							<?php } ?>
						</div>
						<div class="ui inverted vertical divider"><i class="olive paw icon"></i></div>
						<div class="center aligned ten wide column">
							<p><img class="ui centered circular image" src="../../uploads/<?= $pet['img_name']; ?>"></p>
							<div class="ui inverted divider"></div>
							<?php if($pet['weight'] != null) {
								echo "<p>My weight: " . $pet['weight'] . " lbs</p>";
							} ?>
							<?php if($pet['gender'] != null) {
								echo "<p>My gender: " . $pet['gender'] . "</p>";
							} ?>
							<?php if($pet['play_style'] != null) {
								echo "<p>Play Style: " . $pet['play_style'] . "</p>";
							} ?>
							<?php if($pet['social_pref'] != null) {
								echo "<p>Plays well with: " . $pet['social_pref'] . "</p>";
							} ?>
						</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>

		<div class="eight wide column">
			<div class="ui inverted padded segment">
				<?php if($schedule) { ?>
					<h2 class="ui olive header">My Availability:</h2>
					<div class="ui inverted divider"></div>
					<p>Monday: <?php if($schedule && $schedule['monday'] != '') {
											echo $schedule['monday'];
										} elseif (!$schedule || $schedule['monday'] == '') {
											echo "This user has not shared their availabilty for Mondays";
										} ?>
					</p>
					<p>Tuesday: <?php if($schedule && $schedule['tuesday'] != '') {
											echo $schedule['tuesday'];
										} elseif (!$schedule || $schedule['tuesday'] == '') {
											echo "This user has not shared their availabilty for Tuesdays";
										} ?>
					</p>
					<p>Wednesdays: <?php if($schedule && $schedule['wednesday'] != '') {
											echo $schedule['wednesday'];
										} elseif (!$schedule || $schedule['wednesday'] == '') {
											echo "This user has not shared their availabilty for Wednesdays";
										} ?>
					</p>
					<p>Thurday: <?php if($schedule && $schedule['thursday'] != '') {
											echo $schedule['thursday'];
										} elseif (!$schedule || $schedule['thursday'] == '') {
											echo "This user has not shared their availabilty for Thurdays";
										} ?>
					</p>
					<p>Friday: <?php if($schedule && $schedule['friday'] != '') {
											echo $schedule['friday'];
										} elseif (!$schedule || $schedule['friday'] == '') {
											echo "This user has not shared their availabilty for Fridays";
										} ?>
					</p>
					<p>Saturday: <?php if($schedule && $schedule['saturday'] != '') {
											echo $schedule['saturday'];
										} elseif (!$schedule || $schedule['saturday'] == '') {
											echo "This user has not shared their availabilty for Saturdays";
										} ?>
					</p>
					<p>Sunday: <?php if($schedule && $schedule['sunday'] != '') {
											echo $schedule['sunday'];
										} elseif (!$schedule || $schedule['sunday'] == '') {
											echo "This user has not shared their availabilty for Sundays";
										} ?>
					</p>
					<p>Schedule Notes: <?php if($schedule && $schedule['notes'] != '') {
											echo $schedule['notes'];
										} elseif (!$schedule || $schedule['notes'] == '') {
											echo "This user has not shared any notes on their schedule";
										} ?>
					</p>
				<?php } elseif ($schedule == null) { ?>
					<h3 class="ui inverted header">This user has not entered times when they are available to meet</h3>
				<?php } ?>
			</div>
		</div>

		<div class="eight wide column">
			<div class="ui inverted padded segment form">
				<form action="/queries/sendMail/<?= $this->session->userdata('id'); ?>" method="post">
					<h2 class="ui olive header">Send me a message:</h2>
					<div class="ui inverted divider"></div>
					<p>To:<input type="text" name="alias" value="<?= $alias; ?>" class="to"></p>
					<p>Subject: <input type="text" name="subject" class="subject"></p>
					<p><textarea type="text" name="text" class="text"></textarea></p>
					<p><input class="ui inverted olive button" type="submit" value="send new message"></p>
				</form>
			</div>
		</div>

	</div>

</div>
