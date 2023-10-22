<!--begin::Subheader-->

<!--end::Subheader-->

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container mt-3">
		<!--begin::Card-->
    <form id="form_input" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" action="main/admin/crud">
		<div class="card card-custom card-sticky">
			<div class="card-header">
				<div class="card-title">
					<h3 class="card-label">Form Input Admin
						<i class="mr-2"></i>
						<small class="">Untuk menambah/mengubah data admin</small>
					</h3>
				</div>
			 <div class="card-toolbar">
                        <a href="<?php echo base_url() . $class . '/' . $method; ?>" class="btn btn-light-warning font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
                        <button class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class=""></i>Simpan</button>
                    </div>
			</div>
			<div class="card-body">
				<!--begin::Form-->
					<input type="hidden" id="action_crud" name="action_crud" value="">
					<div class="form-group row">
						<div class="col-lg-12" align="center">
							<div class="image-input image-input-outline" id="kt_image_1">
								<div class="image-input-wrapper" style="background-image: url(<?php echo $admin_foto ?>)"></div>
								<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen icon-sm text-muted"></i>
									<input type="file" id="profile_avatar" name="profile_avatar" accept=".png, .jpg, .jpeg" />
									<input type="hidden" id="profile_avatar_remove" name="profile_avatar_remove" />
								</label>
								<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
									<i class="ki ki-bold-close icon-xs text-muted"></i>
								</span>
							</div>
							<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Nama Lengkap:</label>
							<input type="text" class="form-control" placeholder="Isi Nama Lengkap" name="inp_nama" id="inp_nama" value="<?php echo $admin_nama ?>" required />
						</div>
						<div class="col-lg-6">
							<label>Username:</label>
							<input type="text" class="form-control" placeholder="Isi username" name="inp_username" id="inp_username" value="<?php echo $admin_username ?>" required />
						</div>
					</div>
					<div class="separator separator-dashed my-2"></div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Alamat Email:</label>
							<div class="input-group ">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="la la-at"></i>
									</span>
								</div>
								<input type="email" class="form-control" placeholder="Isi Email" name="inp_email" id="inp_email" value="<?php echo $admin_email ?>" required />
							</div>
						</div>
						<div class="col-lg-6">
							<label>No. HP/WA:</label>
							<div class="input-group ">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="la la-phone"></i>
									</span>
								</div>
								<input type="text" class="form-control" placeholder="Isi No. HP" name="inp_hp" id="inp_hp" value="<?php echo $admin_no_telp ?>" required />
							</div>
						</div>
					</div>
					<div class="separator separator-dashed my-2"></div>
					<div class="form-group row">
						<div class="col-lg-4">
							<label>Tempat:</label>
							<div class="input-group ">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="la la-map-marker"></i>
									</span>
								</div>
								<input type="text" class="form-control" placeholder="Isi Tempat Lahir" name="inp_tmpt_lhr" id="inp_tmpt_lhr" value="<?php echo $admin_tempat_lahir ?>" required />
							</div>
						</div>
						<div class="col-lg-4">
							<label>Tanggal Lahir:</label>
							<div class="input-group ">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="la la-calendar"></i>
									</span>
								</div>
								<input type="text" class="form-control" placeholder="Isi Tanggal Lahir" name="inp_tgl_lhr" id="inp_tgl_lhr" value="<?php echo $admin_tanggal_lahir ?>" required />
							</div>
						</div>
						<div class="col-lg-4">
							<label>Jenis Kelamin:</label>
							<div class="radio-inline">
								<label class="radio radio-primary">
									<input type="radio" name="inp_jk" id="inp_pria" <?php echo $checkedPria ?> value="P" />Pria&nbsp;
									<span></span></label>
								<label class="radio radio-success">
									<input type="radio" name="inp_jk" id="inp_wanita" <?php echo $checkedWanita ?> value="W" />Wanita&nbsp;
									<span></span></label>
							</div>
						</div>
					</div>
					<div class="separator separator-dashed my-2"></div>
					<div class="form-group row">
						<div class="col-lg-12">
							<label>Alamat:</label>
							<div class="input-group ">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="la la-map-marker"></i>
									</span>
								</div>
								<input type="text" class="form-control" placeholder="Isi Alamat" name="inp_almt" id="inp_almt" value="" required />
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->

