    <div class="d-flex flex-column-fluid mt-4">
        <div class="container">
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Section-->

                <div class="card card-custom gutter-b col-lg-12">
                    <!--begin::Header-->

                    <div class="card-body">
                        <!--begin::Section-->
                        <h4 class="mb-5 font-weight-bold text-dark">Review your Order and Confirm</h4>
                        <h6 class="font-weight-bolder mb-3">Delivery Address :</h6>
                        <?php
                        $no = 0;
                        $total = 0;
                        foreach ($query_keranjang->result() as $almt) {
                            $no++;
                            $telp_penerima = $almt->keranjang_telp_penerima;
                            $nama_penerima = $almt->keranjang_nm_penerima;
                            $almt_jalan = $almt->keranjang_almt_penerima;
                            $kecamatan = $almt->kcmtn_nama;
                            $pos = $almt->kota_kodepos;
                            $kota_tipe = $almt->kota_tipe;
                            $kota_nama = $almt->kota_nama;
                            $propinsi = $almt->prop_nama;
                        ?>
                            <div class="text-dark-50 line-height-lg">
                                <div><?php echo $nama_penerima ?> | <?php echo $telp_penerima ?> </div>
                                <div><?php echo $almt_jalan ?></div>
                                <div><?php echo $kecamatan ?>, <?php echo $kota_tipe ?>. <?php echo $kota_nama ?>, <?php echo $propinsi ?>, <?php echo $pos ?></div>
                            <?php
                        }
                            ?>
                            <div class="separator separator-dashed my-5"></div>
                            <form id="form_input" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url() ?>main/checkout/confirm_checkout">
                                <div class="input-group ">
                                    <label class="col-form-label font-weight-bolder text-dark text-left col-lg-2 col-sm-2">Payment Methode &nbsp;&nbsp; :</label>

                                    <div class="col-lg-6">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">

                                            </div>
                                            <select class="form-control select2" name="inp_metode" id="inp_metode" required>
                                                <option label="Label"></option>
                                                <?= $comboMetode; ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="input-group ">
                                    <label class="col-form-label font-weight-bolder text-dark text-left col-lg-2 col-sm-2">Delivery Option &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>

                                    <div class="col-lg-6">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">

                                            </div>
                                            <select class="form-control select2" name="inp_ekspedisi" id="inp_ekspedisi" required>
                                                <option label="Label"></option>
                                                <?= $comboEkspedisi; ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="separator separator-dashed my-5"></div>
                            <!--begin::Shopping Cart-->
                            <h6 class="font-weight-bolder mb-3">Order Details:</h6>
                            <div class="text-dark-50 line-height-lg">
                                <div class="table-responsive">
                                    <table class="table">
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
                                            foreach ($query_keranjang_dtl->result() as $produk) {
                                                $no++;
                                                $keranjang_dtl_id = $produk->keranjang_dtl_id;
                                                $produk_id = $produk->keranjang_dtl_prod_id;
                                                $produk_nama = $produk->produk_nama;
                                                $keranjang_qty = $produk->keranjang_dtl_qty;
                                                $produk_foto =   $produk->produk_foto;
                                                $produk_harga = $produk->produk_harga;
                                                $subtotal = $produk->subtotal;
                                                $total += $subtotal;
                                            ?>
                                                <!--begin::Cart Content-->
                                                <tr>
                                                    <td class="text-center align-middle font-weight-bolder">
                                                        <?php echo $no; ?>
                                                    </td>
                                                    <td class=" text-center font-weight-bolder">

                                </div>
                                <a href="#" class="text-dark text-hover-primary"><?php echo $produk_nama; ?></a>
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
                                <td class="border-0 pt-0 font-weight-bolder text-right ">Rp.<span id="ongkir"></span></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="border-0 pt-0"></td>
                                <td class="border-0 pt-0 font-weight-bolder font-size-h4 text-right">Total :</td>
                                <td class="border-0 pt-0 font-weight-bolder font-size-h4 text-success text-right">Rp.<span id="jumlah_harga"></span></td>
                            </tr>
                            <!--end::Cart Footer-->
                            </tbody>
                            </table>





                            <div class="separator separator-dashed my-5"></div>


                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <div class="d-flex align-items-center flex-wrap mr-1">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center font-weight-bold">
                                            <a href="" class="text-muted text-hover-primary opacity-75 hover-opacity-100"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-toolbar mt-3 mb-3">

                                    <button type="submit" class="btn btn-success font-weight-bolder px-8">Confirm Checkout</button>


                                </div>
                            </div>
                            </div>
                            </form>
                            <!--end::Shopping Cart-->
                    </div>


                </div>

                <!--end::Section-->
                <!--begin::Section-->

                <!--end::Section-->
            </div>
        </div>
    </div>

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