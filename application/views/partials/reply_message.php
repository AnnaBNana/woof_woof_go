  <div class="reply_form_vis">
		<div class="ui padded centered grid">
			<div class="eight wide column">
				<div class="ui inverted segment form">
				  <form action="/queries/sendMail/<?= $this->session->userdata('id') ?>" method="post">
				    <h3 class="ui center aligned olive header">Reply to <a href="/traffic/profile/<?= $msg['sender_id'] ?>"><?= $msg['alias'] ?></a></h3>
						<div class="ui inverted horizontal divider"><i class="olive send outline icon"></i></div>
				    <p class="reply_labels">To: </p><p> <input type="text" value="<?= $msg['alias'] ?>" name="alias"></p>
				    <p class="reply_labels">Subject: </p><p> <input type="text" value="Re: <?= $msg['subject'] ?>" name="subject"></p>
				    <p><textarea type="text" name="text"></textarea></p>
				    <p><input class="ui olive button" type="submit" value="send reply"></p>
				  </form>
				</div>
			</div>
		</div>
  </div>
