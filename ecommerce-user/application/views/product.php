<div class="d-flex flex-column-fluid mt-2">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body">
                    <!--begin::Engage Widget 15-->
                    <form role="form" method="post" action="<?php echo base_url() . $class; ?>/product_search">
                        <div class="form-group row ml-30 mr-n10 print">
                            <div class="col-lg-9">
                                <input type="text" class="form-control print" placeholder="Cari Produk" name="cr_produk" id="cr_produk">
                            </div>
                           
                          
                            <div class="col-lg-3 print ml-n4">
                                <button class="btn btn-success " type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                               

                            </div>

                        </div>
                    </form>
                    <!--end::Engage Widget 15-->
                    <!--begin::Section-->
                    <div class="mb-11">
                        <!--begin::Heading-->

                        <!--end::Heading-->
                        <!--begin::Products-->
                        <div class="row">
                            <!--begin::Product-->
                            <!--begin::Card-->
                            <?php
                            foreach ($query_prod->result() as $produk) {
                                $produk_id = $produk->produk_id;
                                $produk_nama = $produk->produk_nama;


                            ?>
                                <div class="col-md-4 col-xxl-4 col-lg-4 mb-4">
                                    <div class="card card-custom ">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded bg-light text-center">
                                                    <img src="http://localhost/project-admin/assets/media/foto_produk/<?php echo $produk->produk_foto; ?>" alt="" class="mw-100 w-200px" />
                                                </div>
                                                <!-- <?php
                                                        $cust_id        = $this->session->userdata('cust_id');

                                                        if (empty($cust_id)) {
                                                            $cust_id = 0;
                                                            $link = 'auth/login';
                                                        } else {
                                                            $link = 'main/cart/add_produk/?produk_id=' . $produk_id;
                                                        }
                                                        ?> -->

                                                <div class="overlay-layer">
                                                    <a href="<?= base_url() ?>main/product_detail/?produk_id=<?= $produk_id; ?>" class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick View</a>
                                                    <a href="<?php echo base_url() .  $link  ?> " class=" btn font-weight-bolder btn-sm btn-light-primary"><i class="fa fa-cart-plus"></i></a>
                                                </div>
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Details-->
                                            <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                <a href="#" class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1"><?php echo $produk->produk_nama; ?></a>
                                                <span class="font-size-lg mb-2"><?php echo $produk->produk_caption; ?></span>

                                                <span class="font-size-lg font-weight-bolder text-dark-50">Rp. <?php echo number_format("$produk->produk_harga", 0, ",", "."); ?></span>
                                                <small class="text-right mr-3 text-dark-50">Stok : <?php echo $produk->produk_stok; ?></small>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    <?php
    if (empty($msg)) {
    ?>
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Produk Dimasukkan Ke Keranjang",
            showConfirmButton: false,
            timer: 2000
        });

    <?php
    }
    ?>
</script> -->