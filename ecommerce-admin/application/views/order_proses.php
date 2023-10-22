<link href="assets/bower_components/bootstrap-table/bootstrap-table.css" rel="stylesheet" type="text/css">
<link href="assets/bower_components/fancybox/fancybox.css" rel="stylesheet" type="text/css">

<style>
    a[data-fancybox] img {
        cursor: zoom-in;
    }

    .fancybox__container {
        --fancybox-bg: rgba(17, 6, 25, 0.85);
    }

    .fancybox__container .fancybox__content {
        padding: 1rem;
        border-radius: 6px;
        color: #374151;
        background: #fff;
        box-shadow: 0 8px 23px rgb(0 0 0 / 50%);
    }

    .fancybox__content>.carousel__button.is-close {
        top: 0;
        right: -38px;
    }

    .fancybox__caption {
        margin-top: 0.75rem;
        padding-top: 0.75rem;
        padding-bottom: 0.25rem;
        width: 100%;
        border-top: 1px solid #ccc;
        font-size: 1rem;
        line-height: 1.5rem;

        /* Prevent opacity change when dragging up/down */
        --fancybox-opacity: 1;
    }

    table {
        table-layout: fixed;
    }

    .modal-dialog .select2-container {
        width: 100% !important;
        padding: 0;
    }
</style>

<style>
    table {
        table-layout: fixed;
    }

    .select2-container {
        width: 100% !important;
        padding: 0;
    }
</style>

<div class="d-flex flex-column-fluid mt-6">
    <div class="container">
        <div class="card card-custom gutter-b">

            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">Data Pesanan (Status Dikemas)
                        <span class="d-block text-muted pt-2 font-size-sm">Informasi Pesanan Yang Sedang Dikemas</span>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <table id="table_hd" data-toggle="table" data-height="500" data-pagination="true" data-search="true" data-pa data-show-toggle="false" data-page-list="[100, 500, 1000]" data-page-size="50">
                    <thead>
                        <tr>
                            <th data-field="row_id" data-visible="false">ID</th>
                            <th data-width="40" data-align="center">No</th>
                            <th data-width="120" data-align="center">Nama Customer </th>
                            <th data-width="150">Nama Penerima</th>
                            <th data-width="150">Alamat Penerima</th>
                            <th data-width="100" data-align="center">Tanggal Pesan</th>
                            <th data-width="100" data-align="center">Tanggal Bayar</th>
                            <th data-width="100">Subtotal</th>
                            <th data-width="100" data-align="center">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no    = 0;
                        foreach ($query_keranjang->result() as $keranjang) {
                            $no++;
                            $keranjang_id        = $keranjang->keranjang_id;
                            $cust_nama           = $keranjang->cust_nama;
                            $nama_penerima          = $keranjang->keranjang_nm_penerima;
                            $alamat_penerima          = $keranjang->keranjang_almt_penerima;
                            $tanggal_pesan           = $keranjang->keranjang_time_checkout;
                            $tanggal_bayar           = $keranjang->keranjang_time_bayar;
                            $bukti        = $keranjang->keranjang_bukti_byr_url;

                            $ongkir       = $keranjang->ekspedisi_ongkir;
                            $cust_nama           = $keranjang->cust_nama;
                            $subtotal           = $keranjang->subtotal;
                            $total           = $subtotal + $ongkir;






                        ?>
                            <tr class="tr-class ">
                                <td></td>


                                <td><?php echo $no ?></td>
                                <td><?php echo $cust_nama ?></td>
                                <td><?php echo $nama_penerima ?></td>
                                <td><?php echo $alamat_penerima ?></td>
                                <td><?php echo $tanggal_pesan ?></td>
                                <td><?php echo $tanggal_bayar ?></td>
                                <td>Rp.<?php echo number_format("$total", 0, ",", "."); ?></td>
                                <td class="text-center align-middle">
                                    <a href="#" data-toggle="modal" data-keranjang-id="<?php echo $keranjang_id; ?>" data-target="#formIsiResi" class="btn btn-sm btn-light-success" id="btn_hd">Update Resi</a>

                                </td>
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
<div class=" modal fade" id="formIsiResi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_header" role="form" method="post" accept-charset="utf-8" action="<?php echo base_url() . $class . '/' . $method; ?>/proses/?keranjang_id=<?php echo $keranjang_id ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Update Nomor Resi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="keranjang_id" id="keranjang_id" value="<?= $keranjang_id; ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label>Nomor Resi</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-sticky-note"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Isi Nomor Resi " name="inp_resi" id="inp_resi" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="action_crud" name="action_crud" value="<?php echo $keranjang_id ?>">
                    <button type="button" class="btn btn-light-warning font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-light-primary font-weight-bold" id="submit_simpan_hd" name="submit_simpan_hd" value="simpan_hd">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="assets/bower_components/fancybox/fancybox.umd.js"></script>

<script type="text/javascript">
    function setUbah(rNum) {
        window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/form/?rNum=" + rNum;

    }

    function setProses(rNum) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Anda akan memproses pesanan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya!"
        }).then(function(result) {
            if (result.value == true) {
                window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/verifikasi/?keranjang_id=" + rNum;
            }
        });
    }

    $('#formIsiResi').on('show.bs.modal', function(e) {
        var keranjang_id = $(e.relatedTarget).data('keranjang-id');
        $.ajax({
            url: '<?php echo base_url() . $class; ?>/modalIsiResi/?keranjang_id=' + keranjang_id ,
            success: function(result) {
                $("#modal_body_isi").html(result);
                $('.kt-select2').select2();
                const inputFormDt = document.getElementById('form_detail');
                const fv = FormValidation.formValidation(inputFormDt, {
                    fields: {
                        inp_dt_akun: {
                            validators: {
                                notEmpty: {
                                    message: 'Akun wajib diisi'
                                }
                            }
                        },
                        inp_dt_jumlah: {
                            validators: {
                                notEmpty: {
                                    message: 'Jumlah wajib diisi'
                                },
                            }
                        },
                        inp_dt_phk: {
                            validators: {
                                notEmpty: {
                                    message: 'Pihak wajib diisi'
                                },
                            }
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap(),

                    },
                }).on('core.form.validating', function() {});

                const save_exit_button_dt = document.getElementById('submit_simpan_dt');
                save_exit_button_dt.addEventListener('click', function() {
                    fv.validate().then(function(status) {
                        if (status == 'Valid') {
                            document.getElementById("action_crud_dt").value = 'save_exit';
                            document.forms["form_detail"].submit();
                        }
                    });
                });
            }
        });
    });


    Fancybox.bind('[data-fancybox="gallery"]', {
        //dragToClose: false,
        Thumbs: false,

        Image: {
            zoom: false,
            click: false,
            wheel: "slide",
        },

        on: {
            // Move caption inside the slide
            reveal: (f, slide) => {
                slide.$caption && slide.$content.appendChild(slide.$caption);
            },
        },
    });
</script>