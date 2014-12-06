<?php
/**
 * A base model for use with Magis' base controller.
 * Extend this model with the name of the controller and a "_model" suffix.
 *
 * @link http://github.com/jamierumbelow/codeigniter-base-model
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */
	
class MY_Exceptions extends CI_Exceptions {
    public function __construct() {
        parent::__construct();
    }
    public function show_error($heading, $message, $template = 'error_general', $status_code = 500) {
        try {
            $str = parent::show_error($heading, $message, $template = 'error_general', $status_code = 500);
            throw new Exception($str);
        } catch (Exception $e) {
            $msg = $e->getMessage();
            $trace = "<h1>Call Trace</h1><pre>". $e->getTraceAsString(). "<pre>";
            //append our stack trace to the error message
            $err = str_replace('</div>', $trace.'</div>', $msg);
            echo $err;
        }
    }
	
	function log_exception($severity, $message, $filepath, $line) {   
		$severity = ( ! isset($this->levels[$severity])) ? $severity : $this->levels[$severity];
        $message = 'Severity: '.$severity.' –> '.$message. ' '.$filepath.' '.$line.' [URI='.$_SERVER['REQUEST_URI'].']';

        if( !empty($_POST) ){
            $message .= 'POST: ';
            foreach($_POST as $key=>$value){
                $message .= $key.' => '.$value;
            }
        }
		
		if (ENVIRONMENT === 'production') {
            $ci =& get_instance();

            $ci->load->library('email');
            $ci->email->from('error@trendmicro.com', 'TrendMicro Error Notification');
            $ci->email->to('josecarlosoriano@yahoo.com');
            //$ci->email->cc('another@another-example.com');
            //$ci->email->bcc('them@their-example.com');
            $ci->email->subject('TrendMicro Error');
            $ci->email->message('Severity: '.$severity.'  --> '.$message. ' '.$filepath.' '.$line);
            $ci->email->send();
        }
		
        log_message('error', $message, TRUE);
        parent::log_exception($severity, $message, $filepath, $line);
    }
}