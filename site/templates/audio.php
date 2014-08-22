<?php snippet('header') ?>

<div id="audio">
    
    <section class="port">
        <div class="content"><img width="150" src="assets/images/anim-audio.gif" alt="<?php echo html($page->title())?>"></div>
    </section>
    
    <section class="content clearfix">

        
        <?php 
    
        foreach ($page->children()->visible() as $article):?>
        
        <article class="col span_4">
            
        <?php echo kirbytext($article->text()); ?>
            
        </article>
        
        <?php endforeach?>


    </section>
</div>

<?php snippet('footer') ?>