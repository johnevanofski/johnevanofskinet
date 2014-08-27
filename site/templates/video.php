<?php snippet('header') ?>

<div id="video">
<section class="port">
        <div class="content"><img width="150" src="assets/images/anim-video.gif" alt="Video"></div>
</section>

<section class="content clearfix">
    
    <?php $videos = $pages
                            ->find('video')
                            ->children()
                            ->visible()
                            ->flip();

    foreach ($videos as $video): ?>
  
    <article class="col span_2">
        
        <?php echo kirbytext($video->text()) ?>
  
    </article>
    
    <?php endforeach ?>

</section>
</div>

<?php snippet('footer') ?>