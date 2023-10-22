<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
       
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
                        $sessi = array( 'login_row' => $login->row(), 'cust_id' => $login->row()->cust_id, 'cust_nama' => $login->row()->cust_nama, 'cust_email' => $login->row()->cust_email,'cust_no_telp' => $login->row()->cust_no_telp, 'cust_foto' => $login->row()->cust_foto, 'remember' => 1, 'userlogin' => true);
                        $this->load->helper('cookie');
                        $cookie = $this->input->cookie('ci_session_user');
                        $this->input->set_cookie('ci_session_user', $cookie, '25920000');
                        $remember = 1;
                    } else {
                        $sessi = array( 'login_row' => $login->row(), 'cust_id' => $login->row()->cust_id, 'cust_nama' => $login->row()->cust_nama, 'cust_email' => $login->row()->cust_email,'cust_no_telp' => $login->row()->cust_no_telp, 'cust_foto' => $login->row()->cust_foto, 'remember' => 0, 'userlogin' => true, 'baru' => true);
                        $remember = 0;
                    }


                    $this->session->set_userdata($sessi);

                    $redir = $this->session->userdata('urlback') ? $this->session->userdata('urlback') : 'home';
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
    function register($mode = '')
    {
       
        $data['title']    = 'Registrasi';
        $data['msg']    = '';
        if ($mode == 'submit') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Username', 'required');
            $this->form_validation->set_rules('pass1', 'Password', 'required');
            $this->form_validation->set_rules('pass1','Password','required|matches[pass2]',
                ['required' => 'Password wajib Di isi!', 'matches'    => 'Password Tidak Cocok']
            );

            $this->form_validation->set_rules('pass2', 'Password', 'required|matches[pass1]');
         
                    $data = array(
                        'cust_nama'        => $this->input->post('name'),
                        'cust_email'    => $this->input->post('email'),
                        'cust_no_telp'    =>$this->input->post('telp'),
                        'cust_passwd'    =>md5($this->input->post('pass1')),
                        'cust_foto'    => 'default.png'

                    );
                    $this->Mainmodel->insert_table('customer', $data);
                        redirect('auth/login');   
        } else {
            $this->load->view('auth/register', $data);
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
