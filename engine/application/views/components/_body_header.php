<header>
    <div class="container">
        <div class="row bg-blue">
            <div class="content">
                <div class="top-page">
                    <div class="col-xs-12 col-sm-4 pull-right">
                        <a href="/index.html">
                            <img id="company-logo" alt="logo bri" src="<?php echo get_asset_url('img/logo-white.png'); ?>" class="img-responsive pull-right">
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="top-menu-bar">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <ul>
                                        <li><a href="#">BERANDA</a></li>
                                        <li class="active"><a href="#">ENGLISH</a></li>
                                        <li><a href="#">HUBUNGI KAMI</a></li>
                                        <li><a href="#">FAQ</a></li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="search-container">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="sr-only" for="search_input">Search</label>
                                                <div class="input-group input-group-sm">
                                                    <input type="search" class="form-control" id="search_input" name="search_input" placeholder="Search">
                                                    <span class="input-group-btn">
                                                        <button class="btn bg-orange" type="submit">Go</button>
                                                    </span>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-orange">
            <div class="content">
                <div id="mainmenu" class="navbar navbar-default " role="navigation">
                    <div class="navbar-header">
                        <a class="navbar-brand visible-xs" href="#">BRI</a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-menubuilder">
                        <ul class="nav navbar-nav navbar-left">
                            <?php foreach ($mainmenu as $menuitem): ?>
                            <li><a href="<?php echo $menuitem->href; ?>"><?php echo strtoupper($menuitem->caption); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>