<div class="wrapper">

	<h1 class="ui center aligned olive header">Find a new play buddy</h1>
	<div class="ui inverted divider"></div>
		<div class="ui padded grid">
			<?php foreach ($user_profiles as $user_profile) { ?>

				<div class="center aligned four wide column">
					<a href="/traffic/profile/<?= $user_profile['id']; ?>">
						<div class="ui circular image">
							<div class="ui dimmer">
								<div class="content">
									<div class="center">
										<h2 class="ui inverted olive header">
											<?= $user_profile['alias']; ?>
										</h2>
									</div>
								</div>
							</div>
							<img class="ui circular image" src="../../uploads/<?= $user_profile['img_name']; ?>">
						</div>
					</a>
				</div>

			<?php } ?>
		</div>
</div>

<script src="../../assets/js/browse.js">

</script>
