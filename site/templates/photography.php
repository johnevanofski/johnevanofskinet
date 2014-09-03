<?php snippet('header') ?>

<div id="photo" class="clearfix">
<section class="port">
        <div class="content"><img width="150" src="<?php echo $site->url() ?>/assets/images/anim-photo.gif" alt="Camera"></div>
</section>

<section class="content clearfix">
    
    <?php $items = $pages
                    ->find('photography')
                    ->children()
                    ->visible()
                    ->paginate(3);
        
        $id = 0;

        foreach ($items as $item):

        $id +=1;
        //$pics = $item->images();
        $name = $item->title();
        $info = $item->text();
        
        
        ?>
    <article class="photo-gallery gallery-<?php echo $id ?>">
    
        <div class="info"><h4><?php echo h($name) ?></h4>
        <p><?php echo kirbytext($info) ?></p></div>
        <div class="royalSlider rsDefault">
            <?php foreach ($item->images() as $image): ?> 

                <img class="rsImg" data-rsBigImg="<?php echo $image->url() ?>" src="<?php echo thumb($image, array('width' => 800), false) ?>"/>            

            <?php endforeach; //end image loop ?>
        </div>
    </article>
    <?php endforeach; //end article loop ?>
</section>  

<?php snippet('pagination', array('pagination' => $items->pagination())) ?>

</div>

<?php snippet('footer') ?>