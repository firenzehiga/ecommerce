    <?php
    if ($numrow > 0) {
    ?>
        <div class="d-flex flex-column-fluid  bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-9.jpg');">
            <div class="container mt-4 ">
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Section-->

                    <?php
                    foreach ($query_alamat->result() as $almt) {
                        $keranjang_id   = $almt->keranjang_id;
                        $status         = $almt->keranjang_status;
                        $telp_penerima  = $almt->keranjang_telp_penerima;
                        $nama_penerima  = $almt->keranjang_nm_penerima;
                        $almt_jalan     = $almt->keranjang_almt_penerima;
                        $kecamatan      = $almt->kcmtn_nama;
                        $metode_bayar   = $almt->metode_byr_nama;
                        $ekspedisi      = $almt->ekspedisi_nama;
                        $ongkir         = $almt->ekspedisi_ongkir;
                        $pos            = $almt->kota_kodepos;
                        $kota_tipe      = $almt->kota_tipe;
                        $kota_nama      = $almt->kota_nama;
                        $propinsi       = $almt->prop_nama;
                        $tgl_checkout   = $almt->keranjang_time_checkout;

                        if ($metode_bayar == 'BCA') {

                            $no_rek    = '234.555.0340';
                        } elseif ($metode_bayar == 'MANDIRI') {

                            $no_rek    = '0123.321.321';
                        } elseif ($metode_bayar == 'Bank Syariah') {

                            $no_rek    = '0555.678.9888';
                        }

                    ?>
                        <div class="card card-custom gutter-b col-lg-12 mb-5">

                            <div class="card-header">
                                <div class="card-title">

                                    <small class="mb-5 font-weight-bold font-size-h7-sm mb-n7 mt-n7">Pesanan anda pada tanggal <?php echo $tgl_checkout ?> berhasil dibuat, selanjutnya silahkan transfer ke <small class="font-weight-bolder text-dark"> Nomor Rekening : <?php echo $no_rek ?></small></small>

                                </div>
                                <!-- <div class="card-toolbar">
                                <a href="main/invoices/?keranjang_id=<?= $keranjang_id; ?>" target="_blank" class="btn btn-light-success">
                                    <i class="fas fa-file-invoice"></i> Invoice
                                </a>
                            </div> -->
                            </div>
                            <!--begin::Header-->
                            <div class="card-body mb-n6">
                                <!--begin::Section-->


                                <h6 class="font-weight-bolder mb-3">Delivery Address :</h6>
                                <div class="text-dark-50 line-height-lg">
                                    <div><?php echo $nama_penerima ?> | <?php echo $telp_penerima ?> </div>
                                    <div><?php echo $almt_jalan ?></div>
                                    <div><?php echo $kecamatan ?>, <?php echo $kota_tipe ?>. <?php echo $kota_nama ?>, <?php echo $propinsi ?>, <?php echo $pos ?></div>
                                    <div class="separator separator-dashed my-5"></div>

                                    <div class="input-group  mb-n3">
                                        <label class="col-form-label font-weight-bolder text-left col-lg-2 col-sm-2">Payment Methode &nbsp;&nbsp; :</label> <span class="col-form-label font-weight-bolder text-dark text-left col-lg-2 col-sm-2"><?php echo $metode_bayar ?></span>
                                    </div>
                                    <div class="input-group ">
                                        <label class="col-form-label font-weight-bolder  text-left col-lg-2 col-sm-2">Delivery Option &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
                                        <span class="col-form-label font-weight-bolder text-dark text-left col-lg-2 col-sm-2"><?php echo $ekspedisi ?></span>


                                    </div>

                                </div>
                                <!--begin::Shopping Cart-->
                                <div class="text-dark-50 line-height-lg">
                                    <div class="table-responsive">
                                        <table class="table mb-n6">
                                            <thead>
                                                <tr>
                                                    <th class="pl-0 font-weight-bold text-center text-muted text-uppercase">No</th>
                                                    <th class="pl-0 font-weight-bold text-center text-muted text-uppercase">Product</th>
                                                    <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                                                    <th class="text-right font-weight-bold text-muted text-uppercase">Price</th>
                                                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                $total = 0;
                                                $query_keranjang_dtl       = $this->db->query("SELECT * FROM v_keranjang_detail WHERE keranjang_status = 'Sudah Checkout' AND keranjang_id =" . $keranjang_id . " " . "ORDER BY produk_nama");

                                                foreach ($query_keranjang_dtl->result() as $produk) {
                                                    $no++;
                                                    $keranjang_dtl_id = $produk->keranjang_dtl_id;
                                                    $produk_id        = $produk->keranjang_dtl_prod_id;
                                                    $produk_nama      = $produk->produk_nama;
                                                    $keranjang_qty    = $produk->keranjang_dtl_qty;
                                                    $produk_foto      =   $produk->produk_foto;
                                                    $produk_harga     = $produk->produk_harga;
                                                    $subtotal         = $produk->subtotal;
                                                    $total           += $subtotal;
                                                    $grandtotal       = $total + $ongkir;
                                                ?>
                                                    <!--begin::Cart Content-->
                                                    <tr>
                                                        <td class="text-center align-middle font-weight-bolder">
                                                            <?php echo $no; ?>
                                                        </td>
                                                        <td class=" text-center font-weight-bolder">

                                    </div>
                                    <span class="text-dark text-hover-primary"><?php echo $produk_nama; ?></span>
                                    </td>
                                    <td class="text-right align-middle">

                                        <span class="mr-2 font-weight-bolder"><?php echo $keranjang_qty; ?></span>

                                    </td>
                                    <td class="text-right align-middle font-weight-bolder font-size-h7">Rp.<?php echo number_format("$produk_harga", 0, ",", "."); ?></td>
                                    <td class="text-right align-middle font-weight-bolder font-size-h7">Rp.<?php echo number_format("$subtotal", 0, ",", "."); ?></td>
                                    <td></td>
                                    </tr>
                                <?php
                                                }
                                ?>

                                <tr>
                                    <td colspan="3"></td>
                                    <td class="font-weight-bolder font-size-h7 text-right">Subtotal Product :</td>
                                    <td class="font-weight-bolder font-size-h7 text-right">Rp.<?php echo number_format("$total", 0, ",", "."); ?><input type="hidden" id="total_harga" value="<?php echo $total; ?>"></td>
                                    <td></td>
                                </tr>



                                <tr>
                                    <td colspan="3" class="border-0 pt-0"></td>
                                    <td class="border-0 pt-0 font-weight-bolder text-right">Delivery Fees :</td>
                                    <td class="border-0 pt-0 font-weight-bolder text-right ">Rp.<?php echo $ongkir; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="border-0 pt-0"></td>
                                    <td class="border-0 pt-0 font-weight-bolder font-size-h4 text-right">Grand Total :</td>
                                    <td class="border-0 pt-0 font-weight-bolder font-size-h4 text-success text-right">Rp.<?php echo number_format("$grandtotal", 0, ",", "."); ?></td>
                                </tr>
                                <!--end::Cart Footer-->
                                </tbody>
                                </table>

                                <div class="separator separator-dashed my-5"></div>

                                <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                    <div class="d-flex align-items-center flex-wrap mr-1">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center font-weight-bold">
                                                <!-- <a href="main/invoices/?keranjang_id=<?= $keranjang_id; ?>" target="_blank" class="btn btn-light-success"> -->
                                                <!-- <i class="fas fa-file-invoice"></i> Invoice -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-toolbar mt-3 mb-3">

                                        <a href="<?= base_url() ?>main/bukti_bayar/?keranjang_id=<?= $keranjang_id; ?>" class="btn btn-primary font-weight-bolder px-8">Konfirmasi Pembayaran</a>


                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
            <?php
                    }
            ?>

            <!--end::Section-->
            <!--begin::Section-->

            <!--end::Section-->
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="d-flex flex-column-fluid  bgi-size-cover bgi-position-center bgi-no-repeat" style="background-image: url('assets/media/error/bg3.jpg');">
            <!--begin::Container-->
            <div class=" container mt-3">
                <!--begin::Notice-->
                <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                    <div class="alert-icon">

                    </div>
                    <div class="alert-text text-center">
                        <span class="font-size-h2 font-weight-bolder ">Belum ada pesanan</span>
                    </div>
                </div>
                <!--end::Notice-->
                <!--begin::Row--
                                </div>
                            </div>
                        </div>
                        <!--end::Code example-->
                <!--end::Example-->
            </div>
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
        </div>
    <?php
    }
    ?>



    <script type="text/javascript">
        jQuery(document).ready(function() {

            $('#inp_metode').select2({
                placeholder: "Pilih  Payment",
                allowClear: true
            });

            $('#inp_ekspedisi').select2({
                placeholder: "Pilih Delivery",
                allowClear: true
            });

            $('#inp_kcmtn').select2({
                placeholder: "Pilih Kecamatan",
                allowClear: true
            });

            $('#inp_prop').on('change', function() {
                $('#inp_kcmtn')[0].options.length = 0;
                var sel_id = $(this).val();

                if (sel_id > 0) {
                    $.ajax({
                        url: "<?php echo base_url() ?>Ajax/create_list/get_kota",
                        type: "POST",
                        data: {
                            'sel_id': sel_id
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#inp_kota').html(data);
                        },
                        error: function() {
                            //('Empty Data...!!');
                        }
                    });
                }
            });
            $('#inp_ekspedisi').on('change', function() {
                var sel_id = $(this).val();
                //   alert(sel_id);

                if (sel_id > 0) {
                    var form_data = {};
                    $.ajax({
                        url: "<?php echo base_url() ?>/Ajax/get_data/get_ongkir/?ekspedisi_id=" + sel_id,
                        type: 'POST',
                        data: form_data,
                        success: function(data) {
                            //  alert(sel_id);

                            if ($.parseJSON(data)['data'] != null) {
                                //    alert(sel_id);

                                var ongkir = parseFloat($.parseJSON(data)['data'].ekspedisi_ongkir);
                                var total_harga = parseFloat($('#total_harga').val());
                                var grand_total = total_harga + ongkir;

                                $('#ongkir').text(ongkir);
                                let num = grand_total;
                                let text = num.toLocaleString("IN-en", );
                                document.getElementById("jumlah_harga").innerHTML = text;

                            }
                        }
                    });
                }
            });


        });

        function setHapus(rNum) {
            Swal.fire({
                title: "Anda Yakin?",
                text: "Anda akan menghapus produk ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya!"
            }).then(function(result) {
                if (result.value == true) {
                    window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/del_hd/?keranjang_dtl_id=" + rNum;
                }
            });
        }

        function setUbah(rNum, qty) {
            if (qty == 1) {
                Swal.fire({
                    title: "Anda Yakin?",
                    text: "Anda akan menghapus produk ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya!"
                }).then(function(result) {
                    if (result.value == true) {
                        window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/del_hd/?keranjang_dtl_id=" + rNum;
                    }
                });
            } else {
                window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/crud_kurang/?keranjang_dtl_id=" + rNum;

            }

        }
    </script>