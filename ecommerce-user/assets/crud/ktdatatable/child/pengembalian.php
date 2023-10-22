<link href="assets/bower_components/bootstrap-table/bootstrap-table.css" rel="stylesheet" type="text/css">
<style>
	.table_report {
		table-layout: fixed;
	}

	.select2-container {
		width: 100% !important;
		padding: 0;
	}
</style>

<div class="subheader py-2 py-lg-10 subheader-transparent" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<div class="d-flex align-items-center flex-wrap mr-1">
			<div class="d-flex flex-column">
				<h3 class="font-weight-boldest mr-5"><?= $config->conf_devices_app_name ?></h3>
				<div class="d-flex align-items-center font-weight-bold">
					<span class="label label-dot label-sm bg-info opacity-75 mx-3"></span>
					<a href="javascript:void(0)" class="text-muted text-muted opacity-75 hover-opacity-100"><?= $main_title ?></a>
					<span class="label label-dot label-sm bg-info opacity-75 mx-3"></span>
					<a href="<?php echo base_url() . $class . '/' . $method ?>" class="text-muted text-hover-primary opacity-75 hover-opacity-100"><?= $title ?></a>
				</div>
			</div>
		</div>
		<div class="card-toolbar mt-3 mb-3">
			<a href="#" data-toggle="modal" data-target="#formModalHeader" class="btn btn-primary font-weight-bolder fix140 " id="btn_hd">
				<i class="fas fa-user-plus icon-md"></i>
				Pengembalian Buku
			</a>
			&nbsp;&nbsp;

			&nbsp;&nbsp;
			<a href="<?php echo base_url() . $class . '/' . $method; ?>" class="btn btn-danger font-weight-bolder fix150" id="btn_reset">
				<i class="fas fa-undo icon-md"></i>
				Keluar
			</a>
		</div>
	</div>
