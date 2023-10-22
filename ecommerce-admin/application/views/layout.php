<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="<?php echo base_url(); ?>">
	<meta charset="utf-8" />
	<title>Admin | <?= $title ?></title>
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
	
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	<script src="assets/plugins/global/plugins.bundle.js?v=7.0.4"></script>
	<script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4"></script>
	<script src="assets/js/scripts.bundle.js?v=7.0.4"></script>

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
	<!-- Autonumeric -->
</head>

<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed">
	<!--begin::Main-->
	<!--begin::Header Mobile-->
	
	<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed print">
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
				<div id="kt_header" class="header header-fixed bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-33.jpg');" >
					<!--begin::Container-->
					<div class=" container-fluid d-flex align-items-stretch justify-content-between">
					<!--begin::Header Menu Wrapper-->
					<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
						<div class="header-logo print">
							<a href="<?= base_url() ?>main/dashboard">
								<img alt="Logo" src="assets/media/logos/logo-default1.png" />
							</a>
						</div>
						<!--end::Header Logo-->
						<!--begin::Header Menu-->
						<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
							<!--begin::Header Nav-->
							<ul class="menu-nav">
								<?php
								$admin_id = $this->session->userdata('admin_id');
								if ($admin_id != 6) {


								?>
									<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
										<a href="javascript:;" class="menu-link menu-toggle">
											<span class="menu-text">MASTER DATA</span>
											<i class="menu-arrow"></i>
										</a>
										<div class="menu-submenu menu-submenu-classic menu-submenu-left">
											<ul class="menu-subnav">
												<li class="menu-item menu-item-submenu" aria-haspopup="true">
													<a href="main/customer" class="menu-link">
														<span class="svg-icon menu-icon">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Clothes/Briefcase.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24" />
																	<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																	<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="menu-text">Data Customer</span>
													</a>
												</li>
												<li class="menu-item menu-item-submenu" aria-haspopup="true">
													<a href="main/product" class="menu-link">
														<span class="svg-icon menu-icon">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Clothes/Briefcase.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<path d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z" fill="#000000" opacity="0.3" />
																	<polygon fill="#000000" points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="menu-text">Data Produk</span>
													</a>
												</li>

												<li class="menu-item" aria-haspopup="true">
													<a href="main/payment_method" class="menu-link">
														<span class="svg-icon menu-icon">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Spam.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2" />
																	<rect fill="#000000" x="2" y="8" width="20" height="3" />
																	<rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="menu-text">Data Metode Pembayaran</span>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="main/delivery" class="menu-link">
														<span class="svg-icon menu-icon">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Spam.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<path d="M8,4 C8.55228475,4 9,4.44771525 9,5 L9,17 L18,17 C18.5522847,17 19,17.4477153 19,18 C19,18.5522847 18.5522847,19 18,19 L9,19 C8.44771525,19 8,18.5522847 8,18 C7.44771525,18 7,17.5522847 7,17 L7,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L8,4 Z" fill="#000000" opacity="0.3" />
																	<rect fill="#000000" opacity="0.3" x="11" y="7" width="8" height="8" rx="4" />
																	<circle fill="#000000" cx="8" cy="18" r="3" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="menu-text">Data Ekspedisi</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
										<a href="javascript:;" class="menu-link menu-toggle">
											<span class="menu-text">PESANAN</span>
											<i class="menu-arrow"></i>
										</a>
										<div class="menu-submenu menu-submenu-classic menu-submenu-left">
											<ul class="menu-subnav">
												<li class="menu-item" aria-haspopup="true">
													<a href="main/order_verif" class="menu-link">
														<span class="svg-icon menu-icon">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Safe-chat.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<path d="M19.5,10.5 L21,10.5 C21.8284271,10.5 22.5,11.1715729 22.5,12 C22.5,12.8284271 21.8284271,13.5 21,13.5 L19.5,13.5 C18.6715729,13.5 18,12.8284271 18,12 C18,11.1715729 18.6715729,10.5 19.5,10.5 Z M16.0606602,5.87132034 L17.1213203,4.81066017 C17.7071068,4.22487373 18.6568542,4.22487373 19.2426407,4.81066017 C19.8284271,5.39644661 19.8284271,6.34619408 19.2426407,6.93198052 L18.1819805,7.99264069 C17.5961941,8.57842712 16.6464466,8.57842712 16.0606602,7.99264069 C15.4748737,7.40685425 15.4748737,6.45710678 16.0606602,5.87132034 Z M16.0606602,18.1819805 C15.4748737,17.5961941 15.4748737,16.6464466 16.0606602,16.0606602 C16.6464466,15.4748737 17.5961941,15.4748737 18.1819805,16.0606602 L19.2426407,17.1213203 C19.8284271,17.7071068 19.8284271,18.6568542 19.2426407,19.2426407 C18.6568542,19.8284271 17.7071068,19.8284271 17.1213203,19.2426407 L16.0606602,18.1819805 Z M3,10.5 L4.5,10.5 C5.32842712,10.5 6,11.1715729 6,12 C6,12.8284271 5.32842712,13.5 4.5,13.5 L3,13.5 C2.17157288,13.5 1.5,12.8284271 1.5,12 C1.5,11.1715729 2.17157288,10.5 3,10.5 Z M12,1.5 C12.8284271,1.5 13.5,2.17157288 13.5,3 L13.5,4.5 C13.5,5.32842712 12.8284271,6 12,6 C11.1715729,6 10.5,5.32842712 10.5,4.5 L10.5,3 C10.5,2.17157288 11.1715729,1.5 12,1.5 Z M12,18 C12.8284271,18 13.5,18.6715729 13.5,19.5 L13.5,21 C13.5,21.8284271 12.8284271,22.5 12,22.5 C11.1715729,22.5 10.5,21.8284271 10.5,21 L10.5,19.5 C10.5,18.6715729 11.1715729,18 12,18 Z M4.81066017,4.81066017 C5.39644661,4.22487373 6.34619408,4.22487373 6.93198052,4.81066017 L7.99264069,5.87132034 C8.57842712,6.45710678 8.57842712,7.40685425 7.99264069,7.99264069 C7.40685425,8.57842712 6.45710678,8.57842712 5.87132034,7.99264069 L4.81066017,6.93198052 C4.22487373,6.34619408 4.22487373,5.39644661 4.81066017,4.81066017 Z M4.81066017,19.2426407 C4.22487373,18.6568542 4.22487373,17.7071068 4.81066017,17.1213203 L5.87132034,16.0606602 C6.45710678,15.4748737 7.40685425,15.4748737 7.99264069,16.0606602 C8.57842712,16.6464466 8.57842712,17.5961941 7.99264069,18.1819805 L6.93198052,19.2426407 C6.34619408,19.8284271 5.39644661,19.8284271 4.81066017,19.2426407 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<?php
														$query_jml_verif	= "	SELECT COUNT(*) AS jml_verif FROM v_keranjang WHERE keranjang_status = 'Menunggu Verifikasi'";
														$rhNum			= $this->db->query($query_jml_verif);
														$rrNum			= $rhNum->row();
														$jml_verif	= $rrNum->jml_verif;
														$data['jml_verif']		= $jml_verif;
														?>
														<span class="menu-text">Verifikasi Pesanan</span>
														<?php if ($jml_verif > 0) {
														?>
															<span class="label  label-rounded label-light-danger"><?= $jml_verif ?></span>
														<?php
														}
														?>

														<?php
														?>
													</a>
												</li>
												<li class="menu-item" aria-haspopup="true">
													<a href="main/order_proses" class="menu-link">
														<span class="svg-icon menu-icon">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Safe-chat.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<path d="M8,17 C8.55228475,17 9,17.4477153 9,18 L9,21 C9,21.5522847 8.55228475,22 8,22 L3,22 C2.44771525,22 2,21.5522847 2,21 L2,18 C2,17.4477153 2.44771525,17 3,17 L3,16.5 C3,15.1192881 4.11928813,14 5.5,14 C6.88071187,14 8,15.1192881 8,16.5 L8,17 Z M5.5,15 C4.67157288,15 4,15.6715729 4,16.5 L4,17 L7,17 L7,16.5 C7,15.6715729 6.32842712,15 5.5,15 Z" fill="#000000" opacity="0.3" />
																	<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<?php
														$query_jml_dikemas	= "	SELECT COUNT(*) AS jml_dikemas FROM v_keranjang WHERE keranjang_status = 'Sedang Dikemas'";
														$rhNum			= $this->db->query($query_jml_dikemas);
														$rrNum			= $rhNum->row();
														$jml_dikemas	= $rrNum->jml_dikemas;
														$data['jml_dikemas']		= $jml_dikemas;
														?>
														<span class="menu-text">Update Resi</span>
														<?php if ($jml_dikemas > 0) {
														?>
															<span class="label  label-rounded label-light-danger"><?= $jml_dikemas ?></span>
														<?php
														}
														?>

														<?php
														?>
													</a>
												</li>


											</ul>
										</div>
									</li>
								<?php
								}
								?>

								<?php
								$admin_id = $this->session->userdata('admin_id');
								if ($admin_id == 6) {


								?>
								<ul class="menu-nav">
									<li class="menu-item">
										<a href="<?= base_url() ?>main/admin" class="menu-link ">
											<span class="menu-text">
												DATA ADMIN</span>
										</a>
									</li>
								</ul>
								<?php
								}
								?>
								<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="menu-text">LAPORAN</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu menu-submenu-classic menu-submenu-left">
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="main/laporan_pesanan" class="menu-link">
													<span class="svg-icon menu-icon">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Safe-chat.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
																<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<span class="menu-text">Penjualan
													</span>


												</a>

											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="main/laporan_pesanan_detail" class="menu-link">
													<span class="svg-icon menu-icon">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Safe-chat.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M19.5,10.5 L21,10.5 C21.8284271,10.5 22.5,11.1715729 22.5,12 C22.5,12.8284271 21.8284271,13.5 21,13.5 L19.5,13.5 C18.6715729,13.5 18,12.8284271 18,12 C18,11.1715729 18.6715729,10.5 19.5,10.5 Z M16.0606602,5.87132034 L17.1213203,4.81066017 C17.7071068,4.22487373 18.6568542,4.22487373 19.2426407,4.81066017 C19.8284271,5.39644661 19.8284271,6.34619408 19.2426407,6.93198052 L18.1819805,7.99264069 C17.5961941,8.57842712 16.6464466,8.57842712 16.0606602,7.99264069 C15.4748737,7.40685425 15.4748737,6.45710678 16.0606602,5.87132034 Z M16.0606602,18.1819805 C15.4748737,17.5961941 15.4748737,16.6464466 16.0606602,16.0606602 C16.6464466,15.4748737 17.5961941,15.4748737 18.1819805,16.0606602 L19.2426407,17.1213203 C19.8284271,17.7071068 19.8284271,18.6568542 19.2426407,19.2426407 C18.6568542,19.8284271 17.7071068,19.8284271 17.1213203,19.2426407 L16.0606602,18.1819805 Z M3,10.5 L4.5,10.5 C5.32842712,10.5 6,11.1715729 6,12 C6,12.8284271 5.32842712,13.5 4.5,13.5 L3,13.5 C2.17157288,13.5 1.5,12.8284271 1.5,12 C1.5,11.1715729 2.17157288,10.5 3,10.5 Z M12,1.5 C12.8284271,1.5 13.5,2.17157288 13.5,3 L13.5,4.5 C13.5,5.32842712 12.8284271,6 12,6 C11.1715729,6 10.5,5.32842712 10.5,4.5 L10.5,3 C10.5,2.17157288 11.1715729,1.5 12,1.5 Z M12,18 C12.8284271,18 13.5,18.6715729 13.5,19.5 L13.5,21 C13.5,21.8284271 12.8284271,22.5 12,22.5 C11.1715729,22.5 10.5,21.8284271 10.5,21 L10.5,19.5 C10.5,18.6715729 11.1715729,18 12,18 Z M4.81066017,4.81066017 C5.39644661,4.22487373 6.34619408,4.22487373 6.93198052,4.81066017 L7.99264069,5.87132034 C8.57842712,6.45710678 8.57842712,7.40685425 7.99264069,7.99264069 C7.40685425,8.57842712 6.45710678,8.57842712 5.87132034,7.99264069 L4.81066017,6.93198052 C4.22487373,6.34619408 4.22487373,5.39644661 4.81066017,4.81066017 Z M4.81066017,19.2426407 C4.22487373,18.6568542 4.22487373,17.7071068 4.81066017,17.1213203 L5.87132034,16.0606602 C6.45710678,15.4748737 7.40685425,15.4748737 7.99264069,16.0606602 C8.57842712,16.6464466 8.57842712,17.5961941 7.99264069,18.1819805 L6.93198052,19.2426407 C6.34619408,19.8284271 5.39644661,19.8284271 4.81066017,19.2426407 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<span class="menu-text">Penjualan Detail
													</span>


												</a>

											</li>



										</ul>
									</div>
								</li>
							</ul>
							<!--end::Header Nav-->
						</div>
						<!--end::Header Menu-->
					</div>

					<!-- buat cart sidebar -->
					<!--role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"-->
					<div class="topbar">


						<div class="topbar-item">
							<?php
							$admin_id = $this->session->userdata('admin_id');

							if ($admin_id == 6) {

								$salam    = 'Hi,';
							} else {

								$salam    = 'Hi Admin,';
							}

							?>
							<div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
								<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"><?php echo $salam; ?></span>
								<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><?php echo $this->session->userdata('admin_nama') ?></span>
								<span class="symbol symbol-35 symbol-light-success">
									<span class="symbol-label font-size-h5 font-weight-bold" style="background-image:url('assets/media/foto_admin/<?php echo $this->session->userdata('admin_foto') ?> ')"></span>
								</span>
							</div>
						</div>


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

					<div class="symbol-label" style="background-image:url('assets/media/foto_admin/<?php echo $this->session->userdata('admin_foto') ?> ')"></div>
					<i class="symbol-badge bg-success"></i>
				</div>
				<div class="d-flex flex-column">
					<span class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?php echo $this->session->userdata('admin_nama') ?></span>

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
								<span class="navi-text text-muted text-hover-primary disabled"><?php echo $this->session->userdata('admin_email') ?></span>

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

			<!--end::Header-->
		</div>
		<!--end::Content-->
	</div>
	<!-- end::User Panel-->
	<!--begin::Quick Cart-->

	<!--end::Quick Cart-->
	<!--begin::Quick Panel-->

	<div class="footer bg-white py-5 d-flex flex-lg-column print" id="kt_footer" style="background-image: url('assets/media/bg/bg-33.jpg');">
		<!--begin::Container-->
		<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between print">
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