<?php snippet('header') ?>

<div id="home">
        <section class="top clearfix">
            <div class="nexus fadeInEach">
                <ul>
                    <li class="nexicon design"><a href="portfolio"><span></span></a></li>
                    <!--<li class="nexicon video"><a href="video"><span></span></a></li>-->
                    <!--<li class="nexicon audio"><a href="audio"><span></span></a></li>-->
                    <li class="nexicon photo"><a href="photography"><span></span></a></li>
                </ul>
            </div>
            <a href="#profiletop"><div class="navdown delay bounce"><div class="uicon arrow-down"></div></div></a>
        </section>

    <div id="wrapper">
        <div id="scroller">
        <section class="content">
            
            <div id="profiletop" class="hello fadeInDown" data-stellar-offset-parent="true">
                <div class="h2" data-stellar-ratio="0.55">Hello, my name is <br/>John Evanofski</div>
            </div>

            <article>
                <div class="biopic clearfix"><img src="assets/images/biopic.png"></div>
                <?php echo kirbytext($page->text()) ?>
            </article>
        </section>
        </div>
    </div>
</div>    


<?php snippet('footer') ?>