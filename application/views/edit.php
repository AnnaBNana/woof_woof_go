<div class="wrapper">
	<p></p>
	<h1 class="ui center aligned olive header">
		Edit My Info
	</h1>

	<div class="flash"><?= $this->session->flashdata('updated'); ?></div>
	<p class="upload_msg"><?php echo $msg; ?></p>

	<div class="ui padded grid">

		<div class="eight wide column">
			<div class="ui inverted segment form">
				<form action="/queries/editMe/<?= $id; ?>" method="post">
					<h2 class="ui center aligned olive header">edit my info</h2>
					<div class="ui inverted divider"></div>
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
				<form action="traffic/schedule" method="post">
					<h2 class="ui center aligned olive header">times I'm available to meet:</h2>
					<div class="ui inverted divider"></div>
					<p>Monday:<input type="text" name="mon" placeholder="ex: all day"></p>
					<p>Tuesday:<input type="text" name="tues" placeholder="ex: all day"></p>
					<p>Wednesday:<input type="text" name="weds" placeholder="ex: all day"></p>
					<p>Thursday:<input type="text" name="thurs" placeholder="ex: all day"></p>
					<p>Friday:<input type="text" name="fri" placeholder="ex: all day"></p>
					<p>Saturday:<input type="text" name="sat" placeholder="ex: all day"></p>
					<p>Sunday:<input type="text" name="sun" placeholder="ex: all day"></p>
					<p><input class="ui inverted olive button" type="submit" name="submit" value="add times"></p>
				</form>
			</div>
		</div>
	</div>

	<div class="ui padded grid">
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
