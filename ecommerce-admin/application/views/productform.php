<!--end::Subheader-->

<!--begin::Entry-->
<div class="d-flex flex-column-fluid mt-6">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <form id="form_input" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" action="main/product/crud">

            <div class="card card-custom mb-4" >
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Form Input Produk
                            <i class="mr-2"></i>
                            <small class="">Untuk menambah/mengubah data Produk</small>
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
                                <div class="image-input-wrapper" style="background-image: url(<?php echo $produk_foto ?>)"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Gambar Produk">
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
                        <div class="col-lg-5">
                            <input type="hidden" name="produk_id" id="produk_id" value="<?php echo $produk_id ?>" />

                            <label>Nama Produk:</label>
                            <input type="text" class="form-control" placeholder="Isi Nama Produk" name="inp_nama" id="inp_nama" value="<?php echo $produk_nama ?>" required />
                        </div>
                        <div class="col-lg-3">
                            <label>Stok Produk</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="las la-book"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control" placeholder="Isi Jumlah Stok " name="inp_stok" id="inp_stok" value="<?php echo $produk_stok; ?>" required />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>Harga Produk</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="las la-book"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control" placeholder="Isi Nominal Harga " name="inp_harga" id="inp_harga" value="<?php echo $produk_harga; ?>" required />
                            </div>
                        </div>



                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Deskripsi Produk:</label>
                            <textarea class="form-control form-control-solid" id="inp_capt" name="inp_capt" rows="3" cols="50" value=""><?php echo $produk_caption; ?></textarea>
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
        $('#inp_pnrbt').select2({
            placeholder: "Pilih Penerbit",
            allowClear: true
        });


        const save_continue_button = document.getElementById('save_continue_button');
        const save_new_button = document.getElementById('save_new_button');
        const save_exit_button = document.getElementById('save_exit_button');
        const inputForm = document.getElementById('form_input');
        const fv = FormValidation.formValidation(inputForm, {
            fields: {
                inp_jdl: {
                    validators: {
                        notEmpty: {
                            message: 'Judul wajib diisi'
                        },
                    }
                },
                inp_nm_pnls: {
                    validators: {
                        notEmpty: {
                            message: ' Penulis wajib diisi'
                        },
                    }
                },
                inp_pnrbt: {
                    validators: {
                        notEmpty: {
                            message: 'Penerbit wajib diisi'
                        },
                    }
                },
                inp_tahun: {
                    validators: {
                        notEmpty: {
                            message: 'Tahun terbit wajib diisi'
                        },
                    }
                },
                inp_stok: {
                    validators: {
                        notEmpty: {
                            message: 'Jumlah Stok wajib diisi'
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

                    document.getElementById("action_crud").value = 'save_new';
                    document.forms["form_input"].submit();
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