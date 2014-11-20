<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model 
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
    
    function addAdminEmail($email)
    {
        $emailID = array('email_address' => $email);        
        $query = $this->db->insert('conv_admin_emails',$emailID);        
        return $query;        
    }
    
    function listAdminEmails()
    {
        $this->db->select('*');
        $query = $this->db->get('conv_admin_emails');
        
        if($query->num_rows()>0)
            {
                foreach($query->result() as $rows)
                {
                    $emails[] = $rows;
                }
            }
            else 
            {
            $emails = "";
            } 
            
            return $emails;  
            
    }
    
    function emailInfo($id)
    {
        $this->db->select('email_address');
        $this->db->where('id', $id);
        $query = $this->db->get('conv_admin_emails');
        
        if($query->num_rows()>0)
            {
                foreach($query->result() as $rows)
                {
                    $emailsID = $rows->email_address;
                }
            }
            
            return $emailsID;  
    }
    
    function updateAdminEmail($to_update, $update)
    {
        $data = array(
               'email_address' => $update
            );

        $this->db->where('email_address', $to_update);
        $query = $this->db->update('conv_admin_emails', $data);        
        
        return $query;        
    }
    
    function deleteAdminEmail($del_id)
    {
        $this->db->where('id', $del_id);
        $query = $this->db->delete('conv_admin_emails');        
        
        return $query;
    }
    
    function addUser($register_data)
    {    
    
        $query = $this->db->insert('conv_users', $register_data);
        
        return $query;
    }
    
    function verifyMail($email)
    {
        $this -> db -> select('user_email');
        $this -> db -> from('conv_users');
        $this -> db -> where('user_email', $email);
        $this -> db -> limit(1);
        $query = $this -> db -> get();
        $user_count = $query->num_rows();
        if($user_count == '1')
            {              
                return 'yes';
            }
            else 
                {
                    return 'no';
                }
    }
    
}
?>