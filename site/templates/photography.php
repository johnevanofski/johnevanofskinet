<?php snippet('header') ?>

<div id="photo">
<section class="port">
        <div class="content"><img width="150" src="<?php echo $site->url() ?>/assets/images/anim-photo.gif" alt="Camera"></div>
</section>

<div id="photo" class="clearfix">
<section class="content clearfix">

<article class="uhoh">
    <?php echo kirbytext($page->text()) ?>
</article>

<article>
<h4 style="text-align: center;">For now, please enjoy my <a href="http://instagram.com/evanofski_">Instagram</a> stream</h4>    
<div class="gallery">
<?php 
$instagram  = instagram(12);
$images     = $instagram->images();

foreach ($images as $image): ?>
        <div class="gallery-item"><a href="<?php echo $image->url ?>" class="mfp-img"><img src="<?php echo $image->url ?>" /></a></div>
<?php endforeach ?>
    
</div>
</article>
</section>
</div>

<?php snippet('footer') ?>