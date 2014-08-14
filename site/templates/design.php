<?php snippet('header') ?>

<div id="design">
    
    <section class="port">
        <div class="content"><img width="150" src="<?php echo u(); ?>assets/images/vis-anim.gif" alt="<?php echo html($page->title())?>"></div>
        
            
       <?php 
    
        $all_articles = $pages->find('design');
        $tags = tagcloud($all_articles);
        $onPage = $site->uri;
        
        ?>

        <div class="tagcloud">
            <ul>
                <li <?php echo ( $onPage == 'design' ? 'class="active"' : null ); ?>><a href="<?php echo url('design'); ?>">all</a></li>
              <?php foreach($tags as $tag): ?>

                <li <?php if($tag->isActive()) echo 'class="active"' ?>><a href="<?php echo $tag->url() ?>"><?php echo $tag->name() ?></a></li>

              <?php endforeach ?>

            </ul>
        </div>
    </section>
    
    <section class="content clearfix">
        
        <?php   
            
        function opacitychange($i, $o){

            $newcolor = substr_replace($i,$o,-2,1);
    
            return $newcolor;

        }    
        
        $id = 0;

        if (param('tag')){ 
            $articles = $pages
                    ->find('design')
                    ->children()
                    ->visible()
                    ->filterBy('tags',param('tag'),',')
                    ->flip();
        } else {
            $articles = $pages
                    ->find('design')
                    ->children()
                    ->visible()
                    ->flip();
        }


        foreach ($articles as $article): 
        
        $id += 1;
        
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
        
        
        
        <article data-type="none" class="web col span_4"> 
            <div class="banner clearfix" style="background-color:<?php echo $color; ?>">
                <div class="title"><h4><?php echo $title ?></h4></div>
                <div class="taglist">
                    <ul class="tags">
                        <?php foreach(str::split($article->tags()) as $tag): ?>
                            <li><a href="<?php echo url('design/tag:' . urlencode($tag)) ?>"><?php echo $tag; ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="bannerinfo">
                    <div class="bannerimg"><img src="<?php echo $banner->url(); ?>"></div>
                    <div class="uicon info toggle"></div><a href="#gallery-<?php echo $id; ?>" class="popup-button"><div class="uicon view toggle"></div></a>
                    <div class="bannertext" style="background-color:<?php echo opacitychange($color, 0.8); ?>"><div class="close"><i class="fa fa-times"></i></div>
                    <h2 class="inner-title"><?php // echo $title; ?></h2>        
                    <?php echo kirbytext($text); ?>
                    </div>   
                </div>
            </div>            
        </article>
        
        <?php endforeach ?>
        
        <article class="col span_4">
            <div class="banner dummy clearfix"></div>
        </article>

    </section>
    
</div>

<?php snippet('footer') ?>