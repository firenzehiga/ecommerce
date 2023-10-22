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
                    <h3 class="card-label">Data Customer
                        <span class="d-block text-muted pt-2 font-size-sm">Informasi Customer</span>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <table id="table_hd" data-toggle="table" data-height="500"  data-pagination="true" data-search="true" data-pa data-show-toggle="false" data-page-list="[100, 500, 1000]" data-page-size="50">
                    <thead>
                        <tr>
                            <th data-field="row_id" data-visible="false">ID</th>
                            <th data-width="40" data-align="center">No</th>
                            <th data-width="120" data-align="center">Nama Customer </th>
                            <th data-width="150">Email</th>
                            <th data-width="80">No. Telpon</th>
                            <th data-width="200" data-align="center">Alamat</th>
                            <th data-width="75" data-align="center">Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no    = 0;
                        foreach ($query_cust->result() as $cust) {
                            $no++;
                            $cust_id        = $cust->cust_id;
                            $cust_nama        = $cust->cust_nama;
                            $cust_email       = $cust->cust_email;
                            $cust_no_telp       = $cust->cust_no_telp;
                            $cust_alamat        = $cust->cust_alamat;



                        ?>
                            <tr class="tr-class ">
                                <td></td>


                                <td><?php echo $no ?></td>
                                <td><?php echo $cust_nama ?></td>
                                <td><?php echo $cust_email ?></td>
                                <td><?php echo $cust_no_telp ?></td>
                                <td><?php echo $cust_alamat ?></td>
                                <td class="text-center align-middle">
                                    <a href="Javascript: setHapus(<?php echo $cust_id; ?>)" class="btn btn-xs btn-light-danger btn-icon"><i class="fas fa-trash icon-md"></i></a>

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

    function setHapus(rNum) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Anda akan menghapus customer ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya!"
        }).then(function(result) {
            if (result.value == true) {
                window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/del_hd/?cust_id=" + rNum;
            }
        });
    }

</script>