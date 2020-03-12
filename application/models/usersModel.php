<?php

class usersModel extends CI_Model
{
	function getUsers() {
		$query=$this->db->query("
        select ID_user, email, type from user");

		return $query->result_array();
	}

	function deleteUser($id)
	{
		$this->db->query("DELETE FROM USER WHERE ID_user = $id");
	}
}
