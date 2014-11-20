<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function check_logged_in()
    {  
        if($this->session->userdata('logged_in')!=1)
            {        
                redirect(site_url());
            }
    }
    
    function login($email,$password)
    {   
        
        if($this->input->post('admin_login'))
        {
            $this->db->where("user_email",$email);
            $this->db->where("user_password",$password);
            $this->db->where("is_admin",'1');

            $query=$this->db->get("conv_users");

            if($query->num_rows()>0)
            {
                foreach($query->result() as $rows)
                {
                //add all data to session 
                    $newdata = array(
                      'user_id'  => $rows->user_id,
                      'user_name'  => $rows->user_name,
                      'user_lname'  => $rows->user_lname,
                      'user_email'    => $rows->user_email,
                      'user_role'    => $rows->user_role,
                      'logged_in'  => TRUE,
                    );
                }
                
                
                $this->db->select('*');
                $this->db->from('permission_master');
                $this->db->join('page_master', 'permission_master.page_id = page_master.page_id');
                $this->db->join('module_master', 'page_master.module_id = module_master.module_id');
                $this->db->where("role_id",$newdata['user_role']);    

                $permissionData = $this->db->get();
                
                
                
                foreach($permissionData->result() as $rows)
                {
                    $CheckPermissionSession[$rows->module_name][] =   $rows->page_name; 
                }
                
                $newdata['privilages'] = $CheckPermissionSession;
                
                
                $this->session->set_userdata($newdata);
                
                
                
                return true;
            }
        return false;
        }
        else 
        {
            redirect(base_url());
        }
    }
    
    function listUsers()//Used To List All The Registered Users!!!
    {
    	$this->db->from("conv_users");
        $this->db->order_by("user_id", "desc");
        $query = $this->db->get();
        
        if($query->num_rows()>0)
            {
                foreach($query->result() as $rows)
                {                
                    $data[] = $rows;
                }               
            }                    
            return $data;
    }
    
    function changeAssist($id)//Used For Toggle Switch To Make User Allow To Assist OR Not!!!
    {
        
        $this->db->where("user_id", $id);
        $query = $this->db->get("conv_users");
        
        if($query->num_rows()>0)
            {
                foreach($query->result() as $rows)
                {
                    $status = $rows->is_allow_to_assist;
                    $username = $rows->user_name;
                    $useremail = $rows->user_email;
                }                
            }
            
            if($status == '1')
            {
                $statusNew = array(
                      'is_allow_to_assist'  => '0'                
                    );
            }
            else
            {
                $statusNew = array(
                      'is_allow_to_assist'  => '1'                      
                    );
                
                require_once(BASEPATH.'mail/phpmailer/class.phpmailer.php');
                require_once(BASEPATH.'mail/sendEmail.php');
                
                $mail_url = "";
                $url= base_url();
                $url1=explode('/', $url);       
                for($i=0 ; $i<(count($url1)-2) ; $i++)
                {
                    $mail_url .= $url1[$i].'/';
                }
                
                $subject = "You Are Now Able To Fill Assessment Forms...";
                $message = "<html>
                            <head>
                            <style>p { font-family: Verdana; margin-left: 15px;}
                            </style>
                            </head>
                            <body>
                            <div style='width: 600px;border: 5px solid #00601C;float: left;'>
                                <p style='text-align: center;margin-left: -15px;'><img src='".  base_url()."assets/images/logo.png' alt='logo'/></p>
                                <p>Hello <b>".$username.",</b></p>
                                <p>Your account has been validated.<br/>
                                All the assessment forms are now available for you to fill.
                                <br/>Thank you.</p>                                
                                <p>Web-site Link : <a href='".$mail_url."'>".$mail_url."</a></p>
                            </div>
                            </body>
                            </html>";                
                
                sendEmail($useremail, $subject, $message);
                
            }
        
        $this->db->where('user_id',$id);
        $query = $this->db->update('conv_users',$statusNew);
        if($query == 1)
        {
            return "yes";
        }
        else 
            {
            return "no";
            }
    }
    
    function editUser($id)
    {
            $uid = $id;
            $this->db->where("user_id",$uid);
            $query=$this->db->get("conv_users");
            
            foreach($query->result() as $rows)
                {                
                    $user_data = $rows;
                }
                return $user_data;
    }
    
    function updateUser($udata)
    {
        $user_data = $udata;
        $u_id = $user_data['user_id'];      
       
        
        if($user_data['user_password'] == '')
        {
            if($user_data['user_category'] == "Other")
            {
                $other_category = $user_data['other_category']; 
            }
            else
            {
                $other_category = "";
            }
            $update_data = array(
                'user_initial' => $user_data['user_initial'],
                'user_name' => $user_data['user_name'],
                'user_lname' => $user_data['user_lname'],
                'user_email' => $user_data['user_email'],
                'user_category' => $user_data['user_category'],
                'other_category' => $other_category,
                'is_admin' => $user_data['is_admin'],
                'user_church_name' => $user_data['user_church_name'],
                'user_church_size' => $user_data['user_church_size'],
                'user_phone' => $user_data['user_phone'],
                'user_church_address' => $user_data['user_church_address']
            );
        }
        else
        {
            if($user_data['user_category'] == "Other")
            {
                $other_category = $user_data['other_category'];
            }
            else
            {
                $other_category = "";
            }
            
            $update_data = array(
                'user_initial' => $user_data['user_initial'],
                'user_name' => $user_data['user_name'],
                'user_lname' => $user_data['user_lname'],
                'user_email' => $user_data['user_email'],
                'user_password' => md5($user_data['user_password']),
                'user_category' => $user_data['user_category'],
                'other_category' => $other_category,
                'is_admin' => $user_data['is_admin'],
                'user_church_name' => $user_data['user_church_name'],
                'user_church_size' => $user_data['user_church_size'],
                'user_phone' => $user_data['user_phone'],
                'user_church_address' => $user_data['user_church_address'],
            );
        }
        
        $this->db->where('user_id',$u_id);
        $query = $this->db->update('conv_users',$update_data);
        if($query == 1)
            {
                return "yes";
            }
        else 
            {
                return "no";
            }        
        
    }
    
    function disableUser($id)
    {
        $disable = array('is_active' => '0'); 
        
        $this->db->where('user_id', $id);
        $query = $this->db->update('conv_users',$disable);
        return $query;
    }
    
    function enableUser($id)
    {
        $enable = array('is_active' => '1');  
        
        $this->db->where('user_id', $id);
        $query = $this->db->update('conv_users',$enable);
        return $query;
    }
    
}
?>