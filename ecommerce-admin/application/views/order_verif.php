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
                    <h3 class="card-label">Data Pesanan (Status Menunggu Verifikasi )
                        <span class="d-block text-muted pt-2 font-size-sm">Informasi Pesanan Yang Menunggu Verifikasi</span>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <table id="table_hd" data-toggle="table" data-height="500" data-search="true" data-pagination="true" data-show-toggle="false" data-page-list="[100, 500, 1000]" data-page-size="50">
                    <thead>
                        <tr>
                            <th data-field="row_id" data-visible="false">ID</th>
                            <th data-width="40" data-align="center">No</th>
                            <th data-width="130" data-align="center">Nama Customer </th>
                            <th data-width="150">Penerima</th>
                            <th data-width="150">Alamat Penerima</th>
                            <th data-width="100" data-align="center">Tgl Pesan</th>
                            <th data-width="100" data-align="center">Tgl Bayar</th>
                            <th data-width="100">Subtotal</th>
                            <th data-width="90">Bukti</th>
                            <th data-width="170" data-align="center">Action</th>


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
                                <td><a href="http://localhost/project/<?php echo $bukti; ?>" data-caption="Foto Bukti Pembayaran" data-fancybox="gallery">Lihat Bukti</a></td>
                                <td class="text-center align-middle">
                                    <a href="Javascript: setVerif(<?php echo $keranjang_id; ?>)" class="btn btn-sm btn-light-primary ">Verifikasi</a>
                                    <a href="main/menunggu_verifikasi/?keranjang_id=<?php echo $keranjang_id ?>" target="_blank"class="btn btn-sm btn-light-warning ">Detail</a>

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

<script src="assets/bower_components/fancybox/fancybox.umd.js"></script>

<script type="text/javascript">
    function setUbah(rNum) {
        window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/form/?rNum=" + rNum;

    }

    function setVerif(rNum) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Anda akan memverifikasi pesanan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya!"
        }).then(function(result) {
            if (result.value == true) {
                window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/verifikasi/?keranjang_id=" + rNum;
            }
        });
    }



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