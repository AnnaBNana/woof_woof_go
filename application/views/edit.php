<div class="wrapper">
	<h1 class="titles">Edit My Info</h1>

	<div class="nav_buttons">
		<p class="edit button"><a href="/traffic/success/<?= $id; ?>">back to my profile</a><a href="/traffic/map">view dog park map</a></p>
	</div>

	<div class="flash"><?= $this->session->flashdata('updated'); ?></div>
	<p class="upload_msg"><?php echo $msg; ?></p>

	<div class="profile">
		<form action="/queries/editMe/<?= $id; ?>" method="post" class="edit_me">
			<h2>edit my info</h2>
			<p>change my alias: <input type="text" name="alias" value="<?= $alias; ?>"></p>
			<p>change my email: <input type="text" name="email" value="<?= $email; ?>"></p>
			<p>my location: <input type="text" name="loc" value="<?= $primary_city; ?>"></p>
			<p>times I'm available to meet: <input type="text" name="avail" value="<?= $availability; ?>"></p>
			<p class="textarea_label">add a description: <textarea type="text" name="about" class="desc"><?= $about; ?></textarea></p>
			<p><input type="submit" value="update my info"></p>
		</form>

		<?php echo form_open_multipart("/upload/do_upload/" . $id);?>
			<h2>upload a photo of yourself:</h2>

			<input type="file" name="userfile" class="upload" />

			<br /><br />

			<p><input type="submit" value="upload" /></p>

		</form>

		<form action="/queries/editPwd/<?= $id ?>" method="post" class="change_pwd">
			<h2>change password</h2>
			<p>new password: <input type="password" name="password"></p>
			<p class="ast">* password must be at least 8 characters</p>
			<p>confirm new password: <input type="password" name="confirm"></p>
			<p><input type="submit" value="change password"></p>
		</form>


		<?php foreach ($pets as $pet) { ?>
		<form action="/queries/editPet/<?= $pet['id']; ?>/<?= $id ?>" method="post" class="edit_pet">
			<h2>edit <?= $pet['name']; ?>'s profile:</h2>
			<p>edit name: <input type="text" name="name" value="<?= $pet['name']; ?>"></p>
			<p>edit species: <input type="text" name="species" value="<?= $pet['species']; ?>"></p>
			<p>edit breed: <input type="text" name="breed" value="<?= $pet['breed']; ?>"></p>
			<p class="textarea_label">add a description for <?= $pet['name']; ?>: <textarea type="text" name="about" class="desc"><?= $pet['about']; ?></textarea></p>
			<p><input type="submit" value="submit"></p>
		</form>
		<?php echo form_open_multipart("/upload/do_pet_upload/" . $pet['id'] . "/" . $id);?>
			<h2>upload a photo of <?= $pet['name']; ?>:</h2>

			<input type="file" name="userfile" class="upload" />

			<br /><br />

			<p><input type="submit" value="upload" /></p>

		</form>
		<form action="/queries/deletePet/<?= $pet['id']; ?>/<?= $id ?>" method="post" class="delete_pet">
			<h2>delete <?= $pet['name']; ?>'s profile:</h2>
			<p><input type="submit" value="delete pet"></p>
		</form>
		<?php } ?>

		<form action="/queries/addPet/<?= $id ?>" method="post" class="add_pet">
			<h2>add a new pet:</h2>
			<p>pet name: <input type="text" name="name"></p>
			<p>pet species: <input type="text" name="species"></p>
			<p>pet breed: <input type="text" name="breed"></p>
			<p><input type="submit" value="submit"></p>
		</form>

	</div>

	<p class="logout button"><a href="/traffic/end">Log me out</a></p>
</div>
