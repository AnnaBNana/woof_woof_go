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
