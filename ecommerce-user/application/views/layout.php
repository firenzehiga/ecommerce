<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="<?php echo base_url(); ?>">
	<meta charset="utf-8" />
	<title>Metroshop | <?= $title ?></title>
	<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="assets/css/fontgoogle.css" />
	<!--end::Fonts-->
	<!--begin::Page Vendors Styles(used by this page)-->
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="assets//fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />


	<link href="assets/bower_components/bootstrap-table/bootstrap-table.css" rel="stylesheet" type="text/css">
	<link href="assets/plugins/custom/uppy/uppy.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
	<style>
		.fix100 {
			width: 100px !important;
		}

		.fix150 {
			width: 150px !important;
		}

		.fix175 {
			width: 175px !important;
		}

		.fix200 {
			width: 200px !important;
		}

		@media print {

			.print,
			.header {
				display: none;
			}

			.container {
				width: 100%;
			}
		}
	</style>
	<style>
		.float-whatsapp {
			position: fixed;
			bottom: 50px;
			right: 50px;
			background-color: #25d366;
			border-radius: 50px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
			z-index: 99;
			overflow: hidden;
			transition: all 0.3s ease;
			opacity: 0.9;
		}

		.float-whatsapp:hover {
			opacity: 1;
			transform: scale(1.1);
		}

		.float-whatsapp i {
			display: block;
			width: 60px;
			height: 60px;
			line-height: 60px;
			text-align: center;
			color: #FFF;
			font-size: 30px;
			transition: all 0.3s ease;
		}

		.float-whatsapp span {
			display: block;
			position: absolute;
			top: 0;
			left: 100%;
			width: 200px;
			height: 60px;
			line-height: 60px;
			text-align: center;
			background-color: #25d366;
			color: #FFF;
			font-size: 20px;
			font-weight: bold;
			white-space: nowrap;
			transform: translateX(0);
			transition: all 1.5s ease;
		}

		.float-whatsapp:hover span {
			transform: translateX(-100%);
		}

		@media screen and (max-width: 767px) {
			.float-whatsapp {
				bottom: 30px;
				right: 30px;
			}

			.float-whatsapp i {
				font-size: 20px;
				width: 40px;
				height: 40px;
				line-height: 40px;
			}

			.float-whatsapp span {
				width: 160px;
				height: 40px;
				line-height: 40px;
				font-size: 16px;
			}
		}
	</style>



	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	<script src="assets/plugins/global/plugins.bundle.js?v=7.0.4"></script>
	<script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4"></script>
	<script src="assets/js/scripts.bundle.js?v=7.0.4"></script>


	<script src="assets/js/pages/widgets.js?v=7.0.4"></script>

	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<script src="assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
	<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<script src="assets/js/pages/widgets.js"></script>
	<script src="assets/bower_components/bootstrap-table/bootstrap-table.js"></script>
	<script src="assets/bower_components/bootstrap-table/extensions/resizable/bootstrap-table-resizable.js"></script>
	<script src="assets/bower_components/bootstrap-table/extensions/reorder-columns/bootstrap-table-reorder-columns.js"></script>
	<script src="assets/bower_components/bootstrap-table/extensions/export/bootstrap-table-export.js"></script>
	<script src="assets/bower_components/tableExport/tableExport.js"></script>
	<script src="assets/bower_components/tableExport/libs/js-xlsx/xlsx.core.min.js"></script>
	<script src="assets/bower_components/bootstrap-table/extensions/filter/bootstrap-table-filter.js"></script>

	<script src="assets/bower_components/fancybox/fancybox.umd.js"></script>
	<script src="assets/js/pages/crud/file-upload/image-input.js?v=7.0.4"></script>

	<!--end::Page Scripts-->
	<style>
		.datepicker>div {
			display: inherit;
		}
	</style>

	<script>
		window.onload = function() {
			var floatWhatsApp = document.querySelector('.float-whatsapp');
			if (floatWhatsApp) {
				floatWhatsApp.addEventListener('click', function(e) {
					e.preventDefault();
					window.open('https://api.whatsapp.com/send?phone=6285894310722&text=Halo,%20sSya%20Ingin%20Bertanya%20Tentang%20Produk%20Anda', '_blank');
				}, false);
			}
		};
	</script>



	<!-- Autonumeric -->
