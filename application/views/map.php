	<?php if ($this->session->userdata('login_status') == true) { ?>
	<p class="back button"><a href="/traffic/success/<?= $this->session->userdata('id'); ?>">back to my profile</a></p>
	<?php } else { ?>
	<p class="back button"><a href="/traffic/tester">back to front page</a></p>
	<?php } ?>
	<div id="map">
	</div>
