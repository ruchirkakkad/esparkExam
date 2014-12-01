<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Question_master_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getQuestions($id = NULL)
    {
        if ($id == NULL)
        {
            $this->db->select('qm.*,cq.name');
            $this->db->from('question_master as qm');
            $this->db->join('category_question as cq', 'qm.category_id=cq.id', 'inner');
            return $this->db->get()->result();
        }
        else
        {
            return $this->db->get_where('question_master',array('id'=>$id))->result();
        }
    }
    
    
    public function getCategory()
    {
        return $this->db->get('category_question')->result();
    }
    
    
    public function insertQuestions($data)
    {
        date_default_timezone_set('Asia/Kolkata');
        $data['created_at'] = date('y-m-d H:i:s');
        
        $this->db->insert('question_master', $data);
        return $this->db->insert_id();
    }
    
    public function updateQuestions($data,$id)
    {
        date_default_timezone_set('Asia/Kolkata');
        $data['updated_at'] = date('y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('question_master', $data);
    }
    public function deleteQuestions($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('question_master');
    }
}