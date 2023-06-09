<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass' => 'exhibits summary')); ?>
<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>
<?php
$pageTree = exhibit_builder_page_tree();
if ($pageTree):
?>

<div class="col-md-4">
    <nav id="exhibit-pages" style="">
        <?php
        // conditional logic added here to override font color for page tree links (specifically John a Williams
        // Where the link color will be invisible or hard to read - 20230304, cnorton9

        $this_exhibitiontitle = metadata('exhibit', 'title');
        if (preg_match('/Writings of Consequence: The Art of John A. Williams/',$this_exhibitiontitle)){
            $pageTreeArray = explode('<a href',$pageTree); //grab all the links
            echo $pageTreeArray[0];
            for ($i=1; $i<sizeof($pageTreeArray); $i++){
                echo '<a style="color:#505050;" href'.$pageTreeArray[$i]; // add a style block.
            }
        }

        else{
        echo $pageTree;}
        ?>
    </nav>
    <?php endif; ?>
</div>

<div class="col-md-8">
    <div class="exhibit-content-col">
        <?php

        // conditional logic added here to override font color for certain exhibitions for which the default title font will be invisible or hard to read - 20220914, jss

        // set variable for exhibition title
        $this_exhibitiontitle = metadata('exhibit', 'title');

        // if exhibition is Rocky Simmons, override default font color
        if (preg_match('/Rocky Simmons/', $this_exhibitiontitle)) {
            echo "<h1 style='color: #2B3E50;'>" . $this_exhibitiontitle . "</h1>";
        } // Used to alter font color on John A. Williams
        elseif (preg_match('/Writings of Consequence: The Art of John A. Williams/', $this_exhibitiontitle)) {
            echo "<h1 style='color:#505050;'>" . $this_exhibitiontitle . "</h1>";
        } // otherwise, just use the default font color
        else {
            echo "<h1>" . $this_exhibitiontitle . "</h1>";
        }
        // original echo statement for outputting the title of the exhibition
        //echo metadata('exhibit', 'title');

        ?>
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
