<link href="assets/bower_components/bootstrap-table/bootstrap-table.css" rel="stylesheet" type="text/css">
<link href="assets/bower_components/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<link href="assets/bower_components/bootstrap-fileinput/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css" />
<link href="assets/bower_components/fancybox/fancybox.css" rel="stylesheet" type="text/css">

<script src="assets/bower_components/bootstrap-fileinput/js/plugins/piexif.js" type="text/javascript"></script>
<script src="assets/bower_components/bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
<script src="assets/bower_components/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="assets/bower_components/bootstrap-fileinput/js/locales/fr.js" type="text/javascript"></script>
<script src="assets/bower_components/bootstrap-fileinput/js/locales/es.js" type="text/javascript"></script>
<script src="assets/bower_components/bootstrap-fileinput/themes/fas/theme.js" type="text/javascript"></script>
<script src="assets/bower_components/bootstrap-fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script>
<div class="d-flex flex-column-fluid mt-4">
    <div class="container">
        <div class="flex-row-fluid  justify-content-center ">
            <!--begin::Section-->
            <form id="form_input" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" action="main/bukti_bayar/kirim_bukti">

                <div class="card card-custom card-stretch gutter-b col-lg-12">
                    <!--begin::Header-->

                    <div class="card-header">
                        <div class="card-title">
                            <span class="card-icon">
                                <i class="flaticon2-chat-1 text-primary"></i>
                            </span>
                            <h3 class="card-label">
                                Kirim Bukti Transfer
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <button class="btn btn-sm btn-success font-weight-bold">
                                Kirim &nbsp; <i class="fas fa-play fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">


                        <input type="hidden" id="keranjang_id" name="keranjang_id" value="<?php echo $keranjang_id?>">

                        <div class="form-group row">
                            <div class="col-md-2 col-lg-6">
                                <label>Tanggal Transfer</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>

                                    </div>
                                    <input type="text" class="form-control" placeholder="Isi Tanggal Transfer" name="inp_tgl_byr" id="inp_tgl_byr" required />
                                </div>

                            </div>


                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12">
                                <label>Foto Bukti:</label>
                                <div class="file-loading">
                                    <input type="file" name="file_bukti[]" id="file_bukti" multiple data-allowed-file-extensions='[ "jpg", "jpeg", "png", "mkv", "mp4"]' />
                                </div>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-2"></div>
                        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <div class="d-flex align-items-center flex-wrap mr-1">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center font-weight-bold">
                                        <a href="" class="text-muted text-hover-primary opacity-75 hover-opacity-100"></a>
                                    </div>
                                </div>
                            </div>

                        </div>
            </form>
        </div>

    </div>


</div>
<!--end::Shopping Cart-->
</div>
</div>

<!--end::Section-->

<script src="assets/bower_components/fancybox/fancybox.umd.js"></script>
<script src="assets/js/pages/crud/file-upload/image-input.js?v=7.0.4"></script>

<script>
    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }

    jQuery(document).ready(function() {

        $("#file_bukti").fileinput({

            'theme': 'explorer-fas',
            'showUpload': false
        });

        $('#inp_tgl_byr').datepicker({
            rtl: KTUtil.isRTL(),
            orientation: "bottom left",
            todayHighlight: true,
            templates: arrows,
            format: 'dd/mm/yyyy',
        });



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
    });
</script>