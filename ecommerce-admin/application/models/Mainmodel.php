	<?php

    class Mainmodel extends CI_Model
    {
        function __database($query)
        {
            $db_data = $this->db->query($query);
            if ($db_data->num_rows() > 0) {
                foreach ($db_data->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
        }

        function get_row_data($table, $where)
        {
            $sql    = "	SELECT * FROM " . $table . " WHERE " . $where . " LIMIT 1";
            $rhQ    = $this->db->query($sql);
            $rrQ    = $rhQ->row();
            return $rrQ;
        }

        function get_one_data($field, $table, $where)
        {
            $sql    = "	SELECT " . $field . " AS value FROM " . $table . " WHERE " . $where;
            $rhQ    = $this->db->query($sql);
            $rrQ    = $rhQ->row();
            $value    = $rrQ->value;
            return $value;
        }

		function get_no_faktur($table_faktur, $kode_faktur, $thn_bln_faktur)
		{
			$query_nomor	= "	SELECT  MAX(no_urut_faktur) AS nomor
							FROM    " . $table_faktur . "
							WHERE	kode_faktur	='" . $kode_faktur . "' AND
									thn_bln_faktur='" . $thn_bln_faktur . "'";
			$rhNomor	= $this->db->query($query_nomor);
			$rrNomor	= $rhNomor->row();
			(empty($rrNomor->nomor)) ? $no_akhir = 0 : $no_akhir = $rrNomor->nomor;
			$no_baru	= $no_akhir + 1;
			return ($no_baru);
		}

		function generate_no_faktur($kode, $periode, $no_baru)
		{
			$jml_nol = '0';
			for ($len_char	= strlen($no_baru); $len_char < 3; $len_char++) {
				$jml_nol = $jml_nol . '0';
			}
			$no_faktur = $kode . '.' . $periode . '.' . $jml_nol . $no_baru;
			return ($no_faktur);
		}

        function get_count_data($table, $where)
        {
            $sql    = "	SELECT COUNT(*) AS value FROM " . $table . " WHERE " . $where;
            $rhQ    = $this->db->query($sql);
            $rrQ    = $rhQ->row();
            $value    = $rrQ->value;
            return $value;
        }

        function insert_table($table, $data)
        {
            $this->db->insert($table, $data);
            $insertId = $this->db->insert_id();
            return  $insertId;
        }

        function insert_table_no_return($table, $data)
        {
            $this->db->insert($table, $data);
        }


        function update_table($table, $data, $cond)
        {
            $this->db->where($cond);
            $this->db->update($table, $data);
        }


        function delete_table($table, $cond)
        {
            $this->db->where($cond);
            $this->db->delete($table);
        }

        function get_sequences($seq_name)
        {
            $sql    = " SELECT nextval('" . $seq_name . "') AS id";
            $query  = $this->db->query($sql);
            $row    = $query->row();
            return $row->id;
        }

        function get_login($email, $pass)
        {
            $sql    = " SELECT	admin_id,
							admin_nama,
							admin_email,
							admin_foto
					FROM	admin
					WHERE	admin_email='" . $email . "' AND
							admin_passwd = '" . $pass . "'";
            $q      = $this->db->query($sql);
            return $q;

			
        }

        function get_list_menu($cntrl_menu, $peg_id)
        {
            $sql        = " SELECT	ref_menu_id,
                                ref_menu_judul,
								ref_menu_judul_template,
								ref_menu_controller,
								ref_mn_grp_id,
								ref_mn_grp_judul,
								ref_mn_grp_parent_id
                        FROM	v_menu_pegawai
                        WHERE	ref_mn_peg_peg_id=" . $peg_id . " AND
                                ref_menu_controller='" . $cntrl_menu . "'";
            $query      = $this->db->query($sql);
            $row        = $query->row();
            return $row;
        }

        function get_parent_menu($peg_id)
        {
            $sql    = " SELECT	ref_mn_grp_id,
							ref_mn_grp_judul,
							ref_mn_peg_no_urut
                    FROM	ref_menu_pegawai,ref_menu_grup
                    WHERE	ref_mn_peg_grup_menu_id=ref_mn_grp_id AND 
							ref_mn_grp_parent_id IS NULL AND
							ref_mn_peg_peg_id=" . $peg_id . "
                    ORDER BY ref_mn_peg_no_urut";
            $q      = $this->db->query($sql);
            return $q;
        }

        function get_grup_menu($peg_id, $parent_id)
        {
            $sql    = " SELECT	ref_mn_grp_id,
							ref_mn_grp_judul,
							ref_mn_grp_icon_class,
							ref_mn_peg_no_urut
                    FROM	v_menu_pegawai
                    WHERE	ref_mn_peg_peg_id=" . $peg_id . " AND
							ref_mn_grp_parent_id=" . $parent_id . "
                    GROUP BY ref_mn_grp_id,ref_mn_grp_judul,ref_mn_grp_icon_class,ref_mn_peg_no_urut
                    ORDER BY ref_mn_peg_no_urut";
            $q      = $this->db->query($sql);
            return $q;
        }

        function get_menu($peg_id, $grup_id)
        {
            $sql    = " SELECT	ref_menu_id,
							ref_menu_judul,
							ref_menu_controller,
							ref_menu_icon_class
                    FROM	v_menu_pegawai
                    WHERE	ref_mn_peg_peg_id=" . $peg_id . " AND ref_mn_to_grp_grup_menu_id=" . $grup_id . " AND ref_mn_to_grp_aktif IS TRUE
                    GROUP BY ref_menu_id,ref_menu_judul,ref_menu_controller,ref_mn_to_grp_no_urut,ref_menu_icon_class
                    ORDER BY ref_mn_to_grp_no_urut";
            $q      = $this->db->query($sql);
            return $q;
        }

        function header_menu($peg_id, $act_parent_menu_id, $act_grup_menu_id, $act_menu_id)
        {
            $parent_menu    = $this->get_parent_menu($peg_id);
            $view    = ' <ul class="menu-nav">';
            foreach ($parent_menu->result() as $row_parent) {
                $prnt_id    = $row_parent->ref_mn_grp_id;
                $prnt_ket    = $row_parent->ref_mn_grp_judul;
                if ($prnt_id == $act_parent_menu_id) {
                    $active_parent = 'menu-item-open menu-item-here ';
                } else {
                    $active_parent = '';
                }
                $grup_menu    = $this->get_grup_menu($peg_id, $prnt_id);
                $count_grup    = $grup_menu->num_rows();

                if ($count_grup > 0) {
                    $view    .= '<li class="menu-item menu-item-submenu menu-item-rel ' . $active_parent . '" data-menu-toggle="click" aria-haspopup="true">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="menu-text">' . $prnt_ket . '</span>
									<span class="menu-desc"></span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu menu-submenu-classic menu-submenu-left">
									<ul class="menu-subnav">';
                    foreach ($grup_menu->result() as $row_grup) {
                        $grup_id    = $row_grup->ref_mn_grp_id;
                        $grup_ket    = $row_grup->ref_mn_grp_judul;
                        $grup_icon    = $row_grup->ref_mn_grp_icon_class;
                        if ($grup_id == $act_grup_menu_id) {
                            $active_grup = 'menu-item-open menu-item-here';
                        } else {
                            $active_grup = '';
                        }
                        $menu    = $this->get_menu($peg_id, $grup_id);

                        $view .= '<li class="menu-item menu-item-submenu ' . $active_grup . '" data-menu-toggle="hover" aria-haspopup="true">
											<a href="javascript:;" class="menu-link menu-toggle">
												<span class="svg-icon menu-icon">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														' . $grup_icon . '
													</svg>
												</span>
												<span class="menu-text">' . $grup_ket . '</span>
												<i class="menu-arrow"></i>
											</a>
											<div class="menu-submenu menu-submenu-classic menu-submenu-right">
												<ul class="menu-subnav">';
                        foreach ($menu->result() as $row_menu) {
                            $menu_id    = $row_menu->ref_menu_id;
                            $menu_ket    = $row_menu->ref_menu_judul;
                            $menu_url    = base_url() . $row_menu->ref_menu_controller;
                            $menu_icon    = $row_menu->ref_menu_icon_class;
                            if ($menu_id == $act_menu_id) {
                                $active_menu = 'menu-item-active';
                            } else {
                                $active_menu = '';
                            }

                            $view .= '	<li class="menu-item ' . $active_menu . '" aria-haspopup="true">
														<a href="' . $menu_url . '" class="menu-link">
															<i class="menu-bullet menu-bullet-dot">
																<span></span>
															</i>
															<span class="menu-text">' . $menu_ket . '</span>
														</a>
													</li>';
                        }
                        $view .= '	</ul>
											</div>
										</li>';
                    }

                    $view .= '</ul>
								</div>
							</li>';
                } else {
                    $view    .= '<li class="menu-item menu-item-submenu menu-item-rel ' . $active_parent . '" data-menu-toggle="click" aria-haspopup="true">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="menu-text">' . $prnt_ket . '</span>
									<span class="menu-desc"></span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu menu-submenu-classic menu-submenu-left">
									<ul class="menu-subnav">';
                    $menu    = $this->get_menu($peg_id, $prnt_id);

                    foreach ($menu->result() as $row_menu) {
                        $menu_id    = $row_menu->ref_menu_id;
                        $menu_ket    = $row_menu->ref_menu_judul;
                        $menu_url    = base_url() . $row_menu->ref_menu_controller;
                        $menu_icon    = $row_menu->ref_menu_icon_class;
                        if ($menu_id == $act_menu_id) {
                            $active_menu = 'menu-item-active';
                        } else {
                            $active_menu = '';
                        }

                        $view .= '	<li class="menu-item ' . $active_menu . '" aria-haspopup="true">
														<a href="' . $menu_url . '" class="menu-link">
															<i class="menu-bullet menu-bullet-dot">
																<span></span>
															</i>
															<span class="menu-text">' . $menu_ket . '</span>
														</a>
													</li>';
                    }

                    $view .= '</ul>
								</div>
							</li>';
                }
            }
            $view    .= '</ul>';
            return $view;
        }

        function kt_header($peg_id)
        {
            $view    = '	
					<div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">

						<!-- begin: Header Menu -->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
						<!-- Menunya Kosong -->
						</div>

						<!-- end: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

							<!--begin: Search -->
							<div class="kt-header__topbar-item kt-header__topbar-item--search">
							</div>
							<!--end: Search -->

							<!--begin: Notifications -->
							<div class="kt-header__topbar-item dropdown">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon kt-header__topbar-icon--success"><i class="flaticon2-bell-alarm-symbol"></i></span>
									<span class="kt-hidden kt-badge kt-badge--danger"></span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
									<form>

										<!--begin: Head -->
										<div class="kt-head kt-head--skin-light kt-head--fit-x kt-head--fit-b">
											<h3 class="kt-head__title">
												User Notifications
												&nbsp;
												<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 new</span>
											</h3>
											<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
												<li class="nav-item">
													<a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Events</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Logs</a>
												</li>
											</ul>
										</div>

										<!--end: Head -->
										<div class="tab-content">
											<div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
												<div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-line-chart kt-font-success"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New order has been received
															</div>
															<div class="kt-notification__item-time">
																2 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-box-1 kt-font-brand"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New customer is registered
															</div>
															<div class="kt-notification__item-time">
																3 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-chart2 kt-font-danger"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																Application has been approved
															</div>
															<div class="kt-notification__item-time">
																3 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-image-file kt-font-warning"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New file has been uploaded
															</div>
															<div class="kt-notification__item-time">
																5 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-drop kt-font-info"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New user feedback received
															</div>
															<div class="kt-notification__item-time">
																8 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-pie-chart-2 kt-font-success"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																System reboot has been successfully completed
															</div>
															<div class="kt-notification__item-time">
																12 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-favourite kt-font-danger"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New order has been placed
															</div>
															<div class="kt-notification__item-time">
																15 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item kt-notification__item--read">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-safe kt-font-primary"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																Company meeting canceled
															</div>
															<div class="kt-notification__item-time">
																19 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-psd kt-font-success"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New report has been received
															</div>
															<div class="kt-notification__item-time">
																23 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon-download-1 kt-font-danger"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																Finance report has been generated
															</div>
															<div class="kt-notification__item-time">
																25 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon-security kt-font-warning"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New customer comment recieved
															</div>
															<div class="kt-notification__item-time">
																2 days ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-pie-chart kt-font-success"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New customer is registered
															</div>
															<div class="kt-notification__item-time">
																3 days ago
															</div>
														</div>
													</a>
												</div>
											</div>
											<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
												<div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-psd kt-font-success"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New report has been received
															</div>
															<div class="kt-notification__item-time">
																23 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon-download-1 kt-font-danger"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																Finance report has been generated
															</div>
															<div class="kt-notification__item-time">
																25 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-line-chart kt-font-success"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New order has been received
															</div>
															<div class="kt-notification__item-time">
																2 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-box-1 kt-font-brand"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New customer is registered
															</div>
															<div class="kt-notification__item-time">
																3 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-chart2 kt-font-danger"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																Application has been approved
															</div>
															<div class="kt-notification__item-time">
																3 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-image-file kt-font-warning"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New file has been uploaded
															</div>
															<div class="kt-notification__item-time">
																5 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-drop kt-font-info"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New user feedback received
															</div>
															<div class="kt-notification__item-time">
																8 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-pie-chart-2 kt-font-success"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																System reboot has been successfully completed
															</div>
															<div class="kt-notification__item-time">
																12 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-favourite kt-font-brand"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New order has been placed
															</div>
															<div class="kt-notification__item-time">
																15 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item kt-notification__item--read">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-safe kt-font-primary"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																Company meeting canceled
															</div>
															<div class="kt-notification__item-time">
																19 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-psd kt-font-success"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New report has been received
															</div>
															<div class="kt-notification__item-time">
																23 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon-download-1 kt-font-danger"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																Finance report has been generated
															</div>
															<div class="kt-notification__item-time">
																25 hrs ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon-security kt-font-warning"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New customer comment recieved
															</div>
															<div class="kt-notification__item-time">
																2 days ago
															</div>
														</div>
													</a>
													<a href="#" class="kt-notification__item">
														<div class="kt-notification__item-icon">
															<i class="flaticon2-pie-chart kt-font-success"></i>
														</div>
														<div class="kt-notification__item-details">
															<div class="kt-notification__item-title">
																New customer is registered
															</div>
															<div class="kt-notification__item-time">
																3 days ago
															</div>
														</div>
													</a>
												</div>
											</div>
											<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
												<div class="kt-grid kt-grid--ver" style="min-height: 200px;">
													<div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
														<div class="kt-grid__item kt-grid__item--middle kt-align-center">
															All caught up!
															<br>No new notifications.
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!--end: Notifications -->

							<!--begin: User bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-hidden kt-header__topbar-welcome">Hi,</span>
									<span class="kt-hidden kt-header__topbar-username">Nick</span>
									<img class="kt-hidden" alt="Pic" src="assets/media/users/300_21.jpg" />
									<span class="kt-header__topbar-icon"><i class="flaticon2-user-outline-symbol"></i></span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
										<div class="kt-user-card__avatar">
											<img class="kt-hidden-" alt="Pic" src="assets/media/users/300_25.jpg" />

											<!--use below badge element instead the user avatar to display usernames first letter(remove kt-hidden class to display it) -->
											<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
										</div>
										<div class="kt-user-card__name">
											Sean Stone
										</div>
										<div class="kt-user-card__badge">
											<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 messages</span>
										</div>
									</div>

									<!--end: Head -->

									<!--begin: Navigation -->
									<div class="kt-notification">
										<a href="custom/apps/user/profile-1/personal-information.html" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-calendar-3 kt-font-success"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													My Profile
												</div>
												<div class="kt-notification__item-time">
													Account settings and more
												</div>
											</div>
										</a>
										<a href="custom/apps/user/profile-3.html" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-mail kt-font-warning"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													My Messages
												</div>
												<div class="kt-notification__item-time">
													Inbox and tasks
												</div>
											</div>
										</a>
										<a href="custom/apps/user/profile-2.html" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-rocket-1 kt-font-danger"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													My Activities
												</div>
												<div class="kt-notification__item-time">
													Logs and notifications
												</div>
											</div>
										</a>
										<a href="custom/apps/user/profile-3.html" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-hourglass kt-font-brand"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													My Tasks
												</div>
												<div class="kt-notification__item-time">
													latest tasks and projects
												</div>
											</div>
										</a>
										<a href="custom/apps/user/profile-1/overview.html" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-cardiogram kt-font-warning"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Billing
												</div>
												<div class="kt-notification__item-time">
													billing & statements <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2 pending</span>
												</div>
											</div>
										</a>
										<div class="kt-notification__custom kt-space-between">
											<a href="custom/user/login-v2.html" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
											<a href="custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
										</div>
									</div>

									<!--end: Navigation -->
								</div>
							</div>
							<!--end: User bar -->
						</div>

						<!-- end:: Header Topbar -->
					</div>';
            return $view;
        }

        function kt_subheader($peg_id)
        {
            $view    = '	
					<div class="kt-container  kt-container--fluid ">
						<div class="kt-subheader__main">
							<h3 class="kt-subheader__title">
								HTML (DOM) sourced data Examples </h3>
							<span class="kt-subheader__separator kt-hidden"></span>
							<div class="kt-subheader__breadcrumbs">
								<a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
								<span class="kt-subheader__breadcrumbs-separator"></span>
								<a href="" class="kt-subheader__breadcrumbs-link">
									Crud </a>
								<span class="kt-subheader__breadcrumbs-separator"></span>
								<a href="" class="kt-subheader__breadcrumbs-link">
									Datatables.net </a>
								<span class="kt-subheader__breadcrumbs-separator"></span>
								<a href="" class="kt-subheader__breadcrumbs-link">
									Data sources </a>
								<span class="kt-subheader__breadcrumbs-separator"></span>
								<a href="" class="kt-subheader__breadcrumbs-link">
									HTML </a>

								<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
							</div>
						</div>
						<div class="kt-subheader__toolbar">
							<div class="kt-subheader__wrapper">
								<a href="#" class="btn kt-subheader__btn-primary">
									Actions &nbsp;

									<!--<i class="flaticon2-calendar-1"></i>-->
								</a>
								<div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="left">
									<a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
											</g>
										</svg>

										<!--<i class="flaticon2-plus"></i>-->
									</a>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

										<!--begin::Nav-->
										<ul class="kt-nav">
											<li class="kt-nav__head">
												Add anything or jump to:
												<i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
											</li>
											<li class="kt-nav__separator"></li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-drop"></i>
													<span class="kt-nav__link-text">Order</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-calendar-8"></i>
													<span class="kt-nav__link-text">Ticket</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
													<span class="kt-nav__link-text">Goal</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-new-email"></i>
													<span class="kt-nav__link-text">Support Case</span>
													<span class="kt-nav__link-badge">
														<span class="kt-badge kt-badge--success">5</span>
													</span>
												</a>
											</li>
											<li class="kt-nav__separator"></li>
											<li class="kt-nav__foot">
												<a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
												<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
											</li>
										</ul>

										<!--end::Nav-->
									</div>
								</div>
							</div>
						</div>
					</div>';
            return $view;
        }

        function kt_footer($peg_id)
        {
            $view    = '	
					<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-footer__copyright">
								2019&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Keenthemes</a>
							</div>
							<div class="kt-footer__menu">
								<a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">About</a>
								<a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
								<a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
							</div>
						</div>
					</div>';
            return $view;
        }

        function kt_quick_panel($peg_id)
        {
            $view    = '	
					<div id="kt_quick_panel" class="kt-quick-panel">
						<a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
						<div class="kt-quick-panel__nav">
							<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
								<li class="nav-item active">
									<a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
								</li>
							</ul>
						</div>
						<div class="kt-quick-panel__content">
							<div class="tab-content">
								<div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
									<div class="kt-notification">
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-line-chart kt-font-success"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													New order has been received
												</div>
												<div class="kt-notification__item-time">
													2 hrs ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-box-1 kt-font-brand"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													New customer is registered
												</div>
												<div class="kt-notification__item-time">
													3 hrs ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-chart2 kt-font-danger"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													Application has been approved
												</div>
												<div class="kt-notification__item-time">
													3 hrs ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-image-file kt-font-warning"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													New file has been uploaded
												</div>
												<div class="kt-notification__item-time">
													5 hrs ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-drop kt-font-info"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													New user feedback received
												</div>
												<div class="kt-notification__item-time">
													8 hrs ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-pie-chart-2 kt-font-success"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													System reboot has been successfully completed
												</div>
												<div class="kt-notification__item-time">
													12 hrs ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-favourite kt-font-danger"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													New order has been placed
												</div>
												<div class="kt-notification__item-time">
													15 hrs ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item kt-notification__item--read">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-safe kt-font-primary"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													Company meeting canceled
												</div>
												<div class="kt-notification__item-time">
													19 hrs ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-psd kt-font-success"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													New report has been received
												</div>
												<div class="kt-notification__item-time">
													23 hrs ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon-download-1 kt-font-danger"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													Finance report has been generated
												</div>
												<div class="kt-notification__item-time">
													25 hrs ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon-security kt-font-warning"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													New customer comment recieved
												</div>
												<div class="kt-notification__item-time">
													2 days ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-pie-chart kt-font-warning"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title">
													New customer is registered
												</div>
												<div class="kt-notification__item-time">
													3 days ago
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="tab-pane fade kt-scroll" id="kt_quick_panel_tab_logs" role="tabpanel">
									<div class="kt-notification-v2">
										<a href="#" class="kt-notification-v2__item">
											<div class="kt-notification-v2__item-icon">
												<i class="flaticon-bell kt-font-brand"></i>
											</div>
											<div class="kt-notification-v2__itek-wrapper">
												<div class="kt-notification-v2__item-title">
													5 new user generated report
												</div>
												<div class="kt-notification-v2__item-desc">
													Reports based on sales
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification-v2__item">
											<div class="kt-notification-v2__item-icon">
												<i class="flaticon2-box kt-font-danger"></i>
											</div>
											<div class="kt-notification-v2__itek-wrapper">
												<div class="kt-notification-v2__item-title">
													2 new items submited
												</div>
												<div class="kt-notification-v2__item-desc">
													by Grog John
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification-v2__item">
											<div class="kt-notification-v2__item-icon">
												<i class="flaticon-psd kt-font-brand"></i>
											</div>
											<div class="kt-notification-v2__itek-wrapper">
												<div class="kt-notification-v2__item-title">
													79 PSD files generated
												</div>
												<div class="kt-notification-v2__item-desc">
													Reports based on sales
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification-v2__item">
											<div class="kt-notification-v2__item-icon">
												<i class="flaticon2-supermarket kt-font-warning"></i>
											</div>
											<div class="kt-notification-v2__itek-wrapper">
												<div class="kt-notification-v2__item-title">
													$2900 worth producucts sold
												</div>
												<div class="kt-notification-v2__item-desc">
													Total 234 items
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification-v2__item">
											<div class="kt-notification-v2__item-icon">
												<i class="flaticon-paper-plane-1 kt-font-success"></i>
											</div>
											<div class="kt-notification-v2__itek-wrapper">
												<div class="kt-notification-v2__item-title">
													4.5h-avarage response time
												</div>
												<div class="kt-notification-v2__item-desc">
													Fostest is Barry
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification-v2__item">
											<div class="kt-notification-v2__item-icon">
												<i class="flaticon2-information kt-font-danger"></i>
											</div>
											<div class="kt-notification-v2__itek-wrapper">
												<div class="kt-notification-v2__item-title">
													Database server is down
												</div>
												<div class="kt-notification-v2__item-desc">
													10 mins ago
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification-v2__item">
											<div class="kt-notification-v2__item-icon">
												<i class="flaticon2-mail-1 kt-font-brand"></i>
											</div>
											<div class="kt-notification-v2__itek-wrapper">
												<div class="kt-notification-v2__item-title">
													System report has been generated
												</div>
												<div class="kt-notification-v2__item-desc">
													Fostest is Barry
												</div>
											</div>
										</a>
										<a href="#" class="kt-notification-v2__item">
											<div class="kt-notification-v2__item-icon">
												<i class="flaticon2-hangouts-logo kt-font-warning"></i>
											</div>
											<div class="kt-notification-v2__itek-wrapper">
												<div class="kt-notification-v2__item-title">
													4.5h-avarage response time
												</div>
												<div class="kt-notification-v2__item-desc">
													Fostest is Barry
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_quick_panel_tab_settings" role="tabpanel">
									<form class="kt-form">
										<div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
										<div class="form-group form-group-xs row">
											<label class="col-8 col-form-label">Enable Notifications:</label>
											<div class="col-4 kt-align-right">
												<span class="kt-switch kt-switch--success kt-switch--sm">
													<label>
														<input type="checkbox" checked="checked" name="quick_panel_notifications_1">
														<span></span>
													</label>
												</span>
											</div>
										</div>
										<div class="form-group form-group-xs row">
											<label class="col-8 col-form-label">Enable Case Tracking:</label>
											<div class="col-4 kt-align-right">
												<span class="kt-switch kt-switch--success kt-switch--sm">
													<label>
														<input type="checkbox" name="quick_panel_notifications_2">
														<span></span>
													</label>
												</span>
											</div>
										</div>
										<div class="form-group form-group-last form-group-xs row">
											<label class="col-8 col-form-label">Support Portal:</label>
											<div class="col-4 kt-align-right">
												<span class="kt-switch kt-switch--success kt-switch--sm">
													<label>
														<input type="checkbox" checked="checked" name="quick_panel_notifications_2">
														<span></span>
													</label>
												</span>
											</div>
										</div>
										<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
										<div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
										<div class="form-group form-group-xs row">
											<label class="col-8 col-form-label">Generate Reports:</label>
											<div class="col-4 kt-align-right">
												<span class="kt-switch kt-switch--sm kt-switch--danger">
													<label>
														<input type="checkbox" checked="checked" name="quick_panel_notifications_3">
														<span></span>
													</label>
												</span>
											</div>
										</div>
										<div class="form-group form-group-xs row">
											<label class="col-8 col-form-label">Enable Report Export:</label>
											<div class="col-4 kt-align-right">
												<span class="kt-switch kt-switch--sm kt-switch--danger">
													<label>
														<input type="checkbox" name="quick_panel_notifications_3">
														<span></span>
													</label>
												</span>
											</div>
										</div>
										<div class="form-group form-group-last form-group-xs row">
											<label class="col-8 col-form-label">Allow Data Collection:</label>
											<div class="col-4 kt-align-right">
												<span class="kt-switch kt-switch--sm kt-switch--danger">
													<label>
														<input type="checkbox" checked="checked" name="quick_panel_notifications_4">
														<span></span>
													</label>
												</span>
											</div>
										</div>
										<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
										<div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
										<div class="form-group form-group-xs row">
											<label class="col-8 col-form-label">Enable Member singup:</label>
											<div class="col-4 kt-align-right">
												<span class="kt-switch kt-switch--sm kt-switch--brand">
													<label>
														<input type="checkbox" checked="checked" name="quick_panel_notifications_5">
														<span></span>
													</label>
												</span>
											</div>
										</div>
										<div class="form-group form-group-xs row">
											<label class="col-8 col-form-label">Allow User Feedbacks:</label>
											<div class="col-4 kt-align-right">
												<span class="kt-switch kt-switch--sm kt-switch--brand">
													<label>
														<input type="checkbox" name="quick_panel_notifications_5">
														<span></span>
													</label>
												</span>
											</div>
										</div>
										<div class="form-group form-group-last form-group-xs row">
											<label class="col-8 col-form-label">Enable Customer Portal:</label>
											<div class="col-4 kt-align-right">
												<span class="kt-switch kt-switch--sm kt-switch--brand">
													<label>
														<input type="checkbox" checked="checked" name="quick_panel_notifications_6">
														<span></span>
													</label>
												</span>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>';
            return $view;
        }

        function pagination($hSQL, $page_number, $page_size, $count_data)
        {
            $page_count = ceil($count_data / $page_size);
            $page_bef    = $page_number - 1;
            $page_next    = $page_number + 1;
            if ($page_size == 25) {
                $selected10        = "";
                $selected25        = "selected";
                $selected50        = "";
                $selected100    = "";
                $selected1000    = "";
            } elseif ($page_size == 50) {
                $selected10        = "";
                $selected25        = "";
                $selected50        = "selected";
                $selected100    = "";
                $selected1000    = "";
            } else {
                $selected10        = "selected";
                $selected25        = "";
                $selected50        = "";
                $selected100    = "";
                $selected1000    = "";
            }

            $page_min = $page_number - 4;
            if ($page_min <= 0) {
                $page_min    = 1;
                $page_max    = 10;
            } else {
                $page_max    = $page_number + 5;
            }


            if ($page_max >= $page_count) {
                $page_max    = $page_count;
                $page_min    = $page_max - 9;
                if ($page_min < 0) {
                    $page_min    = 1;
                }
            }

            $start    = (($page_number - 1) * $page_size) + 1;
            $end    = $page_number * $page_size;
            ($page_number == $page_count) ? $end = $count_data : $end = $page_number * $page_size;

            $view    = '	<div class="example-preview">
						<div class="d-flex justify-content-between align-items-center flex-wrap">
							<div class="d-flex flex-wrap py-2 mr-3">';
            if ($page_number > 1) {
                $view    .= '<a href="' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '/?hSQL=' . $hSQL . '&pn=1&ps=' . $page_size . '" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i class="ki ki-bold-double-arrow-back icon-xs"></i></a>';
                $view    .= '<a href="' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '/?hSQL=' . $hSQL . '&pn=' . $page_bef . '&ps=' . $page_size . '" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></a>';
            }
            for ($page_start = $page_min; $page_start <= $page_max; $page_start++) {
                ($page_start == $page_number) ? $selectedpage = "btn-hover-primary active" : $selectedpage = "";
                $view    .= '<a href="' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '/?hSQL=' . $hSQL . '&pn=' . $page_start . '&ps=' . $page_size . '" class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1 ' . $selectedpage . '">' . $page_start . '</a>';
            }
            if ($page_number < $page_max) {
                $view    .= '<a href="' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '/?hSQL=' . $hSQL . '&pn=' . $page_next . '&ps=' . $page_size . '" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></a>';
                $view    .= '<a href="' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '/?hSQL=' . $hSQL . '&pn=' . $page_count . '&ps=' . $page_size . '" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i class="ki ki-bold-double-arrow-next icon-xs"></i></a>';
            }
            $view    .= '</div>
							<div class="d-flex align-items-center py-3">
								<span class="text-muted">Showing ' . $start . ' to ' . $end . ' of ' . $count_data . ' rows </span>&nbsp;&nbsp;
								<select class="form-control form-control-sm font-weight-bold mr-4 border-0 bg-light" style="width: 75px;" onchange="window.location.href=this.value">
									<option value="' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '/?hSQL=' . $hSQL . '&pn=1&ps=10"	' . $selected10 . '>10</option>
									<option value="' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '/?hSQL=' . $hSQL . '&pn=1&ps=25"	' . $selected25 . '>25</option>
									<option value="' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '/?hSQL=' . $hSQL . '&pn=1&ps=50"	' . $selected50 . '>50</option>
								</select>
								<span class="text-muted">rows per page</span>
							</div>
						</div>
				</div>';
            return $view;
        }

        function show_combo($table, $fieldId, $fieldName, $clause, $fieldOrder, $value)
        {
            $list    = '';
            $sql    = " SELECT	" . $fieldId . ",
							" . $fieldName . "
					FROM	" . $table . "
					WHERE	" . $clause . "
					ORDER BY " . $fieldOrder;
            $rhQ      = $this->db->query($sql);
            foreach ($rhQ->result() as $rrQ) {
                $field_id        = $rrQ->$fieldId;
                $field_name    = $rrQ->$fieldName;
                ($value == $field_id) ? $selected = "selected" : $selected = "";
                $list    .= '<option value="' . $field_id . '" ' . $selected . '>' . $field_name . '</option>';
            }
            return $list;
        }
    }
    ?>