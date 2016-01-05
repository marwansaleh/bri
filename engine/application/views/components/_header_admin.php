<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo isset($meta_title)?$meta_title : 'PT. Bank Rakyat Indonesia, Tbk.'; ?></title>
        <link rel="icon" href="<?php echo get_asset_url('img/favicon.gif'); ?>" type="image/x-icon">

        <!-- Bootstrap CSS -->    
        <link href="<?php echo get_lib_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo get_lib_url('font-awesome-4.1.0/css/font-awesome.min.css'); ?>" rel="stylesheet">   
        <link href="<?php echo get_asset_url('css/skins/skin-blue.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo get_lib_url('bootstrap-select/css/bootstrap-select.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo get_lib_url('datetimepicker/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo get_lib_url('tagsinput/bootstrap-tagsinput.css'); ?>" rel="stylesheet">
        <link href="<?php echo get_lib_url('prettyPhoto/3.15/css/prettyPhoto.css'); ?>" rel="stylesheet">  
        
        <link href="<?php echo get_lib_url('ionicons/css/ionicons.min.css'); ?>" rel="stylesheet">
        
        <!-- Custom styles -->
        <link href="<?php echo get_asset_url('css/AdminLTE.min.css'); ?>" rel="stylesheet">
        
        <script src="<?php echo get_lib_url('jquery/jquery-1.11.3.min.js'); ?>"></script>
        <script src="<?php echo get_asset_url('js/admin-lte.js'); ?>"></script>
        <!--[if lt IE 9]>
          <script src="<?php echo get_lib_url('html5shiv/3.7.2/html5shiv.min.js'); ?>"></script>
          <script src="<?php echo get_lib_url('respond/1.4.2/respond.min.js'); ?>"></script>
        <![endif]-->
    </head>
    <body <?php echo isset($body_class) && $body_class?'class="'.$body_class.'"':''; ?>>
    