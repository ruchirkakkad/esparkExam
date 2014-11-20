<?php

class Users extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('user_model');
        $this->load->model('admin_model');
        
        $this->user_model->check_logged_in();
    }
    
    public function index()
    {
//        echo site_url();
        
        if(($this->session->userdata('user_name')!=""))
        {
            $result = $this->user_model->listUsers();  
            
            $data['user_data'] = $result;
            
            $data['title'] = "Users"; 
            $this->load->view('header_view',$data);
            //$this->load->view('left_view');
            $this->load->view("users_view.php", $data);            
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
    
    public function changeAssistStatus()
    {
        $email = $this->input->post('u_id'); 
        $result = $this->user_model->changeAssist($email);
        echo $result;
    }
    
    public function editUserId()
    {   
        $user_id = $this->input->post('user_id'); 
        $result = $this->user_model->editUser($user_id);
        echo json_encode($result);
        die;
    }
    
    public function update()
    {
        $user_data = $_REQUEST;
        $result = $this->user_model->updateUser($user_data);
        
        if($result == 'yes')
        {
                $reg_message = "User Data Updated Successfully!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('update_msg_session', $sess_reg);
                
                redirect(base_url().'users');
        }       
        else
        {
                $reg_message = "Failed To Update User!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('update_msg_session', $sess_reg);
                
                redirect(base_url().'users');
        }
                
    }
    
    public function adduser()
    {
        $data['title']= 'Add User';
        
        $this->load->view('header_view',$data);        
        $this->load->view('add_user_view.php');
        $this->load->view('footer_view');
    }
    
    public function addnewuser()
    {         
        
        $user_initial = $this->input->post('user_initial');
        $user_name = $this->input->post('user_name');
        $user_lname = $this->input->post('user_lname');
        $user_email = $this->input->post('user_email');
        $user_password = $this->input->post('user_password');
        $user_category = $this->input->post('user_category');
        if($user_category == "Other")
        {
            $other_category = $this->input->post('other_category');            
        }
        else
        {
            $other_category = "";
        } 
        $user_type = $this->input->post('is_admin');
        if($user_type == 'Admin')
        {
            $is_admin = '1';
        }
        else
        {
            $is_admin = '0';
        }
        $user_church_name = $this->input->post('user_church_name');
        $user_church_size = $this->input->post('user_church_size');
        $user_phone = $this->input->post('user_phone');
        $user_church_address = $this->input->post('user_church_address');
        
        $register_data = array(
            'user_initial' => $user_initial,
            'user_name' => $user_name,
            'user_lname' => $user_lname,
            'user_email' => $user_email,
            'user_password' => md5($user_password),
            'user_category' => $user_category,
            'other_category' => $other_category,
            'is_admin' => $is_admin,
            'user_church_name' => $user_church_name,
            'user_church_size' => $user_church_size,
            'user_phone' => $user_phone,
            'user_church_address' => $user_church_address,
            'is_active' => '1',
            'is_allow_to_assist' => '1'
        );
        
        $result = $this->admin_model->addUser($register_data);
        if($result == '1')
        {
                $reg_message = "New User Successfully Added!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('update_msg_session', $sess_reg);                
                
                require_once(BASEPATH.'mail/phpmailer/class.phpmailer.php');
                require_once(BASEPATH.'mail/sendEmail.php');
                
                $mail_url = "";
                $url= base_url();
                $url1=explode('/', $url);       
                for($i=0 ; $i<(count($url1)-2) ; $i++)
                {
                    $mail_url .= $url1[$i].'/';
                }
                
                $subject = "New Account Created...";
                $message = "<html>
                            <head>
                            <style>p { font-family: Verdana; margin-left: 15px;}
                            </style>
                            </head>
                            <body>
                            <div style='width: 600px;border: 5px solid #00601C;float: left;'>
                                <p style='text-align: center;margin-left: -15px;'><img src='logo.png' alt='logo'/></p>
                                <p>Hello <b>".$user_name.",</b></p>
                                <p>Your account has been successfully registered to <u><i>convergecoach.com!</i></u></p>
                                <p>Your credentials...</p>
                                <p>User ID : <b>".$user_email."</b></p>
                                <p>Password : <b>".$user_password."</b></p>
                                <p>Web-site Link : <a href='".$mail_url."signup'>".$mail_url."signup</a></p>
                            </div>
                            </body>
                            </html>";                
//                
                sendEmail($user_email, $subject, $message);
                
                redirect(base_url().'users');
        }
        else 
        {
                $reg_message = "Failed To Add New User!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('update_msg_session', $sess_reg);
                
                redirect(base_url().'users');
        }
        
     }
     
    public function verifyEmail()
    {    
        $email = $this->input->post('u_name');
        $result = $this->admin_model->verifyMail($email);
        echo $result;
    }
    
    public function enable($id)
    {
        $u_id = $id;
        $result = $this->user_model->enableUser($u_id);
        
        if($result == '1')
        {
                $reg_message = "User Successfully Activated!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('update_msg_session', $sess_reg); 
                
                redirect(base_url().'users');
        }
        else 
        {
                $reg_message = "Failed To Enable User!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('update_msg_session', $sess_reg);
                
                redirect(base_url().'users');
        }
        
    }
    
    public function disable($id)
    {
        $u_id = $id;
        $result = $this->user_model->disableUser($u_id);
        
        if($result == '1')
        {
                $reg_message = "User Successfully Diactivated!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('update_msg_session', $sess_reg); 
                
                redirect(base_url().'users');
        }
        else 
        {
                $reg_message = "Failed To Disable User!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('update_msg_session', $sess_reg);
                
                redirect(base_url().'users');
        }
    }
    
}

?>
