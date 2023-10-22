<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8" />
    <title>Metroshop | <?= $title ?></title>
    <meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets//fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

    <style>
        @media print {

            .print,
            .header {
                display: none;
            }

            .container {
                width: 100%;
            }
        }
    </style>
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="assets/plugins/global/plugins.bundle.js?v=7.0.4"></script>
    <script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4"></script>
    <script src="assets/js/scripts.bundle.js?v=7.0.4"></script>
    <script src="assets/js/pages/widgets.js?v=7.0.4"></script>

    <!--end::Page Scripts-->

    <!-- Autonumeric -->
</head>

<!--begin::Container-->
<div class="container-fluid">
    <!-- begin::Card-->
    <div class="card card-custom overflow-hidden">
        <div class="card-body ">
            <!-- begin: Invoice-->
            <!-- begin: Invoice header-->
            <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                        <h1 class="display-4 font-weight-boldest mb-10">INVOICE</h1>
                        <div class="d-flex flex-column align-items-md-end px-0">
                            <!--begin::Logo-->
                            <h3 class="font-weight-boldest">METROSHOP</h3>
                            <!--end::Logo-->
                            <!-- <span class="d-flex flex-column align-items-md-end opacity-70">
                                <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                                <span>Mississippi 96522</span>
                            </span> -->
                        </div>
                    </div>

                    <div class="border-bottom w-100"></div>

                    <div class="d-flex justify-content-between pt-6">
                        <div class="d-flex flex-column flex-root">
                            <?php
                            $query_alamat       = "SELECT * FROM v_keranjang WHERE keranjang_id =" . $keranjang_id . " ";
                            $rhAlmt          = $this->db->query($query_alamat);
                            $rrAlmt            = $rhAlmt->row();
                            $keranjang_id   = $rrAlmt->keranjang_id;
                            $status         = $rrAlmt->keranjang_status;
                            $tgl_bayar      = $rrAlmt->keranjang_time_bayar;
                            $telp_penerima  = $rrAlmt->keranjang_telp_penerima;
                            $nama_penerima  = $rrAlmt->keranjang_nm_penerima;
                            $almt_jalan     = $rrAlmt->keranjang_almt_penerima;
                            $kecamatan      = $rrAlmt->kcmtn_nama;
                            $metode_bayar   = $rrAlmt->metode_byr_nama;
                            $ekspedisi      = $rrAlmt->ekspedisi_nama;
                            $ongkir         = $rrAlmt->ekspedisi_ongkir;
                            $pos            = $rrAlmt->kota_kodepos;
                            $no_invoice     = $rrAlmt->keranjang_no_invoice;
                            $kota_tipe      = $rrAlmt->kota_tipe;
                            $kota_nama      = $rrAlmt->kota_nama;
                            $propinsi       = $rrAlmt->prop_nama;
                            $tgl_checkout   = $rrAlmt->keranjang_time_checkout;

                            ?>
                            <span class="font-weight-bolder mb-2">DATE</span>
                            <span class="opacity-70"><?php echo $tgl_checkout; ?></span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">NO. INVOICE</span>
                            <span class="opacity-70"><?php echo $no_invoice; ?></span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">INVOICE TO.</span>
                            <span class="opacity-70"><?php echo $nama_penerima ?>, <?php echo $telp_penerima ?>
                                <br /><?php echo $almt_jalan ?>, <?php echo $kecamatan ?>, <?php echo $kota_tipe ?>, <?php echo $kota_nama ?>, <?php echo $propinsi ?></span>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end: Invoice header-->
            <!-- begin: Invoice body-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-left text-muted text-uppercase">Product</th>
                                    <th class="text-center font-weight-bold text-muted text-uppercase">Qty</th>
                                    <th class="text-right font-weight-bold text-muted text-uppercase">Price</th>
                                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $total = 0;
                                $query_keranjang_dtl       = $this->db->query("SELECT * FROM v_keranjang_detail WHERE keranjang_id =" . $keranjang_id . " " . "ORDER BY produk_nama");

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
                                    <tr class="font-weight-boldest">
                                        <td class="pl-0 pt-7"><?php echo $produk_nama ?></td>
                                        <td class="text-center pt-7"><?php echo $keranjang_qty ?></td>
                                        <td class="text-right pt-7">Rp.<?php echo number_format("$produk_harga", 0, ",", "."); ?></td>
                                        <td class="text-danger pr-0 pt-7 font-size-h3 text-right">Rp.<?php echo number_format("$subtotal", 0, ",", "."); ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                                <tr class="font-weight-boldest">
                                    <td colspan="2"></td>
                                    <td class="font-size-h7 text-right">Subtotal Product :</td>
                                    <td class="font-size-h7 text-right text-danger">Rp.<?php echo number_format("$total", 0, ",", "."); ?><input type="hidden" id="total_harga" value="<?php echo $total; ?>"></td>
                                </tr>
                                <tr class="font-weight-boldest">
                                    <td colspan="2" class="border-0 pt-0"></td>
                                    <td class="border-0 pt-0  text-right">Delivery Fees :</td>
                                    <td class="border-0 pt-0  text-danger text-right ">Rp.<?php echo $ongkir; ?></td>
                                </tr>
                                <tr class="font-weight-boldest">
                                    <td colspan="2" class="border-0 pt-0"></td>
                                    <td class="border-0 pt-0  font-size-h4 text-right">Grand Total :</td>
                                    <td class="border-0 pt-0  font-size-h4 text-danger text-right">Rp.<?php echo number_format("$grandtotal", 0, ",", "."); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php
            if ($status != 'Sudah Checkout') {

            ?>
                <!-- end: Invoice body-->
                <!-- begin: Invoice footer-->
                <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold text-muted text-right text-uppercase">BANK</th>
                                        <th class="font-weight-bold text-muted text-right text-uppercase">PAY DATE</th>
                                        <th class="font-weight-bold text-muted text-right text-uppercase">TOTAL AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="font-weight-bolder">
                                        <td class=" font-size-h3 text-right "><?php echo $metode_bayar ?></td>
                                        <td class=" font-size-h3 text-right "><?php echo $tgl_bayar ?></td>
                                        <td class="text-danger font-size-h3 text-right font-weight-boldest">Rp.<?php echo number_format("$grandtotal", 0, ",", "."); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
            <!-- end: Invoice footer-->
            <!-- begin: Invoice action-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between">
                        <a href=""></a>
                        <button type="button" class="btn btn-primary font-weight-bold print" onclick="window.print();">Print Invoice</button>
                    </div>
                </div>
            </div>
            <!-- end: Invoice action-->
            <!-- end: Invoice-->
        </div>
    </div>
    <!-- end::Card-->
</div>
<!--end::Container-->