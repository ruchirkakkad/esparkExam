<?php

class Userhistory extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('user_model');
        $this->load->model('history_model');
        
        $this->history_model->check_logged_in();
        
    }
    
    public function index()
    {
        if(($this->session->userdata('user_name')!=""))
        {
            $result = $this->user_model->listUsers();  
            
            $data['user_data'] = $result;
            
            $data['title'] = "Users"; 
            $this->load->view('header_view',$data);
            $this->load->view("history_view.php", $data);            
            $this->load->view('footer_view');
        }
        
        else//It will redirect to login page
        {
            $this->welcome();
        }
    }
    
    public function welcome()//When User Is Logged In...
    {
        $data['title']= 'Dashboard';
        
        $this->load->view('header_view',$data);
        $this->load->view('left_view');
        $this->load->view('login_view.php');
        $this->load->view('footer_view');
    } 
    
    public function user($id)
    {
        $data['title']= 'History';
        
        
        
        $user_name = $this->history_model->userName($id);
        $this->session->set_userdata['history_of_user'] = $user_name;        
        
        $history_data = $this->history_model->historyInfo($id);
        $history['history_data'] = $history_data;
        
        $this->load->view('header_view',$data);
        $this->load->view("user_history_view.php", $history);            
        $this->load->view('footer_view');
        
    }
    
    
}

?>
