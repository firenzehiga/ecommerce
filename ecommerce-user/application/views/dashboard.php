<div class="d-flex flex-column-fluid" style="background-image: url(assets/media/bg/bg3.jpg); ">
    <div class=" container-fluid mt-2" >
        <div class=" flex-row-fluid ml-lg-8" >
            <div class="card card-custom card-stretch gutter-b shadow-lg">
                <div class="card-body">
                    <div class="card card-custom mb-12">
                        <div class="card-body rounded p-0 d-flex" style="background-color:#DAF0FD;">
                            <div
                                class="d-flex flex-column flex-lg-row-auto w-auto w-lg-340px w-xl-450px w-xxl-500px p-1 p-md-20">
                                <h1 class="font-weight-bolder text-dark">Search Goods</h1>
                                <div class="font-size-h4 mb-8">Get Amazing Gadgets</div>
                                <form class="d-flex flex-center py-2 px-6 bg-white rounded" method="post"
                                    action="<?php echo base_url() ?>main/product_search">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control border-0 font-weight-bold pl-2"
                                        placeholder="Search Goods" name="cr_produk" id="cr_produk" />
                                </form>
                            </div>
                            <div class="d-none d-sm-flex flex-row-fluid bgi-no-repeat bgi-sm bgi-position-y-center bgi-position-x-left "
                                style="background-image: url(assets/media/svg/illustrations/login-visual-1.svg);
                            "></div>
                        </div>
                    </div>
                    <div class="mb-11">
                        <div class="d-flex justify-content-between align-items-center mb-7">
                            <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Cari Produk yang Anda Inginkan
                            </h2>
                            <a href="main/product" class="btn btn-light-primary btn-sm font-weight-bolder">View All</a>

                        </div>
                        <div class="row">
                            <?php
                    foreach ($query_prod->result() as $produk) {
                        $produk_id = $produk->produk_id;
                        $produk_nama = $produk->produk_nama;
                    ?>
                            <div class="col-md-4 col-xxl-4 col-lg-4 mb-4">
                                <div class="card card-custom  ">
                                    <div class="card-body p-0">
                                        <!--begin::Image-->
                                        <div class="overlay">
                                            <div class="overlay-wrapper rounded bg-light text-center">
                                                <img src="http://localhost/ecommerce-admin/assets/media/foto_produk/<?php echo $produk->produk_foto; ?>"
                                                    alt="" class="mw-100 w-200px" />
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
                                                <a href="<?= base_url() ?>main/product_detail/?produk_id=<?= $produk_id; ?>"
                                                    class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick
                                                    View</a>
                                                <a href="<?php echo base_url() .  $link  ?> "
                                                    class=" btn font-weight-bolder btn-sm btn-light-primary"><i
                                                        class="fa fa-cart-plus"></i></a>
                                            </div>
                                        </div>
                                        <div
                                            class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                            <a href="#"
                                                class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1"><?php echo $produk->produk_nama; ?></a>

                                            <span
                                                class="font-size-lg mb-2"><?php echo $produk->produk_caption; ?></span>

                                            <span class="font-size-lg font-weight-bolder text-dark-50">Rp.
                                                <?php echo number_format("$produk->produk_harga", 0, ",", "."); ?></span>
                                            <small class="text-right mr-3 text-dark-50">Stok :
                                                <?php echo $produk->produk_stok; ?></small>
                                        </div>
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