<!DOCTYPE html>
<html lang="en">
<head>
	 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	
</head>
<body>

  <div class="reply_form_vis">

  <form action="/queries/sendMail/<?= $this->session->userdata('id') ?>" method="post">
    <p>reply to <?= $msg['alias'] ?></p>
    <p class="reply_labels">To: </p><p> <input type="text" value="<?= $msg['alias'] ?>" name="alias"></p>
    <p class="reply_labels">Subject: </p><p> <input type="text" value="Re: <?= $msg['subject'] ?>" name="subject"></p>
    <p><textarea type="text" name="text"></textarea></p>
    <p><input type="submit" value="send reply"></p>
  </form>

  </div>

</body>
</html>