<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {
  
    function __construct(){
    	parent::__construct();
    	$this->load->model('DashboardModel');
    	$this->DashboardModel->checkadminlogin(); 
    }
   
    public function index()
    {
        $user_data = $this->session->userdata('admin'); 
        $data['all_questions'] = $this->DashboardModel->get_users_questions();
 
        $this->load->view('admin/common/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/common/footer'); 
    }

    public function answer_question($question_id)
    {
         
        $question_id = $this->SettingsModel->filter_string($question_id);
        
        $data['question'] = $this->DashboardModel->get_question_data($question_id);

        $this->load->view('admin/common/header');
        $this->load->view('admin/answer_question', $data);
        $this->load->view('admin/common/footer'); 

    }

    public function process_answer_question()
    {
        if (isset($_POST['answer'])) {
            $c_date =  date('Y-m-d H:i:s');
            
            $answer = $this->SettingsModel->filter_string($this->input->post('answer')); 
            $question_id = $this->SettingsModel->filter_string($this->input->post('question_id'));
            
            $data = array(
                "answer" => $answer,    
                "updated_at" => $c_date
            );
            $db_result = $this->DashboardModel->update_question($question_id, $data);
            if ($db_result){ 
                $this->session->set_flashdata('success_msg', 'Question Updated');
                redirect('AdminDashboard/answer_question/'.$question_id);
            }else{
                $this->session->set_flashdata('error_msg', 'Unable To Update question.');
                redirect('AdminDashboard/answer_question/'.$question_id);
            } 
        }
    }

    public function all_users()
    { 
        $data['all_users'] = $this->SettingsModel->select_from_tablename('user');

        $this->load->view('admin/common/header');
        $this->load->view('admin/all_users', $data);
        $this->load->view('admin/common/footer'); 
    }



}