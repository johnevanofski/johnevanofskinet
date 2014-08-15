<!DOCTYPE html>
<html lang="en">
<head>
  
    <title><?php echo html($site->title()) ?> |  <?php echo html($page->title()) ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="<?php echo html($site->description()) ?>" />
    <meta name="keywords" content="<?php echo html($site->keywords()) ?>" />
    <meta name="robots" content="index, follow" />
    
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">    
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic|Share+Tech+Mono' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
    
  <?php echo js('assets/js/min/jquery.stellar.min.js');
        echo js('assets/js/min/iscroll.min.js');
        //echo js('assets/js/min/magpop.min.js'); //production js
        echo js('assets/js/magpop.js');
        echo js('assets/js/min/masonry.min.js');
        //echo js('assets/js/min/scripts.min.js'); //production js
        echo js('assets/js/scripts.js');
        
        //echo css('assets/style/styles.min.css'); //production css
        echo css('assets/styles/styles.css'); 
    
    //css files with template name will be added to template
    $cssURI  = 'assets/css/' . $page->template() . '.css';
    $cssRoot = c::get('root') . '/' . $cssURI;
    if(file_exists($cssRoot)) echo css($cssURI);
    
    ?>    

</head>
    
<body>
<div id="toTop"></div>
<div id="wrap">
    <header>
        <div class="abovenav">
            <div class="mobile-only uicon menu-light-empty menu-button"></div>     
            <div class="logoWrap"><a href="<?php echo url() ?>"><div style="width: 45px; height: 52px" class="jelogo"></div></a></div>
            <a href="<?php echo u() ?>contact"><div class="uicon mail-empty contact"></div></a>  
        </div>
        
        <nav class="menu off"><?php snippet('menu') ?></nav>
        
    </header>    
