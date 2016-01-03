<!DOCTYPE html>
<html lang="<?php echo config_item('language')=='english'?'en':'id'; ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo isset($meta_title)?$meta_title : 'PT. Bank Rakyat Indonesia, Tbk.'; ?></title>
        <link rel="icon" href="<?php echo get_asset_url('img/favicon.gif'); ?>" type="image/x-icon">
        
        <!-- load jquery -->
        <script src="<?php echo get_lib_url('jquery/jquery-1.11.3.min.js'); ?>"></script>
        <!-- Bootstrap -->
        <link href="<?php echo get_lib_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        
        <!-- owl carousel -->
        <link rel="stylesheet" href="<?php echo get_lib_url('owl-carousel/owl.carousel.css'); ?>">
        <link rel="stylesheet" href="<?php echo get_lib_url('owl-carousel/owl.theme.css'); ?>">
        <link rel="stylesheet" href="<?php echo get_lib_url('owl-carousel/owl.transitions.css'); ?>">
        <!-- slick slider -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_lib_url('slick/slick.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_lib_url('slick/slick-theme.css'); ?>"/>
        
        <!-- Custom CSS -->
        <link href="<?php echo get_asset_url('css/style.css'); ?>" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?php echo get_lib_url('html5shiv/3.7.2/html5shiv.min.js'); ?>"></script>
          <script src="<?php echo get_lib_url('respond/1.4.2/respond.min.js'); ?>"></script>
        <![endif]-->
        
        <!--
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '<?php //echo $GA_Code; ?>', 'auto');
          ga('send', 'pageview');

        </script>-->
    </head>
    <body>