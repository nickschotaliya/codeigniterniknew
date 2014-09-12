<?php
class User extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function insert_user($data)
	{
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}
	
	function checkUserName($username){
		$query = $this->db->get_where('user',array('user_name'=>$username));
		if($query->num_rows()==1){
			return "false";
		}else{
			return "true";
		}
	}
	
	function checkEmail($email){
		$query = $this->db->get_where('user',array('e_mail'=>$email));
		if($query->num_rows()==1){
			return "false";
		}else{
			return "true";
		}
	}
	
	function checkLogin($data){
		$this -> db -> select();
		$this -> db -> from('user');
		$this -> db -> where(array('user_name'=>$data['user_name'],'pass_word'=>md5($data['pass_word'])));
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function displayUser(){
		return $this->db->get_where('user')->result();
	}
}