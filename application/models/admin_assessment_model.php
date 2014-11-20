<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_assessment_model extends CI_Model 
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
    
    function insertQuestion($que_data, $opt_data)
    {
        
        $query = $this->db->insert('conv_question_master',$que_data);
        if($query == '1')
        { 
            $que_id = $this->db->insert_id();
            $keys = array_keys($opt_data);
            if(!empty($keys))
            {
                for($i=0 ; $i<count($opt_data[$keys[0]]) ; $i++)
                    {                    
                        if($opt_data[$keys[0]][$i] == '')
                        {
                            continue;
                        }
                        else
                        {
                        $val_data = array(
                            'opt_que_id' => $que_id,
                            'opt_name' => $opt_data[$keys[0]][$i],
                            'opt_value' => $opt_data[$keys[1]][$i],
                        );
                        $finalQuery = $this->db->insert('conv_option_master',$val_data);
                        }                        
                    }
                        if($finalQuery == '1')
                        {
                             $result = 'yes';
                        }
                        else 
                        {
                            $result = 'nooptions';
                        }
             }
             else 
             {
                 $result = 'yes';
             }
        }
    else 
    {
        $result = 'no';
    }
        
    return $result;           
        
    }
    
    
    function formData($fno)
    {
        $form_no = $fno;
        $this->db->where('assessment_id', $form_no);
        $query = $this->db->get("conv_question_master");
        
        if($query->num_rows()>0)
            {
                foreach($query->result() as $rows)
                {                
                    $data[] = $rows;
                }               
                return $data;
            }                    
        else 
            {
                $data = array();
            }   
    }
    
    function questionEdit($qid)
    {
        $que_id = $qid;
        
        $this->db->where('que_id', $que_id);
        $query = $this->db->get("conv_question_master");
        
        foreach($query->result() as $rows)
            {                
                $data1[] = $rows;
            }  
            
        $this->db->where('opt_que_id', $que_id);
        $this->db->order_by("opt_id", "asc");
        $query2 = $this->db->get("conv_option_master");    
            
        if($query2->num_rows()>0)
            {
                foreach($query2->result() as $rows2)
                {                
                    $data2[] = $rows2;
                }                               
            }                    
        else 
            {
                    $data2[] = '';
            }
            
            $final = array_merge($data1, $data2);
            return $final;
        
    }
    
    function editQuestion($que, $que_up_data, $que_op_data)
    {
        
        $this->db->where('que_id', $que);
        $query = $this->db->update('conv_question_master',$que_up_data);
        
        if($query == '1')
        { 
            
            $this->db->where('opt_que_id', $que)->delete('conv_option_master');
            
            $que_id = $que;
            $keys = array_keys($que_op_data);
            
//            echo "<pre>";
//            print_r($que_op_data);
//            print_r($keys);
//            echo "</pre>";
//            die;
            
            if(!empty($keys))
            {
                for($i=0 ; $i<count($que_op_data[$keys[0]]) ; $i++)
                    {                    
                        if($que_op_data[$keys[0]][$i] == '')
                        {
                            continue;
                        }
                        else
                        {
                        $val_data = array(
                            'opt_que_id' => $que_id,
                            'opt_name' => $que_op_data[$keys[0]][$i],
                            'opt_value' => $que_op_data[$keys[1]][$i],
                        );
//                        echo "<pre>";
//                        print_r($val_data);
//                        echo "</pre>";
//                        die;
                        $finalQuery = $this->db->insert('conv_option_master',$val_data);
                        }                        
                    }
                        if($finalQuery == '1')
                        {
                             $result = 'yes';
                        }
                        else 
                        {
                            $result = 'nooptions';
                        }
             }
             else 
             {
                 $result = 'yes';
             }
        }
        
        return $result;
        
    }
    
    function disableQuestion($id)
    {
        $disable = array('is_enabled' => '0'); 
        
        $this->db->where('que_id', $id);
        $query = $this->db->update('conv_question_master',$disable);
        return $query;
    }
    
    function enableQuestion($id)
    {
        $enable = array('is_enabled' => '1');  
        
        $this->db->where('que_id', $id);
        $query = $this->db->update('conv_question_master',$enable);
        return $query;
    }
    
    function deleteQuestion($id)
    {       
    
        $this->db->where('que_id', $id);
        $query = $this->db->delete('conv_question_master');
        
        $this->db->where('opt_que_id', $id);
        $query1 = $this->db->delete('conv_option_master');
        
        return $query;       

    }
    
    
    
}
?>