<style>
    .slick-slider { margin-bottom: 0; }
    .slick-slider .slick-prev { left: 25px; z-index: 1000; }
    .slick-slider .slick-next { right: 25px; }
</style>
<div id="main">
    <div class="container">
        <div class="row">
            <div id="main-carousel" class="owl-carousel">
                <div><img alt="slider 01" src="<?php echo get_userfile('slides/image-01.jpg'); ?>"></div>
                <div><img alt="slider 02" src="<?php echo get_userfile('slides/image-02.jpg'); ?>"></div>
                <div><img alt="slider 03" src="<?php echo get_userfile('slides/image-03.jpg'); ?>"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box">
            <div class="content">
                <div class="row bg-blue-light">
                    <div class="col-sm-3">
                        <div class="row bg-blue">
                            <div class="ibanking-box">
                                <div class="pull-left">
                                    <img src="<?php echo get_asset_url('img/ibanking.png'); ?>" />
                                </div>
                                <div class="pull-right">
                                    <a class="btn bg-orange" href="#">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="box-combo-links">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $corpbox['corp_drop_report']->value; ?></label>
                                        <div class="input-group input-group-sm">
                                            <select class="form-control">
                                                <option value="">Laporan tahunan</option>
                                            </select>
                                            <span class="input-group-btn">
                                                <button class="btn bg-orange" type="button">Go</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $corpbox['corp_drop_rate']->value; ?></label>
                                        <div class="input-group input-group-sm">
                                            <select class="form-control">
                                                <option value="">Kurs harian</option>
                                            </select>
                                            <span class="input-group-btn">
                                                <button class="btn bg-orange" type="button">Go</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $corpbox['corp_drop_link']->value; ?></label>
                                        <div class="input-group input-group-sm">
                                            <select class="form-control">
                                                <option value="">Internet banking</option>
                                            </select>
                                            <span class="input-group-btn">
                                                <button class="btn bg-orange" type="button">Go</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $corpbox['corp_drop_other']->value; ?></label>
                                        <div class="input-group input-group-sm">
                                            <select class="form-control">
                                                <option value="">Unit kerja bri</option>
                                            </select>
                                            <span class="input-group-btn">
                                                <button class="btn bg-orange" type="button">Go</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="content">
                <div class="row">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified bg-orange" role="tablist">
                        <?php $tab_index=0; foreach ($main_tabs as $tab): ?>
                        <li role="presentation" <?php echo $tab_index==0?' class="active"':''; ?>><a href="#corporate-tab-<?php echo $tab_index; ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo strtoupper($tab->value); ?></a></li>
                        <?php $tab_index++; endforeach; ?>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="corporate-tab-0">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">2015-02-03	Moratorium KUR, BRI Salurkan Kupedes Rakyat</a></li>
                                <li class="list-group-item"><a href="#">2015-02-03	BRI Tingkatkan Pertumbuhan Transaksi E-Channel dan E-Banking</a></li>
                                <li class="list-group-item"><a href="#">2015-01-27	BRI , Menuju Bank Terbesar di Indonesia</a></li>
                                <li class="list-group-item"><a href="#">2015-01-09	Asmawi Syam Jabat PLT Dirut BRI.</a></li>
                                <li class="list-group-item"><a href="#">2014-11-25	BISA LAYANI UANG DIGITAL 2015, BRILink Ditargetkan Mencapai 50.000 Agen</a></li>
                                <li class="list-group-item"><a href="#">2014-11-12	Teras BRI Kapal, Siap Layani Pulau-pulau di Seluruh Indonesia</a></li>
                                <li class="list-group-item"><a href="#">2014-10-28	BRI Juara Umum Annual Report Award 2014</a></li>
                                <li class="list-group-item"><a href="#">2014-10-23	Bank BRI Catat Laba Bersih Rp. 18,12 Triliun di Triwulan Ketiga Tahun 2014</a></li>
                                <li class="list-group-item"><a href="#">2015-03-04	Permudah Distribusi Pupuk Bersubsidi, BRI Terbitkan Kartu Tani</a></li>
                                <li class="list-group-item"><a href="#">2015-02-03	Moratorium KUR, BRI Salurkan Kupedes Rakyat</a></li>
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="corporate-tab-1">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">2014-11-12	Teras BRI Kapal, Siap Layani Pulau-pulau di Seluruh Indonesia</a></li>
                                <li class="list-group-item"><a href="#">2014-10-28	BRI Juara Umum Annual Report Award 2014</a></li>
                                <li class="list-group-item"><a href="#">2014-10-23	Bank BRI Catat Laba Bersih Rp. 18,12 Triliun di Triwulan Ketiga Tahun 2014</a></li>
                                <li class="list-group-item"><a href="#">2015-03-04	Permudah Distribusi Pupuk Bersubsidi, BRI Terbitkan Kartu Tani</a></li>
                                <li class="list-group-item"><a href="#">2015-02-03	Moratorium KUR, BRI Salurkan Kupedes Rakyat</a></li>
                                <li class="list-group-item"><a href="#">2015-02-03	Moratorium KUR, BRI Salurkan Kupedes Rakyat</a></li>
                                <li class="list-group-item"><a href="#">2015-02-03	BRI Tingkatkan Pertumbuhan Transaksi E-Channel dan E-Banking</a></li>
                                <li class="list-group-item"><a href="#">2015-01-27	BRI , Menuju Bank Terbesar di Indonesia</a></li>
                                <li class="list-group-item"><a href="#">2015-01-09	Asmawi Syam Jabat PLT Dirut BRI.</a></li>
                                <li class="list-group-item"><a href="#">2014-11-25	BISA LAYANI UANG DIGITAL 2015, BRILink Ditargetkan Mencapai 50.000 Agen</a></li>
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="corporate-tab-2">...</div>
                        <div role="tabpanel" class="tab-pane" id="corporate-tab-3">...</div>
                        <div role="tabpanel" class="tab-pane" id="corporate-tab-4">...</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="box">
            <div class="row bg-blue-light">
                <div class="content">
                    <div class="row">
                        <div class="myslick">
                            <div class="col-sm-3">
                                <img src="http://placehold.it/300x250?text=image+01" class="img-responsive" />
                            </div>
                            <div class="col-sm-3">
                                <img src="http://placehold.it/300x250?text=image+02" class="img-responsive" />
                            </div>
                            <div class="col-sm-3">
                                <img src="http://placehold.it/300x250?text=image+03" class="img-responsive" />
                            </div>
                            <div class="col-sm-3">
                                <img src="http://placehold.it/300x250?text=image+04" class="img-responsive" />
                            </div>
                            <div class="col-sm-3">
                                <img src="http://placehold.it/300x250?text=image+05" class="img-responsive" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#main-carousel").owlCarousel({
            autoPlay : 3000,
            stopOnHover : true,
            //navigation:true,
            paginationSpeed : 1000,
            goToFirstSpeed : 2000,
            singleItem : true,
            autoHeight : true,
            transitionStyle:"fade"
        });
        $('.myslick').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            //asNavFor: '.slider-for',
            //centerMode: true,
            focusOnSelect: true
        });
    });
</script>