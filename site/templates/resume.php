<?php snippet('header') ?>

<?php //variables 
    
    $name = $page->name();
    $bio = $page->bio();
    $contact = $page->contact();
    $skills = $page->skills();
    $exp = $page->experience();
    $edu = $page->education();
    
?>

<section id="resume" class="clearfix">

    <article class="masonry">
        <div class="name col span_2 first"><h1><?php echo $name ?></h1></div>

        <div class="contact col span_2 last">
            <div class="download">
                <i class="fa fa-download"></i> <a href="<?php echo $page->documents()->first()->url();?>">Download Resume</a>
            </div>
            <?php echo kirbytext($contact) ?>
        </div>
        
        <div class="bio row col span_2 first">  
            <h2>Bio</h2>
            <?php echo kirbytext($bio) ?>
        </div>

        <div class="skills col span_2 last">  
            <h2>Skills</h2>
            <?php echo kirbytext($skills) ?>
        </div>

        <div class="exp col span_2 first">  
            <h2>Experience</h2>
            <?php echo kirbytext($exp) ?>
        </div>

        <div class="edu col span_2 last">  
            <h2>Education</h2>
            <?php echo kirbytext($edu) ?>
        </div>
        

    </article>

</section>

<?php snippet('footer') ?>