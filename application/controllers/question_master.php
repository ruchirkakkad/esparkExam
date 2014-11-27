<?php // if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question_master extends CI_Controller
{
    public function __construct()
    {        
        parent::__construct();
        $this->load->model('question_master_model');        
    }
    
    public function index()
    {
        $this->list_question();
    }
    
    public function list_question()
    {
        $data['title']= 'Questions';
        $data['questions']=$this->question_master_model->getQuestions();
        $this->load->view('header_view',$data);
        $this->load->view('left_view');
        $this->load->view('question_master/list_question.php',$data);
        $this->load->view('footer_view');
    }
    
    public function add_question()
    {        
        $data['title']= 'Questions';
        $data['category']=$this->question_master_model->getCategory();
        $this->load->view('header_view',$data);
        $this->load->view('left_view');
        $this->load->view('question_master/add_question.php',$data);
        $this->load->view('footer_view');
    }
    public function post_add_question()
    {        
        $insertData = $this->question_master_model->insertQuestions($_POST);
        redirect(base_url().'question_master/list_question');
    }
    public function edit_question($id)
    {        
        $data['title']= 'Questions';
        $data['category']=$this->question_master_model->getCategory();
        $data['questions']=$this->question_master_model->getQuestions($id);
        $data['edit'] = 'edit';
        $this->load->view('header_view',$data);
        $this->load->view('left_view');
        $this->load->view('question_master/add_question.php',$data);
        $this->load->view('footer_view');
    }
    
    public function post_edit_question($id)
    {        
        $insertData = $this->question_master_model->updateQuestions($_POST,$id);
        redirect(base_url().'question_master/list_question');
    }
        
    public function delete_question($id)
    {        
        $insertData = $this->question_master_model->deleteQuestions($id);
        redirect(base_url().'question_master/list_question');
    }    
}