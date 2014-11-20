<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class History_model extends CI_Model 
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
        
    function historyInfo($id)
    {
        $user_id = $id;
        $data = "";
        for($i=1 ; $i<=4 ; $i++)
        {
            $this->db->select('*');
            $this->db->where('user_id', $user_id); 
            $this->db->having('assessment_id', $i);            
            $this->db->order_by('submitted_on', "DESC");
            $query = $this->db->get('conv_result_master');
        
            if($query->num_rows()>0)
             {
                foreach($query->result() as $rows)
                    {
                        $data[$i][] = $rows;
                    } 
             } 

        }
        return $data;
    }
    
    function userName($id)
    {
        $this->db->select('user_name , user_lname');
        $this->db->where('user_id', $id);
        $query = $this->db->get('conv_users');
        
        if($query->num_rows()>0)
             {
                foreach($query->result() as $rows)
                    {
                        
                    } 
             }              
             return $rows->user_name." ".$rows->user_lname;
        
    }
    
    
}
?>