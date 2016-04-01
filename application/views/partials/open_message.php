<p></p>
<div class="display_msg">
	<div class="ui centered grid">
		<div class="ten wide column">
			<div class="ui olive segment">
				<h3 class="ui center aligned olive header"><?= $msg['subject'] ?></h3>
				<div class="ui horizontal divider">
					<i class="olive paw outline icon"></i>
				</div>
			  <div class="ui grid">
					<div class="eight wide column">
						From: <a href="/traffic/profile/<?= $msg['sender_id'] ?>"><?= $msg['alias'] ?></a>
					</div>
					<div class="right aligned eight wide column">
						<?= $msg['created_at'] ?>
					</div>
				</div>
				<div class="ui segment">
				  <p class="msg_text"><?= $msg['text'] ?> </p>
				</div>
			  <div class="ui center aligned padded grid">
					<a id="<?= $msg['id']; ?>" class="reply"><button class="ui tiny right labeled icon olive button">Reply<i class="reply icon"></i></button></a>
					<a href="" class="close"><button class="ui tiny right labeled icon olive button">Close<i class="close icon"></i></button></a>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../../assets/js/open_message.js"></script>
