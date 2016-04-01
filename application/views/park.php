<div class="wrapper">
  <p class="id"><?= $park_id ?></p>
  <h1 class="ui olive header center aligned name"></h1>
  <div class="ui inverted divider"></div>
  <div class="ui padded grid">
    <div class="ui four wide column">
      <div class="ui inverted segment">
        <h2 class="ui inverted center aligned header">Info and Hours</h2>
        <div class="ui inverted divider"></div>
        <p class="address"></p>
        <div class="website"></div>
        <div class="hours"></div>
      </div>
    </div>
    <div class="ui six wide column">
      <h2 class="ui inverted center aligned header">Reviews Powered by Google Places</h2>
      <div class="ui inverted divider"></div>
    </div>
    <div class="ui six wide column">
      <h2 class="ui inverted center aligned header">Reviews Powered by Yelp</h2>
      <div class="ui inverted divider"></div>
    </div>
  </div>

  <div id="park"></div>
</div>

<script type="text/javascript" src="<?= base_url(); ?>assets/js/park.js"></script>
