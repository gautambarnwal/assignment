<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Define MyClass
 */
class Custom_helper
{
	protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
    }


    function current_date_time()
    {
        date_default_timezone_set('Asia/Kolkata');
       $c_date =  date('Y-m-d H:i:s');
       return $c_date;
    }

    function order_no(){
        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $unique = $today . $rand;
        return $unique;
    }
    function validate_mobile($mobile)
    {
        return preg_match('/^[0-9]{10}+$/', $mobile);
    }
    function validate_email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    

    function show_status_badge($status)
    {
        if ($status=="1") {
            echo '<span class="badge bg-green">Active</span>';
        }else{
            echo '<span class="badge bg-red">Inactive</span>';
        }
    }

    
}