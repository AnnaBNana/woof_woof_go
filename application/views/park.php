<div class="wrapper">
  <p class="id"><?= $park_id ?></p>
  <h1 class="ui olive header center aligned name"></h1>
  <div class="ui inverted divider"></div>
  <div class="ui stackable padded grid">
    <div class="ui four wide column">
      <div class="ui inverted segment">
        <h2 class="ui inverted center aligned header">Info and Hours</h2>
        <div class="ui inverted divider"></div>
        <p class="address"></p>
        <p class="phone"></p>
        <div class="website"></div>
        <div class="hours"></div>
        <div class="ui inverted divider"></div>
        <img class="ui centered image" src="<?= base_url(); ?>assets/imgs/powered_by_google_on_non_white.png" alt="" />
      </div>
    </div>
    <div class="six wide column">
      <div class="ui inverted segment ">
        <h2 class="ui inverted center aligned header">Google Places Reviews</h2>
        <div class="park_image"></div>
        <div class="ui stackable vertically padded grid">
          <div class="two column row">
            <div class="left aligned left floated column">
              <div class="visit_button"></div>
            </div>
            <div class="right aligned right floated column">
              <div class="number_rating"></div>
              <div class="ui inverted huge heart rating dynamic" data-max-rating="5"></div>
            </div>
          </div>
        </div>
        <div class="ui inverted divider"></div>
        <div class="reviews"></div>
        <div class="ui inverted divider"></div>
        <img class="ui centered image" src="<?= base_url(); ?>assets/imgs/powered_by_google_on_non_white.png" alt="" />
      </div>
    </div>
    <div class="six wide column">
      <div class="ui inverted segment">
        <h2 class="ui inverted center aligned header">Yelp Reviews</h2>
        <img class="ui centered image" src="<?= $yelp_data['image_url'] ?>" alt="" />
        <div class="ui stackable vertically padded grid">
          <div class="eight wide column">
            <a target="_blank" href="<?= $yelp_data['url'] ?>"><button class="ui large olive button">view on Yelp</button></a>
          </div>
          <div class="right aligned eight wide column">
             <?= $yelp_data['review_count']; ?> total reviews <img src="<?= $yelp_data['rating_img_url'] ?>" alt="" />
          </div>
        </div>
        <div class="ui inverted divider"></div>
        <div class="ui stackable vertically padded grid">
          <div class="four wide column">
            <img class="ui centered image" src="<?= $yelp_data['reviews']['user']['image_url'] ?>" alt="" />
            <h4 class="ui center aligned olive header"><?= $yelp_data['reviews']['user']['name']; ?></h4>
          </div>
          <div class="twelve wide column">
            <p><img src="<?= $yelp_data['reviews']['rating_image_url']; ?>" alt="" /></p>
            <p><?= $yelp_data['reviews']['excerpt'] ?></p>
          </div>
        </div>
        <div class="ui inverted divider"></div>
        <img class="ui centered image" src="<?= base_url(); ?>assets/imgs/yelp_powered_btn_dark.png" alt="" />
      </div>
    </div>
  </div>
  <div id="park"></div>
</div>

<script type="text/javascript" src="<?= base_url(); ?>assets/js/park.js"></script>
