<?php
class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->view('login.php');
    }
    public function loginCheck()
    {
        $post = $this->input->post();
        if($post['uemail'] == USERNAME && $post['upw'] == PASSWORD)
        {
            $this->session->set_userdata('username',$post['uemail']);
            redirect('dashboard');
        }
        else
        {            
            $this->index();
        }
    }
}