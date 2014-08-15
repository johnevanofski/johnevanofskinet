<?php

$form = new contactform(array(
  'to'       => 'John <john.evanofski@gmail.com>',
  'from'     => 'Contact Form <contact@johnevanofski.net>',
  'subject'  => 'Contact from johnevanofski.net',
  'goto'     => $page->url() . '/status:thank-you'
));

?>
<section id="contactform">

  <?php if(param('status') == 'thank-you'): ?>

  <h1>Thank you</h1>
  <p class="contactform-text">We will get in contact as soon as possible</p>
  
  <?php else: ?>

  

    <div class="uicon ufo"></div><h1>Contact <!--<i class="fa fa-space-shuttle"></i>--></h1>
  
  <form action="#contactform" method="post">
    
      <?php if($form->isError('send')): ?>
      <div class="contactform-alert">The email could not be sent. Please try again later.</div>
      <?php elseif($form->isError()): ?>
      <div class="contactform-alert">The form could not be submitted. Please fill in all fields correctly.</div>
      <?php endif ?>
  
      <div class="contactform-field<?php if($form->isError('name')) echo ' error' ?>">
        <label class="contactform-label" for="contactform-name">Name<?php if($form->isRequired('name')) echo '*' ?> <?php if($form->isError('name')): ?><small>Please enter a name</small><?php endif ?></label>
        <input class="contactform-input" type="text" id="contactform-name" name="name" value="<?php echo $form->htmlValue('name') ?>" required />
      </div>
  
      <div class="contactform-field<?php if($form->isError('email')) echo ' error' ?>">
        <label class="contactform-label" for="contactform-email">Email<?php if($form->isRequired('email')) echo '*' ?> <?php if($form->isError('email')): ?><small>Please enter a valid email address</small><?php endif ?></label>
        <input class="contactform-input" type="text" id="contactform-email" name="email" value="<?php echo $form->htmlValue('email') ?>" required />
      </div>
  
      <div class="contactform-field<?php if($form->isError('text')) echo ' error' ?>">
        <label class="contactform-label" for="contactform-text">Message<?php if($form->isRequired('text')) echo '*' ?> <?php if($form->isError('text')): ?><small>Please enter your text</small><?php endif ?></label>
        <textarea class="contactform-input" name="text" id="contactform-text" required><?php echo $form->htmlValue('text') ?></textarea>
      </div>
        
      <input id="send-button" class="contactform-button" type="submit" name="submit" value="SEND" />
    
    
  </form>
  
  <?php endif ?>

</section>