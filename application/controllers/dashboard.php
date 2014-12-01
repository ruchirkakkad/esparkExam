<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
//        $this->load->model('user_model');        
        $this->load->library('pagination');
    }
    
    public function index($error="")
    {          
        //if user is logged in this will redirect to dashboard page
//        if(($this->session->userdata('user_name')!=""))
//        {
        $username = $this->session->userdata('username');

        if($username != '')
        {
             $this->welcome();
        }
        else
        {
            redirect('admin');
        }
       
//        }
//        
//        else//It will redirect to login page
//        {
////            echo $error;
//            $data['title'] = "Login";            
//            $data['error'] = $error;            
//            $this->load->view("login_view.php",$data);            
//        }
    }
    
    public function welcome()//When User Is Logged In...
    {
        $data['title']= 'Dashboard';
        
        $this->load->view('header_view',$data);
        $this->load->view('left_view');
        $this->load->view('dashboard_view.php');
        $this->load->view('footer_view');
    }
    
    public function login()
    {
      
        $email = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $result = $this->user_model->login($email,$password);  
        if($result) 
            redirect(base_url());
        else
            $this->index('Either Email-ID or Password Is incorrect');
    }
    
    public function logout()
    {
        
//        $newdata = array(
//        'user_id'   =>'',
//        'user_name'  =>'',
//        'user_email'     => '',
//        'logged_in' => FALSE,
//        );
//        $this->session->unset_userdata($newdata);
//        $this->session->unset_userdata('history_of_user');
//        
        $this->session->sess_destroy();
        redirect('admin');
    }
    
}
?>