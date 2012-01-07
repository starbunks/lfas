<?php
require_once('/home/content/75/4893175/html/dev/config.php');
require_once(CODE . 'page_utility.php');
  
  $hmtl_main = getPagesPostLinks();
  $hmtl_main = '<ul>' . $hmtl_main . '</ul>';

  $html_us_cities .= '<h2>Sitters by location</h2>' .
                    '<ul>' . 
                   '<li><a href="http://lookingforasitter.com/us">All United States</a></li>';
  
  $page_title = 'Looking For A Sitter   &raquo; Helping Parents Find Child Care';
  $page_description_content = 'Need a great babysitter and canÕt find one? Enter your ZIP code and press search and find great babysitters in your area. It has never been easier to find a babysitter.';
  $page_keywords_content = 'sitter search, zipcode, babysitter search, site map';
?>

<?php require_once(TEMPLATE . 'header.php'); ?>

<div id="container">


<div id="header">
<h1><a href="http://lookingforasitter.com/" title="Looking For A Sitter">Looking For A Sitter</a></h1>
<p id="desc">Helping Parents Find Child Care</p>

</div><!-- end id:header -->


<div id="feedarea">

</div><!-- end id:feedarea -->


  <div id="headerimage">
</div><!-- end id:headerimage -->
<div id="content">
<div id="content-main">

		
	<div class="post" id="post-7">
		<div class="posttitle">
		  <h2>
  			<a href="http://lookingforasitter.com/site-map.php" 
            rel="bookmark" 
            title="Link to Looking For A Sitter Site Map">Site Map</a>
			</h2>
		</div>

		<div class="entry">

    <?php echo $hmtl_main; ?>
    
      <div id="posttitle2">
        <h2>Babysitters by area</h2>
          <ul>
          <li><a href="http://lookingforasitter.com/us" title="Link to United States">All United States</a></li>
          <?php echo getNameValue('city'); ?>
          </ul>
      </div>
      
		</div>
		
	</div>
							
	</div><!-- end id:content-main -->

<?php require_once(TEMPLATE . 'sidebar.php'); ?>
	
</div><!-- end id:content -->

</div><!-- end id:container -->

<?php require_once(TEMPLATE . 'footer.php'); ?>


</body>
</html>