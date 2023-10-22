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
                    <h3 class="card-label">Data Admin
                        <span class="d-block text-muted pt-2 font-size-sm">Informasi Admin</span>
                    </h3>
                </div>
                 <div class="card-toolbar mt-3 mb-3">

                    <a href="main/admin/form" class="btn btn-primary font-weight-bolder fix140">
                        </i><i class="fa fa-plus icon-sms"></i>
                        Tambah Data
                    </a>

                </div>
            </div>
            
            <div class="card-body">
				<table id="table_hd" data-toggle="table" data-height="500" data-show-columns="false" data-search="true" data-show-toggle="false" data-pagination="true" data-page-list="[100, 500, 1000]" data-page-size="20">
                    <thead>
                        <tr>
                            <th data-field="row_id" data-visible="false">ID</th>
                            <th data-width="40" data-align="center">No</th>
                            <th data-width="120" data-align="center">Nama Admin </th>
                            <th data-width="110">Email</th>
                            <th data-width="80">No. Telpon</th>
                            <th data-width="90">TTL</th>
                            <th data-width="100" data-align="center">Alamat</th>
                            
                            <th data-width="75" data-align="center">Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no    = 0;
                        foreach ($query_admin->result() as $admin) {
                            $no++;
                            $admin_id        = $admin->admin_id;
                            $admin_nama        = $admin->admin_nama;
                            $tempat_lahir       = $admin->admin_tempat_lahir;
                            $tanggal_lahir        = $admin->admin_tanggal_lahir;
                            $admin_email       = $admin->admin_email;
                            $admin_no_telp       = $admin->admin_no_telp;
                            $admin_alamat        = $admin->admin_alamat;



                        ?>
                            <tr class="tr-class ">
                                <td></td>


                                <td><?php echo $no ?></td>
                                <td><?php echo $admin_nama ?></td>
                                <td><?php echo $admin_email ?></td>
                                <td><?php echo $admin_no_telp ?></td>
                                <td><?php echo $tempat_lahir ?>, <?php echo $tanggal_lahir ?> </td>

                                <td><?php echo $admin_alamat ?></td>
                                <td class="text-center align-middle">
                                    <a href="Javascript: setHapus(<?php echo $admin_id; ?>)" class="btn btn-xs btn-light-danger btn-icon"><i class="fas fa-trash icon-md"></i></a>
                                    <a href="main/admin/form/?admin_id=<?= $admin_id; ?>" class="btn btn-xs btn-warning btn-icon"><i class="fas fa-pencil-alt icon-md"></i></a>
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
            text: "Anda akan menghapus Admin ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya!"
        }).then(function(result) {
            if (result.value == true) {
                window.location.href = "<?php echo base_url() . $class . '/' . $method ?>/del_hd/?admin_id=" + rNum;
            }
        });
    }

</script>