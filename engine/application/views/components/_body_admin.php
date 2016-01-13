<div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo get_cms_url('dashboard'); ?>" class="logo"><b>BRI.CO.ID</b></a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo get_asset_url('img/default-avatar-man.jpg'); ?>" class="user-image user-active-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">Administrator</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                      <img src="<?php echo get_asset_url('img/default-avatar-man.jpg'); ?>" class="img-circle user-active-image" alt="User Image">
                    <p>
                      Administrator
                      <small>Member since Jan 5, 2015</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Skip</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Skip</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Skip</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                        <a href="<?php echo get_cms_url('user/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo get_cms_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo get_asset_url('img/default-avatar-man.jpg'); ?>" class="img-circle user-active-image" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
<!--          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <?php $this->load->view('components/_admin_menu') ?>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 294px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo isset($page_title)?$page_title:'Page Title'; ?>
            <?php echo isset($page_description)?'<small>'.$page_description.'</small>':''; ?>
          </h1>
          <!-- Breadcumb -->
          <?php echo breadcrumb($breadcumb); ?>
          <!-- End Breadcumb -->
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Your Page Content Here -->
          <?php if (isset($subview)){ $this->load->view($subview); } ?>
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Content Management System ( CMS )
        </div>
        <!-- Default to the left --> 
        <strong>Copyright &copy; 2015 <a href="#">bri.co.id</a>.</strong> All rights reserved.
      </footer>

    </div>