<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    function __construct() {
        
        parent::__construct();
        if (!$this->session->userdata('userlogin')) {
            if ($this->uri->segment(1) != 'login' && $this->uri->segment(1) != 'index' && $this->uri->segment(1) != '') {
                if ($this->uri->segment(1) != 'logout')
                    $this->session->set_userdata('urlback', $this->uri->uri_string());
                redirect('auth/login');
            }
        } 
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('Mainmodel');
        $this->load->library('user_agent');
        $this->load->library('session');
        $this->load->helper('form');
      
    }

    public function index()
    {
        $this->dashboard();
    }
    function dashboard()
    {
        $admin_id               = $this->session->userdata('admin_id');

        $data['title']          = 'Dashboard';
        $data['main_content']   = 'dashboard';
        $data['current_url']    = current_url();
        $data['class']          = $this->router->fetch_class();
        $data['method']         = $this->router->fetch_method();

        $query_jml_produk     = "	SELECT COUNT(*) AS jml_produk FROM produk";
        $rhNum                = $this->db->query($query_jml_produk);
        $rrNum                = $rhNum->row();
        $jml_produk           = $rrNum->jml_produk;
        $data['jml_produk']   = $jml_produk;

        $query_jml_cust       = "	SELECT COUNT(*) AS jml_cust FROM customer";
        $rhNum                = $this->db->query($query_jml_cust);
        $rrNum                = $rhNum->row();
        $jml_cust             = $rrNum->jml_cust;
        $data['jml_cust']     = $jml_cust;

        $query_total          = "	SELECT SUM(subtotal) AS total_earn FROM v_keranjang WHERE keranjang_status != 'Dalam Keranjang' AND keranjang_status !='Sudah Checkout' ";
        $rhNum                = $this->db->query($query_total);
        $rrNum                = $rhNum->row();
        $total_earn             = $rrNum->total_earn;
        $data['total_earn']     = $total_earn;

        $query_jml_transaksi    = "	SELECT COUNT(*) AS jml_transaksi FROM v_keranjang WHERE keranjang_status != 'Dalam Keranjang' AND keranjang_status !='Sudah Checkout'";
        $rhNum                = $this->db->query($query_jml_transaksi);
        $rrNum                = $rhNum->row();
        $jml_transaksi            = $rrNum->jml_transaksi;
        $data['jml_transaksi']     = $jml_transaksi;

        $data['query_prod']          = $this->db->query("SELECT SUM(keranjang_dtl_qty) AS qty, produk_nama AS produk FROM v_keranjang_detail WHERE keranjang_status != 'Dalam Keranjang' AND keranjang_status !='Sudah Checkout' GROUP BY produk_nama ORDER BY qty DESC  LIMIT 5");
    
       $data['query_admin']       = $this->db->query("SELECT * FROM admin WHERE admin_id !=6 ");

        $this->load->view('layout', $data);
    }

