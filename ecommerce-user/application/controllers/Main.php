<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('Mainmodel');
        $this->load->library('user_agent');
        $this->load->library('session');
        $this->load->helper('form');

    }
    
    function product()
    {
        $cust_id        = $this->session->userdata('cust_id');
        $hSQL        = str_replace(' ', '+', $this->input->get('hSQL'));
        $data['title']          = 'Product';
        $data['main_content']   = 'product';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();


        if (!empty($hSQL)) {
            $whereClause    = base64_decode($hSQL);
        } else {
            $whereClause = '';
        }

        $data['query_prod']       = $this->db->query("SELECT * FROM produk WHERE produk_id>0 AND produk_stok>0" . $whereClause .  "ORDER BY produk_nama");


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

    function product_detail(){
        $cust_id        = $this->session->userdata('cust_id');
        $produk_id        = $this->input->get('produk_id');
        $data['nama_app']    = "tes";
        $data['title']          = 'Detail Produk';
        $data['main_content']   = 'product_detail';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();
        $data['produk_id']         = $produk_id;


        $query_produk      = "	SELECT * FROM produk WHERE produk_id=" . $produk_id;
        $rhProduk            = $this->db->query($query_produk);
        $rrProduk            = $rhProduk->row();
        $produk_nama = $rrProduk->produk_nama;
        $produk_harga = $rrProduk->produk_harga;
        $produk_caption = $rrProduk->produk_caption;
        $produk_foto = $rrProduk->produk_foto;
        $produk_stok = $rrProduk->produk_stok;



        $data['produk_nama']        = $produk_nama;
        $data['produk_stok']         = $produk_stok;
        $data['produk_caption']     = $produk_caption;
        $data['produk_harga']       = $produk_harga;
        $data['produk_foto']       = $produk_foto;




        $this->load->view('layout', $data);
    }


    function cart($mode = '') {
        $cust_id                        = $this->session->userdata('cust_id');
        $keranjang_dtl_id               = $this->input->get('keranjang_dtl_id');
        $data['title']                  = 'Keranjang Belanja';
        $data['main_content']           = 'cart';
        $data['current_url']            = current_url();
        $data['class']                  = $this->router->fetch_class();
        $data['method']                 = $this->router->fetch_method();
        $data['query_keranjang_dtl']    = $this->db->query("SELECT * FROM v_keranjang_detail WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_cust_id =" . $cust_id." " ."ORDER BY produk_nama");

        $nama_penerima          = '';
        $telp_penerima          = '';
        $almt_penerima          = '';
        $keranjang_id           = 0;
        $keranjang_cust_almt_id = 0;
        $cust_kecamatan         = 0;
        $cust_kota              = 0;
        $cust_propinsi          = 0;
        $whereComboKota         = ' AND kota_id_prop = 0';
        $whereComboKcmtn        = ' AND kcmtn_id_kota = 0';
        $query_krnjg            = "	SELECT * FROM v_keranjang WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_cust_id=" . $cust_id;
        $rhKrnjg                =$this->db->query($query_krnjg);
        $rrAKrnjg               = $rhKrnjg->row();

        if(isset($rrAKrnjg)){
            $keranjang_id        = $rrAKrnjg->keranjang_id;
            $nama_penerima       = $rrAKrnjg->keranjang_nm_penerima;
            $telp_penerima       = $rrAKrnjg->keranjang_telp_penerima;
            $almt_penerima       = $rrAKrnjg->keranjang_almt_penerima;
            $cust_propinsi       = $rrAKrnjg->prop_id;
            $cust_kota           = $rrAKrnjg->kota_id;
            $cust_kecamatan      = $rrAKrnjg->kcmtn_id;

            if(empty($cust_propinsi)){
                $cust_propinsi = 0;
            }
            if (empty($cust_kota)) {
                $cust_kota = 0;
            }
            $whereComboKota     = ' AND kota_id_prop=' . $cust_propinsi;
            $whereComboKcmtn    = ' AND kcmtn_id_kota=' . $cust_kota;
        }
        $data['keranjang_id']              = $keranjang_id;
        $data['keranjang_nm_penerima']     = $nama_penerima;
        $data['keranjang_telp_penerima']   = $telp_penerima;
        $data['keranjang_almt_penerima']   = $almt_penerima;
        $data['comboPropinsi']             = $this->Mainmodel->show_combo("propinsi", "prop_id", "prop_nama", "prop_id > 0", "prop_id", $cust_propinsi);
        $data['comboKota']                 = $this->Mainmodel->show_combo("kota", "kota_id", "kota_nama", "kota_id > 0" . $whereComboKota, "kota_id", $cust_kota);
        $data['comboKecamatan']            = $this->Mainmodel->show_combo("kecamatan", "kcmtn_id", "kcmtn_nama", "kcmtn_id > 0" . $whereComboKcmtn, "kcmtn_id", $cust_kecamatan);
        // $data['query_alamat']       = $this->db->query("SELECT * FROM v_cust_alamat WHERE cust_almt_id=" . $cust_almt_id . "");

        if ($mode == 'add_produk') {
            $previous_url   = $this->agent->referrer();
            $new_url        = preg_replace("(^https?://)", "", $previous_url);
            $new_url        = preg_replace("(localhost/)", "", $new_url);
            $url_segments   = explode('/', $new_url);
            // $class          = $url_segments[0];
            // $method         = $url_segments[1];
            // $segment3       = $url_segments[2];
        
            $produk_id          =$this->input->get('produk_id');
            $query_keranjang    = "	SELECT * FROM keranjang_detail WHERE keranjang_detail.keranjang_id = ". $keranjang_id ." AND keranjang_dtl_prod_id = " . $produk_id ;
            $rhKeranjang        = $this->db->query($query_keranjang);
            $rrKeranjang        = $rhKeranjang->row();
            
            if(isset($rrKeranjang)){
                $keranjang_dtl_prod_id  = $rrKeranjang->keranjang_dtl_prod_id;
                $keranjang_cust_id      = $rrKeranjang->keranjang_cust_id;
                $keranjang_dtl_id       = $rrKeranjang->keranjang_dtl_id;
                $keranjang_dtl_qty      = $rrKeranjang->keranjang_dtl_qty;
                $qty_baru               = $keranjang_dtl_qty + 1 ;

                $data = array(
                    'keranjang_dtl_qty'   => $qty_baru,

                );

                $this->Mainmodel->update_table('keranjang_detail', $data, 'keranjang_dtl_id=' . $keranjang_dtl_id);

                $query_produk       = "	SELECT * FROM produk WHERE produk_id=" . $produk_id;
                $rhProduk           = $this->db->query($query_produk);
                $rrProduk           = $rhProduk->row();
                $produk_harga       = $rrProduk->produk_harga;
                $produk_nama        = $rrProduk->produk_nama;
                $produk_id          = $rrProduk->produk_id;
                $produk_stok        = $rrProduk->produk_stok;
                $produk_stok_now    = $produk_stok - 1;

                $data_stok = array(
                    'produk_stok'        => $produk_stok_now,
                );
                $this->Mainmodel->update_table('produk', $data_stok, 'produk_id=' . $produk_id);
            } 
            else{
                /* GET DATA PRODUK */
                $query_produk	    = "	SELECT * FROM produk WHERE produk_id=" . $produk_id;
                $rhProduk		    = $this->db->query($query_produk);
                $rrProduk           = $rhProduk->row();
                $produk_harga       = $rrProduk->produk_harga;
                $produk_nama        = $rrProduk->produk_nama;
                $produk_id          = $rrProduk->produk_id;
                $produk_stok        = $rrProduk->produk_stok;
                $produk_stok_now    = $produk_stok - 1;

                if(empty($keranjang_id)){

                    /* INSERT KERANJANG */
                    $data = array(
                        'keranjang_cust_id'  => $cust_id,
                        'keranjang_status'   => "Dalam Keranjang",


                        );
                    $keranjang_id  =  $this->Mainmodel->insert_table('keranjang', $data);
                }
                /* INSERT KERANJANG DETAIL */
                $data = array(
                    'keranjang_id'          => $keranjang_id,
                    'keranjang_dtl_prod_id'	=> $produk_id,
                    'keranjang_dtl_harga'   => $produk_harga,
                    'keranjang_dtl_qty'     => 1,

                );
                $this->Mainmodel->insert_table('keranjang_detail', $data);
                /* UPDATE STOK */
                $data_stok = array(
                    'produk_stok'           => $produk_stok_now,
                );
                $this->Mainmodel->update_table('produk', $data_stok, 'produk_id=' . $produk_id);
            }
            redirect('home/dashboard' );
		} 
        elseif ($mode == 'del_hd') {

            $query_keranjang_dtl    = "	SELECT * FROM keranjang_detail WHERE  keranjang_dtl_id = " .$keranjang_dtl_id . "";
            $rhKeranjang_dtl        = $this->db->query($query_keranjang_dtl);
            $rrKeranjang_dtl        = $rhKeranjang_dtl->row();
            $keranjang_dtl_prod_id  = $rrKeranjang_dtl->keranjang_dtl_prod_id;
        

            $query_keranjang        = "	SELECT * FROM keranjang_detail,keranjang WHERE keranjang_detail.keranjang_id = keranjang.keranjang_id AND keranjang_dtl_prod_id = " . $keranjang_dtl_prod_id . " AND  keranjang_cust_id = " . $cust_id . "";
            $rhKeranjang            = $this->db->query($query_keranjang);
            $rrKeranjang            = $rhKeranjang->row();
            $keranjang_dtl_prod_id  = $rrKeranjang->keranjang_dtl_prod_id;
            $keranjang_cust_id      = $rrKeranjang->keranjang_cust_id;
            $keranjang_dtl_id       = $rrKeranjang->keranjang_dtl_id;
            $keranjang_dtl_qty      = $rrKeranjang->keranjang_dtl_qty;

            $query_produk    = "	SELECT * FROM produk WHERE produk_id=" . $keranjang_dtl_prod_id;
            $rhProduk        = $this->db->query($query_produk);
            $rrProduk            = $rhProduk->row();
            $produk_harga         = $rrProduk->produk_harga;
            $produk_nama        = $rrProduk->produk_nama;
            $produk_stok         = $rrProduk->produk_stok;
            $produk_stok_now    = $produk_stok + $keranjang_dtl_qty;

            $this->Mainmodel->delete_table('keranjang_detail', 'keranjang_dtl_id=' . $keranjang_dtl_id);



            $data_stok = array(
                'produk_stok'        => $produk_stok_now,


            );
            $this->Mainmodel->update_table('produk', $data_stok, 'produk_id=' . $keranjang_dtl_prod_id);
            redirect('main/cart');

        
        } 
        elseif ($mode == 'crud_tambah') {
            $previous_url       = $this->agent->referrer();
            $url_segments       = explode('/', $previous_url);
            $class              = $url_segments[4];
            $method             = $url_segments[5];



            $query_keranjang_dtl    = "	SELECT * FROM keranjang_detail WHERE keranjang_dtl_id = " . $keranjang_dtl_id . "";
            $rhKeranjang_dtl        = $this->db->query($query_keranjang_dtl);
            $rrKeranjang_dtl        = $rhKeranjang_dtl->row();
            $keranjang_dtl_prod_id  = $rrKeranjang_dtl->keranjang_dtl_prod_id;


            $query_keranjang        = "	SELECT * FROM keranjang_detail,keranjang WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_detail.keranjang_id = keranjang.keranjang_id AND keranjang_dtl_prod_id = " . $keranjang_dtl_prod_id . " AND  keranjang_cust_id = " . $cust_id . "";
            $rhKeranjang            = $this->db->query($query_keranjang);
            $rrKeranjang            = $rhKeranjang->row();
            $keranjang_dtl_prod_id       = $rrKeranjang->keranjang_dtl_prod_id;
            $keranjang_cust_id      = $rrKeranjang->keranjang_cust_id;
            $keranjang_dtl_qty      = $rrKeranjang->keranjang_dtl_qty;
            $qty_baru               =  $keranjang_dtl_qty + 1;
 
            $query_produk           = "	SELECT * FROM produk WHERE produk_id=" . $keranjang_dtl_prod_id;
            $rhProduk               = $this->db->query($query_produk);
            $rrProduk               = $rhProduk->row();
            $produk_harga           = $rrProduk->produk_harga;
            $produk_nama            = $rrProduk->produk_nama;
            $produk_stok            = $rrProduk->produk_stok;
            $produk_stok_now        = $produk_stok - 1;

            $data_stok = array(
                'produk_stok'       => $produk_stok_now,
            );
            $this->Mainmodel->update_table('produk', $data_stok, 'produk_id=' . $keranjang_dtl_prod_id);

            $data = array(
                'keranjang_dtl_qty' => $qty_baru,
            );
            $this->Mainmodel->update_table('keranjang_detail', $data, 'keranjang_dtl_id=' .$keranjang_dtl_id);

            redirect($class . '/' . $method);

        } 
        elseif ($mode == 'crud_kurang') {
            $previous_url           = $this->agent->referrer();
            $url_segments           = explode('/', $previous_url);
            $class                  = $url_segments[4];
            $method                 = $url_segments[5];
            $keranjang_dtl_id       = $this->input->get('keranjang_dtl_id');

            $query_keranjang_dtl    = "	SELECT * FROM keranjang_detail WHERE keranjang_dtl_id = " . $keranjang_dtl_id . "";
            $rhKeranjang_dtl        = $this->db->query($query_keranjang_dtl);
            $rrKeranjang_dtl        = $rhKeranjang_dtl->row();
            $keranjang_dtl_prod_id  = $rrKeranjang_dtl->keranjang_dtl_prod_id;


            $query_keranjang        = "	SELECT * FROM keranjang_detail,keranjang WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_detail.keranjang_id = keranjang.keranjang_id AND keranjang_dtl_prod_id = " . $keranjang_dtl_prod_id . " AND  keranjang_cust_id = " . $cust_id . "";
            $rhKeranjang            = $this->db->query($query_keranjang);
            $rrKeranjang            = $rhKeranjang->row();
            $keranjang_dtl_prod_id  = $rrKeranjang->keranjang_dtl_prod_id;
            $keranjang_cust_id      = $rrKeranjang->keranjang_cust_id;
            $keranjang_dtl_qty      = $rrKeranjang->keranjang_dtl_qty;
            $qty_baru               = $keranjang_dtl_qty - 1;
            
            $query_produk           = "	SELECT * FROM produk WHERE produk_id=" . $keranjang_dtl_prod_id;
            $rhProduk               = $this->db->query($query_produk);
            $rrProduk               = $rhProduk->row();
            $produk_harga           = $rrProduk->produk_harga;
            $produk_nama            = $rrProduk->produk_nama;
            $produk_stok            = $rrProduk->produk_stok;
            $produk_stok_now        = $produk_stok + 1;
            
            $data_stok = array(
                'produk_stok'        => $produk_stok_now,
            );
            $this->Mainmodel->update_table('produk', $data_stok, 'produk_id=' . $keranjang_dtl_prod_id);

            $data = array(
                'keranjang_dtl_qty'  => $qty_baru,
            );
            $this->Mainmodel->update_table('keranjang_detail', $data, 'keranjang_dtl_id=' . $keranjang_dtl_id);
        
            redirect($class . '/' . $method);
        }  
        elseif ($mode == 'crud_simpan') {
            $keranjang_id        = $this->input->post('keranjang_id');
            $data = array(
                'keranjang_nm_penerima'    => $this->input->post('inp_nama_penerima'),
                'keranjang_telp_penerima'        => $this->input->post('inp_telp_penerima'),
                'keranjang_almt_penerima'       => $this->input->post('inp_almt_penerima'),
                'keranjang_kcmtn_id'    => $this->input->post('inp_kcmtn'),
            );
            $this->Mainmodel->update_table('keranjang', $data, 'keranjang_id=' . $keranjang_id);
            redirect('main/checkout');
        }

        $this->load->view('layout', $data);
    }
    
    function checkout($mode = '')
    {
        $cust_id        = $this->session->userdata('cust_id');
        $data['title']          = 'Checkout';
        $data['main_content']   = 'checkout';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();

        $keranjang_id           = 0;
        $keranjang_cust_almt_id = 0;
        $query_krnjg    = "	SELECT * FROM v_keranjang WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_cust_id=" . $cust_id;
        $rhKrnjg        = $this->db->query($query_krnjg);
        $rrAKrnjg       = $rhKrnjg->row();


        if (isset($rrAKrnjg)) {
            $keranjang_id           = $rrAKrnjg->keranjang_id;
            $cust_almt_penerima    = $rrAKrnjg->keranjang_nm_penerima;
            $cust_almt_telp        = $rrAKrnjg->keranjang_telp_penerima;
            $cust_almt_jalan        = $rrAKrnjg->keranjang_almt_penerima;
            $cust_propinsi        = $rrAKrnjg->prop_id;
            $cust_kota        = $rrAKrnjg->kota_id;
            $cust_kecamatan     = $rrAKrnjg->kcmtn_id;

            if (empty($cust_propinsi)) {
                $cust_propinsi = 0;
            }
            if (empty($cust_kota)) {
                $cust_kota = 0;
            }
            $whereComboKota    = ' AND kota_id_prop=' . $cust_propinsi;
            $whereComboKcmtn    = ' AND kcmtn_id_kota=' . $cust_kota;
        }
        // die($ekspedisi_id);

        $keranjang_nm_penerima   = '';
        $keranjang_kcmtn_id = '';
        $keranjang_almt_penerima    = '';
        $keranjang_telp_penerima     = '';
        $cust_kecamatan     = 0;
        $cust_kota          = 0;
        $cust_propinsi      = 0;
        $whereComboKota     = ' AND kota_id_prop = 0';
        $whereComboKcmtn    = ' AND kcmtn_id_kota = 0';

        $query_krnjg    = "	SELECT * FROM v_keranjang WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_cust_id=" . $cust_id;
        $rhKrnjg        = $this->db->query($query_krnjg);
        $rrAKrnjg       = $rhKrnjg->row();
        if (isset($rrAKrnjg)) {
            $keranjang_id           = $rrAKrnjg->keranjang_id;
            $cust_propinsi = $rrAKrnjg->prop_id;
            $cust_kota = $rrAKrnjg->kota_id;

            if (empty($cust_propinsi)) {
                $cust_propinsi = 0;
            }
            if (empty($cust_kota)) {
                $cust_kota = 0;
            }
            $whereComboKota    = ' AND kota_id_prop=' . $cust_propinsi;
            $whereComboKcmtn    = ' AND kcmtn_id_kota=' . $cust_kota;

        } 
        if ($mode == 'confirm_checkout') {
            $ekspedisi_id        = $this->input->post('inp_ekspedisi');
            $query_ekspedisi    = "	SELECT * FROM ekspedisi WHERE ekspedisi_id=" . $ekspedisi_id;
            $rhEkspedisi        = $this->db->query($query_ekspedisi);
            $rrEkspedisi      = $rhEkspedisi->row();
            $ongkir = $rrEkspedisi->ekspedisi_ongkir;
            $periode = date('y') . date('m');
            $no_baru        = $this->Mainmodel->get_no_faktur("v_keranjang", "INV", $periode);
            $no_invoice    = $this->Mainmodel->generate_no_faktur("INV", $periode, $no_baru);
                $data = array(
                    'keranjang_status'            => "Sudah Checkout",
                    'keranjang_time_checkout'     => 'now()',
                    'keranjang_ekspedisi_id'      => $this->input->post('inp_ekspedisi'),
                    'keranjang_mtd_byr_id'        => $this->input->post('inp_metode'),
                    'keranjang_ongkir'            => $ongkir,
                    'keranjang_no_invoice'            => $no_invoice,
                );
                $this->Mainmodel->update_table('keranjang', $data, 'keranjang_id=' . $keranjang_id);
                redirect('main/info_checkout');
        
        }
        $data['query_keranjang_dtl']       = $this->db->query("SELECT * FROM v_keranjang_detail WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_cust_id =" . $cust_id . " " . "ORDER BY produk_nama");

        $data['query_keranjang']       = $this->db->query("SELECT * FROM v_keranjang WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_id =" . $keranjang_id . " ");
        $data['comboMetode']  = $this->Mainmodel->show_combo("metode_bayar", "metode_byr_id", "metode_byr_nama", "metode_byr_id > 0", "metode_byr_id",0);
        $data['comboEkspedisi']  = $this->Mainmodel->show_combo("ekspedisi", "ekspedisi_id", "ekspedisi_nama", "ekspedisi_id > 0", "ekspedisi_id",0);




        $this->load->view('layout', $data);
    }

    function info_checkout($mode = '')
    {
        $cust_id        = $this->session->userdata('cust_id');
        $data['title']          = 'Info Checkout';
        $data['main_content']   = 'info_checkout';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();


        $this->load->view('layout', $data);
    }

    function belum_bayar($mode = '')
    {
        $cust_id        = $this->session->userdata('cust_id');
        $data['title']          = 'Konfirmasi Pembayaran';
        $data['main_content']   = 'belum_bayar';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();
        $data['query_alamat']       = $this->db->query("SELECT * FROM v_keranjang WHERE keranjang_status = 'Sudah Checkout'  AND keranjang_cust_id =" . $cust_id . " ");
        $data['numrow'] = $data['query_alamat']->num_rows();

        $this->load->view('layout', $data);
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

    function bukti_bayar($mode = '')
    {
        $keranjang_id   = $this->input->get('keranjang_id');
        $cust_id        = $this->session->userdata('cust_id');
        $data['title']          = 'Bukti Pembayaran';
        $data['main_content']   = 'bukti_bayar';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();
        $data['keranjang_id']          = $keranjang_id;



        if ($mode == 'kirim_bukti') {
            
            $config['upload_path']        = 'assets/media/foto_bukti/';
            $config['allowed_types']    = 'gif|jpg|jpeg|png|pdf';
            $config['remove_spaces']    = FALSE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $keranjang_id = $this->input->post('keranjang_id');

            $files    = $_FILES;
            $cpt    = count($_FILES['file_bukti']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['file_bukti']['name']        = $files['file_bukti']['name'][$i];
                $_FILES['file_bukti']['type']        = $files['file_bukti']['type'][$i];
                $_FILES['file_bukti']['tmp_name']    = $files['file_bukti']['tmp_name'][$i];
                $_FILES['file_bukti']['error']        = $files['file_bukti']['error'][$i];
                $_FILES['file_bukti']['size']        = $files['file_bukti']['size'][$i];
                $url  = "assets/media/foto_bukti/" . $_FILES['file_bukti']['name'];

                if ($this->upload->do_upload('file_bukti')) {
                    $data = array(
                        'keranjang_time_bayar'      =>  $this->input->post('inp_tgl_byr'),
                        'keranjang_status'          => 'Menunggu Verifikasi',
                        'keranjang_bukti_byr_url'   => pg_escape_string($url),
                        'keranjang_bukti_byr'       =>  pg_escape_string($files['file_bukti']['name'][$i]),
                    );
                    $this->Mainmodel->update_table('keranjang', $data, 'keranjang_id=' . $keranjang_id);
            }
                redirect('home/dashboard');
            }

        }


        $this->load->view('layout', $data);
    }

    function menunggu_verifikasi($mode = '')
    {
        $cust_id        = $this->session->userdata('cust_id');
        $data['title']          = 'Menunggu Verifikasi';
        $data['main_content']   = 'menunggu_verifikasi';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();
        $data['query_alamat']       = $this->db->query("SELECT * FROM v_keranjang WHERE keranjang_status = 'Menunggu Verifikasi'  AND keranjang_cust_id =" . $cust_id . " ");
        $data['numrow'] = $data['query_alamat']->num_rows();

        $this->load->view('layout', $data);
    }

    function barang_dikemas($mode = '')
    {
        $cust_id        = $this->session->userdata('cust_id');
        $data['title']          = 'Pesanan Dikemas';
        $data['main_content']   = 'barang_dikemas';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();
        $data['query_alamat']       = $this->db->query("SELECT * FROM v_keranjang WHERE keranjang_status = 'Sedang Dikemas'  AND keranjang_cust_id =" . $cust_id . " ");
        $data['numrow'] = $data['query_alamat']->num_rows();

        $this->load->view('layout', $data);
    }
    function barang_dikirim($mode = '')
    {
        $cust_id        = $this->session->userdata('cust_id');
        $keranjang_id          = $this->input->get('keranjang_id');
        $data['title']          = 'Pesanan Sedang Dikirim';
        $data['main_content']   = 'barang_dikirim';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();
        $data['query_alamat']       = $this->db->query("SELECT * FROM v_keranjang WHERE keranjang_status = 'Sudah Dikirim'  AND keranjang_cust_id =" . $cust_id . " ");
        $data['numrow'] = $data['query_alamat']->num_rows();

        if ($mode == 'submit_terima') {
            $data = array(
                'keranjang_status'  => 'Pesanan Diterima',

            );

            $this->Mainmodel->update_table('keranjang', $data, 'keranjang_id= ' . $keranjang_id);
            redirect('home/dashboard');
        }


        $this->load->view('layout', $data);
    }

    function barang_diterima($mode = '')
    {
        $cust_id        = $this->session->userdata('cust_id');
        $hSQL        = str_replace(' ', '+', $this->input->get('hSQL'));
        $keranjang_id          = $this->input->get('keranjang_id');
        $data['title']          = 'Pesanan Selesai';
        $data['main_content']   = 'barang_diterima';
        $data['current_url']    = current_url();
        $data['class']            = $this->router->fetch_class();
        $data['method']            = $this->router->fetch_method();


        $queryNumRow            = $this->db->query("SELECT COUNT(*) AS count_data FROM v_keranjang WHERE keranjang_status = 'Pesanan Diterima' AND keranjang_cust_id =" . $cust_id . " ");

        $num_row                = $queryNumRow->row();
        $count_data             = $num_row->count_data;


        (empty($this->input->get('pn'))) ? $page_number = 1 : $page_number = $this->input->get('pn');
        (empty($this->input->get('ps'))) ? $page_size = 5 : $page_size = $this->input->get('ps');
        ($page_number > 1) ? $offset = ($page_number - 1) * $page_size : $offset = 0;

        $data['offset']            = $offset;
        $data['query_alamat']       = $this->db->query("SELECT * FROM v_keranjang WHERE keranjang_status = 'Pesanan Diterima'  AND keranjang_cust_id =" . $cust_id . " ". " ORDER BY keranjang_id desc LIMIT " . $page_size . " OFFSET " . $offset);

        if ($data['query_alamat']->num_rows() > 0) {
            $data['pagination']        = $this->Mainmodel->pagination($hSQL, $page_number, $page_size, $count_data);
        }

        $data['numrow'] = $data['query_alamat']->num_rows();

        $this->load->view('layout', $data);
    }


   

    function profile($mode = '')
    {
        $cust_id        = $this->session->userdata('cust_id');
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

        $query_rnum        = "	SELECT * FROM customer WHERE cust_id=" . $cust_id;
        $rhNum            = $this->db->query($query_rnum);
        $rrNum            = $rhNum->row();
        $cust_nama        = $rrNum->cust_nama;
        $cust_no_telp    = $rrNum->cust_no_telp;
        $cust_email        = $rrNum->cust_email;
        $cust_alamat        = $rrNum->cust_alamat;
        $cust_foto        = 'assets/media/foto_customer/' . $rrNum->cust_foto;
        // if ($peg_gender == 'P') {
        //     $checkedPria    = 'checked="checked"';
        //     $checkedWanita    = '';
        // } else {
        //     $checkedPria    = '';
        //     $checkedWanita    = 'checked="checked"';
        // }

        if ($mode == 'crud') {
            $action    = $this->input->post('action_crud');
            $cust_id    = $this->input->post('cust_id');
            $data = array(
                'cust_nama'            => $this->input->post('inp_nama'),
                'cust_no_telp'        => $this->input->post('inp_hp'),
                'cust_email'            => $this->input->post('inp_email'),
                'cust_alamat'        => $this->input->post('inp_almt'),
            );
            $this->Mainmodel->update_table('customer', $data, 'cust_id=' . $cust_id);

            $config_photo['upload_path'] = './assets/media/foto_customer/';
            $config_photo['allowed_types'] = 'jpg|png|jpeg';
            $config_photo['max_size']        = 1024;
            $this->load->library('upload', $config_photo);
            $this->upload->initialize($config_photo);
            if ($this->upload->do_upload('profile_avatar')) {
                $fotoData    = $this->upload->data();
                $fotoName    = $fotoData['file_name'];
                $data = array(
                    'cust_foto'            => pg_escape_string($fotoName),
                );
                $this->Mainmodel->update_table('customer', $data, 'cust_id=' . $cust_id);
            }

            redirect($this->router->fetch_class() . '/' . $this->router->fetch_method());
        } elseif ($mode == 'changepass') {
            $action    = $this->input->post('action_crud_change');
            $rNum    = $this->input->post('cust_id_change');
            $reg_password    = $this->input->post('reg_password');
            $data = array(
                'cust_passwd'            => md5($this->input->post('reg_password')),
            );
            $this->Mainmodel->update_table('customer', $data, 'cust_id=' . $rNum);
            redirect($this->router->fetch_class() . '/' . $this->router->fetch_method());
        }

        $data['cust_id']            = $cust_id;
        $data['cust_nama']        = $cust_nama;
        $data['cust_no_telp']    = $cust_no_telp;
        $data['cust_email']        = $cust_email;
        $data['cust_alamat']        = $cust_alamat;
        $data['cust_foto']        = $cust_foto;

        $this->load->view('layout', $data);
    }

    
}

