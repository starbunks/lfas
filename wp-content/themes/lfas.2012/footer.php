<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>

			<div id="site-generator">
				
				<div id="cityfooter">
					<h2>Find Caregivers in Your City</h2>
				<ul>
				  <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/atlanta/georgia/30361" title="Link to Atlanta">Atlanta</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/austin/texas/78703" title="Link to Austin">Austin</a></li><li><a href="us/boston/massachusetts/02119" title="Link to Boston">Boston</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/charlotte/north-carolina/28204" title="Link to Charlotte">Charlotte</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/chicago/illinois/60622" title="Link to Chicago">Chicago</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/cleveland/ohio/44127" title="Link to Cleveland">Cleveland</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/columbus/ohio/43201" title="Link to Columbus">Columbus</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/dallas/texas/75205" title="Link to Dallas">Dallas</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/denver/coloardo/80238" title="Link to Denver">Denver</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/detroit/michigan/48206" title="Link to Detroit">Detroit</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/fort-worth/texas/76102" title="Link to Fort Worth">Fort Worth</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/hartford/connecticut/06105" title="Link to Hartford">Hartford</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/houston/texas/77056" title="Link to Houston">Houston</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/indianapolis/indiana/46202" title="Link to Indianapolis">Indianapolis</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/los-angeles/california/90018" title="Link to Los Angeles">Los Angeles</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/madison/wisconsin/53715" title="Link to Madison">Madison</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/miami/florida/33144" title="Link to Miami">Miami</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/milwaukee/wisconsin/53205" title="Link to Milwaukee">Milwaukee</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/minneapolis/innesota/55411" title="Link to Minneapolis">Minneapolis</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/new-york/new-york/10055" title="Link to New York">New York</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/orlando/florida/32806" title="Link to Orlando">Orlando</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/philadelphia/pennsylvania/10055" title="Link to Philadelphia">Philadelphia</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/phoenix/arizona/85012" title="Link to Phoenix">Phoenix</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/pittsburgh/pennsylvania/15219" title="Link to Pittsburgh">Pittsburgh</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/portland/oregon/97204" title="Link to Portland">Portland</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/providence/rhode-island/02903" title="Link to Providence">Providence</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/sacramento/california/95817" title="Link to Sacramento">Sacramento</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/san-diego/california/92123" title="Link to San Diego">San Diego</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/san-francisco/california/94117" title="Link to San Francisco">San Francisco</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/seattle/ashington/98102" title="Link to Seattle">Seattle</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/saint-louis/issouri/63105" title="Link to Saint Louis">Saint Louis</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/tampa/florida/33604" title="Link to Tampa">Tampa</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/raleigh/north-carolina/27608" title="Link to Raleigh">Raleigh</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us/washington/district-of-columbia/20005" title="Link to Washington">Washington</a></li>	<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>us"><b>All United States</b></a></li>

				</ul>
	
			</div> <!-- end cityfooter -->
		</div> <!-- end site-generator -->

			<div id="footerbelow">
				  <ul>
				  <li class=""><a href="<?php echo esc_url( home_url( '/' ) ); ?>babysitting" title="Babysitting">Babysitting</a></li>
				<li class=""><a href="<?php echo esc_url( home_url( '/' ) ); ?>site-maps" title="Site Maps">Site Maps</a></li>
				<li class=""><a href="<?php echo esc_url( home_url( '/' ) ); ?>sitter-search" title="Sitter Search">Sitter Search</a></li>
				<li class=""><a href="<?php echo esc_url( home_url( '/' ) ); ?>us" title="Sitters By States">Sitters By States</a></li>
				<li class=""><a href="<?php echo esc_url( home_url( '/' ) ); ?>sittercity" title="Sittercity">Sittercity</a></li>

				  <li class="	"><a href="<?php echo esc_url( home_url( '/' ) ); ?>site-map.php" title="Site Map">Site Map</a></li>
				  </ul>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>