<div class="d-flex flex-column-fluid mt-3">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
                                                <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
                                                <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <form id="form_input" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url() . $class . '/' . $method; ?>/crud/">
                            <input type="hidden" id="action_crud" name="action_crud" value="">
                            <input type="hidden" id="admin_id" name="admin_id" value="<?php echo $admin_id ?>">
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
                                    <input type="text" class="form-control" placeholder="Isi Nama Lengkap" name="inp_nama" id="inp_nama" value="<?php echo $admin_nama; ?>" required />
                                </div>
                                <div class="col-lg-6">
                                    <label>Username:</label>
                                    <input type="text" class="form-control" placeholder="Isi username" name="inp_username" id="inp_username" value="<?php echo $admin_username; ?>" required />
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
                                        <input type="email" class="form-control" placeholder="Isi Email" name="inp_email" id="inp_email" value="<?php echo $admin_email; ?>" required />
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
                                        <input type="text" class="form-control" placeholder="Isi No. HP" name="inp_hp" id="inp_hp" value="<?php echo $admin_no_telp; ?>" required />
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-2"></div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label>Tempat:</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-map-marker"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Isi Tempat Lahir" name="inp_tmpt_lhr" id="inp_tmpt_lhr" value="<?php echo $admin_tempat_lahir; ?>" required />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Tanggal Lahir:</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Isi Tanggal Lahir" name="inp_tgl_lhr" id="inp_tgl_lhr" value="<?php echo $admin_tanggal_lahir; ?>" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Jenis Kelamin:</label>
                                    <div class="radio-inline">
                                        <label class="radio radio-primary">
                                            <input type="radio" name="inp_jk" id="inp_pria" <?php echo $checkedPria; ?> value="P" />Pria
                                            <span></span></label>
                                        <label class="radio radio-success">
                                            <input type="radio" name="inp_jk" id="inp_wanita" <?php echo $checkedWanita; ?> value="W" />Wanita
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
                                        <input type="text" class="form-control" placeholder="Isi Alamat" name="inp_almt" id="inp_almt" value="<?php echo $admin_alamat; ?>" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <a href="javascript:void(0)" class="col-lg-12 btn btn-light-primary font-weight-bold" id="save_continue_button">Ubah</a>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">
                        <form id="form_change" role="form" method="post" accept-charset="utf-8" action="<?php echo base_url() . $class . '/' . $method; ?>/changepass/">
                            <input type="hidden" id="action_crud_change" name="action_crud_change" value="">
                            <input type="hidden" id="admin_id_change" name="admin_id_change" value="<?php echo $admin_id ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-7">
                                        <div class="row">
                                            <label class="col-4"></label>
                                            <div class="col-8">
                                                <h6 class="text-dark font-weight-bold mb-10">Ganti Password:</h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-4 text-lg-right text-left">Password saat ini</label>
                                            <div class="col-8">
                                                <input type="hidden" class="form-control h-auto py-5 px-4 rounded-lg border-0" name="old_password_exist" id="old_password_exist" value="0" />
                                                <input type="password" class="form-control form-control-solid h-auto py-5 px-4 rounded-lg border-0" name="old_password" id="old_password" placeholder="Password saat ini" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-4 text-lg-right text-left">Password baru</label>
                                            <div class="col-8">
                                                <input type="password" class="form-control form-control-solid h-auto py-5 px-4 rounded-lg border-0" name="reg_password" id="reg_password" placeholder="Password baru" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-4 text-lg-right text-left">Confirm password</label>
                                            <div class="col-8">
                                                <input type="password" class="form-control form-control-solid h-auto py-5 px-4 rounded-lg border-0" name="reg_cpassword" id="reg_cpassword" placeholder="Confirm Password" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer pb-0">
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-7">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-9">
                                                <a href="javascript:void(0)" class="col-lg-12 btn btn-light-primary font-weight-bold" id="save_continue_change_pass_button">Ubah</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap(),

            },
        }).on('core.form.validating', function() {});

        save_continue_button.addEventListener('click', function() {
            fv.validate().then(function(status) {
                if (status == 'Valid') {
                    document.getElementById("action_crud").value = 'save_continue';
                    document.forms["form_input"].submit();
                }
            });
        });

        $("#old_password").blur(function() {
            var rNum = "<?php echo $admin_id ?>";
            var old_password = $("#old_password").val();
            if (old_password != "") {
                var form_data = {};
                $.ajax({
                    url: "<?php echo base_url() ?>/Ajax/get_data/admin_old_password/?old_password=" + old_password + "&rNum=" + rNum,
                    type: 'POST',
                    data: form_data,
                    success: function(data) {
                        if ($.parseJSON(data)['data'] != null) {
                            if ($.parseJSON(data)['data'].admin_id > 0) {
                                $("#old_password_exist").val("0");
                                $("#message_exist_password").remove();
                                $("#old_password").removeClass("is-invalid")
                            } else {
                                $("#old_password_exist").val("1");
                                $("#message_exist_password").remove();
                                $("#old_password").after('<div id="message_exist_password" class="fv-plugins-message-container"><div data-field="old_password" data-validator="notEmpty" class="fv-help-block">Password Lama Salah</div></div>');
                                $("#old_password").addClass("is-invalid");
                            }
                        } else {
                            $("#old_password_exist").val("1");
                            $("#message_exist_password").remove();
                            $("#old_password").after('<div id="message_exist_password" class="fv-plugins-message-container"><div data-field="old_password" data-validator="notEmpty" class="fv-help-block">Password Lama Salah</div></div>');
                            $("#old_password").addClass("is-invalid");
                        }
                    }
                });
            }
        });

        const save_continue_change_pass_button = document.getElementById('save_continue_change_pass_button');
        const inputFormChange = document.getElementById('form_change');
        const fv_change = FormValidation.formValidation(inputFormChange, {
            fields: {
                old_password: {
                    validators: {
                        notEmpty: {
                            message: 'Password lama wajib diisi'
                        }
                    }
                },
                reg_password: {
                    validators: {
                        notEmpty: {
                            message: 'Password wajib diisi'
                        }
                    }
                },
                reg_cpassword: {
                    validators: {
                        notEmpty: {
                            message: 'Konfirmasi password wajib diisi'
                        },
                        identical: {
                            compare: function() {
                                return inputFormChange.querySelector('[name="reg_password"]').value;
                            },
                            message: 'Password dan Konfirmasi password tidak sama'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap(),

            },
        }).on('core.form.validating', function() {});

        save_continue_change_pass_button.addEventListener('click', function() {
            fv_change.validate().then(function(status) {
                if (status == 'Valid') {
                    document.getElementById("action_crud_change").value = 'save_continue';
                    document.forms["form_change"].submit();
                }
            });
        });
    });
</script>
<script src="assets/js/pages/crud/file-upload/image-input.js?v=7.0.4"></script>