function admin($mode = '')
    {
        $admin_id        = $this->session->userdata('admin_id');
        $admin_id        = $this->input->get('admin_id');
      
        $data['title']          = 'Data Admin';
        $data['main_content']   = 'admin';
        $data['current_url']    = current_url();
        $data['class']          = $this->router->fetch_class();
        $data['method']         = $this->router->fetch_method();

        $admin_nama		= '';
		$admin_username	= '';
		$admin_no_telp	= '';
		$admin_email		= '';
		$admin_tempat_lahir	= '';
		$admin_tanggal_lahir	= '';
		$admin_alamat		= '';
		$admin_aktif		= '';
		$admin_foto		= "assets/media/foto_admin/default.png";
		$checkedPria	= '';
		$checkedWanita	= '';
		$orderByrNum	= " ORDER BY admin_nama";

          if ($admin_id  > 0) {
            $query_admin       = "	SELECT * FROM admin WHERE admin_id=" . $admin_id;
            $rhAdmin          = $this->db->query($query_admin);
            $rrAdmin           = $rhAdmin->row();
            $admin_id          = $rrAdmin->admin_id;

            $admin_nama		= $rrAdmin->admin_nama;
			$admin_username	= $rrAdmin->admin_username;
			$admin_no_telp	= $rrAdmin->admin_no_telp;
			$admin_email		= $rrAdmin->admin_email;
			$admin_tempat_lahir	= $rrAdmin->admin_tempat_lahir;
			$admin_tanggal_lahir	= $rrAdmin->admin_tanggal_lahir;
			$admin_gender		= $rrAdmin->admin_gender;
			if ($admin_gender == 'P') {
				$checkedPria	= 'checked="checked"';
			} else {
				$checkedWanita	= 'checked="checked"';
			}

			$admin_alamat		= $rrAdmin->admin_alamat;
			$admin_foto		= 'assets/media/foto_admin/' . $rrAdmin->admin_foto;
			$orderByrNum		= " ORDER BY admin_id=" . $admin_id . " desc";

            
        }

            $data['admin_nama']		= $admin_nama;
            $data['admin_username']	= $admin_username;
            $data['admin_no_telp']	= $admin_no_telp;
            $data['admin_email']		= $admin_email;
            $data['admin_alamat']		= $admin_alamat;
            $data['admin_tempat_lahir']	= $admin_tempat_lahir;
            $data['admin_tanggal_lahir']	= $admin_tanggal_lahir;
            $data['admin_email']		= $admin_email;
            $data['admin_foto']		= $admin_foto;
            $data['checkedPria']	= $checkedPria;
            $data['checkedWanita']	= $checkedWanita;
        if ($mode == 'form') {
            $data['main_content']   = 'adminform';
        } elseif ($mode == 'crud') {
            $action        = $this->input->post('action_crud');
            $admin_id    = $this->input->post('admin_id');
            $config_upload['upload_path'] = './assets/media/foto_admin/';
			$config_upload['allowed_types'] = 'jpg|png|jpeg';
			$config_upload['max_size']		= 1024;
			$this->load->library('upload', $config_upload);
			$this->upload->initialize($config_upload);
			$this->upload->do_upload('profile_avatar');
            $data = array(
                'admin_nama'            => $this->input->post('inp_nama'),
                'admin_username'        => $this->input->post('inp_username'),
                'admin_no_telp'            => $this->input->post('inp_hp'),
                'admin_email'        => $this->input->post('inp_email'),
                'admin_tempat_lahir'        => $this->input->post('inp_tmpt_lhr'),
                'admin_tanggal_lahir'        => $this->input->post('inp_tgl_lhr'),
                'admin_gender'        => $this->input->post('inp_jk'),
                'admin_alamat'        => $this->input->post('inp_almt'),

            );

               if ($this->upload->do_upload('profile_avatar')) {
				$fotoData	= $this->upload->data();
				$fotoName	= $fotoData['file_name'];
				$data += ['admin_foto' => "'" . pg_escape_string($fotoName) . "'"];
			}

			if ($admin_id > 0) {
				$this->Mainmodel->update_table('admin', $data, 'admin_id=' . $admin_id);
			} else {
				$data += ['admin_passwd' =>  md5($this->input->post('admin123')),];

				$admin_id	= $this->Mainmodel->insert_table('admin', $data);
			}
            redirect('main/admin');
        }
         elseif ($mode == 'del_hd') {
            $this->Mainmodel->delete_table('admin', 'admin_id=' . $admin_id);

            redirect('main/admin');
        } 

        $data['query_admin']       = $this->db->query("SELECT * FROM admin WHERE admin_id !=6 ");
        $this->load->view('layout', $data);
    }

    function customer($mode = '')
    {
        $admin_id        = $this->session->userdata('admin_id');
        $cust_id        = $this->input->get('cust_id');
      
        $data['nama_app']       = "tes";
        $data['title']          = 'Data Customer';
        $data['main_content']   = 'customer';
        $data['current_url']    = current_url();
        $data['class']          = $this->router->fetch_class();
        $data['method']         = $this->router->fetch_method();

         if ($mode == 'del_hd') {
            $this->Mainmodel->delete_table('customer', 'cust_id=' . $cust_id);

            redirect('main/customer');
        } 

        $data['query_cust']       = $this->db->query("SELECT * FROM customer WHERE cust_id >0 ");
        $this->load->view('layout', $data);
    }

    function product($mode = ''){
        $admin_id        = $this->session->userdata('admin_id');
        $produk_id        = $this->input->get('produk_id');
        if (empty($produk_id)) {
            $produk_id = 0;
        }
        $data['nama_app']       = "tes";
        $data['title']          = 'Data Produk';
        $data['main_content']   = 'product';
        $data['current_url']    = current_url();
        $data['class']          = $this->router->fetch_class();
        $data['method']         = $this->router->fetch_method();
        $data['produk_id']      = $produk_id;


        $produk_nama        = '';
        $produk_caption     = '';
        $produk_stok        = '';
        $produk_harga       = '';
        $produk_foto        = '';
        $orderByrNum        = " ORDER BY produk_nama";
        

        if ($produk_id > 0) {
            $query_produk       = "	SELECT * FROM produk WHERE produk_id=" . $produk_id;
            $rhProduk           = $this->db->query($query_produk);
            $rrProduk           = $rhProduk->row();
            $produk_id          = $rrProduk->produk_id;

            $produk_nama        = $rrProduk->produk_nama;
            $produk_caption     = $rrProduk->produk_caption;
            $produk_stok        = $rrProduk->produk_stok;
            $produk_harga       = $rrProduk->produk_harga;
            $produk_foto        = 'assets/media/foto_produk/' . $rrProduk->produk_foto;
            $orderByrNum        = " ORDER BY produk_id=" . $produk_id . " desc";
        }

            $data['produk_id']         = $produk_id;
            $data['produk_nama']       = $produk_nama;
            $data['produk_caption']    = $produk_caption;
            $data['produk_stok']       = $produk_stok;
            $data['produk_harga']      = $produk_harga;
            $data['produk_foto']       = $produk_foto;


        if ($mode == 'form') {
            $data['main_content']   = 'productform';
        } elseif ($mode == 'crud') {
            $action        = $this->input->post('action_crud');
            $produk_id    = $this->input->post('produk_id');
            $data = array(
                'produk_nama'            => $this->input->post('inp_nama'),
                'produk_caption'        => $this->input->post('inp_capt'),
                'produk_stok'            => $this->input->post('inp_stok'),
                'produk_harga'        => $this->input->post('inp_harga'),

            );

            if ($produk_id > 0) {
                $this->Mainmodel->update_table('produk', $data, 'produk_id= '  . $produk_id);
            } else {
                $produk_id    = $this->Mainmodel->insert_table('produk', $data);
            }

            $config_photo['upload_path'] = './assets/media/foto_produk/';
            $config_photo['allowed_types'] = 'jpg|png|jadmin';
            $config_photo['max_size']        = 1024;
            $this->load->library('upload', $config_photo);
            $this->upload->initialize($config_photo);

            if ($this->upload->do_upload('profile_avatar')) {
                $fotoData    = $this->upload->data();
                $fotoName    = $fotoData['file_name'];
                $data = array(
                    'produk_foto'            => pg_escape_string($fotoName),
                    );

                $this->Mainmodel->update_table('produk', $data, 'produk_id=' . $produk_id);
            }
            redirect('main/product');
        } elseif ($mode == 'del_hd') {

            $this->Mainmodel->delete_table('produk', 'produk_id=' . $produk_id);

            redirect('main/product');
        } 

        
        
        $data['query_produk']       = $this->db->query("SELECT * FROM v_produk WHERE  produk_id >0 ");
        $this->load->view('layout', $data);
        
    }

    function payment_method($mode = '')
    {
        $admin_id               = $this->session->userdata('admin_id');
        $metode_byr_id          = $this->input->get('metode_byr_id');
        $data['title']          = 'Data Metode Pembayaran';
        $data['main_content']   = 'payment_method';
        $data['current_url']    = current_url();
        $data['class']          = $this->router->fetch_class();
        $data['method']         = $this->router->fetch_method();
        $data['metode_byr_id']  = $metode_byr_id;


        $metode_byr_nama    = '';
        $orderByrNum        = " ORDER BY produk_nama";


        if ($metode_byr_id > 0) {
            $query_metode      = "	SELECT * FROM metode_bayar WHERE metode_byr_id=" . $metode_byr_id;
            $rhMetode          = $this->db->query($query_metode);
            $rrMetode          = $rhMetode->row();
            $metode_byr_id     = $rrMetode->metode_byr_id;

            $metode_byr_nama   = $rrMetode->metode_byr_nama;
            $orderByrNum       = " ORDER BY metode_byr_id=" . $metode_byr_id . " desc";
        }

            $data['metode_byr_id']     = $metode_byr_id;
            $data['metode_byr_nama']   = $metode_byr_nama;


        if ($mode == 'form') {
            $data['main_content']   = 'payment_methodform';
        } elseif ($mode == 'crud') {
            $action           = $this->input->post('action_crud');
            $metode_byr_id    = $this->input->post('metode_byr_id');
            $data = array(
                'metode_byr_nama'   => $this->input->post('inp_metode'),
            );

            if ($metode_byr_id > 0) {
                $this->Mainmodel->update_table('metode_bayar', $data, 'metode_byr_id= '  . $metode_byr_id);
            } else {
                $metode_byr_id  = $this->Mainmodel->insert_table('metode_bayar', $data);
            }
            redirect('main/payment_method');

        } elseif ($mode == 'del_hd') {
            $this->Mainmodel->delete_table('metode_bayar', 'metode_byr_id=' . $metode_byr_id);

            redirect('main/payment_method');
        } 


        $data['query_metode_byr']       = $this->db->query("SELECT * FROM metode_bayar WHERE  metode_byr_id >0 ");
        $this->load->view('layout', $data);
    }

    function delivery($mode = '')
    {
        $admin_id               = $this->session->userdata('admin_id');
        $ekspedisi_id           = $this->input->get('ekspedisi_id');

        $data['nama_app']       = "tes";
        $data['title']          = 'Data Ekspedisi';
        $data['main_content']   = 'delivery';
        $data['current_url']    = current_url();
        $data['class']          = $this->router->fetch_class();
        $data['method']         = $this->router->fetch_method();
        $data['ekspedisi_id']   = $ekspedisi_id;


        $ekspedisi_nama     = '';
        $ekspedisi_ongkir   = '';
        $orderByrNum        = " ORDER BY produk_nama";


        if ($ekspedisi_id > 0) {
            $query_ekspedisi      = "	SELECT * FROM ekspedisi WHERE ekspedisi_id=" . $ekspedisi_id;
            $rhEkspedisi          = $this->db->query($query_ekspedisi);
            $rrEkspedisi          = $rhEkspedisi->row();
            $ekspedisi_id         = $rrEkspedisi->ekspedisi_id;

            $ekspedisi_nama       = $rrEkspedisi->ekspedisi_nama;
            $ekspedisi_ongkir     = $rrEkspedisi->ekspedisi_ongkir;
            $orderByrNum          = " ORDER BY ekspedisi_id=" . $ekspedisi_id . " desc";
        }

            $data['ekspedisi_id']       = $ekspedisi_id;
            $data['ekspedisi_nama']     = $ekspedisi_nama;
            $data['ekspedisi_ongkir']   = $ekspedisi_ongkir;



        if ($mode == 'form') {
            $data['main_content']   = 'deliveryform';
        } elseif ($mode == 'crud') {
            $action        = $this->input->post('action_crud');
            $ekspedisi_id    = $this->input->post('ekspedisi_id');
            $data = array(
                'ekspedisi_nama'      => $this->input->post('inp_ekspedisi'),
                'ekspedisi_ongkir'    => $this->input->post('inp_ongkir'),

            );

            if ($ekspedisi_id > 0) {
                $this->Mainmodel->update_table('ekspedisi', $data, 'ekspedisi_id= '  . $ekspedisi_id);
            } else {
                $ekspedisi_id    = $this->Mainmodel->insert_table('ekspedisi', $data);
            }
            redirect('main/delivery');
        } elseif ($mode == 'del_hd') {
            $this->Mainmodel->delete_table('ekspedisi', 'ekspedisi_id=' . $ekspedisi_id);

            redirect('main/delivery');
        }


        $data['query_ekspedisi']       = $this->db->query("SELECT * FROM ekspedisi WHERE  ekspedisi_id >0 ");
        $this->load->view('layout', $data);
    }

    function order_verif($mode = '')
    {
        $admin_id              = $this->session->userdata('admin_id');
        $keranjang_id          = $this->input->get('keranjang_id');
        $data['title']         = 'Data Pesanan';
        $data['main_content']  = 'order_verif';
        $data['current_url']   = current_url();
        $data['class']         = $this->router->fetch_class();
        $data['method']        = $this->router->fetch_method();
        $data['keranjang_id']  = $keranjang_id;


        if ($mode == 'verifikasi') {
            $data = array(
                'keranjang_status'  => 'Sedang Dikemas',

            );

             $this->Mainmodel->update_table('keranjang', $data, 'keranjang_id= '. $keranjang_id);
            redirect('main/order_verif');
        }

        $data['query_keranjang']       = $this->db->query("SELECT * FROM v_keranjang WHERE keranjang_status = 'Menunggu Verifikasi' ");
        $this->load->view('layout', $data);
    }

    function menunggu_verifikasi($mode = '')
    {
        $keranjang_id        = $this->input->get('keranjang_id');
        $data['title']          = 'Menunggu Verifikasi';
        $data['main_content']   = 'menunggu_verifikasi';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();
        $data['query_alamat']       = $this->db->query("SELECT * FROM v_keranjang WHERE keranjang_status = 'Menunggu Verifikasi'  AND keranjang_id =" . $keranjang_id . " ");
        $data['numrow'] = $data['query_alamat']->num_rows();

        $this->load->view('layout', $data);
    }

    function order_proses($mode = '')
    {
        $admin_id              = $this->session->userdata('admin_id');
        $keranjang_id          = $this->input->get('keranjang_id');
        $data['nama_app']      = "tes";
        $data['title']         = 'Data Pesanan';
        $data['main_content']  = 'order_proses';
        $data['current_url']   = current_url();
        $data['class']         = $this->router->fetch_class();
        $data['method']        = $this->router->fetch_method();
        $data['keranjang_id']  = $keranjang_id;


        if ($mode == 'proses') {
            $keranjang_id = $this->input->post('keranjang_id');
            $data = array(
                'keranjang_status'  => 'Sudah Dikirim',
                'keranjang_no_resi' => $this->input->post('inp_resi')

            );
            $this->Mainmodel->update_table('keranjang', $data, 'keranjang_id= '  . $keranjang_id);
            redirect('main/order_proses');
        }

        $data['query_keranjang']       = $this->db->query("SELECT * FROM v_keranjang WHERE keranjang_status = 'Sedang Dikemas' ");
        $this->load->view('layout', $data);
    }




    function laporan_pesanan($mode = '')
    {
        $admin_id        = $this->session->userdata('admin_id');
        $hSQL        = str_replace(' ', '+', $this->input->get('hSQL'));
        $data['title']          = 'Laporan Pesanan';
        $data['main_content']   = 'laporan_pesanan';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();

        if (!empty($hSQL)) {
            $whereClause    = base64_decode($hSQL);
        } else {
            $whereClause = '';
        }
        $data['query_keranjang']       = $this->db->query("SELECT * FROM v_keranjang WHERE keranjang_status != 'Dalam Keranjang' AND keranjang_status != 'Sudah Checkout' AND keranjang_id>0" . $whereClause. "ORDER BY keranjang_no_invoice");




        $this->load->view('layout', $data);
    }

    function laporan_pesanan_search()
    {
        $previous_url = $this->agent->referrer();
        $new_url       = preg_replace("(^https?://)", "", $previous_url);
        $new_url       = preg_replace("(localhost/)", "", $new_url);
        $url_segments = explode('/', $new_url);
        $class           = $url_segments[1];
        $method           = $url_segments[2];
        $segment3          = $url_segments[3];
        $cr_cust       = $this->input->post('cr_cust');
        $cr_penerima      = $this->input->post('cr_penerima');
        $cr_status      = $this->input->post('cr_status');
        $cr_pesanan        = $this->input->post('cr_pesanan');
        $whereClause    = '';
        if (!empty($cr_cust)) {
            $whereClause .= " AND cust_nama~*'" . $cr_cust . "'";
        }
        if (!empty($cr_penerima)) {
            $whereClause .= " AND keranjang_nm_penerima~*'" . $cr_penerima . "'";
        }
        if (!empty($cr_status)) {
            $whereClause .= " AND keranjang_status~*'" . $cr_status . "'";
        }
        if (!empty($cr_pesanan)) {
            $pesanan      = explode("-", trim($cr_pesanan));
            $cari_tgl_awl    = $pesanan[0];
            $cari_tgl_akh    = $pesanan[1];
            $whereClause .= " AND cast(keranjang_time_checkout as date) >= '" . $cari_tgl_awl . "' AND cast(keranjang_time_checkout as date) <= '" . $cari_tgl_akh . "'";
        }
        $clause = base64_encode($whereClause);
        redirect($class . '/' . $method . '/?hSQL=' . $clause);
    }

    function laporan_pesanan_detail($mode = '')
    {
        $admin_id        = $this->session->userdata('admin_id');
        $hSQL        = str_replace(' ', '+', $this->input->get('hSQL'));
        $data['title']          = 'Laporan Pesanan Detail';
        $data['main_content']   = 'laporan_pesanan_detail';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();

        if (!empty($hSQL)) {
            $whereClause    = base64_decode($hSQL);
        } else {
            $whereClause = '';
        }
        $data['query_keranjang_dtl']       = $this->db->query("SELECT * FROM v_keranjang_detail WHERE keranjang_status != 'Dalam Keranjang' AND keranjang_status != 'Sudah Checkout' AND keranjang_id>0" . $whereClause . "ORDER BY keranjang_no_invoice");




        $this->load->view('layout', $data);
    }

    function laporan_pesanan_detail_search()
    {
        $previous_url = $this->agent->referrer();
        $new_url       = preg_replace("(^https?://)", "", $previous_url);
        $new_url       = preg_replace("(localhost/)", "", $new_url);
        $url_segments = explode('/', $new_url);
        $class           = $url_segments[1];
        $method           = $url_segments[2];
        $segment3          = $url_segments[3];
        $cr_cust       = $this->input->post('cr_cust');
        $cr_penerima      = $this->input->post('cr_penerima');
        $cr_status      = $this->input->post('cr_status');
        $cr_pesanan        = $this->input->post('cr_pesanan');
        $whereClause    = '';
        if (!empty($cr_cust)) {
            $whereClause .= " AND cust_nama~*'" . $cr_cust . "'";
        }
        if (!empty($cr_penerima)) {
            $whereClause .= " AND keranjang_nm_penerima~*'" . $cr_penerima . "'";
        }
        if (!empty($cr_status)) {
            $whereClause .= " AND keranjang_status~*'" . $cr_status . "'";
        }
        if (!empty($cr_pesanan)) {
            $pesanan      = explode("-", trim($cr_pesanan));
            $cari_tgl_awl    = $pesanan[0];
            $cari_tgl_akh    = $pesanan[1];
            $whereClause .= " AND cast(keranjang_time_checkout as date) >= '" . $cari_tgl_awl . "' AND cast(keranjang_time_checkout as date) <= '" . $cari_tgl_akh . "'";
        }
        $clause = base64_encode($whereClause);
        redirect($class . '/' . $method . '/?hSQL=' . $clause);
    }

    function invoices($mode = '')
    {
        $cust_id        = $this->session->userdata('cust_id');

        $data['title']          = 'Invoice';
        $data['main_content']   = 'invoices';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();


        $query_krnjg    = "	SELECT * FROM v_keranjang WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_cust_id=" . $cust_id;
        $rhKrnjg        = $this->db->query($query_krnjg);
        $rrAKrnjg       = $rhKrnjg->row();
        $keranjang_id   = $this->input->get('keranjang_id');

        $data['query_keranjang_dtl']       = $this->db->query("SELECT * FROM v_keranjang_detail WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_cust_id =" . $cust_id . " " . "ORDER BY produk_nama");

        $data['keranjang_id']          = $keranjang_id;
        $this->load->view('invoices', $data);
    }



    function profile($mode = '')
    {
        $admin_id        = $this->session->userdata('admin_id');
        $hSQL        = str_replace(' ', '+', $this->input->get('hSQL'));
        $rNum        = $this->input->get('rNum');
        $whereClause = "";
        if (empty($rNum)) {
            $rNum = 0;
        }
        $data['main_title']     = 'PROFILE';
        $data['title']          = 'Edit';
        $data['main_content']   = 'profile';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();
        $data['rNum']            = $rNum;

        $query_rnum        = "	SELECT * FROM v_admin WHERE admin_id=" . $admin_id;
        $rhNum            = $this->db->query($query_rnum);
        $rrNum            = $rhNum->row();
        $admin_nama        = $rrNum->admin_nama;
        $admin_username    = $rrNum->admin_username;
        $admin_no_telp    = $rrNum->admin_no_telp;
        $admin_email        = $rrNum->admin_email;
        $admin_tempat_lahir    = $rrNum->admin_tempat_lahir;
        $admin_tanggal_lahir    = $rrNum->admin_tanggal_lahir;
        $admin_gender        = $rrNum->admin_gender;
        $admin_alamat        = $rrNum->admin_alamat;
        $admin_foto        = 'assets/media/foto_admin/' . $rrNum->admin_foto;
        if ($admin_gender == 'P') {
            $checkedPria    = 'checked="checked"';
            $checkedWanita    = '';
        } else {
            $checkedPria    = '';
            $checkedWanita    = 'checked="checked"';
        }

        if ($mode == 'crud') {
            $action    = $this->input->post('action_crud');
            $admin_id    = $this->input->post('admin_id');
            $data = array(
                'admin_nama'            =>  $this->input->post('inp_nama'),
                'admin_username'        =>  $this->input->post('inp_username') ,
                'admin_no_telp'         =>  $this->input->post('inp_hp') ,
                'admin_email'           =>  $this->input->post('inp_email') ,
                'admin_tempat_lahir'    =>  $this->input->post('inp_tmpt_lhr') ,
                'admin_tanggal_lahir'   =>  $this->input->post('inp_tgl_lhr') ,
                'admin_gender'          =>  $this->input->post('inp_jk') ,
                'admin_alamat'          =>  $this->input->post('inp_almt') ,
            );
            $this->Mainmodel->update_table('admin', $data, 'admin_id=' . $rNum);

            $config_photo['upload_path'] = './assets/media/foto_admin/';
            $config_photo['allowed_types'] = 'jpg|png|jpeg';
            $config_photo['max_size']        = 1024;
            $this->load->library('upload', $config_photo);
            $this->upload->initialize($config_photo);
            if ($this->upload->do_upload('profile_avatar')) {
                $fotoData    = $this->upload->data();
                $fotoName    = $fotoData['file_name'];
                $data = array(
                    'admin_foto'            => "'" . pg_escape_string($fotoName) . "'",
                );
                $this->Mainmodel->update_table('admin', $data, 'admin_id=' . $rNum);
            }

            redirect($this->router->fetch_class() . '/' . $this->router->fetch_method());
        } elseif ($mode == 'changepass') {
            $action    = $this->input->post('action_crud_change');
            $rNum    = $this->input->post('admin_id_change');
            $reg_password    = $this->input->post('reg_password');
            $data = array(
                'admin_passwd'            =>  md5($this->input->post('reg_password')),
            );
            $this->Mainmodel->update_table('admin', $data, 'admin_id=' . $rNum);
            redirect($this->router->fetch_class() . '/' . $this->router->fetch_method());
        }

        $data['admin_id']            = $admin_id;
        $data['admin_nama']        = $admin_nama;
        $data['admin_username']    = $admin_username;
        $data['admin_no_telp']    = $admin_no_telp;
        $data['admin_email']        = $admin_email;
        $data['admin_alamat']        = $admin_alamat;
        $data['admin_tempat_lahir']    = $admin_tempat_lahir;
        $data['admin_tanggal_lahir']    = $admin_tanggal_lahir;
        $data['admin_email']        = $admin_email;
        $data['admin_foto']        = $admin_foto;
        $data['checkedPria']    = $checkedPria;
        $data['checkedWanita']    = $checkedWanita;

        $this->load->view('layout', $data);
    }

    
}

