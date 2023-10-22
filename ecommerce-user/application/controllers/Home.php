<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        if (!$this->session->userdata('userlogin')) {
            if ($this->uri->segment(2) != 'login' && $this->uri->segment(2) != 'index' && $this->uri->segment(2) != '') {
                if ($this->uri->segment(2) != 'logout')
                    $this->session->set_userdata('urlback', $this->uri->uri_string());
                redirect('auth/login');
            }
        } 
        $this->load->model('Mainmodel');

    }

    public function index()
    {
        $this->dashboard();
    }
    function dashboard()
    {
        $cust_id        = $this->session->userdata('cust_id');
        $hSQL        = str_replace(' ', '+', $this->input->get('hSQL'));

        if(empty($cust_id)){
                $cust_id = 0;
            }
        $data['title']          = 'Dashboard';
        $data['main_content']   = 'dashboard';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();

        if (!empty($hSQL)) {
            $whereClause    = base64_decode($hSQL);
        } else {
            $whereClause = '';
        }
        $data['query_prod']       = $this->db->query("SELECT * FROM produk WHERE produk_id>0 AND produk_stok>0 " .$whereClause . "ORDER BY produk_nama "  );

        // die($this->session->flashdata('status_add').'aaaaa');

        $this->load->view('layout', $data);
    }

    function product_search()
    {
        $previous_url  = $this->agent->referrer();
        $new_url       = preg_replace("(^https?://)", "", $previous_url);
        $new_url       = preg_replace("(localhost/)", "", $new_url);
        $url_segments  = explode('/', $new_url);
        $class         = $url_segments[1];
        $method        = $url_segments[2];
        $segment3      = $url_segments[3];
        $cr_produk     = $this->input->post('cr_produk');
        $whereClause   = '';
        if (!empty($cr_produk)) {
            $whereClause .= " AND produk_nama~*'" . $cr_produk . "'";
        }
        $clause = base64_encode($whereClause);
        redirect($class . '/' . $method . '/?hSQL=' . $clause);
    }

}

