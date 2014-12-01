<?php
class Result extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('result_model');
        $this->load->model('exam_model');
    }
    public function getCollege()
    {
        $data['title'] = 'Result';
        $data['colleges'] = $this->exam_model->get_college();
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view('results/getCollege.php', $data);
        $this->load->view('footer_view');
    }
    public function collegeWise()
    {
        $data['students'] = $this->result_model->collegeWise($_REQUEST['college']);
        $data['title'] = 'College : ' . $data['students']['collegeName'][0]['name'];
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view('results/collegeWiseResult.php', $data);
        $this->load->view('footer_view');
    }
    public function getStudentResult($student_id)
    {
        $data['studentsData'] = $this->result_model->studentResult($student_id);
        $data['title'] = 'Student : ' . $data['studentsData']['studentName'][0]['firstname'];
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view('results/studentResult.php', $data);
        $this->load->view('footer_view');
    }
}