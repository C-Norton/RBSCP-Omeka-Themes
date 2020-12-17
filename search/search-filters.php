<div id="<?php echo $options['id']; ?>">
<!-- Looks like this controls the display of some variables on a site search result - commenting most out, as we want to show just some basic elements like title and the image, and then use a link to the viewer to show the rest -->

<ul>
    <li><?php echo __('Query:');?> <?php echo html_escape($query); ?></li>
    <li><?php echo __('Query type:');?> <?php echo html_escape($query_type); ?></li>
    <li><?php echo __('Record types:');?>
        <ul>
            <?php foreach ($record_types as $record_type): ?>
            <li><?php echo html_escape($record_type); ?></li>
            <?php endforeach; ?>
        </ul>
    </li>
</ul>
</div>
