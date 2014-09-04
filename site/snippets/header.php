<!DOCTYPE html>
<html lang="en">
<head>
  
    <title><?php if($page->isHomepage()): echo html($site->title()); else: echo html($site->title()) . ' | ' . html($page->title()); endif;?></title>
    <meta charset="utf-8" />
    <meta name="description" content="<?php echo html($site->description()) ?>" />
    <meta name="keywords" content="<?php echo html($site->keywords()) ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="initial-scale=1">

<link rel="icon" type="image/png" href="<?php echo u('assets/images/favicon.png') ?>">
    
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">    
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic|Share+Tech+Mono' rel='stylesheet' type='text/css'>   
    
  <?php 
    
    /*CSS FILES*/
    echo css('assets/styles/royalslider/royalslider.css');
    echo css('assets/styles/royalslider/skins/custom/rs-custom.css');
    echo css('assets/styles/styles.min.css'); //production css
    //echo css('assets/styles/styles.css'); //dev
        
    //css files with template name will be added to template
    $cssURI  = 'assets/css/' . $page->template() . '.css';
    $cssRoot = c::get('root') . '/' . $cssURI;
    if(file_exists($cssRoot)) echo css($cssURI);
    
    //cache flushing 
    if(param('flush-cache') == 'flushit') {

      cache::flush();

    }
    
    ?>

</head>
    
<body>
<div id="toTop"></div>
<div id="wrap">
    <header>
        <div class="abovenav">
            <div class="mobile-only uicon menu-light-empty menu-button"></div>     
            <div class="logoWrap"><a href="<?php echo home() ?>"><div style="width: 45px; height: 52px" class="jelogo"></div></a></div>
            <a href="<?php echo u('/contact') ?>"><div class="uicon mail-empty contact"></div></a>  
        </div>
        
        <nav class="menu off"><?php snippet('menu') ?></nav>
        
    </header>    
