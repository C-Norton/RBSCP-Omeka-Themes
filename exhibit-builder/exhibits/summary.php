<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

<?php
$pageTree = exhibit_builder_page_tree();
if ($pageTree):
?>

<div class="col-md-4">
        <nav id="exhibit-pages" style="">
            <?php echo $pageTree; ?>
        </nav>
        <?php endif; ?>
</div>

<div class="col-md-8">
    <div class="exhibit-content-col">
        <h1><?php echo metadata('exhibit', 'title'); ?></h1>
        <?php echo exhibit_builder_page_nav(); ?>
        <div id="primary">
            <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
            <div class="exhibit-description">
                <?php echo $exhibitDescription; ?>
            </div>
            <?php endif; ?>
            <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
            <div class="exhibit-credits">
                <h3><?php echo __('Credits'); ?></h3>
                <p><?php echo $exhibitCredits; ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php echo foot(); ?>
