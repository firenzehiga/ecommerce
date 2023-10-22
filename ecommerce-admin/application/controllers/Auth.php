<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('userlogin')) {
            if ($this->uri->segment(2) != 'login' && $this->uri->segment(2) != 'index' && $this->uri->segment(2) != '') {
                if ($this->uri->segment(2) != 'logout')
                    $this->session->set_userdata('urlback', $this->uri->uri_string());
                redirect('auth/login');
            }
        } else {
            if ($this->uri->segment(2) != 'logout')
                redirect('Main');
        }
        $this->load->model('Mainmodel');
    }

    function index($mode = '')
    {
        $this->login($mode);
    }

    function login($mode = '')
    {
        $data['title']    = 'Login';
        $data['msg']    = '';
        if ($mode == 'submit') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['msg'] = '<div class="alert alert-danger alert-dismissible" role="alert"><div class="alert-text">Incorrect username or password. Please try again.</div></div>';
            } else {
                $this->load->model('Mainmodel');
                $login = $this->Mainmodel->get_login($this->input->post('email'), md5($this->input->post('pass')));

                if ($login->num_rows() == 1) {
                    if ($this->input->post('remember')) {
                        $sessi = array( 'login_row' => $login->row(), 'admin_id' => $login->row()->admin_id, 'admin_nama' => $login->row()->admin_nama, 'admin_email' => $login->row()->admin_email,'admin_no_telp' => $login->row()->admin_no_telp, 'admin_foto' => $login->row()->admin_foto, 'remember' => 1, 'userlogin' => true);
                        $this->load->helper('cookie');
                        $cookie = $this->input->cookie('ci_session_admin');
                        $this->input->set_cookie('ci_session_admin', $cookie, '25920000');
                        $remember = 1;
                    } else {
                        $sessi = array( 'login_row' => $login->row(), 'admin_id' => $login->row()->admin_id, 'admin_nama' => $login->row()->admin_nama, 'admin_email' => $login->row()->admin_email,'admin_no_telp' => $login->row()->admin_no_telp, 'admin_foto' => $login->row()->admin_foto, 'remember' => 0, 'userlogin' => true, 'baru' => true);
                        $remember = 0;
                    }


                    $this->session->set_userdata($sessi);

                    $redir = $this->session->userdata('urlback') ? $this->session->userdata('urlback') : 'main';
                    $this->session->unset_userdata('urlback');
                    redirect($redir);
                } else {
                    $data['msg'] = '<div class="alert alert-danger alert-dismissible" role="alert"><div class="alert-text">Incorrect username or password. Please try again.</div></div>';
                }
            }
            $this->load->view('auth/login', $data);
        } else {
            $this->load->view('auth/login', $data);
        }
    }
   
    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
