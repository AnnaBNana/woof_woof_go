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

  <?php foreach ($pets as $pet) { ?>
  <h1 class="ui center aligned olive header">Edit <?= $pet['name']; ?>'s Profile:</h1>

  <div class="ui stackable padded grid">

    <div class="eight wide column">
      <div class="ui inverted segment form">
        <form action="/queries/editPet/<?= $pet['id']; ?>/<?= $id ?>" method="post">
          <p>edit name: <input type="text" name="name" value="<?= $pet['name']; ?>"></p>
          <p>edit species: <input type="text" name="species" value="<?= $pet['species']; ?>"></p>
          <p>edit breed: <input type="text" name="breed" value="<?= $pet['breed']; ?>"></p>
          <p class="textarea_label">add a description of <?= $pet['name']; ?>: <textarea type="text" name="about" class="desc"><?= $pet['about']; ?></textarea></p>
          <p><input class="ui inverted olive button" type="submit" value="update"></p>
        </form>
      </div>
    </div>

    <div class="eight wide column">

      <div class="ui stackable two colum grid">

        <div class="sixteen wide column">
          <div class="ui inverted segment form">
            <form action="/queries/petDetails/<?=$pet['id']; ?>/<?= $id ?>" method="post">
              <h2 class="ui olive header">Answer these questions to help find <?= $pet['name'] ?>'s perfect playmate: </h2>
              <div class="ui inverted divider"></div>
              <p class="ui olive header">all fields are required</p>
              <p>I am: <select class="ui fluid dropdown" name="gender">
                          <option value="">gender</option>
                          <option value="Unfixed Female">Unfixed Female</option>
                          <option value="Unfixed Male">Unfixed Male</option>
                          <option value="Fixed Female">Fixed Female</option>
                          <option value="Fixed Male">Fixed Male</option>
                        </select>
              </p>
              <p>I play: <select class="ui fluid dropdown" name="play_style">
                          <option value="">my play style</option>
                          <option value="Timid">Timid</option>
                          <option value="Gentle">Gentle</option>
                          <option value="It depends on my playmate's style">It depends on my playmate's style</option>
                          <option value="Sometimes I get a little over-excited">Sometimes I get a little over-excited</option>
                          <option value="I can be a little rough sometimes">I can be a little rough sometimes</option>
                        </select>
              </p>
              <p>I am good with: <select class="ui fluid dropdown" name="social_pref">
                          <option value="">compatability</option>
                          <option value="All dogs">All dogs</option>
                          <option value="Small dogs only">Small dogs only</option>
                          <option value="Big dogs only">Big dogs only</option>
                          <option value="I'm great for shy dogs, everyone loves me">I'm great for shy dogs, everyone loves me</option>
                          <option value="I can be hard to get along with and sometimes need extra space">I can be hard to get along with and sometimes need extra space</option>
                        </select>
              </p>
              <p>My weight:
                <div class="ui fluid right labeled input">
                  <input type="text" placeholder="weight" name="weight">
                  <select class="ui dropdown label" name="unit">
                    <option class="item" value="lbs">lbs</option>
                    <option class="item" value="kg">kg</option>
                  </select>
                </div>
              </p>

              <p>
                <input class="ui inverted olive button" type="submit" value="submit">
              </p>

            </form>
          </div>
        </div>

        <div class="eight wide column">
          <div class="ui center aligned inverted segment form">
            <?php echo form_open_multipart("/upload/do_pet_upload/" . $pet['id'] . "/" . $id);?>
              <h2 class="ui olive header">Upload a new profile photo of <?= $pet['name']; ?>:</h2>
              <div class="ui inverted divider"></div>
              <div class="field">
                <input type="file" name="userfile"/>
              </div>
              <p><input class="ui inverted olive button" type="submit" value="upload" /></p>
            </form>
          </div>
        </div>

        <div class="eight wide column">
          <div class="ui center aligned inverted segment form">
            <form action="/queries/deletePet/<?= $pet['id']; ?>/<?= $id ?>" method="post">
              <h2 class="ui olive header">Delete <?= $pet['name']; ?>'s profile:</h2>
              <div class="ui inverted divider"></div>
              <p><input class="ui inverted olive button" type="submit" value="delete pet"></p>
            </form>
            <?php } ?>
          </div>
        </div>

      </div>

    </div>

  </div>

  <div class="ui inverted divider"></div>

  <div class="ui stackable padded grid">
    <div class="sixteen wide column">
      <div class="ui padded inverted segment form">
        <form action="/queries/addPet/<?= $id ?>" method="post" class="add_pet">
          <h2 class="ui center aligned olive header">Add a new pet:</h2>
          <div class="ui inverted divider"></div>
          <div class="three fields">
            <div class="field">
              <label>pet name:</label> <input type="text" name="name">
            </div>
            <div class="field">
              <label>pet species:</label> <input type="text" name="species">
            </div>
            <div class="field">
              <label>pet breed:</label> <input type="text" name="breed">
            </div>
          </div>
          <p><input class="ui inverted olive button" type="submit" value="add pet"></p>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="../../assets/js/edit_pet.js"></script>
