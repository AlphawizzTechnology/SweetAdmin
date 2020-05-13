<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
    }

    public function index() {
          $config = array(
        'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => 'ssl://smtp.gmail.com', 
        'smtp_port' => 465,
        'smtp_user' => 'ganguramonline@gmail.com',
        'smtp_pass' => 'ganguram@123',
        // 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        'mailtype' => 'html', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '4', //in seconds
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );
    $this->load->library('email',$config);
    
    $from = 'ganguramonline@gmail.com';
    $to = 'Gopalsh022@gmail.com';
    $subject = "Password Reset Notification";
    $message = 'sdklfjsdlkfjdls';
   
    
    $this->email->set_newline("\r\n");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);
    
    
    if ($this->email->send()) {
        
       echo 'Your Email has successfully been sent.';
    } else {
     
      print_r($this->email->print_debugger());
    }
    }

    function send() {
       
    }
}