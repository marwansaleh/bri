<ul class="sidebar-menu">
    <li class="header">MAINMENU</li>
    <!-- Optionally, you can add icons to the links -->
    <li <?php echo $active_menu=='dashboard'?'class="active"':''; ?>><a href="<?php echo site_url('cms/dashboard'); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
    <li <?php echo $active_menu=='page'?'class="active"':''; ?>><a href="<?php echo site_url('cms/page'); ?>"><i class="fa fa-file-text"></i> <span>Pages</span></a></li>
    <li <?php echo $active_menu=='menu'?'class="active"':''; ?>><a href="<?php echo site_url('cms/menu'); ?>"><i class="fa fa-list-alt"></i> <span>Menu</span></a></li>
    <li <?php echo $active_menu=='dropbox'?'class="active"':''; ?>><a href="<?php echo site_url('cms/dropbox'); ?>"><i class="fa fa-chain"></i> <span>Dropdown Links</span></a></li>
    
    <li class="treeview">
        <a href="#"><i class="fa fa-users"></i> <span>User Managements</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="<?php echo site_url('cms/users'); ?>">User list</a></li>
            <li><a href="<?php echo site_url('cms/usergroups'); ?>">User groups</a></li>
            <li><a href="<?php echo site_url('cms/useraccess'); ?>">Group Access</a></li>
            <li><a href="<?php echo site_url('cms/userroles'); ?>">Access roles</a></li>
        </ul>
    </li>
    <li class="treeview  <?php echo $active_menu=='system'?'active':''; ?>">
        <a href="#"><i class="fa fa-cogs"></i> <span>Configuration</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="<?php echo site_url('cms/sysconf'); ?>">System configuration</a></li>
            <li><a href="<?php echo site_url('cms/ext_attrib'); ?>">Extended Attributes</a></li>
            <li><a href="#">System log</a></li>
            <li><a href="<?php echo site_url('cms/database'); ?>">Database Backup</a></li>
        </ul>
    </li>
</ul>