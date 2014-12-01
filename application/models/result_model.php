<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Result_model extends CI_Model
{
    public function collegeWise($college_id)
    {
        $category = $this->db->get('category_question')->result_array();
        $queryCatRows = "";

        foreach ($category as $key => $value)
        {

            $strAlias = str_replace(" ", "_", $value['name']);
            $strAlias = str_replace("+", "XX", $strAlias);
            $strAlias = str_replace("&", "ZZ", $strAlias);


            $queryCatRows .= ",(SELECT COUNT(student_answer_master.id) AS TotalTrueAnswerBYCAT1 FROM student_answer_master 
                            LEFT JOIN question_master q
                            ON q.id = student_answer_master.question_id
                            LEFT JOIN category_question cq ON cq.id = q.category_id
                            WHERE s.college_id = $college_id 
                                    AND s.id = student_answer_master.student_id 
                                    AND cq.id = " . $value['id'] . " 
                                    AND student_answer_master.result='true'
                            )  " . $strAlias;
        }
        $query = "SELECT s.id,s.firstname,s.enroll_no $queryCatRows,
                    SUM(sam.result='true') AS TotalTrueAnswer
                    ,COUNT(*) AS TotalQuestions
                    FROM students s 
                    LEFT JOIN student_answer_master sam ON sam.student_id = s.id
                    WHERE s.college_id = $college_id
                    GROUP BY s.id";
        $finalData['records'] = $this->db->query($query)->result_array();
        $finalData['collegeName'] = $this->db->where('id', $college_id)->get('colleges')->result_array();
        return $finalData;
    }
    public function studentResult($student_id)
    {

        $query = "SELECT q.question,sam.answer_submitted, q.answer,sam.result FROM student_answer_master sam
                    LEFT JOIN question_master q
                            ON q.id = sam.question_id
                    WHERE student_id = '$student_id'";
        
        $resultData['result'] = $this->db->query($query)->result_array();
        $resultData['totalCorrect'] = $this->db->query("(SELECT COUNT(*) as totalCorrect FROM student_answer_master WHERE student_id = '$student_id' AND result = 'true')")->result_array();
        $resultData['studentName'] = $this->db->where('id', $student_id)->get('students')->result_array();
        
        return $resultData;        
    }
}