<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<!-- Removed the original giant font title that displayed "Browse Exhibits (x total)" and replaced with the text below, per Melissa -->
<!-- Also changed the header type and size for the link to the exhibit, from h2 to h3 -->
<h3>Rare Books, Special Collections and Preservation Online Exhibitions</h3>
<?php if (count($exhibits) > 0): ?>

<nav class="navigation secondary-nav">
    <?php echo nav(array(
        array(
            'label' => __('Browse All'),
            'uri' => url('exhibits')
        ),
        array(
            'label' => __('Browse by Tag'),
            'uri' => url('exhibits/tags')
        )
    )); ?>
</nav>

<?php echo pagination_links(); ?>

<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): 

    $homepagetext = '';
    $exhibit_info = $exhibit;    
    $exhibit_info = unserialize($exhibit_info['theme_options']);

    $homepagetext = $exhibit_info['omeka-bootswatch-themes-master']['homepage_text'];
    $homepagetext = preg_replace('/\<span\>|\<\/span\>/', '', $homepagetext);
    
?>

    <?php $exhibitCount++; ?>
    <div class="exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
        <h3><?php echo link_to_exhibit(); ?></h3>
        <?php if ($exhibitImage = record_image($exhibit)): ?>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
        <?php endif; ?>
        
        <?php 
        
// this section handles the display of the description for the exhibit        
            echo "<div class='description'>";
        
// this overrides the Bootswatch default behavior of showing the description field, by showing the homepage text if it exists       
            if ($homepagetext != '')
                {
                echo "<p>" . $homepagetext . "</p>";
                }
        
            else {
                $exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true));
                
                echo $exhibitDescription; 
                }
        echo "</div>";
        ?>
        
        <?php 
// this section handles the display of the tags on the homepage
        
        if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
        <p class="tags"><?php echo $exhibitTags; ?></p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>