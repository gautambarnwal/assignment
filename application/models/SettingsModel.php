<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model {

	public $website_title = "BioQuest";
	public $website_logo_url = "assets/logo.png";
    public $primary_color_code = "#a5a5a5";
    
	function __construct(){
    	parent::__construct(); 
    }

	public function filter_string($string)
	{
		$string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8'); // or htmlentities()
		return $this->security->xss_clean($string);
	}

    function insert_into_tablename($tablename,$data)
    {
        $this->db->insert($tablename ,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function select_from_tablename($tablename)
    {
        $query = $this->db->select('*')->from($tablename)->get();
        $result = $query->result(); 
        return $result;     
    }
    function select_cols_tablename($tablename,$columnname,$coldata)
    {
        $query = $this->db->select('*')->from($tablename)->where($columnname,$coldata)->get();
        $result = $query->result(); 
        return $result;     
    }

   
  	function sendmail($to_email ="1998gtb@gmail.com", $subject= "", $mailer_content= "")
  	{
        // Load PHPMailer library
        $this->load->library("Phpmailer_lib");
        $mail = $this->phpmailer_lib->load();
        
        //SMTP configuration  
        $mail->isSMTP(); 

        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply@staraircool.in';
        $mail->Password = 'Noreply@12345'; 
        $mail->SMTPSecure = 'none';
        $mail->Port = 587;
        
         
        $mail->setFrom("noreply@staraircool.in", "staraircool");
        $mail->addReplyTo("noreply@staraircool.in", "staraircool");
 
        
        $mail->addAddress($to_email); 

        // Email subject
        $mail->Subject = $subject;
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        $data['mailer_content'] = $mailer_content;
        $data['mailer_title'] = $subject;

         $mailContent = $this->load->view('user/common/mailer_design', $data, true);
        // Email body content
        // $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
        //     <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            // echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        }else{
            return true;
        }
    }

}
?>