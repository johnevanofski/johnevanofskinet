<?php snippet('header') ?>

<div id="design">
    
    <section class="port">
        <div class="content"><img width="150" src="assets/images/vis-anim.gif" alt="<?php echo html($page->title())?>"></div>
        <div class="filters">
            <div class="uicon web"></div>
            <div class="uicon draft"></div>
            <div class="uicon blank-dark"></div>
        </div>
    </section>
    
    <section class="content clearfix">
        
        <?php   
            
        function opacitychange($i, $o){

            $newcolor = substr_replace($i,$o,-2,1);
    
            return $newcolor;

        }    
        
        $id = 0;

        foreach ($page->children() as $article): 
        
        $id += 1;
        
        $tags = strtolower($article->tags());

        $logo = $article->images()->find('logo.png');
        $banner = $article->images()->find('banner.png');
        $title = $article->title();
        $text = $article->text();
        $color = $article->color() ?  $article->color() : 'rgba(101,101,101,1)';
         
        
        ?>
        
        <div id="gallery-<?php echo $id; ?>" class="clearfix gallery zoom light-popup mfp-hide">
            <ul>
            <?php foreach ($article->images()->not('banner.png') as $pic): ?>
                 <li><img src="<?php echo $pic->url(); ?>"></li>
            <?php endforeach ?>
            </ul>
        </div>
        
        <?php if ($tags == 'web' ): ?>
        
        <article data-type="web" class="web col span_4"> 
            <div class="banner clearfix" style="background-color:<?php echo $color; ?>">
                <div class="title"><h4><?php echo $title ?></h4></div>
                <!--<div class="logo"><img src="<?php // echo $logo->url(); ?>"></div> -->
                <div class="bannerimg"><img src="<?php echo $banner->url(); ?>"></div>
                <div class="uicon info toggle"></div><a href="#gallery-<?php echo $id; ?>" class="popup-button"><div class="uicon view toggle"></div></a>
                <div class="bannertext" style="background-color:<?php echo opacitychange($color, 0.8); ?>"><div class="close"><i class="fa fa-times"></i></div>
            <h2 class="inner-title"><?php echo $title; ?></h2>        
            <?php echo kirbytext($text); ?>
                </div>                
            </div>            
        </article>
        
        <?php elseif ($tags == 'print'): ?>
        
        <article data-type="print" class="print col span_4">
            <div class="banner clearfix" style="background-color:<?php echo $color; ?>">
                <div class="title"><h4><?php echo $title ?></h4></div>
                <div class="bannerimg"><img src="<?php echo $banner->url(); ?>"></div>
                <div class="uicon info toggle"></div><a href="#gallery-<?php echo $id; ?>" class="popup-button"><div class="uicon view toggle"></div></a>
                <div class="bannertext" style="background-color:<?php echo opacitychange($color, 0.8); ?>"><div class="close"><i class="fa fa-times"></i></div>
            <h2 class="inner-title"><?php echo $title; ?></h2>        
            <?php echo kirbytext($text); ?>
                </div>                
            </div>     
        </article>
        
        <?php else: ?>
        
        <article data-type="draft" class="draft col span_4">
                This is a DRAFT project.
        </article>
        
        <?php endif; ?>
        
        
        <?php endforeach?>

    </section>
    
</div>

<?php snippet('footer') ?>