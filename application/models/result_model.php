<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Result_model extends CI_Model
{
    public function collegeWise()
    {
        $this->db->where('college_id', 1);
        $students = $this->db->get('students')->result_array();
        $finalData = array();
        foreach ($students as $key => $value)
        {
            echo "<pre>";
            print_r($value);
            die;
            $finalData['name'] = $value['firstname']." ".$value['lastname'];
            $finalData['enroll_no'] = $value['enroll_no'];
            $query = "SELECT q.category_id,COUNT(s.result) 
                        FROM student_answer_master  AS s
                        LEFT JOIN question_master AS q
                        ON s.question_id = q.id
                        WHERE student_id = 5
                        AND s.result = 'true'
                        GROUP BY q.category_id ";
            $query = "SELECT c.name,(sa.result) FROM category_question c
RIGHT JOIN question_master q
ON q.category_id = c.id
INNER JOIN student_answer_master sa
ON sa.question_id = q.id
WHERE sa.student_id = '5'";
            $result = $this->db->query($query)->result();
            echo "<pre>";
            print_r($result);
            die;
        }
    }
}