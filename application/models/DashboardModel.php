<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {

	
	function queryadminlogin($email, $password){
		$query = $this->db->select('*')->from('admin');
		 $this->db->where('email',$email);
         $this->db->where('password', $password);
         $query = $this->db->get();
          //echo $query;
          // return $query->num_rows(); 
        $result = $query->result();
        return $result;
	}

	public function update_admin_otp($otp, $expires, $admin_id)
	{
		$this->db->set('otp', $otp);
		$this->db->set('otp_expires_at', $expires);
		$this->db->where('id', $admin_id);
		$this->db->update('admin');
		if($this->db->affected_rows()>0)
			return $admin_id;
		else
			return false;
	}

	function get_users_questions()
	{
		$this->db->select('u.name,u.country,q.*')->from('question q'); 
		$this->db->join('user u', 'q.user_id = u.user_id', 'left'); 
		$query = $this->db->get(); 
		$result = $query->result();	
		return $result;
	}

	function get_question_data($question_id){
		$this->db->select('u.name,u.country,q.*')->from('question q');
		$this->db->join('user u', 'q.user_id = u.user_id', 'left');
		$this->db->where(array('q.id' => $question_id));
		$query = $this->db->get(); 
		$result = $query->result();	
		return $result;
	}

	public function update_question($question_id,$data)
	{
		$this->db->where(array('id' => $question_id));
		$result = $this->db->update('question', $data);
		return $result;
	}

	public function checkadminlogin(){
		// $count = count($this->session->userdata('admin'));
		// if($count == 0){
		// 	redirect('AdminController/login');
		// }

		$count = $this->session->userdata('admin');
		// var_dump($count);
		if($count==null OR $count==""){
			
			redirect('AdminController/login');
			exit();
		}
	}
}