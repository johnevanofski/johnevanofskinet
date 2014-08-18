<footer>
    
    <div class="socialNexus">
        
        <a href="<?php echo $site->twitter(); ?>" target="_blank"><div class="uicon blank twitter"><i class="fa fa-twitter"></i></div></a>
        <a href="<?php echo $site->soundcloud(); ?>" target="_blank"><div class="uicon blank soundcloud"><i class="fa fa-soundcloud"></i></div></a>
        <a href="<?php echo $site->tumblr(); ?>" target="_blank"><div class="uicon blank tumblr"><i class="fa fa-tumblr"></i></div></a>
        <a href="<?php echo $site->behance(); ?>" target="_blank"><div class="uicon blank behance"><i class="fa fa-behance "></i></div></a>
        <a href="<?php echo $site->linkedin(); ?>" target="_blank"><div class="uicon blank linkedin"><i class="fa fa-linkedin"></i></div></a>
    </div>
            
      <a href="<?php echo $site->url() ?>/contact"><div class="contact uicon mail-empty"></div></a>
      
    <a href="#toTop"><div class="navup uicon arrow-up"></div></a>
    
    <div class="copy"><?php echo kirbytext($site->copyright()) ?></div>     
    
</footer>

</div> <!--close wrap-->

<!--<div id="contact" class="zoom dark-popup mfp-hide"></div>-->

</body>

</html>