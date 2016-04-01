<div class="wrapper">

	<?php if($this->session->flashdata('msg_return') || $this->session->flashdata('errors')) {?>
		<div class="ui stackable padded center aligned grid">
			<div class="ten wide column">
				<div class="ui compact olive message">
					<p><?= $this->session->flashdata('msg_return'); ?></p>
					<p><?= $this->session->flashdata('errors'); ?></p>
				</div>
			</div>
		</div>
	<?php } ?>

	<h1 class="ui center aligned olive header">My Messages</h1>
	<div class="ui inverted divider"></div>

	<div class="ui padded centered grid">
		<div class="received_mail_container">
			<?php if($messages != null) { ?>
			<div class="mailbox">
				<table class="ui inverted celled table">
					<thead>
						<th class="two wide">Subject</th>
						<th class="two wide">From</th>
						<th class="two wide">Read</th>
						<th class="two wide">Action</th>
					</thead>
					<tbody>
						<?php foreach ($messages as $message) {
							?>
						<tr>
							<td><?= $message['subject']; ?></td>
							<td><?= $message['alias']; ?></td>
							<?php if($message['status'] == 'unread') { ?>
							<td></td>
							<?php } else { ?>
							<td><i class="big olive checkmark icon"></i></td>
							<?php } ?>
							<td class="action">
								<a id="<?= $message['id']; ?>" class="open"><button class="mini ui inverted olive button">Open</button></a>
								<a id="<?= $message['id']; ?>" class="reply"><button class="mini ui inverted olive button">Reply</button></a>
								<a href="/queries/delete_msg/<?= $message['id']; ?>"><button class="mini ui inverted olive button">Delete</button></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<div class="ui center aligned padded grid">
					<p class="view_sent_btn"><a class="sent"><button class="ui inverted olive button">view sent messsages</button></a></p>
				</div>
			</div>

			<?php } else { ?>

			<div class="ui center aligned padded grid">
				<div class="sixteen wide column">
					<div class="ui center aligned tertiary olive inverted segment">
						<h3 class="ui header">Mailbox Empty</h3>
					</div>
				</div>
			</div>

			<div class="ui center aligned padded grid">
				<p class="view_sent_btn"><a class="sent"><button class="ui inverted olive button">view sent messsages</button></a></p>
			</div>

			<?php } ?>
		</div>
	</div>

	<div class="ui padded centered grid">
		<div class="sent_mail_container">
			<?php if($sent_messages != null) { ?>
			<div class="sent_mail">
				<table class="ui inverted celled table">
					<thead>
						<th class="one wide">To</th>
						<th class="one wide">Subject</th>
						<th class="one wide">Action</th>
					</thead>
					<tbody>
						<?php foreach ($sent_messages as $message) {
							?>
						<tr>
							<td><a href="/traffic/profile/<?= $message['recip_id']; ?>" ><?= $message['recip_alias']; ?></a></td>
							<td><?= $message['subject']; ?></td>
							<td class="action"><a href="" id="<?= $message['id']; ?>" class="open"><button class="ui mini inverted olive button">Open</button></a> <a href="/queries/delete_msg/<?= $message['id']; ?>"><button class="ui mini inverted olive button">Delete</button></a></td>
						</tr>

						<?php } ?>
					</tbody>
				</table>

				<div class="ui center aligned padded grid">
					<p class="view_sent_btn"><a class="received"><button class="ui inverted olive button">view messsages</button></a></p>
				</div>
			</div>
			<?php } else { ?>

			<div class="ui center aligned padded grid">
				<div class="sixteen wide column">
					<div class="ui center aligned tertiary olive inverted segment">
						<h3 class="ui header">There are no sent messages</h3>
					</div>
				</div>
			</div>

			<p></p>

			<div class="ui center aligned padded grid">
				<p class="view_sent_btn"><a class="received"><button class="ui inverted olive button">view messsages</button></a></p>
			</div>

			<?php } ?>
		</div>
	</div>

	<div id="message"></div>

	<div class="ui padded grid">
		<div class="sixteen wide column">
			<div class="ui inverted segment form">
				<form action="/queries/sendMail/<?= $id; ?>" method="post">
					<h1 class="ui olive header">Send a Message</h1>
					<div class="ui inverted divider"></div>
					<p><input type="text" name="alias" placeholder="To:" class="to"></p>
					<p><input type="text" name="subject" placeholder="Subject:" class="subject"></p>
					<p><textarea type="text" name="text" class="text" placeholder="Your message..."></textarea></p>
					<p><input class="ui inverted olive button" type="submit" value="send new message"></p>
				</form>
			</div>
		</div>
	</div>

</div>

	<script src="../../assets/js/messages.js"></script>
