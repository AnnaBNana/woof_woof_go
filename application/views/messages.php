<div class="wrapper">
	<h1 class="titles">My Messages</h1>
	<div class="nav_buttons">
		<p class="edit button"><a href="/traffic/success/<?= $id; ?>">back to my profile</a><a href="/traffic/map">view dog park map</a></p>
	</div>

	<div class="flash"><?= $this->session->flashdata('msg_return'); ?></div>

	<div class="received_mail_container">
		<?php if($messages != null) { ?>
		<div class="mailbox">
			<table>
				<thead>
					<th>From</th>
					<th>Subject</th>
					<th>Read</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php foreach ($messages as $message) {
						?>
					<tr>
						<td><?= $message['alias']; ?></td>
						<td><?= $message['subject']; ?></td>
						<?php if($message['status'] == 'unread') { ?>
						<td class="status"></td>
						<?php } else { ?>
						<td class="status">&#10003;</td>
						<?php } ?>
						<td class="action"><a href="" id="<?= $message['id']; ?>" class="open">Open</a> | <a href="" id="<?= $message['id']; ?>" class="reply">Reply</a> | <a href="/queries/delete_msg/<?= $message['id']; ?>">Delete</a></td>
					</tr>

					<?php } ?>
				</tbody>
			</table>
			<p class="view_sent_btn"><a class="sent" href="">view sent messsages</a></p>
		</div>
		<?php } else { ?>

		<p class="no_msg">Mailbox Empty</p>

		<p class="view_sent_btn"><a class="sent" href="">view sent messsages</a></p>

		<?php } ?>
	</div>


	<div class="sent_mail_container">
		<?php if($sent_messages != null) { ?>
		<div class="sent_mail">
			<table>
				<thead>
					<th>From</th>
					<th>Subject</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php foreach ($sent_messages as $message) {
						?>
					<tr>

						<td><?= $message['alias']; ?></td>
						<td><?= $message['subject']; ?></td>
						<td class="action"><a href="" id="<?= $message['id']; ?>" class="open">Open</a> | <a href="/queries/delete_msg/<?= $message['id']; ?>">Delete</a></td>
					</tr>

					<?php } ?>
				</tbody>
			</table>
			<p class="view_sent_btn"><a class="received" href="">view messsages</a></p>
		</div>
		<?php } else { ?>

		<p class="no_msg">no sent messages</p>

		<p class="view_sent_btn"><a class="received" href="">view messsages</a></p>

		<?php } ?>
	</div>

	<div id="message">

	</div>

	<div class="compose">
		<form action="/queries/sendMail/<?= $id; ?>" method="post">
			<h1 class="send">Send a Message</h1>
			<p><input type="text" name="alias" placeholder="To:" class="to"></p>
			<p><input type="text" name="subject" placeholder="Subject:" class="subject"></p>
			<textarea type="text" name="text" class="text"></textarea>
			<p><input type="submit" value="send new message"></p>
		</form>
	</div>

	<p class="logout button"><a href="/traffic/end">Log me out</a></p>

</div>

	<script src="../../assets/js/messages.js"></script>
