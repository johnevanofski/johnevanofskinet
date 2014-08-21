<div class="pagination">

  <?php if(!$pagination->isFirstPage()): ?>
  <a class="page first on" href="<?php echo $pagination->firstPageURL() ?>">first</a>
  <?php else: ?>
  <span class="page first off">first</span>
  <?php endif ?>
  
  <?php if($pagination->hasPrevPage()): ?>
  <a class="page prev on" href="<?php echo $pagination->prevPageURL() ?>">previous</a>
  <?php else: ?>
  <span class="page prev off">previous page</span>
  <?php endif ?>

  <?php if(isset($range) && $pagination->countPages() > 1): ?> 
    <?php foreach($pagination->range($range) as $r): ?>
    <a class="range" href="<?php echo $pagination->pageURL($r) ?>"><?php echo ($pagination->page() == $r) ? '<strong>' . $r . '</strong>' : $r ?></a>
    <?php endforeach ?>
  <?php endif ?>
    
    <?php if(!$pagination->isLastPage()): ?>
  <a class="page last on" href="<?php echo $pagination->lastPageURL() ?>">last</a>
  <?php else: ?>
  <span class="page last off">last page</span>
  <?php endif ?>
  
  <?php if($pagination->hasNextPage()): ?>
  <a class="page next on" href="<?php echo $pagination->nextPageURL() ?>">next</a>
  <?php else: ?>
  <span class="page next off">next page</span>
  <?php endif ?>
  
  

</div>