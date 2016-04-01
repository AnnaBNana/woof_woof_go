<div class="wrapper">

	<?php if($this->session->flashdata('updated') || $this->session->flashdata('errors')) {?>
		<div class="ui stackable padded center aligned grid">
			<div class="ten wide column">
				<div class="ui compact olive message">
					<p><?= $this->session->flashdata('updated'); ?></p>
					<p><?= $this->session->flashdata('errors'); ?></p>
				</div>
			</div>
		</div>
	<?php } ?>

	<h1 class="ui center aligned olive header">
		Edit My Info
	</h1>

	<div class="ui stackable padded grid">

		<div class="eight wide column">
			<div class="ui inverted segment form">
				<form action="/queries/editMe/<?= $id; ?>" method="post">
					<p>change my alias: <input type="text" name="alias" value="<?= $alias; ?>"></p>
					<p>change my email: <input type="text" name="email" value="<?= $email; ?>"></p>
					<p>my location: <input type="text" name="loc" value="<?= $primary_city; ?>"></p>
					<p class="textarea_label">add a description: <textarea type="text" name="about" class="desc"><?= $about; ?></textarea></p>
					<p><input class="ui inverted olive button" type="submit" value="update my info"></p>
				</form>
			</div>

			<div class="ui center aligned inverted segment form">
				<?php echo form_open_multipart("/upload/do_upload/" . $id);?>
					<h2 class="ui olive center aligned header">upload a photo of yourself</h2>
					<div class="ui inverted divider"></div>
					<div class="field">
						<input type="file" name="userfile" class="upload" />
					</div>
					<p><input class="ui inverted olive button" type="submit" value="upload" /></p>
				</form>
			</div>
		</div>

		<div class="eight wide column">

			<div class="ui inverted segment padded form">
				<form action="/queries/schedule/<?= $id; ?>" method="post">
					<h2 class="ui center aligned olive header">times I'm available to meet:</h2>
					<div class="ui inverted divider"></div>
					<p>Monday:<input type="text" name="mon"
						<?php if($schedule && $schedule['monday'] != '') { ?>
							value="<?= $schedule['monday'] ?>"></p>
						<?php } elseif (!$schedule || $schedule['monday'] == '') { ?>
							placeholder="ex: all day"></p>
						<?php } ?>
					<p>Tuesday:<input type="text" name="tues"
						<?php if($schedule && $schedule['tuesday'] != '') { ?>
							value="<?= $schedule['tuesday'] ?>"></p>
						<?php } elseif (!$schedule || $schedule['tuesday'] == '') { ?>
							placeholder="ex: all day"></p>
						<?php } ?>
					<p>Wednesday:<input type="text" name="weds"
						<?php if($schedule && $schedule['wednesday'] != '') { ?>
							value="<?= $schedule['wednesday'] ?>"></p>
						<?php } elseif (!$schedule || $schedule['wednesday'] == '') { ?>
							placeholder="ex: all day"></p>
						<?php } ?>
					<p>Thursday:<input type="text" name="thurs"
						<?php if($schedule && $schedule['thursday'] != '') { ?>
							value="<?= $schedule['thursday'] ?>"></p>
						<?php } elseif (!$schedule || $schedule['thursday'] == '') { ?>
							placeholder="ex: all day"></p>
						<?php } ?>
					<p>Friday:<input type="text" name="fri"
						<?php if($schedule && $schedule['friday'] != '') { ?>
							value="<?= $schedule['friday'] ?>"></p>
						<?php } elseif (!$schedule || $schedule['friday'] == '') { ?>
							placeholder="ex: all day"></p>
						<?php } ?>
					<p>Saturday:<input type="text" name="sat"
						<?php if($schedule && $schedule['saturday'] != '') { ?>
							value="<?= $schedule['saturday'] ?>"></p>
						<?php } elseif (!$schedule || $schedule['saturday'] == '') { ?>
							placeholder="ex: all day"></p>
						<?php } ?>
					<p>Sunday:<input type="text" name="sun"
						<?php if($schedule && $schedule['sunday'] != '') { ?>
							value="<?= $schedule['sunday'] ?>"></p>
						<?php } elseif (!$schedule || $schedule['sunday'] == '') { ?>
							placeholder="ex: all day"></p>
						<?php } ?>
					<p>Notes: <textarea name="notes"
					<?php if($schedule && $schedule['notes'] != '') { ?>
						><?= $schedule['notes'] ?></textarea></p>
					<?php } elseif (!$schedule || $schedule['notes'] == '') { ?>
						placeholder="notes on my schedule..."></textarea></p>
					<?php } ?>
					<p><input class="ui inverted olive button" type="submit" name="submit" value="add times"></p>
				</form>
			</div>
		</div>
	</div>

	<div class="ui inverted divider"></div>

	<div class="ui stackable padded grid">
		<div class="sixteen wide column">
			<div class="ui padded inverted segment form">
				<form action="/queries/editPwd/<?= $id ?>" method="post" class="change_pwd">
					<h2 class="ui center aligned olive header">change password</h2>
					<div class="ui inverted divider"></div>
					<div class="three fields">
						<div class="field">
							<label>old password: </label><input type="password" name="old_password">
						</div>
						<div class="field">
							<label>new password: </label><input type="password" name="new_password">
							<p class="ast">* password must be at least 8 characters</p>
						</div>
						<div class="field">
							<label>confirm new password: </label><input type="password" name="confirm">
						</div>
					</div>

					<p><input class="ui inverted olive button" type="submit" value="change password"></p>
				</form>
			</div>
		</div>
	</div>



</div>
