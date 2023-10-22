<div class="content d-flex flex-column flex-column-fluid mt-n4" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Page Layout-->
            <div class="d-flex flex-row">
                <!--begin::Layout-->
                <div class="flex-row-fluid">
                    <!--begin::Section-->
                    <div class="row justify-content-center">
                        <div class="col-md-5 col-lg-10 col-xxl-7 ">
                            <!--begin::Engage Widget 14-->
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder font-size-h3 text-dark">Detail Produk <i class="fab fa-product-hunt"></i></span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <div class="dropdown dropdown-inline">
                                            <a href="<?= base_url() ?>home/dashboard" class="btn btn-light-warning font-weight-bolder font-size-sm"><i class="far fa-arrow-alt-circle-left"></i>Kembali</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body p-15 pb-20">
                                    <div class="row mb-5">
                                        <div class="col-xxl-5 col-lg-5 mb-11 mb-xxl-0">
                                            <div class="card card-custom card-stretch">
                                                <div class="card-body p-0 rounded px-10 py-8 d-flex align-items-center justify-content-center" style="background-color: #FFCC69;">
                                                    <img src="http://localhost/project-admin/assets/media/foto_produk/<?php echo $produk_foto; ?>" class="mw-70 w-150px" style="transform: scale(1.6);" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-7 col-lg-5 pl-xxl-11">
                                            <h2 class="font-weight-bolder text-dark mb-7" style="font-size: 32px;"><?php echo $produk_nama; ?>
                                            </h2>
                                            <div class="font-size-h2 mb-7 text-dark-50">From
                                                <span class="text-info font-weight-boldest ml-2">Rp. <?php echo number_format($produk_harga) . "<br>";;  ?></span>
                                            </div>

                                            <div class="line-height-xl">Deskripsi :</div>
                                            <p class="line-height-xl"><?php echo $produk_caption; ?>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum libero soluta est cum nisi, iure consequuntur eaque nulla nam vero ab. Vitae perspiciatis placeat natus at libero quibusdam veritatis accusantium?</p>

                                            <div class="row mt-6">
                                                <div class="col-4 col-md-4">
                                                    <div class="mb-8 d-flex flex-column">
                                                        <span class="text-dark font-weight-bold mb-4">Name</span>
                                                        <span class="text-muted font-weight-bolder font-size-lg"><?php echo $produk_nama; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-md-4">
                                                    <div class="mb-8 d-flex flex-column">
                                                        <span class="text-dark font-weight-bold mb-4">Stok</span>
                                                        <span class="text-muted font-weight-bolder font-size-lg"><?php echo $produk_stok; ?></span>
                                                    </div>
                                                </div>

                                                <div class="dropdown dropdown-inline ml-9">
                                                    <a href="#" class="btn btn-light-primary font-weight-bolder font-size-sm btn-outline-primary"><i class="fas fa-cart-plus"></i>Tambah Ke Keranjang</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>