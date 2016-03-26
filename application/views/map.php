<div class="ui inverted centered segment">

	<div class="ui grid">

		<?php if ($loc == 'private') { ?>
		<div class="map_buttons">
			<div class="large ui vertical labeled icon buttons">
				<div class="ui olive button location_button"><i class="location arrow icon"></i>use my location</div>
				<div class="ui olive button zip_button"><i class="world icon"></i>search by zip code</div>
			</div>
			<div class="row">
				<div class="large ui action input zip_div placement">
					<input type="text" class="zip_input" placeholder="Zip code...">
					<button class="ui olive button zip_search"><i class="large search icon"></i></button>
				</div>
			</div>
		</div>

		<?php } else { ?>
			<div class="three wide column">
				<div class="large ui inverted basic olive button location_button">use my location</div>
			</div>
			<div class="three wide column">
				<div class="large ui inverted basic olive button zip_button">search by zip code</div>
			</div>
			<div class="ui seven wide column">
				<div class="ui large inverted action input zip_div">
					<input type="text" class="zip_input" placeholder="Zip code...">
					<button class="ui olive button zip_search"><i class="large search icon"></i></button>
				</div>
			</div>

			<div class="three wide right floated column">
				<a href="/traffic"><div class="large ui inverted basic button olive">back to front page</div></a>
			</div>


		<?php } ?>

	</div>

<div class="ui compact olive message map_instructions">
  <i class="close icon"></i>
  <div class="header">
    Using the map:
  </div>
  <p>click 'use my location' to see parks near you (geolocation must be enabled)</p>
	<p>or click search by zipcode and enter a zipcode to find parks anywhere</p>
	<p>once markers have appeared, you can right click on a new location to change location focus</p>
</div>

	<div id="map">
	</div>
	<div class="drawing" id="loading">
		<div class="loading-dot"></div>
	</div>

</div>
