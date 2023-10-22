    <div class="d-flex flex-column-fluid  bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-9.jpg');">
        <div class=" container mt-4">
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Section-->


            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder font-size-h3 text-dark">Shopping Cart <i class="fa fa-shopping-cart"></i></span>
                    </h3>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="<?= base_url() ?>home/dashboard" class="btn btn-primary font-weight-bolder font-size-sm"><i class="fas fa-shopping-cart"></i>Continue Shopping</a>
                        </div>
                        
                    </div>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <!--begin::Shopping Cart-->
                    <div class="table-responsive">
                        <table class="table">
                            <!--begin::Cart Header-->
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Product</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Total</th>

                                    <th class="text-center">Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!--end::Cart Header-->
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
                                    $status = $produk->keranjang_status;

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
                                        <td class="d-flex align-items-center font-weight-bolder">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30 flex-shrink-0 mr-4 bg-light">
                                                <div class="symbol-label"> <img src="http://localhost/project-admin/assets/media/foto_produk/<?php echo $produk_foto; ?>" alt="" class="mw-100 w-200px" />
                                                </div>
                                            </div>
                    </div>
                    <!--end::Symbol-->
                    <a href="#" class="text-dark text-hover-primary"><?php echo $produk_nama; ?></a>
                    </td>
                    <td class="text-center align-middle">
                        <a href="Javascript: setUbah(<?php echo $keranjang_dtl_id; ?>, <?php echo $keranjang_qty; ?>)" class="btn btn-xs btn-light-success btn-icon mr-2">
                            <i class="ki ki-minus icon-xs"></i>
                        </a>
                        <span class="mr-2 font-weight-bolder"><?php echo $keranjang_qty; ?></span>
                        <a href="<?php echo base_url() ?>main/cart/crud_tambah/?keranjang_dtl_id=<?= $keranjang_dtl_id; ?>" class="btn btn-xs btn-light-success btn-icon">
                            <i class="ki ki-plus icon-xs"></i>
                        </a>
                    </td>
                    <td class="text-right align-middle font-weight-bolder font-size-h7">Rp.<?php echo number_format("$produk_harga", 0, ",", "."); ?></td>
                    <td class="text-right align-middle font-weight-bolder font-size-h7">Rp.<?php echo number_format("$subtotal", 0, ",", "."); ?></td>

                    <td class="text-center align-middle">
                        <a href="Javascript: setHapus(<?php echo $keranjang_dtl_id; ?>)" class="btn btn-xs btn-light-danger btn-icon"><i class="fas fa-trash icon-md"></i></a>
                    </td>
                    </tr>
                <?php
                                }

                ?>
                <!--end::Cart Content-->
                <!--begin::Cart Footer-->
                <tr>
                    <td colspan="3"></td>
                    <td class="font-weight-bolder font-size-h6 text-right">Total Price :</td>
                    <td class="font-weight-bolder font-size-h7 text-right">Rp.<?php echo number_format("$total", 0, ",", "."); ?></td>
                    <td></td>
                </tr>


                <form id="form_input" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url() ?>main/cart/crud_simpan">

                    <tr>
                        <td colspan="3" class="border-0 pt-10">

                        </td>


                        <td colspan="3" class="border-0 text-right pt-10">
                            <button type="submit" class="btn btn-success font-weight-bolder px-8">Checkout</button>
                        </td>
                    </tr>
                    <!--end::Cart Footer-->
                    </tbody>
                    </table>
                </div>
                <!--end::Shopping Cart-->
            </div>


        </div>
        <div class="card card-custom gutter-b ">
            <div class="card-header">
                <div class="card-title">

                    <h3 class="card-label"><i class="la la-map-marked-alt la-lg"></i> Form Alamat Tujuan
                        <i class="mr-2"></i>
                        <small class="">Silahkan isi dengan benar</small>
                    </h3>
                </div>

            </div>
            <div class="card-body ">
                <!--begin::Form-->


                <div class="form-group row">
                    <div class="col-lg-6">
                        <input type="hidden" name="keranjang_id" id="keranjang_id" value="<?php echo $keranjang_id ?>" />

                        <label>Nama Penerima:</label>
                        <input type="text" class="form-control" placeholder="Isi Nama " name="inp_nama_penerima" id="inp_nama_penerima" value="<?php echo $keranjang_nm_penerima; ?>" required />
                    </div>
                    <div class="col-lg-6">
                        <label>No. HP/WA:</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-phone"></i>
                                </span>
                            </div>
                            <input type="number" class="form-control" placeholder="Isi No. HP" name="inp_telp_penerima" id="inp_telp_penerima" value="<?php echo $keranjang_telp_penerima; ?>" required />
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
                            <input type="text" class="form-control" placeholder="Isi Alamat" name="inp_almt_penerima" id="inp_almt_penerima" value="<?php echo $keranjang_almt_penerima; ?>" required />
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-2"></div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Propinsi:</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-map-marker"></i>
                                </span>
                            </div>
                            <select class="form-control select2" name="inp_prop" id="inp_prop" required>
                                <option label="Label"></option>
                                <?= $comboPropinsi; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Kota:</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-map-marker"></i>
                                </span>
                            </div>
                            <select class="form-control select2" name="inp_kota" id="inp_kota" required>
                                <option label="Label"></option>
                                <?= $comboKota; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Kecamatan:</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-map-marker"></i>
                                </span>
                            </div>
                            <select class="form-control select2" name="inp_kcmtn" id="inp_kcmtn" required>
                                <option label="Label"></option>
                                <?= $comboKecamatan; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <button type="submit" class="col-lg-12 btn btn-light-primary font-weight-bold">Simpan</button>
                                </div>
                                <div class="col-lg-4"></div>
                            </div> -->
                </form>
                <!--end::Form-->
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

            $('#inp_prop').select2({
                placeholder: "Pilih Propinsi",
                allowClear: true
            });

            $('#inp_kota').select2({
                placeholder: "Pilih Kota/Kabupaten",
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

            $('#inp_kota').on('change', function() {
                var sel_id = $(this).val();

                if (sel_id > 0) {
                    $.ajax({
                        url: "<?php echo base_url() ?>Ajax/create_list/get_kcmtn",
                        type: "POST",
                        data: {
                            'sel_id': sel_id
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#inp_kcmtn').html(data);
                        },
                        error: function() {
                            //('Empty Data...!!');
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
                    text: "Anda akan menghapus produk ini dari keranjang!",
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