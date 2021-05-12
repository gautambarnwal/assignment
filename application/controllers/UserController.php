<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    function __construct(){
    	parent::__construct();
    	$this->load->model('UserModel');
    }
    
    function index(){
		if($this->session->userdata('user')){
			redirect('UserDashboard');
		}
		$this->load->view('user/login');
	}
	
    function login(){
		if($this->session->userdata('user')){
			redirect('UserDashboard');
		}
		$this->load->view('user/login');
	}

	function processlogin(){
		
		$c_date =  date('Y-m-d H:i:s');
		$email = $this->SettingsModel->filter_string($this->input->post('email'));
		$password = $this->SettingsModel->filter_string($this->input->post('password'));
		$password = md5($password);

		$user_result = $this->UserModel->queryuserlogin($email, $password);
		if ($user_result){

			$id = $user_result[0]->user_id;

			$six_digit_otp = mt_rand(100000, 999999);
			$db_result = $this->UserModel->update_user_otp($six_digit_otp, $c_date, $id);
			
			$subject = "OTP For Login";
			$mailer_content = "<p style='margin: 0;'>Enter this OTP while login</p>
			<p style='text-align:center;'> <b>OTP: </b> ". $six_digit_otp ."</p>";
			$email_response = $this->SettingsModel->sendmail($user_result[0]->email, $subject, $mailer_content);
			
			if ($email_response) { 
				
				echo json_encode(array("status"=>"success", "message"=> "OTP Sent Success.","id"=>$id));
			}else{
				echo json_encode(array("status"=>"error", "message"=> "Unable To Send OTP","id"=>$id));
			}
			
		}else{

			// $this->session->set_flashdata('error_msg', 'Invalid Details');
		 	//  redirect('UserController/login');
		 	echo json_encode(array("status"=>"error", "message"=> "Invalid Details"));
		} 
	}
	function processotp(){
		
		$c_date =  date('Y-m-d H:i:s');
		$login_otp = $this->SettingsModel->filter_string($this->input->post('login_otp'));
		$id = $this->SettingsModel->filter_string($this->input->post('id'));
		
		$data_user = $this->SettingsModel->select_cols_tablename('user', 'user_id', $id);
		if ($data_user){

			$stored_otp = $data_user[0]->otp;
			$otp_expires_at = $data_user[0]->otp_expires_at;

			if ((int)$login_otp == (int)$stored_otp) {
				$otp_generated_time = strtotime($otp_expires_at);
                $current_time = strtotime($c_date);
                $seconds_diff = $current_time - $otp_generated_time;
                if ($seconds_diff > 900) { // 900 second = 15 min 
                    echo json_encode(array("status"=>"error", "message"=> "OTP Expired.Try again. Generate new.")); 
                }else{ 
                    $this->session->set_userdata('user',$data_user);
					echo json_encode(array("status"=>"success", "message"=> "Logged In Success.")); 
                }
			}else{
				echo json_encode(array("status"=>"error", "message"=> "Invalid OTP")); 
			}
			
		}else{ 
		 	echo json_encode(array("status"=>"error", "message"=> "Invalid Details"));
		} 
	}


	function processregister(){
		
		$c_date =  date('Y-m-d H:i:s');
		$email = $this->SettingsModel->filter_string($this->input->post('email'));
		$name = $this->SettingsModel->filter_string($this->input->post('name')); 
		$region = $this->SettingsModel->filter_string($this->input->post('region')); 
		$country = $this->SettingsModel->filter_string($this->input->post('country')); 
		$division = $this->SettingsModel->filter_string($this->input->post('division')); 
		$role = $this->SettingsModel->filter_string($this->input->post('role')); 

		$password = $this->SettingsModel->filter_string($this->input->post('password'));
		$conf_password = $this->SettingsModel->filter_string($this->input->post('conf_password'));

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger small">', '</div>');
 
		$this->form_validation->set_rules('name', 'Name', 'min_length[2]|max_length[40]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|alpha_numeric_spaces');
		$this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]',
	        array(
	                'required'      => 'You have not provided %s.',
	                'is_unique'     => 'This %s already exists.'
	        )
	    );
		
		if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
        	$password = md5($password); 

			$data = array(
        		"name" => $name, 
        		"email" => $email, 
        		"region" => $region,  
        		"country" => $country,  
        		"division" => $division,  
        		"role" => $role,   
        		"password" => $password,
        		"otp"=>"",
        		"otp_expires_at"=>"",
        		"created_at" => $c_date
        	);
			$db_result = $this->SettingsModel->insert_into_tablename('user', $data);
			if ($db_result){
				// $this->session->set_userdata('user',$db_result);
				$this->session->set_flashdata('success_msg', 'Registration Success. Please Login');
			  	redirect('UserController/login');
			}else{
				$this->session->set_flashdata('error_msg', 'Invalid Details');
			  	redirect('UserController/login');
			} 
        }
		
	}


	function logout(){
		$this->session->unset_userdata('user');
     	$this->session->sess_destroy();
     	redirect('UserDashboard','refresh');
	}
	

}