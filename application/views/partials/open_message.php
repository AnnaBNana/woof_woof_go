<!DOCTYPE html>
<html lang="en">
<head>
	 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
      $(document).ready(function(){
        $(".reply").click(function(){
          $(".reply_form").attr("class", "display_form");
          $(".display_msg").css("display", "none");
          return false;
        });
        $(".close").click(function(){
        	$(".display_msg").css("display", "none");
        	return false;
        });
      });
    </script>
	
</head>
<body>

  <div class="display_msg">
    <p>From: <?= $msg['alias'] ?> </p>
    <p>Sent on: <?= $msg['created_at'] ?> </p>
    <p>Subject: <?= $msg['subject'] ?> </p>
    <p class="msg_text"><?= $msg['text'] ?> </p>
    <p><a href="" class="reply">Reply</a> | <a href="" class="close">Close</a></p>
  </div>

  <div class="reply_form">

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