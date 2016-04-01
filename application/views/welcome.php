<div class="wrapper">

	<!-- user div -->
	<div class="ui stackable padded grid">
		<div class="four wide column">
			<div class="ui inverted segment">
					<?php if($msg_cnt > 0) { ?>
						<a class="ui olive ribbon label" href="/traffic/messages/<?= $id ?>"><?= $msg_cnt ?> New Message(s)</a>
					<?php } ?>
					<h1 class="ui center aligned olive inverted header"><?= $alias; ?> </h1>
					<div class="ui inverted divider"></div>
					<!-- there are several conditional here that make suggestions to add more profile info if not added upon registration -->
					<?php if($img_name != null) { ?>
						<p class="profile_pic"><img class="ui centered circular image" src="../../uploads/<?= $img_name; ?>"></p>
					<?php } else { ?>
						<p>upload a <a href="/traffic/edit/<?= $id; ?>">profile picture!</a></p>
					<?php } ?>
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
					<div class="ui center aligned inverted segment">
					  <a  href="/traffic/edit/<?= $this->session->userdata['id']; ?>">
							<button class="ui inverted olive centered right labeled icon button">
					    Edit My Profile  <i class="write icon"></i>
							</button>
					  </a>
					</div>
					<div class="ui center aligned inverted segment">
						<a  href="/traffic/profile/<?= $this->session->userdata['id']; ?>">
							<button class="ui inverted olive centered right labeled icon button">
							View My Profile  <i class="write icon"></i>
							</button>
						</a>
					</div>
				</div>
			</div>

			<div class="center aligned  eight wide column">
					<?php if($pets != null) { ?>
							<h1 class="ui olive center aligned header">Browse other Users:</h1>
							<div class="ui divider"></div>
							<div class="ui stackable vertically padded four column grid">
								<?php foreach ($imgs as $img) {?>
									<div class="column">
										<a href="/traffic/profile/<?= $img['id']; ?>">
											<div class="ui circular image">
											  <div class="ui dimmer">
											    <div class="content">
											      <div class="center">
											        <h2 class="ui inverted olive header">
											          <?= $img['alias']; ?>
											        </h2>
											      </div>
											    </div>
											  </div>
												<img class="ui circular image" src="../../uploads/<?= $img['img_name']; ?>">
											</div>
										</a>
									</div>
								<?php } ?>
							</div>
							<div class="ui stackable sixteen column centered grid">
								<div class="sixteen column centered row">
									<a href="/traffic/browse/<?= $id; ?>"><button class="ui olive button">view more users</button></a>
								</div>
							</div>
					<?php } ?>
			</div>

			<div class="four wide column">
				<div class="ui padded inverted segment">
					<h1 class="ui center aligned olive inverted header"> My Pets </h1>
					<div class="ui inverted divider"></div>
					<?php
					if($pets != null) {
					foreach ($pets as $pet) {
					?>
						<div class="pet">
							<h2 class="small_title"><?= $pet['name']; ?></h2>
							<p class="small_title">SPECIES: <?= $pet['species']; ?></p>
							<p class="small_title">BREED: <?= $pet['breed']; ?></p>
							<?php if($pet['about'] != null) { ?>
								<p>ABOUT: <?= $pet['about']; ?></p>
							<?php } ?>
							<?php if($pet['img_name'] != null) { ?>
								<p class="pet_pic"><img class="ui centered circular image" src="../../uploads/<?= $pet['img_name']; ?>"></p>
							<?php } else { ?>
								<p>add a <a href="/traffic/edit/<?= $id; ?>">picture of your pet!</a</p>
							<?php } ?>
						</div>

					<?php } } else { ?>
						<p><a href="/traffic/edit/<?= $id; ?>">add a pet</a> to view other users!</p>
					<?php } ?>
						<div class="ui center aligned inverted segment">
							<a  href="/traffic/edit_pet/<?= $this->session->userdata['id']; ?>">
								<button class="ui inverted olive right labeled icon button">
						    Edit or Add Pets<i class="write icon"></i>
								</button>
						  </a>
						</div>
					</div>
				</div>
			</div>

	</div>

</div>

<script src="../../assets/js/welcome.js"></script>
