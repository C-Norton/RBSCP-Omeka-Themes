	</div><!-- end content -->
</main>
<footer class="container-fluid bg-primary">
	<div class="row">
		<div id="footer-content" class="col-sm-12 text-center">
	      
	        <div id="custom-footer-text">
	            <p>
				
<?php 
//commenting out default footer info, adding custom statement that has dynamic copyright info
//echo "<div class='region region-footer'>Copyright © 1998-" . date("Y") . " University of Rochester Libraries. All Rights Reserved</div>";
						
print '
				<div class="container">
          			<div class="region region-footer">
    					<div id="block-block-2" class="block block-block">
							<div class="content">
    							<div style="float:right; width:50%; text-align:right;">

									<a href="http://rbscp.lib.rochester.edu/user">RBSCP Staff Login</a> | 
									<a href="http://library.rochester.edu/privacy">Privacy Statement</a> | 
									<a href="http://library.rochester.edu/copyright">Copyright &amp; Fair Use</a>

									<br>

									Copyright © 1998-' . date("Y") . ' University of Rochester Libraries. All Rights Reserved

								</div>  
							</div>
						</div>
  					</div>
      			</div>';
				
//echo get_theme_option('Footer Text'); 
?>
<!-- end footer-content row -->
		
<?php 
	 
fire_plugin_hook('public_footer', array('view'=>$this)); 
?>

</footer>

</body>

</html>