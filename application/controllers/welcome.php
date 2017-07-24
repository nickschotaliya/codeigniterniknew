<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('index');
    }

    public function register() {
        if ($this->input->post('btnRegister')) {
            $this->load->model('User');
            unset($_POST['pwdConfirmPassword']);
            unset($_POST['btnRegister']);
            $_POST['pass_word'] = md5($_POST['pass_word']);
            $data = $this->input->post();
            $user = $this->User->insert_user($data);
            if ($user) {
                $this->session->set_flashdata('dispMessage', 'Register Successfully!');
            } else {
                $this->session->set_flashdata('dispMessage', 'Error occur while register user!');
            }
            redirect(base_url() . 'welcome/login', 'location');
        }
        $this->load->view('register');
    }

    public function checkUserName() {
        $this->load->model('User');
        $username = $this->input->post('user_name');
        echo $this->User->checkUserName($username);
    }

    public function checkEmail() {
        $this->load->model('User');
        $email = $this->input->post('e_mail');
        echo $this->User->checkEmail($email);
    }

    public function login() {
        if ($this->input->post('btnLogin')) {
            $this->load->model('User');
            $data = $this->input->post();
            $user = $this->User->checkLogin($data);
            //echo $this->db->last_Query();exit;
            if ($user) {
                $newdata = array(
                    'id' => $user[0]->user_id,
                    'username' => $user[0]->user_name,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);
                redirect(base_url() . 'welcome/user', 'location');
            } else {
                $this->session->set_flashdata('dispMessage', 'Incorrect Username or Password!');
                redirect(base_url() . 'welcome/login', 'location');
            }
        }
        $this->load->view('login');
    }

    public function user() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'welcome/login', 'location');
        }
        $this->load->model('User');
        $data['user'] = $this->User->displayUser();
        $this->load->view('user', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */