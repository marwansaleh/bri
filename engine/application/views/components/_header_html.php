<!DOCTYPE html>
<html lang="<?php echo config_item('language')=='english'?'en':'id'; ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo isset($meta_title)?$meta_title : 'PT. Bank Rakyat Indonesia, Tbk.'; ?></title>
        <link rel="icon" href="<?php echo get_asset_url('img/favicon.gif'); ?>" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="<?php echo get_lib_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo get_asset_url('css/style.css'); ?>" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?php echo get_lib_url('html5shiv/3.7.2/html5shiv.min.js'); ?>"></script>
          <script src="<?php echo get_lib_url('respond/1.4.2/respond.min.js'); ?>"></script>
        <![endif]-->
    </head>
    <body>