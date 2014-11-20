<?php 

class Adminmanagement extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('admin_model');
        $this->admin_model->check_logged_in();
        
    }
    
    public function index()
    {
        if(($this->session->userdata('user_name')!=""))
        {            
            $data['title'] = "Admin Emails"; 
            
            $list_email = $this->admin_model->listAdminEmails();
            $list['emailids'] = $list_email;
            
            $this->load->view('header_view',$data);
            $this->load->view('left_view');
            $this->load->view("admin_emails_view.php", $list);            
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
    
    public function addemailids()
    {        
        $email = $this->input->post('admin1_email');
        $result = $this->admin_model->addAdminEmail($email); 
        if($result == '1')
        {
            $reg_message = "Email-ID Added Successfully!!!!!";                                        
            $sess_reg = array('admin_message' => $reg_message);                    
            $this->session->set_userdata('register_session', $sess_reg);

            redirect(base_url().'adminmanagement/');        
        }
        else
        {
            $reg_message = "Failed To Add Email-ID!!!!!";                                        
            $sess_reg = array('admin_message' => $reg_message);                    
            $this->session->set_userdata('register_session', $sess_reg);

            redirect(base_url().'adminmanagement/');            
        }
    }
    
    public function updateemail()
    {
        $to_update =  $this->input->post('hidden_id');
        $update = $this->input->post('admin1_email_updated');
        
        $result = $this->admin_model->updateAdminEmail($to_update, $update);
        if($result == '1')
        {
            $reg_message = "Email-ID Updated Successfully!!!!!";                                        
            $sess_reg = array('admin_message' => $reg_message);                    
            $this->session->set_userdata('register_session', $sess_reg);

            redirect(base_url().'adminmanagement/');        
        }
        else
        {
            $reg_message = "Failed To Update Email-ID!!!!!";                                        
            $sess_reg = array('admin_message' => $reg_message);                    
            $this->session->set_userdata('register_session', $sess_reg);

            redirect(base_url().'adminmanagement/');            
        }
        
    }
    
    public function deleteemail($id)
    {
        $del_id = $id;
        
        $result = $this->admin_model->deleteAdminEmail($del_id);
        if($result == '1')
        {
            $reg_message = "Email-ID Deleted Successfully!!!!!";                                        
            $sess_reg = array('admin_message' => $reg_message);                    
            $this->session->set_userdata('register_session', $sess_reg);

            redirect(base_url().'adminmanagement/');        
        }
        else
        {
            $reg_message = "Failed To Delete Email-ID!!!!!";                                        
            $sess_reg = array('admin_message' => $reg_message);                    
            $this->session->set_userdata('register_session', $sess_reg);

            redirect(base_url().'adminmanagement/');            
        }
    }
    
    public function getupdatedata()
    {
        $id = $this->input->post('u_id');
        $result = $this->admin_model->emailInfo($id); 
        echo $result;
    }
    
}

?>