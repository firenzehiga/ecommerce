<link href="assets/bower_components/bootstrap-table/bootstrap-table.css" rel="stylesheet" type="text/css">
<style>
    .table_report {
        table-layout: fixed;
    }

    .select2-container {
        width: 100% !important;
        padding: 0;
    }

    @media print {

        .print {
            display: none;
        }

    }
</style>
<div class="d-flex flex-column-fluid mt-3">
    <div class="container-fluid">
        <?php
        if (empty($keranjang_id)) {
        ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card card-custom gutter-b ">
                        <div class="card-header flex-wrap py-3 mt-n3">
                            <div class="card-title ">
                                <h2 class="card-label">Laporan Penjualan
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" action="<?php echo base_url() . $class; ?>/laporan_pesanan_search">
                                <div class="form-group row ml-4 print">
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control print" placeholder="Nama Customer" name="cr_cust" id="cr_cust">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control print" placeholder="Nama Penerima" name="cr_penerima" id="cr_penerima">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control print" placeholder="Status Pesanan" name="cr_status" id="cr_status">
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group" id="cr_daterangepicker">
                                            <input type="text" class="form-control print" name="cr_pesanan" id="cr_pesanan" readonly="readonly" placeholder="Pilih Tanggal Pesanan" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 print">
                                        <button class="btn btn-success mr-2 print" type="submit"> Cari
                                            <i class="fa fa-search print"></i>
                                        </button>
                                        <a href="<?php echo base_url() . $class . '/' . $method; ?>" class="btn btn-danger print"> Reset <i class="fas fa-undo icon-md"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-info ml-2 print" onclick="window.print()">Print <i class="fas fa-print icon-md"></i>
                                        </a>

                                    </div>

                                </div>
                            </form>
                            <table id="table_hd" class="table table_report" data-toggle="table" data-search="false" data-pagination="false" data-page-list="[100, 500, 1000]" data-page-size="100">
                                <thead>
                                    <tr>
                                        <th data-field="row_id" data-visible="false">ID</th>
                                        <th data-width="20" data-align="center">No</th>
                                        <th data-width="60">Nama Customer</th>
                                        <th data-width="60">Nama Penerima</th>
                                        <th data-width="100">Alamat Tujuan</th>
                                        <th data-width="60" data-align="center">No. INVOICE</th>
                                        <th data-width="50" data-align="center">Tanggal Pesan</th>
                                        <th data-width="60" data-align="center">Status</th>
                                        <th data-width="55" data-align="center">Subtotal</th>



                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $grandtotal = 0;
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
                                        $no_inv       = $keranjang->keranjang_no_invoice;
                                        $cust_nama           = $keranjang->cust_nama;
                                        $subtotal           = $keranjang->subtotal;
                                        $total           = $subtotal;
                                        $status        = $keranjang->keranjang_status;
                                        $grandtotal     += $total;

                                        if ($status == 'Menunggu Verifikasi') {

                                            $statuswarna    = 'danger';
                                        } elseif ($status == 'Sudah Dikirim') {

                                            $statuswarna    = 'success';
                                        } elseif ($status == 'Pesanan Diterima') {

                                            $statuswarna    = 'info';
                                        } elseif ($status == 'Sedang Dikemas') {

                                            $statuswarna    = 'warning';
                                        }



                                    ?>

                                        <tr>
                                            <td><?php echo $keranjang_id ?></td>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $cust_nama ?></td>
                                            <td><?php echo $nama_penerima ?></td>
                                            <td><?php echo $alamat_penerima ?></td>
                                            <td><?php echo $no_inv ?></td>
                                            <td><?php echo $tanggal_pesan ?></td>
                                            <td><span class="label label-inline label-light-<?php echo $statuswarna; ?> font-weight-bold">
                                                    <?php echo $status; ?>
                                                </span></td>
                                            <td>Rp.<?php echo number_format("$total", 0, ",", "."); ?></td>


                                        <?php
                                    }
                                        ?>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="font-weight-bolder font-size-h6 text-center">Total :</td>
                                            <td class="font-weight-bolder font-size-h6">Rp.<?php echo number_format("$grandtotal", 0, ",", "."); ?></td>
                                        </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                <?php
            }
                ?>
                </div>
            </div>

    </div>
</div>
<!-- MODAL HEADER -->

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
        $(".dtl_pinjam").hide();
        $(".klik_dt").click(function() {
            var no = $(this).attr('data-no');
            var val_nya = $("#val_row_dtl_tr_" + no).val();
            if (val_nya == 0) {
                $("#row_dtl_tr_" + no).show();
                $("#val_row_dtl_tr_" + no).val(1);
            } else {
                $("#row_dtl_tr_" + no).hide();
                $("#val_row_dtl_tr_" + no).val(0);
            }
        });
        $('#cr_daterangepicker').daterangepicker({
            buttonClasses: ' btn ',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
        }, function(start, end, label) {
            $('#cr_daterangepicker .form-control').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));

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
    });

    function setHapus(rNum) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Anda akan menghapus data peminjaman ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya!"
        }).then(function(result) {
            if (result.value == true) {
                window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/del_hd/?rNum=" + rNum;
            }
        });
    }
</script>