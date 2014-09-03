<?php snippet('header') ?>

<div id="design">
    
    <section class="port">
        <div class="content"><img width="150" src="<?php echo u(); ?>assets/images/anim-design.gif" alt="<?php echo html($page->title())?>"></div>
        
            
       <?php 
    
        $all_articles = $pages->find('portfolio');
        $tags = tagcloud($all_articles);
        $onPage = $site->uri;
        
        ?>

        <div class="tagcloud">
            <ul>
                <li <?php echo ( $onPage == 'portfolio' ? 'class="active"' : null ); ?>><a href="<?php echo url('portfolio'); ?>">all</a></li>
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
                    ->find('portfolio')
                    ->children()
                    ->visible()
                    ->filterBy('tags',param('tag'),',')
                    ->flip();
        } else {
            $articles = $pages
                    ->find('portfolio')
                    ->children()
                    ->visible()
                    ->flip();
        }


        foreach ($articles as $article): 
        
        $id += 1;
        
        //$logo = $article->images()->find('logo.png');
        $banner = $article->images()->find('banner.png');
        $title = $article->title();
        $text = $article->text();
        $color = $article->color() ?  $article->color() : 'rgba(101,101,101,1)';
         
        
        ?>     
        
        
        <article data-type="none" class="col span_4"> 
            <div class="banner clearfix" style="background-color:<?php echo $color; ?>">
                <div class="title"><h4><?php echo $title ?></h4></div>
                <div class="taglist">
                    <ul class="tags">
                        <?php foreach(str::split($article->tags()) as $tag): ?>
                            <li><a href="<?php echo url('portfolio/tag:' . urlencode($tag)) ?>"><?php echo $tag; ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="bannerinfo" data-color="<?php echo $color ?>">
                    <div class="bannerimg"><img src="<?php echo $banner->url(); ?>">
                        <div class="bannerhover" style="background-color: <?php echo opacitychange($color, 0.5)?>">
                            <div class="uicon info toggle"></div>
                        </div>
                    </div>
                    <div class="bannertext">
                    <div class="copy">    
                        <div class="close smallicon"></div>       
                        <?php echo kirbytext($text); ?>         
                    </div>
                        <div class="close-message"><p>click or tap anywhere to close</p></div>
                        
                    <div id="gallery-<?php echo $id; ?>" class="clearfix gallery-d">
                        <ul>
                            <?php foreach ($article->images()->not('banner.png') as $pic): ?>
                                <li>
                                     <img src="<?php echo $pic->url(); ?>">
                                    <?php if ( strlen($pic->caption()) > 0 ): ?>
                                    <p class="caption" style="background-color: <?php echo $color ?>"><?php echo $pic->caption(); ?></p>
                                    <?php endif; ?>
                                </li>
                                    
                            <?php endforeach ?>
                        </ul>
                    </div>
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