<?php 
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>

    <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

    <div class="row">
        <div class="col-sm-6">
                <?php $images = $item->Files; $imagesCount = 1; ?>
                <?php if ($images): ?>
                <ul id="image-gallery" class="clearfix">
                    <?php foreach ($images as $image): ?>
                        <?php if ($imagesCount === 1): ?>
                            <img src="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>" />
                        <?php endif; ?>
                    <?php $imagesCount++; endforeach; ?>
                </ul>
                <?php else: ?>
                    <div class="no-image"></div>
                <?php endif; ?>
        </div>
        </div>
            <?php echo all_element_texts('item'); ?>
        
            <!-- The following returns all of the files associated with an item. -->
            <?php if (metadata('item', 'has files')): ?>
                <div id="itemfiles" class="element">
                    <h3><?php echo __('Files'); ?></h3>
                    <div class="element-text"><?php echo files_for_item(); ?></div>
                </div>
            <?php endif; ?>
            
            <!-- If the item belongs to a collection, the following creates a link to that collection. -->
            <?php if (metadata('item', 'Collection Name')): ?>
                <div id="collection" class="element">
                    <h3><?php echo __('Collection'); ?></h3>
                    <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
                </div>
            <?php endif; ?>
            
            <!-- The following prints a list of all tags associated with the item -->
            <?php if (metadata('item', 'has tags')): ?>
                <div id="item-tags" class="element">
                    <h3><?php echo __('Tags'); ?></h3>
                    <div class="element-text"><?php echo tag_string('item'); ?></div>
                </div>
            <?php endif;?>
            
            <!-- The following prints a citation for this item. -->
            <div id="item-citation" class="element">
                <h3><?php echo __('Citation'); ?></h3>
                <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
            </div>
            
            <div id="item-output-formats" class="element">
                <h3><?php echo __('Output Formats'); ?></h3>
                <div class="element-text"><?php echo output_format_list(); ?></div>
            </div>
        </div>
    </div>
    
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
    <ul class="pager">
        <li class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>

<?php echo foot(); ?>