</div>
<div class="d-flex flex-column-fluid">
	<div class="container-fluid">
		<?php
		if (empty($rNum)) {
		?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card card-custom gutter-b">
						<div class="card-header flex-wrap py-3">
							<div class="card-title">
								<h3 class="card-label">Pengembalian
									<span class="d-block text-muted pt-2 font-size-sm">Informasi Pengembalian</span>
								</h3>
							</div>
						</div>
						<div class="card-body">
							<table id="table_hd" class="table_report" data-toggle="table" data-height="350" data-show-columns="false" data-search="true" data-show-toggle="false" data-pagination="true" data-page-list="[100, 500, 1000]" data-page-size="100" data-show-export=" false">
								<thead>
									<tr>
										<th data-field="row_id" data-visible="false">ID</th>
										<th data-width="60" data-align="center">Action</th>
										<th data-sortable="true" data-width="50" data-align="center">No</th>
										<th data-sortable="true" data-width="125">Nama Anggota/Peminjam</th>
										<th data-sortable="true" data-width="150">Tanggal Pengembalian</th>
										<th data-sortable="true" data-width="150">Status</th>

								</thead>
								<tbody>
									<?php
									$no = 0;
									foreach ($query_hd->result() as $row_hd) {
										$no++;
										$kembali_id	= $row_hd->kembali_id;
										$agt_nama		= $row_hd->agt_nama;
										$kembali_tgl     = $row_hd->kembali_tgl;
									?>
										<tr class="tr-class-<?php echo $no ?> ">
											<td><?php echo $kembali_id; ?></td>
											<td>
												<span class="dropdown">
													<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
														<i class="la la-ellipsis-h"></i>
													</a>
													<div class="dropdown-menu">
														<?php
														if ($config->conf_devices_level == 1) {
														?>
															<a class="dropdown-item ubah_pegawai" kembali-id="<?php echo $kembali_id; ?>" href="Javascript: setUbah(<?php echo $kembali_id; ?>)"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;Detail</a>
														<?php
														}
														?>
														<a class="dropdown-item ubah_pegawai" href="<?php echo base_url() . $class . '/' . $method . '/del_hd/?rNum=' . $kembali_id; ?>">
															<i class="far fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Hapus Data
														</a>
													</div>
												</span>
											</td>
											<td><?php echo $no ?></td>
											<td><?php echo $row_hd->agt_nama; ?></td>
											<td><?php echo $row_hd->tgl_kembali; ?></td>
											<td><?php echo $row_hd->status; ?></td>

										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		<?php
		} else {
		?>
			<div class="row">
				<div class="col-lg-5">
					<div class="card card-custom gutter-b">
						<div class="card-header flex-wrap py-3">
							<div class="card-title">
								<h3 class="card-label">Daftar Buku Yang Dipinjam
									<span class="d-block text-muted pt-2 font-size-sm">Informasi Data Buku Yang Dipinjam</span>
								</h3>
							</div>
							<div class="card-toolbar">
							</div>
						</div>
						<div class="card-body">
							<table id="table_prod" class="table_report" data-toggle="table" data-height="300" data-show-columns="false" data-search="true" data-show-toggle="false" data-pagination="true" data-page-list="[100, 500, 1000]" data-page-size="1000" data-show-export="false">
								<thead>
									<tr>
										<th data-width="60" data-align="center">Add</th>
										<th data-sortable="true" data-width="110">Judul Buku</th>
										<th data-sortable="true" data-width="100">Qty Pinjam</th>
										<th data-sortable="true" data-width="100">Qty Kembali</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no	= 0;
									foreach ($query_buku->result() as $row_buku) {
										$no++;
										$buku_id	= $row_buku->buku_id;
										$buku_judul	= $row_buku->buku_judul;
										$query_qty		= " SELECT sum(pinjam_dtl_qty) AS qty_pinjam FROM pinjam_detail, peminjaman WHERE pinjam_detail.pinjam_id = peminjaman.pinjam_id AND agt_id = " . $agt_id . " AND pinjam_detail.buku_id = " . $buku_id . "";
										$rest_qty			= $this->db->query($query_qty);
										$row_qty			= $rest_qty->row();

										$qty_pinjam			= $row_qty->qty_pinjam;

										$query_qty		= " SELECT sum(kembali_dtl_qty) AS qty_kembali FROM kembali_detail, Pengembalian WHERE kembali_detail.kembali_id = Pengembalian.kembali_id AND agt_id = " . $agt_id . " AND kembali_detail.buku_id = " . $buku_id . "";
										$rest_qty			= $this->db->query($query_qty);
										$row_qty			= $rest_qty->row();
										$qty_kembali		= $row_qty->qty_kembali;

										if ($qty_pinjam > $qty_kembali) {
									?>
											<tr class="tr-class-<?php echo $no ?> ">
												<td>
													<a href="<?php echo base_url() . $class . '/' . $method . '/add_dtl/?rNum=' . $rNum . '&buku_id=' . $buku_id; ?>">
														<i class="fas fa-plus"></i>
													</a>

												</td>
												<td><?php echo $row_buku->buku_judul; ?></td>
												<td><?php echo $qty_pinjam; ?></td>
												<td><?php echo $qty_kembali; ?></td>

											</tr>
									<?php

										}
									}
									?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="card card-custom gutter-b">
						<div class="card-header flex-wrap py-3">
							<div class="card-title">
								<h3 class="card-label">Buku yang Ingin Dikembalikan
							</div>
							<div class="card-toolbar">
								<?php
								if ($flag_simpan == 'f') {
								?>
									<button class="btn btn-info font-weight-bolder fix200" id="submit_simpan" value="simpan">
										<i class="fas fa-check-circle icon-md"></i>
										Update Pinjaman
									</button>
								<?php
								}
								?>
							</div>
						</div>
						<div class="card-body">
							<form id="form_crud" action="<?= base_url() . $class . '/' . $method . '/crud_cart/?rNum=' . $rNum ?>" method="post" class="" novalidate>
								<table id="table_dt" class="table_report" data-toggle="table" data-height="300" data-show-columns="false" data-search="false" data-show-toggle="false" data-pagination="true" data-page-list="[100, 500, 1000]" data-page-size="1000" data-show-export="false">
									<thead>
										<tr>
											<th data-field="row_id" data-visible="false">ID</th>
											<th data-sortable="false" data-width="65" data-align="center"><input type="checkbox" name="checked_all" id="checked_all" /></th>
											<th data-sortable="true" data-width="50" data-align="left">No</th>
											<th data-sortable="true" data-width="225">Judul Buku</th>
											<th data-sortable="true" data-width="85" data-align="right">Qty</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$no	= 0;
										foreach ($query_dtl->result() as $row_dtl) {
											$no++;
											$kembali_dtl_id	= $row_dtl->kembali_dtl_id;
											$buku_id		= $row_dtl->buku_id;
											$buku_judul		= $row_dtl->buku_judul;
											$kembali_dtl_qty = $row_dtl->kembali_dtl_qty;


										?>
											<tr class="tr-class-<?php echo $no ?> ">
												<td><?php echo $kembali_dtl_id; ?></td>
												<td>
													<?php
													if ($flag_simpan == 'f') {
													?>
														<input type="hidden" name="row_id_<?php echo $no; ?>" id="row_id_<?php echo $no; ?>" value="<?php echo $kembali_dtl_id; ?>" /><input type="checkbox" name="checked_<?php echo $no; ?>" id="checked_<?php echo $no; ?>" value="t" />
													<?php
													}
													?>
												</td>
												<td><?php echo $no ?></td>
												<td><?php echo $row_dtl->buku_judul; ?><input type="hidden" name="row_buku_id_<?php echo $no; ?>" id="row_buku_id_<?php echo $no; ?>" value="<?php echo $buku_id; ?>" /></td>

												<?php
												if ($flag_simpan == 'f') {
												?>

													<td><input style="text-align:right;" type="number" class="form-control" id="row_qty_<?php echo $no ?>" name="row_qty_<?php echo $no ?>" value="<?php echo $kembali_dtl_qty ?>"></td>
												<?php
												}
												?>

											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
								<input type="hidden" class="form-control" id="submit_crud" name="submit_crud" value="">
								<input type="hidden" class="form-control" id="count_dt" name="count_dt" value="<?php echo $no ?>">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<div class="card card-custom gutter-b">

						<div class="card-body">
							<form id="form_bayar" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url() . $class . '/' . $method; ?>/crud_bayar/?rNum=<?php echo $rNum ?>">
								<input type="hidden" id="action_crud" name="action_crud" value="">

								<div class="form-group row">
									<div class="col-lg-6 col-sm-6 col-xs-6">
										<button type="submit" class="btn btn-light-success font-weight-bolder col-lg-12 col-sm-12 col-xs-12 mt-8 mr-2" id="" name="" value="simpan">Proses</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</div>
<!-- MODAL HEADER -->
<div class="modal fade" id="formModalHeader" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="form_header" role="form" method="post" accept-charset="utf-8" action="<?php echo base_url() . $class . '/' . $method; ?>/crud_header/?rNum=<?php echo $rNum ?>">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabelHeader">Tambah Pengembalian</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close"></i>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" class="form-control" name="rNum" id="rNum" value="<?= $rNum; ?>">
					<div class="card-body">
						<div class="form-group">
							<label>Nama Anggota:</label>
							<select class="form-control select2" name="inp_pemb" id="inp_pemb" required>
								<option label="Label"></option>
								<?= $comboPeminjam; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="action_crud" name="action_crud" value="">
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary font-weight-bold" id="submit_simpan_hd" name="submit_simpan_hd" value="simpan_hd">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	var arrows;
	if (KTUtil.isRTL()) {
		arrows = {
			leftArrow: '<i class="la la-angle-right"></i>',
			rightArrow: '<i class="la la-angle-left"></i>'
		}
	} else {
		arrows = {
			leftArrow: '<i class="la la-angle-left"></i>',
			rightArrow: '<i class="la la-angle-right"></i>'
		}
	}

	jQuery(document).ready(function() {
		<?php
		if ($rNum > 0) {
		?>
			$("#cr_barcode").focus();
		<?php
		} else {
		?>
			$("#btn_umum").focus();
		<?php
		}
		?>

		$('#table_hd').on('dbl-click-row.bs.table', function(e, row, $element) {
			$(location).attr('href', '<?php echo current_url(); ?>/?rNum=' + row.row_id);
		});

		$('#cr_daterangepicker').daterangepicker({
			buttonClasses: ' btn',
			applyClass: 'btn-primary',
			cancelClass: 'btn-secondary'
		}, function(start, end, label) {
			$('#cr_daterangepicker .form-control').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
		});

		$('#inp_pemb').select2({
			placeholder: "Pilih Anggota",
			allowClear: true
		});

		$('#inp_cr_byr').select2({
			placeholder: "Pilih Cara Bayar",
			allowClear: true
		});

		$('#inp_jns_pemb').on('change', function() {
			var sel_id = $(this).val();

			if (sel_id > 0) {
				$.ajax({
					url: "<?php echo base_url() ?>Ajax/create_list/get_pihak",
					type: "POST",
					data: {
						'sel_id': sel_id
					},
					dataType: 'json',
					success: function(data) {
						$('#inp_pemb').html(data);
					},
					error: function() {
						//('Empty Data...!!');
					}
				});
			}
		});

		$('#checked_all').on('click', function() {
			var count_dt = $('#count_dt').val();
			var check_all_val = $(this).prop("checked");
			for (let i = 1; i <= count_dt; i++) {
				$('#checked_' + i).attr("checked", check_all_val);
			}
		});

		$("#submit_simpan").click(function() {
			document.getElementById("submit_crud").value = 'simpan';
			document.forms["form_crud"].submit();
		});


		$('#inp_disc_tmbhn').on('keyup', function() {
			$("#inp_bayar").val(addCommas(0));
			var netto = clearThousand($("#inp_netto").val());
			var disc_plus = clearThousand($("#inp_disc_tmbhn").val());
			var total = Number(netto) - Number(disc_plus);
			$("#inp_total").val(addCommas(total));
		});

		$('#inp_bayar').on('keyup', function() {
			var bayar = clearThousand($("#inp_bayar").val());
			var total = clearThousand($("#inp_total").val());
			var kembalian = Number(bayar) - Number(total);
			$("#inp_kembali").val(addCommas(kembalian));
		});
	});

	function clearThousand(theNumber) {
		var tstString = "";
		for (x = theNumber.length; x >= 0; x--) {
			if (theNumber.charAt(x) == ",") {} else {
				tstString = theNumber.charAt(x) + tstString;
			}
		}
		return tstString;
	}

	function addCommas(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
</script>