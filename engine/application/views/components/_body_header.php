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
                                        <?php foreach ($top_menus as $tm): ?>
                                        <li <?php echo $tm->name=='top_menu_lang'?'class="active"':''; ?>>
                                            <a href="<?php echo $tm->link; ?>"><?php echo strtoupper($tm->value); ?></a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="search-container">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="sr-only" for="search_input">Search</label>
                                                <div class="input-group input-group-sm">
                                                    <input type="search" class="form-control" id="search_input" name="search_input" placeholder="<?php echo lang('label_search_input'); ?>">
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
                        <?php echo create_menus_from_array($mainmenu); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>