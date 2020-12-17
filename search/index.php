<div id="secondary-nav"><span class="backhome"><a href="https://rbscp.lib.rochester.edu">&lt; RBSCP Home</a></span></div>
<?php
    $pageTitle = __('Search Omeka ') . __('(%s total)', $total_results);
    echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
    $searchRecordTypes = get_search_record_types();
?>
    <h5>Search Results:</h5>
      
<!-- Hiding most of the default output for this page, and including only the title, hyperlinked to the OSD viewer - 20171113, jss -->    
   
    <?php if ($total_results): ?>
        <table id="search-results">
            <!--
            <thead>
                <tr>
                    <th><?php echo __('Record Type');?></th>
                    <th><?php echo __('Title');?></th>
                </tr>
            </thead>
            -->
            <tbody>
                <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
                <?php foreach (loop('search_texts') as $searchText): ?>
                <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                <?php $recordType = $searchText['record_type']; ?>
                <?php set_current_record($recordType, $record); ?>
                
                
                <tr class="<?php echo strtolower($filter->filter($recordType)); ?>">
                	<td colspan="2">
                	 <?php
				 // only outputting the link to the viewer and the title of the item, per conversation with MM, 20171113, jss
				  
				 //some debugging code here, including in case other data elements are included at a later point
				 //echo $recordType . "<br />";
				 //var_dump($searchText);
				 
				 	if ($recordType == "Item")
				 		{
				 		$this_url = "/viewer/" . $searchText['record_id'];
					
						echo "<a href='" . $this_url . "'>";
						echo $searchText['title'] ? $searchText['title'] : '[Unknown]';
						echo "</a> in RBSCP Exhibitions";
						}	
					?>	
                	</td>
                </tr>	
                
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo pagination_links(); ?>
    <?php else: ?>
        <p><?php echo __('Your query returned no results.');?></p>
    <?php endif; ?>
<?php echo foot(); ?>