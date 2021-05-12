<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserDashboard extends CI_Controller {
  
    function __construct(){
    	parent::__construct();
    	$this->load->model('UserModel');
    	$this->UserModel->checkuserlogin(); 
    }
    function index(){ 
    	redirect("UserDashboard/all_questions");
	}

    function all_questions(){
        // $data['model_count'] = $this->InventoryModel->get_all_active_count('model'); 
        // echo "string";
        $data['all_questions'] = $this->SettingsModel->select_from_tablename('question');
 
        $this->load->view('user/common/header');
        $this->load->view('user/all_questions', $data);
        $this->load->view('user/common/footer'); 
    }
    public function my_questions()
    {
        $user_data = $this->session->userdata('user');
        $id = $user_data[0]->user_id;
        // $data['my_questions'] = $this->SettingsModel->select_cols_tablename('question','user_id',$id);

        $data['my_questions'] = $this->UserModel->get_users_questions($id);
 
        $this->load->view('user/common/header');
        $this->load->view('user/my_questions', $data);
        $this->load->view('user/common/footer'); 
    }

    function ask_question(){
        $data['user_data'] = $this->session->userdata('user')[0];

        $this->load->view('user/common/header');
        $this->load->view('user/ask_question', $data);
        $this->load->view('user/common/footer'); 
    }
    public function process_ask_question()
    {
        if (isset($_POST)) {
            $c_date =  date('Y-m-d H:i:s');
            $user_data = $this->session->userdata('user');
            $id = $user_data[0]->user_id;

            $question = $this->SettingsModel->filter_string($this->input->post('question')); 
            $question_regarding = $this->SettingsModel->filter_string($this->input->post('qregarding')); 
            $country = $this->SettingsModel->filter_string($this->input->post('country'));

            $image = $_FILES['ref_file']; $image1="";
            if($image['name'] !=='')
            {   
                $image_name=str_replace(" ", "_",$image['name']);
                $random_no1=rand(1000,9999).time();
                $image1=$random_no1."_".$image_name;
                $image_upload=$image1;
                $upload_dir = "./assets/uploads/";
                $fullpath = $upload_dir.$image_upload;

                $config = array(
                'upload_path' => $upload_dir,
                'allowed_types' => "*",
                'overwrite' => TRUE,
                'max_size' => "2000", // 100 kb ~ 0.8 mb 
                // 'max_height' => "1024",
                // 'max_width' => "1024",
                'file_name'=> $image1,
                'detect_mime'=> TRUE,
                'mod_mime_fix'=> TRUE
                );
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('ref_file'))
                { 
                    $data['imageError'] =  $this->upload->display_errors();
                    $this->session->set_flashdata('error_msg', $data['imageError'] );
                    // $image1 = $old_data->ref_file;  // after error change filename  
                    redirect('UserDashboard/ask_question');
                    exit(0);
                }
                else
                {
                    $imageDetailArray = $this->upload->data();
                    $image1 =  $imageDetailArray['file_name'];
                } 
            }

            $data = array(
                "user_id" => $id, 
                "question" => $question, 
                "question_regarding" => $question_regarding,
                "ref_file" => $image1,  
                "status" => "1",
                "created_at" => $c_date, 
                "updated_at" => $c_date
            );
            $db_result = $this->SettingsModel->insert_into_tablename('question', $data);
            if ($db_result){ 
                $this->session->set_flashdata('success_msg', 'Question Submitted');
                redirect('UserDashboard/my_questions');
            }else{
                $this->session->set_flashdata('error_msg', 'Unable To submit question.');
                redirect('UserDashboard/ask_question');
            } 
        }
    }

    public function change_question_status()
    {
        if (isset($_POST)) {
            $c_date =  date('Y-m-d H:i:s');
            $user_data = $this->session->userdata('user');
            // var_dump($user_data);
            $id = $user_data[0]->user_id;

            $question_id = $this->SettingsModel->filter_string($this->input->post('question_id')); 
            $status = $this->SettingsModel->filter_string($this->input->post('status')); 

            $status = ($status=='1')? '0': '1';  // invert status
             
            $db_result = $this->UserModel->update_question_status($question_id, $id , $status, $c_date);

            if ($db_result){ 
                echo json_encode(array("status"=>"success", "message"=> "Status Changed.","question_status"=>$status));
            }else{
                echo json_encode(array("status"=>"error", "message"=> "Unable To Change Status".$question_id,"question_status"=>$status));
                 
            } 

        }
    }

    public function edit_question($question_id)
    {
          
        $user_data = $this->session->userdata('user');
        // var_dump($user_data);
        $id = $user_data[0]->user_id;
         
        $question_id = $this->SettingsModel->filter_string($question_id);
        
        $data['question'] = $this->UserModel->get_users_question_data($question_id, $id);

        $this->load->view('user/common/header');
        $this->load->view('user/edit_question', $data);
        $this->load->view('user/common/footer'); 
        
    }


    public function process_edit_question()
    {
        if (isset($_POST['question'])) {
            $c_date =  date('Y-m-d H:i:s');
            $user_data = $this->session->userdata('user');
            $user_id = $user_data[0]->user_id;

            $question = $this->SettingsModel->filter_string($this->input->post('question')); 
            $question_regarding = $this->SettingsModel->filter_string($this->input->post('qregarding')); 
            $country = $this->SettingsModel->filter_string($this->input->post('country'));
            $old_ref_file = $this->SettingsModel->filter_string($this->input->post('old_ref_file'));
            $question_id = $this->SettingsModel->filter_string($this->input->post('question_id'));

            $image = $_FILES['ref_file']; $image1="";
            if($image['name'] !=='')
            {   
                $image_name=str_replace(" ", "_",$image['name']);
                $random_no1=rand(1000,9999).time();
                $image1=$random_no1."_".$image_name;
                $image_upload=$image1;
                $upload_dir = "./assets/uploads/";
                $fullpath = $upload_dir.$image_upload;

                $config = array(
                'upload_path' => $upload_dir,
                'allowed_types' => "*",
                'overwrite' => TRUE,
                'max_size' => "2000", // 100 kb ~ 0.8 mb  
                'file_name'=> $image1,
                'detect_mime'=> TRUE,
                'mod_mime_fix'=> TRUE
                );
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('ref_file'))
                { 
                    $data['imageError'] =  $this->upload->display_errors();
                    $this->session->set_flashdata('error_msg', $data['imageError'] );
                    // $image1 = $old_data->ref_file;  // after error change filename  
                    redirect('UserDashboard/edit_question/'.$question_id);
                    exit(0);
                }
                else
                {
                    $imageDetailArray = $this->upload->data();
                    $image1 =  $imageDetailArray['file_name'];
                } 
            }else{
                $image1 = $old_ref_file;
            }

            $data = array(
                "question" => $question, 
                "question_regarding" => $question_regarding,
                "ref_file" => $image1,   
                "updated_at" => $c_date
            );
            $db_result = $this->UserModel->update_question($question_id,$user_id, $data);
            if ($db_result){ 
                $this->session->set_flashdata('success_msg', 'Question Updated');
                redirect('UserDashboard/edit_question/'.$question_id);
            }else{
                $this->session->set_flashdata('error_msg', 'Unable To Update question.');
                redirect('UserDashboard/edit_question/'.$question_id);
            } 
        }
    }

}