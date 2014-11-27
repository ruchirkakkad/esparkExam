<?php
class Exam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('exam_model');
        $this->load->model('question_master_model');
    }
    public function index()
    {
        if ($this->session->userdata('users') != '')
        {
            redirect(base_url() . 'exam/instructions');
        }
        $data['colleges'] = $this->exam_model->get_college();
        $this->load->view('student_fillUp_form.php', $data);
    }
    public function add_student()
    {
        $insertData = $this->exam_model->insertStudents($_POST);
        redirect(base_url() . 'exam/instructions');
    }
    public function instructions()
    {
        $this->load->view('instructions.php');
    }
    public function startexam()
    {
        $data = $this->exam_model->getRandomQuestions();
        $this->session->set_userdata('question_to_be_asked', $data);
        redirect(base_url() . 'exam/showQuestions');
    }
    public function showQuestions()
    {

        $data['category_section'] = $this->question_master_model->getCategory();
        $this->load->view('showQuestions.php', $data);
    }
    public function ajaxGetQuestionsPalette()
    {
        $this->session->userdata('question_to_be_asked')[$_REQUEST['id']];

        $satrId = "";
        foreach ($this->session->userdata('question_to_be_asked')[$_REQUEST['id']] as $key => $value)
        {
            $satrId .= $key . ",";
        }
        $satrId = rtrim($satrId, ",");

        $arrQuestionData['questions'] = $this->db->query("SELECT * FROM question_master where id IN (" . $satrId . ")")->result_array();
        $arrQuestionData['flags'] = $this->session->userdata('questions_flag');

        echo json_encode($arrQuestionData);
    }
    public function ajaxGetQuestionsData()
    {
        $sesstionFlagData = $this->session->userdata('questions_flag');
        if (isset($_REQUEST['Ans']))
        {
            if ($_REQUEST['Ans'] != 'not_answered')
            {
                $questionId = $_REQUEST['Qid'];
                $Submittedanswer = $_REQUEST['Ans'];
                foreach ($this->session->userdata('question_to_be_asked') as $key => $value)
                {
                    foreach ($value as $Question => $ans)
                    {
                        if ($Question == $questionId)
                        {
                            if ($Submittedanswer == $ans)
                            {
                                $result = 'true';
                            }
                            else
                            {
                                $result = 'false';
                            }
                        }
                    }
                }
                $this->exam_model->submitAnswer($questionId, $Submittedanswer, $result);
                
                $sesstionFlagData[$_REQUEST['Qid']] = 'ans';
            }
            else
            {
                $sesstionFlagData[$_REQUEST['Qid']] = 'not_ans';
            }
        }
        else
        {
//            $sesstionFlagData[$_REQUEST['Qid']] = 'not_ans';
        }
        //$this->db->where(array('id' => $_REQUEST['id']));
        //$data = $this->db->get('question_master')->result_array();

        $user_id = $this->session->userdata('users')['id'];
        $data = $this->db->query("SELECT * ,
                                    (SELECT answer_submitted 
                                            FROM student_answer_master 
                                                WHERE 
                                            question_id = '" . $_REQUEST['id'] . "' 
                                                AND
                                            student_id = '" . $user_id . "') ans 
                                FROM Question_master 
                                    WHERE id = '" . $_REQUEST['id'] . "'")->result_array();
//echo $this->db->last_query();

        $data[0]['option1'] = str_replace("<p>", "", $data[0]['option1']);
        $data[0]['option2'] = str_replace("<p>", "", $data[0]['option2']);
        $data[0]['option3'] = str_replace("<p>", "", $data[0]['option3']);
        $data[0]['option4'] = str_replace("<p>", "", $data[0]['option4']);
        $this->session->set_userdata('questions_flag', $sesstionFlagData);
        echo json_encode($data[0]);
    }
    public function logout()
    {
        $this->session->sess_destroy();
//        redirect(base_url() . 'exam');
    }
}