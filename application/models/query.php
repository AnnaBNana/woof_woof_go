<?php 

class Query extends CI_Model {
	function get_user_by_email($email) {
		return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
	}
	function add_user($new_user) {
		$query = "INSERT INTO users (name, alias, email, password, created_at) VALUES (?, ?, ?, ?, ?)";
		$values = array($new_user['name'], $new_user['alias'], $new_user['email'], $new_user['password'], date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}
	function get_user_by_id($id) {
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
	}
	function edit_user($change_user, $id) {
		$query = "UPDATE users SET alias = ?, email = ?, about = ?, primary_city = ?, availability = ?, updated_at = ? WHERE id = ?";
		$values = array($change_user['alias'], $change_user['email'], $change_user['about'], $change_user['loc'], $change_user['avail'],date("Y-m-d, H:i:s"), $id);
		return $this->db->query($query, $values);
	}
	function add_pet($new_pet, $id) {
		$query = "INSERT INTO pets (pets.name, pets.species, pets.breed, pets.created_at, pets.user_id) VALUES (?,?,?,?,?)";
		$values = array($new_pet['name'], $new_pet['species'], $new_pet['breed'], date("Y-m-d, H:i:s"), $id);
		return $this->db->query($query, $values);
	}
	function get_all_user_pets($user_id) {
		return $this->db->query("SELECT * FROM pets WHERE user_id = ?", array($user_id))->result_array();
	}
	function edit_pet($change_pet, $pet_id) {
		$query = "UPDATE pets SET name = ?, species = ?, breed = ?, about = ?, updated_at = ? WHERE id = ?";
		$values = array($change_pet['name'], $change_pet['species'], $change_pet['breed'], $change_pet['about'], date("Y-m-d, H:i:s"), $pet_id);
		return $this->db->query($query, $values);
	}
	function delete_pet($pet_id) {
		return $this->db->query("DELETE FROM pets WHERE id = ?", $pet_id);
	}
	function add_user_image($user_img, $id) {
		// var_dump('this is in the model', $user_img);
		// die();
		$query = "UPDATE users SET img_name = ?, updated_at = ? WHERE id = ?";
		$values = array($user_img['name'], date("Y-m-d, H:i:s"), $id);
		return $this->db->query($query, $values);
	}
	function add_pet_image($user_img, $pet_id) {
		// var_dump('this is in the model', $user_img);
		// die();
		$query = "UPDATE pets SET img_name = ?, updated_at = ? WHERE id = ?";
		$values = array($user_img['name'], date("Y-m-d, H:i:s"), $pet_id);
		return $this->db->query($query, $values);
	}
	function get_user_imgs_rand($user_id) {
		return $this->db->query("SELECT id, img_name FROM users WHERE id != ? ORDER BY RAND() LIMIT 5", array($user_id))->result_array();
	}
	function get_user_imgs_by_date($user_id) {
		return $this->db->query("SELECT id, img_name FROM users WHERE id != ? ORDER BY created_at DESC LIMIT 20", array($user_id))->result_array();
	}
	function get_all_users_messages($user_id) {
		return $this->db->query("SELECT messages.id, messages.subject, messages.text, messages.status, messages.sender_id, messages.recip_id, messages.created_at, users.alias FROM messages LEFT JOIN users ON messages.sender_id=users.id WHERE recip_id = ?", array($user_id))->result_array();
	}
	function get_all_sent_messages($user_id) {
		return $this->db->query("SELECT messages.id, messages.subject, messages.text, messages.status, messages.sender_id, messages.recip_id, messages.created_at, users.alias FROM messages LEFT JOIN users ON messages.sender_id = users.id WHERE sender_id = ?", array($user_id))->result_array();
	}
	function get_user_by_alias($alias) {
		return $this->db->query("SELECT users.id, users.alias FROM users WHERE alias = ?", array($alias))->row_array();
	}
	function send_msg($msg_content, $sender_id) {
		$query = "INSERT INTO messages (subject, text, status, sender_id, recip_id, created_at) VALUES (?, ?, ?, ?, ?, ?)";
		$values = array($msg_content['subject'], $msg_content['text'], 'unread', $sender_id, $msg_content['recip_id'], date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}
	function get_msg_by_id($msg_id) {
		return $this->db->query("SELECT messages.id, messages.subject, messages.text, messages.status, messages.sender_id, messages.recip_id, DATE_FORMAT(messages.created_at,'%W, %M %e, %Y @ %h:%i %p') as created_at, users.alias FROM messages LEFT JOIN users ON messages.sender_id=users.id WHERE messages.id = ?", array($msg_id))->row_array();
	}
	function mark_msg_read($msg_id) {
		$query = "UPDATE messages SET status = ?, updated_at = ? WHERE id = ?";
		$values = array('read', date("Y-m-d, H:i:s"), $msg_id);
		return $this->db->query($query, $values);
	}
	function delete_msg($msg_id) {
		return $this->db->query("DELETE FROM messages WHERE id = ?", $msg_id);
	}
}


?>