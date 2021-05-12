<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	
	function queryuserlogin($email, $password){
		$query = $this->db->select('*')->from('user');
		 $this->db->where('email',$email);
         $this->db->where('password', $password);
         $query = $this->db->get();
          //echo $query;
          // return $query->num_rows(); 
        $result = $query->result();
        return $result;
	}

	public function update_user_otp($otp, $expires, $user_id)
	{
		$this->db->set('otp', $otp);
		$this->db->set('otp_expires_at', $expires);
		$this->db->where('user_id', $user_id);
		$this->db->update('user');
		if($this->db->affected_rows()>0)
			return $user_id;
		else
			return false;
	}
	function get_users_questions($id)
	{
		$this->db->select('u.name,u.country,q.*')->from('question q'); 
		$this->db->join('user u', 'q.user_id = u.user_id', 'left');
		$this->db->where('u.user_id',$id); 
		// $this->db->where('c.status',1);
		$query = $this->db->get(); 
		$result = $query->result();	
		return $result;
	}
	public function update_question_status($question_id, $user_id, $status, $updated_at)
	{ 
		$this->db->set('status', $status);
		$this->db->set('updated_at', $updated_at);
		$this->db->where(array('id' => $question_id,'user_id'=>$user_id));
		$this->db->update('question');
		if($this->db->affected_rows()>0)
			return $question_id;
		else
			return false;
	}
	public function update_question($question_id,$user_id, $data)
	{
		$this->db->where(array('id' => $question_id,'user_id'=>$user_id));
		$result = $this->db->update('question', $data);
		return $result;
	}

	function get_users_question_data($question_id, $user_id){
		$this->db->select('u.name,u.country,q.*')->from('question q');
		$this->db->join('user u', 'q.user_id = u.user_id', 'left');
		$this->db->where(array('q.id' => $question_id,'q.user_id'=>$user_id));
		// $this->db->where('c.status',1);
		$query = $this->db->get(); 
		$result = $query->result();	
		return $result;
	}



	public function checkuserlogin(){
		// $count = count($this->session->userdata('user'));
		// if($count == 0){
		// 	redirect('UserController/login');
		// }

		$count = $this->session->userdata('user');
		// var_dump($count);
		if($count==null OR $count==""){
			
			redirect('UserController/login');
			exit();
		}
	}
}