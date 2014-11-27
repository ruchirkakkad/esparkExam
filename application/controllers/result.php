<?php
class Result extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('result_model');
//        $this->load->model('question_master_model');
    }
    public function collegeWise()
    {
        $data['title']= 'Result';
        $data['questions']=$this->result_model->collegeWise();
        $this->load->view('header_view',$data);
        $this->load->view('left_view');
        $this->load->view('question_master/list_question.php',$data);
        $this->load->view('footer_view');
    }
}