<script>
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

           $('#inp_tgl_lhr').datepicker({
            rtl: KTUtil.isRTL(),
            orientation: "top left",
            todayHighlight: true,
            templates: arrows,
            format: 'dd/mm/yyyy',
        });

		const save_continue_button = document.getElementById('save_continue_button');
		const save_new_button = document.getElementById('save_new_button');
		const save_exit_button = document.getElementById('save_exit_button');
		const inputForm = document.getElementById('form_input');
		const fv = FormValidation.formValidation(inputForm, {
			fields: {
				inp_nama: {
					validators: {
						notEmpty: {
							message: 'Nama Lengkap wajib diisi'
						},
						stringLength: {
							min: 5,
							message: 'Nama Lengkap minimal 5 karakter'
						}
					}
				},
				inp_username: {
					validators: {
						notEmpty: {
							message: 'Username wajib diisi'
						},
						stringLength: {
							min: 6,
							max: 30,
							message: 'Username minimal 6 karakter dan maksimal 30 karakter'
						},
						regexp: {
							regexp: /^[a-zA-Z0-9_]+$/,
							message: 'Username hanya dapat diisi alphabet, angka dan garis bawah'
						}
					}
				},
				inp_email: {
					validators: {
						notEmpty: {
							message: 'Email wajib diisi'
						},
						emailAddress: {
							message: 'The value is not a valid email address'
						}
					}
				},
				inp_tgl_lhr: {
					validators: {
						notEmpty: {
							message: 'Tgl Lahir wajib diisi'
						},
					}
				},
				inp_almt: {
					validators: {
						notEmpty: {
							message: 'Alamat wajib diisi'
						},
					}
				},
				inp_kcmtn: {
					validators: {
						notEmpty: {
							message: 'Kecamatan wajib diisi'
						},
					}
				},
			},
			plugins: {
				trigger: new FormValidation.plugins.Trigger(),
				bootstrap: new FormValidation.plugins.Bootstrap(),

			},
		}).on('core.form.validating', function() {});

		save_continue_button.addEventListener('click', function() {
			fv.validate().then(function(status) {
				if (status == 'Valid') {
					Swal.fire({
						title: "Anda Yakin?",
						text: "Anda akan menyimpan dan tetap di halaman ini!",
						icon: "warning",
						showCancelButton: true,
						confirmButtonText: "Ya!"
					}).then(function(result) {
						if (result.value == true) {
							document.getElementById("action_crud").value = 'save_continue';
							document.forms["form_input"].submit();
						}
					});

				}
			});
		});

		save_new_button.addEventListener('click', function() {
			fv.validate().then(function(status) {
				if (status == 'Valid') {
					Swal.fire({
						title: "Anda Yakin?",
						text: "Anda akan menyimpan dan mmembuat data yang baru!",
						icon: "warning",
						showCancelButton: true,
						confirmButtonText: "Ya!"
					}).then(function(result) {
						if (result.value == true) {
							document.getElementById("action_crud").value = 'save_new';
							document.forms["form_input"].submit();
						}
					});

				}
			});
		});

		save_exit_button.addEventListener('click', function() {
			fv.validate().then(function(status) {
				if (status == 'Valid') {
					Swal.fire({
						title: "Anda Yakin?",
						text: "Anda akan menyimpan data ini!",
						icon: "warning",
						showCancelButton: true,
						confirmButtonText: "Ya!"
					}).then(function(result) {
						if (result.value == true) {
							document.getElementById("action_crud").value = 'save_exit';
							document.forms["form_input"].submit();
						}
					});

				}
			});
		});

	});
</script>
<script src="assets/js/pages/crud/file-upload/image-input.js?v=7.0.4"></script>