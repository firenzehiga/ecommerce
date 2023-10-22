<link href="assets/bower_components/bootstrap-table/bootstrap-table.css" rel="stylesheet" type="text/css">
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
                    <h3 class="card-label">Data Metode Bayar
                        <span class="d-block text-muted pt-2 font-size-sm">Informasi Metode Bayar</span>
                    </h3>
                </div>
                <div class="card-toolbar mt-3 mb-3">

                    <a href="main/payment_method/form" class="btn btn-primary font-weight-bolder fix140">
                        </i><i class="fa fa-plus icon-sms"></i>
                        Tambah Metode
                    </a>

                </div>
            </div>
            <div class="card-body">
                <table id="table_hd" data-toggle="table" data-height="500"  data-pagination="true" data-search="true" data-pa data-show-toggle="false" data-page-list="[100, 500, 1000]" data-page-size="50">
                    <thead>
                        <tr>
                            <th data-field="row_id" data-visible="false">ID</th>
                            <th data-width="40" data-align="center">No</th>
                            <th data-width="120" data-align="center">Nama Metode Pembayaran </th>
                            <th data-width="75" data-align="center">Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no    = 0;
                        foreach ($query_metode_byr->result() as $metode) {
                            $no++;
                            $metode_byr_id        = $metode->metode_byr_id;
                            $metode_nama        = $metode->metode_byr_nama;
         



                        ?>
                            <tr class="tr-class ">
                                <td></td>


                                <td><?php echo $no ?></td>
                                <td><?php echo $metode_nama ?></td>
                                <td class="text-center align-middle">
                                    <a href="Javascript: setHapus(<?php echo $metode_byr_id; ?>)" class="btn btn-xs btn-light-danger btn-icon"><i class="fas fa-trash icon-md"></i></a>
                                    <a href="main/payment_method/form/?metode_byr_id=<?= $metode_byr_id; ?>" class="btn btn-xs btn-warning btn-icon"><i class="fas fa-pencil-alt icon-md"></i></a>

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

<script type="text/javascript">
    function setUbah(rNum) {
        window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/form/?rNum=" + rNum;

    }

    function setHapus(rNum) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Anda akan menghapus Metode Pembayaran ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya!"
        }).then(function(result) {
            if (result.value == true) {
                window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/del_hd/?metode_byr_id=" + rNum;
            }
        });
    }

    function setStatus(rNum, status) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Anda akan mengubah status data buku ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya!"
        }).then(function(result) {
            if (result.value == true) {
                if (status == 't') {
                    window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/disabled/?rNum=" + rNum;
                } else {
                    window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/enabled/?rNum=" + rNum;
                }
            }
        });
    }
</script>