	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">


			<div id="site-generator">
				
				<div id="cityfooter">
					<?php echo '<h2>' . $footer_header . '</h2>'; ?>
				<ul>
					<?php 
					// echo Service_Pageutility::getFooterCityList(); 
					echo $footer_city_list;
					?>
				</ul>
	
			</div> <!-- end cityfooter -->
		</div> <!-- end site-generator -->

		<div id="footerbelow">
			<?php echo $footer_last_list; ?>
		</div>
			
	</footer><!-- #colophon -->
</div><!-- #page -->


</body>
</html>