</head>

<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed">

	<a href="" class="float-whatsapp" target="_blank">
		<i class="fab fa-whatsapp my-float icon-3x "></i>
		<span>Contact Us Now</span>
	</a>

	<!--begin::Main-->
	<!--begin::Header Mobile-->
	<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed print ">
		<!--begin::Logo-->
		<a href="index.html">
			<img alt="Logo" src="assets/media/logos/logo-1.jpg" />
		</a>
		<!--end::Logo-->
		<!--begin::Toolbar-->

		<!--end::Toolbar-->
	</div>
	<!--end::Header Mobile-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">

			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
				<div id="kt_header" class="header header-fixed bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-33.jpg');">
					<!--begin::Container-->
					<div class=" container-fluid d-flex align-items-stretch justify-content-between">
						<!--begin::Header Menu Wrapper-->
						<div class="header-menu-wrapper  header-menu-wrapper-left" id="kt_header_menu_wrapper">
							<div class="header-logo print">
								<a href="<?= base_url() ?>home/dashboard">
									<img alt="Logo" src="assets/media/logos/logo-default.png" />
								</a>
							</div>
							<!--end::Header Logo-->
							<!--begin::Header Menu-->
							<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
								<!--begin::Header Nav-->
								<ul class="menu-nav">
									<li class="menu-item">
										<a href="<?= base_url() ?>main/product" class="menu-link ">
											<span class="menu-text">
												PRODUCT</span>
										</a>
									</li>
								</ul>
								<!--end::Header Nav-->
							</div>
							<!--end::Header Menu-->
						</div>


						<!-- buat cart sidebar -->
						<!--role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"-->
						<div class="topbar">

							<?php
							$cust_id        = $this->session->userdata('cust_id');
							if (empty($cust_id)) {
								$cust_id = 0;
								$link = 'auth/login';
							} else {
								$link = 'main/cart';
							}
							$query_isi_cart		= "	SELECT COUNT(*) AS isi_cart FROM v_keranjang_detail WHERE keranjang_status = 'Dalam Keranjang' AND keranjang_cust_id =" . $cust_id . "";
							$rhNum			= $this->db->query($query_isi_cart);
							$rrNum			= $rhNum->row();
							$isi_cart		= $rrNum->isi_cart;
							$data['isi_cart']		= $isi_cart; ?>
							<div class="topbar-item">
								<li class="nav-item dropdown no-arrow mx-1 ">
									<a class="nav-link  dropdown-toggle" href="<?= base_url() . $link ?>">
										<i class="fas fa-solid fa-shopping-cart icon-xl"></i>

										<?php if ($isi_cart > 0) {
										?>
											<span class="badge badge-danger badge-counter"><?php echo $isi_cart; ?></span>

										<?php
										}
										?>
									</a>
								</li>
							</div>
							<!--end::Cart-->
							<!--begin::Quick panel-->

							<!--end::Quick panel-->
							<!--begin::Chat-->

							<!--end::Chat-->
							<!--begin::Languages-->

							<!--end::Languages-->
							<!--begin::User-->


							<?php if ($this->session->userdata('userlogin')) {

							?>
								<div class="topbar-item">
									<div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
										<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
										<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><?php echo $this->session->userdata('cust_nama') ?></span>
										<span class="symbol symbol-35 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold" style="background-image:url('assets/media/foto_customer/<?php echo $this->session->userdata('cust_foto') ?> ')"></span>
										</span>
									</div>
								</div>

							<?php
							} else {
							?>
								<div class="topbar-item">
									<div class="btn btn-icon w-auto  d-flex align-items-center btn-lg px-2">
										<a href="<?php base_url() ?>auth/register">Daftar</a>&nbsp;|&nbsp;
										<a href="<?php base_url() ?>auth/login">Login</a>


									</div>
								</div>
							<?php
							}
							?>
							<!--end::User-->
						</div>
						<!--end::Topbar-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Content-->
				<!--begin::Subheader-->

				<!--end::Subheader-->
				<!--begin::Entry-->
				<?php
				if (isset($main_content)) {
					$this->load->view($main_content);
				} ?>
				<!--end::Entry-->

				<!--end::Content-->
				<!--begin::Footer-->

				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Main-->
	<!-- begin::User Panel-->
	<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
		<!--begin::Header-->
		<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
			<h3 class="font-weight-bold m-0">Profile
				<small class="text-muted font-size-sm ml-2"></small>
			</h3>
			<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
				<i class="ki ki-close icon-xs text-muted"></i>
			</a>
		</div>
		<!--end::Header-->
		<!--begin::Content-->
		<div class="offcanvas-content pr-5 mr-n5">
			<!--begin::Header-->
			<div class="d-flex align-items-center mt-5">
				<div class="symbol symbol-100 mr-5">

					<div class="symbol-label" style="background-image:url('assets/media/foto_customer/<?php echo $this->session->userdata('cust_foto') ?> ')"></div>
					<i class="symbol-badge bg-success"></i>
				</div>
				<div class="d-flex flex-column">
					<span class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?php echo $this->session->userdata('cust_nama') ?></span>

					<div class=" navi mt-2">
						<span class="navi-item">
							<span class="navi-link p-0 pb-2">
								<span class="navi-icon mr-1">
									<span class="svg-icon svg-icon-lg svg-icon-primary">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
												<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</span>
								<span class="navi-text text-muted text-hover-primary disabled"><?php echo $this->session->userdata('cust_email') ?></span>

							</span>

						</span>

						<a href="main/profile" class="btn btn-sm btn-light-warning font-weight-bolder py-2 px-5">Edit</a>

						<a href="Javascript: Logout()" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>



					</div>
				</div>
			</div>
			<div class="separator separator-dashed mt-8 mb-5"></div>
			<!--end::Separator-->
			<!--begin::Nav-->
			<div class="navi navi-spacer-x-0 p-0">
				<!--begin::Item-->
				<a href="main/belum_bayar" class="navi-item">
					<div class="navi-link">
						<div class="symbol symbol-40 bg-light mr-3">
							<div class="symbol-label">
								<span class="svg-icon svg-icon-md svg-icon-success">
									<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
									<i class="la la-wallet la-2x  text-danger"></i>
									<!--end::Svg Icon-->
								</span>
							</div>
						</div>
						<?php


						$query_jml_belum_byr	= "	SELECT COUNT(*) AS jml_belum_byr FROM v_keranjang WHERE keranjang_status = 'Sudah Checkout' AND keranjang_cust_id =" . $cust_id . "";
						$rhNum			= $this->db->query($query_jml_belum_byr);
						$rrNum			= $rhNum->row();
						$jml_belum_byr		= $rrNum->jml_belum_byr;
						$data['jml_blm_byr']		= $jml_belum_byr; ?>
						<div class="navi-text">
							<span class="font-weight-bold">Belum Bayar</span>
							<?php if ($jml_belum_byr > 0) {
							?>
								<span class="label label-sm label-rounded label-light-danger"><?php echo $jml_belum_byr ?></span>
							<?php
							}
							?>
							<div class="text-muted">Menunggu Pembayaran
							</div>
						</div>
						<?php
						?>
					</div>
				</a>
				<!--end:Item-->
				<!--begin::Item-->
				<a href="main/menunggu_verifikasi" class="navi-item">
					<div class="navi-link">
						<div class="symbol symbol-40 bg-light mr-3">
							<div class="symbol-label">
								<span class="svg-icon svg-icon-md svg-icon-success">
									<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
									<i class="la la-clipboard-check la-2x  text-warning"></i>
									<!--end::Svg Icon-->
								</span>
							</div>
						</div>
						<?php


						$query_jml_menunggu_verif	= "	SELECT COUNT(*) AS jml_menunggu_verif FROM v_keranjang WHERE keranjang_status = 'Menunggu Verifikasi' AND keranjang_cust_id =" . $cust_id . "";
						$rhNum			= $this->db->query($query_jml_menunggu_verif);
						$rrNum			= $rhNum->row();
						$jml_menunggu_verif		= $rrNum->jml_menunggu_verif;
						$data['jml_blm_byr']		= $jml_menunggu_verif; ?>
						<div class="navi-text">
							<span class="font-weight-bold">Menunggu Verifikasi</span>
							<?php if ($jml_menunggu_verif > 0) {
							?>
								<span class="label label-sm label-rounded label-light-danger"><?php echo $jml_menunggu_verif ?></span>
							<?php
							}
							?>
							<div class="text-muted">Menunggu Verifikasi Pembayaran
							</div>
						</div>
						<?php
						?>
					</div>
				</a>
				<!--end:Item-->
				<!--begin::Item-->
				<!--end:Item-->
				<!--begin::Item-->
				<a href="main/barang_dikemas" class="navi-item">
					<div class="navi-link">
						<div class="symbol symbol-40 bg-light mr-3">
							<div class="symbol-label">
								<span class="svg-icon svg-icon-md svg-icon-success">
									<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
									<i class="la la-box-open la-2x  text-secondary"></i>
									<!--end::Svg Icon-->
								</span>
							</div>
						</div>
						<?php


						$query_jml_dikemas	= "	SELECT COUNT(*) AS jml_dikemas FROM v_keranjang WHERE keranjang_status = 'Sedang Dikemas' AND keranjang_cust_id =" . $cust_id . "";
						$rhNum			= $this->db->query($query_jml_dikemas);
						$rrNum			= $rhNum->row();
						$jml_dikemas		= $rrNum->jml_dikemas;
						$data['jml_blm_byr']		= $jml_dikemas; ?>
						<div class="navi-text">
							<span class="font-weight-bold">Dikemas</span>
							<?php if ($jml_dikemas > 0) {
							?>
								<span class="label label-sm label-rounded label-light-danger"><?php echo $jml_dikemas ?></span>
							<?php
							}
							?>
							<div class="text-muted">Pesanan Yang Sedang Dikemas
							</div>
						</div>
						<?php
						?>
					</div>
				</a>

				<a href="main/barang_dikirim" class="navi-item">
					<div class="navi-link">
						<div class="symbol symbol-40 bg-light mr-3">
							<div class="symbol-label">
								<span class="svg-icon svg-icon-md svg-icon-success">
									<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
									<i class="la la-truck-moving la-2x  text-info"></i>
									<!--end::Svg Icon-->
								</span>
							</div>
						</div>
						<?php


						$query_jml_dikirim	= "	SELECT COUNT(*) AS jml_dikirim FROM v_keranjang WHERE keranjang_status = 'Sudah Dikirim' AND keranjang_cust_id =" . $cust_id . "";
						$rhNum			= $this->db->query($query_jml_dikirim);
						$rrNum			= $rhNum->row();
						$jml_dikirim		= $rrNum->jml_dikirim;
						$data['jml_blm_byr']		= $jml_dikirim; ?>
						<div class="navi-text">
							<span class="font-weight-bold">Dikirim</span>
							<?php if ($jml_dikirim > 0) {
							?>
								<span class="label label-sm label-rounded label-light-danger"><?php echo $jml_dikirim ?></span>
							<?php
							}
							?>
							<div class="text-muted">Pesanan Yang Sudah Dikirim
							</div>
						</div>
						<?php
						?>
					</div>
				</a>
				<a href="main/barang_diterima" class="navi-item">
					<div class="navi-link">
						<div class="symbol symbol-40 bg-light mr-3">
							<div class="symbol-label">
								<span class="svg-icon svg-icon-md svg-icon-success">
									<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
									<i class="la la-clipboard-check la-2x  text-success"></i>
									<!--end::Svg Icon-->
								</span>
							</div>
						</div>
						<?php


						$query_jml_diterima	= "	SELECT COUNT(*) AS jml_diterima FROM v_keranjang WHERE keranjang_status = 'Pesanan Diterima' AND keranjang_cust_id =" . $cust_id . "";
						$rhNum			= $this->db->query($query_jml_diterima);
						$rrNum			= $rhNum->row();
						$jml_diterima		= $rrNum->jml_diterima;
						$data['jml_diterima']		= $jml_diterima; ?>
						<div class="navi-text">
							<span class="font-weight-bold">Selesai</span>
							<?php if ($jml_diterima > 0) {
							?>
								<span class="label label-sm label-rounded label-light-danger"><?php echo $jml_diterima ?></span>
							<?php
							}
							?>
							<div class="text-muted">Pesanan Yang Sudah Sampai
							</div>
						</div>
						<?php
						?>
					</div>
				</a>
				<!--end:Item-->
			</div>
			<!--end::Header-->
		</div>
		<!--end::Content-->
	</div>
	<!-- end::User Panel-->
	<!--begin::Quick Cart-->
	<div id="kt_quick_cart" class="offcanvas offcanvas-right p-10">
		<!--begin::Header-->
		<div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
			<h4 class="font-weight-bold m-0">Shopping Cart</h4>
			<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
				<i class="ki ki-close icon-xs text-muted"></i>
			</a>
		</div>
		<!--end::Header-->
		<!--begin::Content-->
		<div class="offcanvas-content">
			<!--begin::Wrapper-->
			<div class="offcanvas-wrapper mb-5 scroll-pull">
				<?php
				$cust_id        = $this->session->userdata('cust_id');
				if (empty($cust_id)) {
					$cust_id = 0;
				}
				$query_keranjang = $this->db->query("SELECT * FROM v_keranjang_detail WHERE keranjang_cust_id =" . $cust_id . "");
				$total = 0;
				foreach ($query_keranjang->result() as $produk) {
					$keranjang_dtl_id = $produk->keranjang_dtl_id;
					$produk_id = $produk->keranjang_dtl_prod_id;
					$produk_nama = $produk->produk_nama;
					$keranjang_qty = $produk->keranjang_dtl_qty;
					$produk_foto =   $produk->produk_foto;
					$produk_harga = $produk->produk_harga;
					$subtotal = $produk->subtotal;
					$total += $subtotal;

				?>
					<div class="d-flex align-items-center justify-content-between py-8">
						<div class="d-flex flex-column mr-2">
							<a href="#" class="font-weight-bold text-dark text-hover-primary"><?php echo $produk_nama ?></a>
							<div class="d-flex align-items-center mt-2">
								<span class="font-weight-bold mr-1 text-dark-75 font-size-lg">Rp.<?php echo number_format("$produk_harga", 0, ",", "."); ?></span>
								<span class="text-muted mr-1"> for </span>
								<a href="<?php echo base_url() ?>main/cart/crud_kurang/?keranjang_dtl_id=<?= $keranjang_dtl_id; ?>" class="btn btn-xs btn-light-success btn-icon mr-2">
									<i class="ki ki-minus icon-xs"></i>
								</a>
								<span class="font-weight-bold mr-2 text-dark-75 font-size-lg"><?php echo $keranjang_qty; ?></span>
								<a href="<?php echo base_url() ?>main/cart/crud_tambah/?keranjang_dtl_id=<?= $keranjang_dtl_id; ?>" class="btn btn-xs btn-light-success btn-icon">
									<i class="ki ki-plus icon-xs"></i>
								</a>
							</div>
						</div>
						<div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
							<div class="symbol-label"> <img src="<?php echo $produk_foto; ?>" alt="" class="mw-100 w-200px" />
							</div>
						</div>
					</div>
					<!--end::Item-->
					<div class="separator separator-solid"></div>
				<?php
				}
				?>

			</div>
			<!--end::Wrapper-->
			<!--begin::Purchase-->
			<div class="offcanvas-footer">
				<div class="d-flex align-items-center justify-content-between mb-4">
					<span class="font-weight-bold text-muted font-size-md mr-2">Total</span>
					<span class="font-weight-bolder text-dark-50 text-right">Rp.<?php echo number_format("$total", 0, ",", "."); ?></span>
				</div>
				<div class="separator separator-solid"></div>

				<div class="text-right mt-2">
					<a href="<?= base_url() ?>main/cart" class="btn btn-primary text-weight-bold">Place Order</a>
				</div>
			</div>
			<!--end::Purchase-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Quick Cart-->
	<!--begin::Quick Panel-->

	<div class="footer bg-white py-4 d-flex flex-lg-column  print  bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-33.jpg');" id="kt_footer">
		<!--begin::Container-->
		<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between  print">
			<!--begin::Copyright-->
			<div class="text-dark order-2 order-md-1 print">
				<span class="text-muted font-weight-bold mr-2 print">2023©</span>
				<a href="#" class="text-dark-75 text-hover-primary print">Firenze_Higa</a>
			</div>
			<!--end::Copyright-->
			<!--begin::Nav-->
			<div class="nav nav-dark">

			</div>
			<!--end::Nav-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Quick Panel-->
	<!--begin::Chat Panel-->

	<!--end::Chat Panel-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop">
		<span class="svg-icon">
			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<polygon points="0 0 24 0 24 24 0 24" />
					<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
					<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
				</g>
			</svg>
			<!--end::Svg Icon-->
		</span>
	</div>
	<!--end::Scrolltop-->
	<!--begin::Sticky Toolbar-->

	<!--end::Sticky Toolbar-->
	<!--begin::Demo Panel-->

	<!--end::Demo Panel-->
	<script>
		var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
	</script>
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>
		var KTAppSettings = {
			"breakpoints": {
				"sm": 576,
				"md": 768,
				"lg": 992,
				"xl": 1200,
				"xxl": 1400
			},
			"colors": {
				"theme": {
					"base": {
						"white": "#ffffff",
						"primary": "#3699FF",
						"secondary": "#E5EAEE",
						"success": "#1BC5BD",
						"info": "#8950FC",
						"warning": "#FFA800",
						"danger": "#F64E60",
						"light": "#E4E6EF",
						"dark": "#181C32"
					},
					"light": {
						"white": "#ffffff",
						"primary": "#E1F0FF",
						"secondary": "#EBEDF3",
						"success": "#C9F7F5",
						"info": "#EEE5FF",
						"warning": "#FFF4DE",
						"danger": "#FFE2E5",
						"light": "#F3F6F9",
						"dark": "#D6D6E0"
					},
					"inverse": {
						"white": "#ffffff",
						"primary": "#ffffff",
						"secondary": "#3F4254",
						"success": "#ffffff",
						"info": "#ffffff",
						"warning": "#ffffff",
						"danger": "#ffffff",
						"light": "#464E5F",
						"dark": "#ffffff"
					}
				},
				"gray": {
					"gray-100": "#F3F6F9",
					"gray-200": "#EBEDF3",
					"gray-300": "#E4E6EF",
					"gray-400": "#D1D3E0",
					"gray-500": "#B5B5C3",
					"gray-600": "#7E8299",
					"gray-700": "#5E6278",
					"gray-800": "#3F4254",
					"gray-900": "#181C32"
				}
			},
			"font-family": "Poppins"
		};
	</script>
	<!--end::Global Config-->
	<!--begin::Global Theme Bundle(used by all pages)-->

	<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
<script type="text/javascript">
	function Logout() {
		Swal.fire({
			title: "Anda Yakin?",
			text: "Anda akan keluar!",
			icon: "question",
			showCancelButton: true,
			confirmButtonText: "Ya!"
		}).then(function(result) {
			if (result.value == true) {
				window.location.href = "<?php echo base_url() ?>/auth/logout";

			}
		});
	}
</script>