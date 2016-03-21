<div id="login_container">
	<div id="errors"><?= $this->session->flashdata('errors'); ?>
	<?= $this->session->flashdata('login_error'); ?></div>

	<div class="register">

		<h1 class="register_header">Register</h1>

		<form action="/logins/register" method="post" class="reg_form">
			<p>all fields are required</p>
			<p>Name: <input type="text" name="name"></p>
			<p>Alias: <input type="text" name="alias"></p>
			<p class="ast">* choose a unique alias</p>
			<p>Email Address: <input type="text" name="email"></p>
			<p>Password: <input type="password" name="password"></p>
			<p class="ast">* password must be at least 8 characters</p>
			<p>Confirm Password: <input type="password" name="confirm"></p>
			<p><input type="submit" value="Register"></p>
		</form>

	</div>

	<div class="login">


		<h1 class="login_header">Log In</h1>

		<form action="/logins/sign_in" method="post" class="login_form">
			<p>Email: <input type="text" name="email"></p>
			<p>Password: <input type="password" name="password"></p>
			<p><input type="submit" value="Login"></p>
		</form>

	</div>


</div>
