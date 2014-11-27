<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Exam_model extends CI_Model
{
    public function get_college()
    {
        return $this->db->get('colleges')->result();
    }
    public function insertStudents($data)
    {

        date_default_timezone_set('Asia/Kolkata');
        $data['created_at'] = date('y-m-d H:i:s');
        $this->db->insert('students', $data);
        $data['id'] = $this->db->insert_id();
        $this->session->set_userdata('users', $data);
    }
    public function getRandomQuestions()
    {
        $user_id = $this->session->userdata('users')['id'];
        $questionIDs = array();
        $questionsFlags = array();
        $category = $this->db->get('category_question')->result_array();
        $insertString = "";
        foreach ($category as $key => $value)
        {
            $query = "SELECT * FROM (
                        SELECT id,answer
                            FROM question_master 
                                WHERE category_id =" . $value['id'] . " AND moderator_level = 'hard' ORDER BY RAND() LIMIT " . $value['easy'] . "
                        ) AS t
                        UNION
                        SELECT * FROM 
                        (
                        SELECT id,answer 
                            FROM question_master 
                                WHERE category_id =" . $value['id'] . " AND moderator_level = 'easy' ORDER BY RAND() LIMIT " . $value['medium'] . "			

                        ) AS t2
                        UNION
                        SELECT * FROM 
                        (
                        SELECT id,answer 
                            FROM question_master 
                                WHERE category_id =" . $value['id'] . " AND moderator_level = 'medium' ORDER BY RAND() LIMIT " . $value['hard'] . "			
                        ) AS t3";

            $arrTemp = $this->db->query($query)->result_array();

            $arrQuestrion = array();
            
            foreach ($arrTemp as $keyTemp => $valueTemp)
            {
                $arrQuestrion[$valueTemp['id']] = $valueTemp['answer'];
                
                $insertString .= "(" . $user_id . "," . $valueTemp['id'] . "),";
                $questionsFlags[$valueTemp['id']] = 'nv';
            }
            $questionIDs[$value['id']] = $arrQuestrion;

        }
        
       $insertString=  trim($insertString, ",");
        $insertQueryAnswerTable = "INSERT INTO student_answer_master (student_id, question_id) VALUES $insertString";
        $this->db->query($insertQueryAnswerTable);
        $this->db->where('id',$user_id);
        $update = array('is_exam_attended'=>0);
        $this->db->update('students',$update);
        $this->session->set_userdata('questions_flag', $questionsFlags);
        return $questionIDs;
    }
    public function submitAnswer($questionId,$Submittedanswer,$result)
    {
        
        $user_id = $this->session->userdata('users')['id'];
        $this->db->where('student_id',$user_id);
        $this->db->where('question_id',$questionId);
        $update = array('answer_submitted'=>$Submittedanswer,'result'=>$result);
        $this->db->update('student_answer_master',$update);

    }
}