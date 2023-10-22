<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mainmodel');
    }

	function create_list($mode) {
		$sel_id  = $this->input->post('sel_id');
		$set_id  = $this->input->post('set_id');
		if(empty($sel_id)){
			$sel_id=0;
		}
		if(empty($set_id)){
			$set_id=0;
		}
		if($mode == 'get_propinsi'){
			$sql    = " SELECT	prop_id,
								prop_nama
						FROM	propinsi
						WHERE	prop_id=".$sel_id."
						ORDER BY prop_nama";
			$rhQ	= $this->db->query($sql);
			$list	= '<option label="Label"></option>';
			foreach($rhQ->result() as $rrQ){
				if($set_id==$rrQ->prop_id){
					$selected="selected";
				}
				else{
					$selected="";
				}
				$list	.= '<option value="'.$rrQ->prop_id.'" '.$selected.'>'.$rrQ->prop_nama.'</option>';
			}
		}
		elseif($mode == 'get_kota'){
			$sql    = " SELECT	kota_id,
								kota_nama,
								kota_tipe
						FROM	kota
						WHERE	kota_id_prop=".$sel_id."
						ORDER BY kota_nama";
			$rhQ	= $this->db->query($sql);
			$list	= '<option label="Label"></option>';
			foreach($rhQ->result() as $rrQ){
				if($set_id==$rrQ->kota_id){
					$selected="selected";
				}
				else{
					$selected="";
				}
				$list	.= '<option value="'.$rrQ->kota_id.'" '.$selected.'>'.$rrQ->kota_tipe.' '.$rrQ->kota_nama.'</option>';
			}
		}
		elseif($mode == 'get_kcmtn'){
			$sql    = " SELECT	kcmtn_id,
								kcmtn_nama
						FROM	kecamatan
						WHERE	kcmtn_id_kota=".$sel_id."
						ORDER BY kcmtn_nama";
			$rhQ	= $this->db->query($sql);
			$list	= '<option label="Label"></option>';
			foreach($rhQ->result() as $rrQ){
				if($set_id==$rrQ->kcmtn_id){
					$selected="selected";
				}
				else{
					$selected="";
				}
				$list	.= '<option value="'.$rrQ->kcmtn_id.'" '.$selected.'>'.$rrQ->kcmtn_nama.'</option>';
			}
			
		} elseif ($mode == 'get_ongkir') {
			$sql    = " SELECT	ekspedisi_id,
								ekspedisi_ongkir
						FROM	ekspedisi
						WHERE	ekspedisi_id=" . $sel_id . "
						ORDER BY ekspedisi_nama";
			$rhQ	= $this->db->query($sql);
			$list	= '<option label="Label"></option>';
			foreach ($rhQ->result() as $rrQ) {
				if ($set_id == $rrQ->ekspedisi_id) {
					$selected = "selected";
				} else {
					$selected = "";
				}
				$list	.= '<option value="' . $rrQ->ekspedisi_id . '" ' . $selected . '>' . $rrQ->ekspedisi_ongkir . '</option>';
			}
		}

		echo json_encode($list);
	}

	function get_data($mode) {
		if($mode == 'get_ongkir'){
			$ekspedisi_id	= $this->input->get('ekspedisi_id');
			$ongkir	= $this->input->get('ongkir');
			if($ekspedisi_id > 0){
				$data = $this->Mainmodel->get_row_data("ekspedisi", "ekspedisi_id=".$ekspedisi_id);
			}

			$response = array('data' => $data);
			echo json_encode($response);
			exit;
		}
		elseif ($mode == 'admin_old_password') {
			$rNum			= $this->input->get('rNum');
			$old_password	= $this->input->get('old_password');
			if ($rNum > 0) {
				$data = $this->Mainmodel->get_row_data("admin", "admin_passwd = crypt('" . $old_password . "',\"admin_passwd\") AND admin_id =" . $rNum);
			}

			$response = array('data' => $data);
			echo json_encode($response);
			exit;
		}
	}

}
