<!--end::Subheader-->

<!--begin::Entry-->
<div class="d-flex flex-column-fluid mt-6">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <form id="form_input" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" action="main/payment_method/crud">

            <div class="card card-custom card-sticky mb-4" id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Form Input Metode Pembayaran
                            <i class="mr-2"></i>
                            <small class="">Untuk menambah/mengubah data Metode Pembayaran</small>
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
                        <div class="col-lg-5 " >
                            <input type="hidden" name="metode_byr_id" id="metode_byr_id" value="<?php echo $metode_byr_id ?>" />

                            <label>Nama Metode Pembayaran:</label>
                            <input type="text" class="form-control" placeholder="Isi Nama Metode Pembayaran" name="inp_metode" id="inp_metode" value="<?php echo $metode_byr_nama ?>" required />
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