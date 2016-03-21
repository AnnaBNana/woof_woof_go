<div class="content">

	<!-- navigation -->
	<div class="nav">
		<div class="badge">
			<p class="triple_border"></p>
			<p class="double_border"></p>
			<p class="logo">WOOF</p>
		</div>
		<ul>
			<li>new to the site?</li>
			<li><button class="large ui inverted basic olive button reg">Register</button></li>
			<li>or</li>
			<li><button class="large ui inverted basic olive button lrn">Learn More</button></li>
			<li>been here before?</li>
			<li><button class="large ui inverted basic olive button log">Login</button></li>
		</ul>
	</div>


	<?php if($this->session->flashdata('errors') != null || $this->session->flashdata('login_error')) {?>
		<div class="err">
			<div class="ui violet message">
				<i class="close icon"></i>
				<div class="header">
					There were some errors with your submission:
				</div>
				<?= $this->session->flashdata('errors') ?>
				<?= $this->session->flashdata('login_error') ?>
			</div>
		</div>
	<?php } ?>

	<!-- div for register partial pop-up -->
	<div class="register_window">
		<div class="ui inverted segment">
			<div class="ui inverted form">

				<div class="ui grid">
					<div class="left floated left aligned six wide column">
						<h1 class="register_header">Register</h1>
					</div>
					<div class="right floated right aligned six wide column">
						<i class="big olive remove circle outline icon right floated close_reg"></i>
					</div>
				</div>

		  <form action="/logins/register" method="post" class="reg_form">
		    <p>all fields are required</p>
		    <p>Name: <input type="text" name="name"></p>
		    <p>Alias: <input type="text" name="alias"></p>
		    <p class="ast">* choose a unique alias</p>
		    <p>Email Address: <input type="text" name="email"></p>
		    <p>Password: <input type="password" name="password"></p>
		    <p class="ast">* password must be at least 8 characters</p>
		    <p>Confirm Password: <input type="password" name="confirm"></p>
		    <p><input type="submit" value="Register" class="ui submit button olive"></p>
		  </form>
			</div>
		</div>
	</div>

	<!-- div for learn more partial pop-up -->
	<div class="learn_more_window">
		<div class="ui inverted segment">

				<div class="ui grid">
					<div class="left floated left aligned fourteen wide column">
						<h1 class="register_header">Welcome to Woof Woof Go!</h1>
					</div>
					<div class="right floated right aligned two wide column">
						<i class="big olive remove circle outline icon right floated close_lrn"></i>
					</div>
				</div>

				<div class="ui eight column centered grid">
					<div class="column">
						<i class="large circular inverted olive paw icon"></i>
					</div>
				</div>

				<div class="ui grid">
					Woof Woof Go is a community dedicated to dogs and dog owners.
				</div>
		</div>
	</div>
	<!-- div for login partial pop-up -->
	<div class="login_window">
		<div class="ui inverted segment">
			<div class="ui inverted form">

				<div class="ui grid">
					<div class="left floated left aligned ten wide column">
						<h1 class="login_header">Log In</h1>
					</div>
					<div class="right floated right aligned six wide column">
						<i class="big olive remove circle outline icon right floated close_log"></i>
					</div>
				</div>

				<form action="/logins/sign_in" method="post" class="login_form">
					<p>Email: <input type="text" name="email"></p>
					<p>Password: <input type="password" name="password"></p>
					<p><input class="ui submit button olive" type="submit" value="Login"></p>
				</form>
			</div>
		</div>
	</div>
	<!-- site splash title -->
	<div class="ui center aligned container">
		<div class="bigger">
			<p class="ui header inverted"> WOOF WOOF GO </p>
		</div>
	</div>
	<!-- link to map -->
	<p class="park_finder"><a href="/traffic/logged_out_map"><button class="massive ui inverted basic olive button park_button">Find a Dog Park</button></a></p>
</div>

<div class="shadow">

</div>

<script src="../../assets/js/main.js"></script>
