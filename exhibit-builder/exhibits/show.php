<?php

// This file overrides the default display of individual pages linked to an exhibit

echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>



<!-- Handles navigation through the various pages within the exhibit -->
<div class="col-md-4">
<nav id="exhibit-pages">
 <h4><?php 
     //echo "<a href='/exhibits/show/womens-rights-movement'>Home</a>";
    //print_r($exhibit) . "<br />";
     
     /*Exhibit Object ( [title] => Wilson's Days: The Life and Legacy of Joseph C. Wilson [description] =>
Meliora is the motto of the University of Rochester, and translates from the Latin as “ever better.” The form in Latin has an imperative quality—an exhortation to do better and to be better.
*/
     echo "<a href='/exhibits'>Home</a>";
     
// This is the function that outputs the exhibit name and link to exhibit home - replacing with just the text 'home' per SM from 10/18 meeting notes: . exhibit_builder_link_to_exhibit($exhibit)
     
// Update, 20190424: changing this to just the default exhibits page now that there is more than one exhibit - jss     
     
     ?></h4>
    <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
</nav>
</div>



<!-- Handles the actual content of the page -->
<div class="col-md-8">
<!-- Moved the page title into this <div>, per SM feedback from 10/18 meeting -->
<h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></span></h1>
<div id="exhibit-blocks">
<?php exhibit_builder_render_exhibit_page(); ?>
</div>
</div>
<!-- Handles the previous/next navigation -->

<div id="exhibit-page-navigation">
    <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
    <div id="exhibit-nav-prev">
    <?php echo $prevLink; ?>
    </div>
    <?php endif; ?>
    <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
    <div id="exhibit-nav-next">
    <?php echo $nextLink; ?>
    </div>
    <?php endif; ?>
    
    <div id="exhibit-nav-up">
    <?php echo exhibit_builder_page_trail(); ?>
    </div>
    
</div>

<?php echo foot(); ?>
