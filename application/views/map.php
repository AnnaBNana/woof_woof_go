<div class="ui inverted centered segment">

	<div class="ui six column centered grid">
		<div class="column">
			<?php if ($this->session->userdata('login_status') == true) { ?>
			<p class="buffer"></p>
			<?php } else { ?>
			<p class="back button"><a href="/traffic/tester"><button class="large ui inverted basic button olive">back to front page</button></a></p>
			<?php } ?>
		</div>

		<div id="map">
		</div>
	</div>
</div>
