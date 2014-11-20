<?php

class Assessments extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('admin_assessment_model');
        $this->admin_assessment_model->check_logged_in();
    }
    
    public function index()
    {
        if(($this->session->userdata('user_name')!=""))
        {
//            $result = $this->user_model->listUsers();
//            $data['user_data'] = $result;
            
            $data['title'] = "Assessments"; 
            $this->load->view('header_view',$data);            
            $this->load->view("assessment_list_view.php");            
            $this->load->view('footer_view');
        }
        
        else//It will redirect to login page
        {
            $this->welcome();
        }
    }
    
    public function welcome()//When User Is Logged In...
    {
        $data['title']= "Dashboard";
        
        $this->load->view('header_view',$data);
        $this->load->view('left_view');
        $this->load->view('login_view.php');
        $this->load->view('footer_view');
    }
    
    public function question()
    {
        $data['title']= "Add Question";
        
        $this->load->view('header_view',$data);        
        $this->load->view('add_question_view.php');
        $this->load->view('footer_view');
    }
    
    public function addquestion()
    {
        $que_data = array(          
            'assessment_id' => $this->input->post('formname'),
            'que_name' => $this->input->post('quename'),
            'que_type' => $this->input->post('quetype'),
            'is_enabled' => $this->input->post('questatus'),
            'que_created_by' => $this->session->userdata('user_name')
        );
        
        if($this->input->post('quetype') == 'checkbox')
        {
            $opt_data = array(
                'chkboxname' => $this->input->post('chkboxname'),
                'chkboxval' => $this->input->post('chkboxval')
            );
        }
        elseif ($this->input->post('quetype') == 'mcqbox') 
        {
            $opt_data = array(
                'mcqboxname' => $this->input->post('mcqboxname'),
                'mcqboxval' => $this->input->post('mcqboxval')
            );
        }
        else 
        {
            $opt_data = array(

            );
        }
        
        $result = $this->admin_assessment_model->insertQuestion($que_data, $opt_data);
        
        if($result == 'yes')
        {
                $reg_message = "Last Question Was Added Successfully!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg);
                
                redirect(base_url().'assessments/question/');
        }
        elseif ($result == 'nooptions') 
        {
                $reg_message = "Options Couldn't Added Successfully!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg);
                
                redirect(base_url().'assessments/question/');
        }
        else
        {
                $reg_message = "Failed To Upload!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg);
                
                redirect(base_url().'assessments/question/');
        }        
        
    }
    
    public function form($fno)
    {       
            $data['title'] = "Form-".$fno;

            $result = $this->admin_assessment_model->formData($fno);  
            
            $form['form_data'] = $result;           
            
            $this->load->view('header_view',$data);            
            $this->load->view("form_info_view.php", $form);            
            $this->load->view('footer_view');
    }
    
    public function questionedit($qid)
    {
        $data['title'] = "Question-".$qid;
        
        $result = $this->admin_assessment_model->questionEdit($qid);
        
        $question['que_data'] = $result;           
            
        $this->load->view('header_view',$data);            
        $this->load->view("edit_question_view.php", $question);            
        $this->load->view('footer_view');        
    }
    
    public function editquestion($queid)
    {
        
        $question_id = $queid;
        
        $que_modified_on = date("Y-m-d h:i:s");
        
        $que_data = array(          
            'assessment_id' => $this->input->post('formname'),
            'que_name' => $this->input->post('quename'),
            'que_type' => $this->input->post('quetype'),
            'is_enabled' => $this->input->post('questatus'),
            'que_modified_on' => $que_modified_on
        );
        
        if($this->input->post('quetype') == 'checkbox')
        {
            $opt_data = array(
                'chkboxname' => $this->input->post('chkboxname'),
                'chkboxval' => $this->input->post('chkboxval')
            );
        }
        elseif ($this->input->post('quetype') == 'mcqbox') 
        {
            $opt_data = array(
                'mcqboxname' => $this->input->post('mcqboxname'),
                'mcqboxval' => $this->input->post('mcqboxval')
            );
        }
        else 
        {
            $opt_data = array(

            );
        }
        
        $result = $this->admin_assessment_model->editQuestion($question_id, $que_data, $opt_data);
        
        if($result == 'yes')
        {
                $reg_message = "Question Was Edited Successfully!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg);
                
                redirect(base_url().'assessments/form/'.$this->input->post('formname'));
        }
        elseif ($result == 'nooptions') 
        {
                $reg_message = "Options Couldn't Edited Successfully!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg);
                
                redirect(base_url().'assessments/form/'.$this->input->post('formname'));
        }
        else
        {
                $reg_message = "Failed To Edit Question!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg);
                
                redirect(base_url().'assessments/form/'.$this->input->post('formname'));
        }       
        
        
    }
    
    public function enable($form_no, $id)
    {
        $q_id = $id;
        $result = $this->admin_assessment_model->enableQuestion($q_id);
        
        if($result == '1')
        {
                $reg_message = "Question Successfully Enabled!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg); 
                
                redirect(base_url().'assessments/form/'.$form_no);
        }
        else 
        {
                $reg_message = "Failed To Enable Question!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg);
                
                redirect(base_url().'assessments/form/'.$form_no);
        }
        
    }
    
    public function disable($form_no, $id)
    {
        $q_id = $id;
        $result = $this->admin_assessment_model->disableQuestion($q_id);
        
        if($result == '1')
        {
                $reg_message = "Question Successfully Disabled!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg); 
                
                redirect(base_url().'assessments/form/'.$form_no);
        }
        else 
        {
                $reg_message = "Failed To Disable Question!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg);
                
                redirect(base_url().'assessments/form/'.$form_no);
        }
    }
    
    public function questiondelete($form_no, $id)
    {
        $q_id = $id;
        $result = $this->admin_assessment_model->deleteQuestion($q_id);
        
        if($result == '1')
        {
                $reg_message = "Question Successfully Deleted!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg); 
                
                redirect(base_url().'assessments/form/'.$form_no);
        }
        else 
        {
                $reg_message = "Failed To Delete Question!!!!!";                                        
                $sess_reg = array('admin_message' => $reg_message);                    
                $this->session->set_userdata('register_session', $sess_reg);
                
                redirect(base_url().'assessments/form/'.$form_no);
        }
    }
    
    
}

?>
