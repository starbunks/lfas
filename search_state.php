<?php
require_once('/home/content/75/4893175/html/dev/config.php');
require_once(CODE . 'page_utility.php');

require_once(CODE . 'zip_info.php');
require_once(CODE . 'zip_code.php');
require_once(CODE . 'zip_info_state.php');


$state = $_REQUEST['state'];
//print_r($_REQUEST);

if (!$state) {
  echo header('Location: http://lookingforasitter.com/us?searcherror=missingstate');
}
elseif ($state) {
//  echo '<h1>' . $state . '</h1>';
  $a_zip_info_state = zip_info_state::getZipInfoState($state);
  $zip_info_state_count = zip_info_state::getZipInfoStateCount($state);
  $zip_info_state = $a_zip_info_state[0];
  
  $page_header_html = getPageHeader($zip_info_state->stateCopy());
  $o_zip_code = new zip_code($zip_info_state->getData('ZipCode'));
  $page_breadcrumb = getPageBreadCrumbForCity($o_zip_code);
  
  $page_title = 'Looking For A Sitter   &raquo;   Babysitters in ' . $zip_info_state->getData('StateName');
  $page_description_content = 'Find local ' . $zip_info_state->getData('StateName') . ' care providers - Visit LookingForASitter.com to find local babysitters, nannies, mothers helpers, au pairs in ' . $zip_info_state->getData('StateName');
  $page_keywords_content = $zip_info_state->getData('StateName') . ' babysitters, child care in ' . $zip_info_state->getData('StateName') . ', ' . $zip_info_state->getData('StateName') . ' nannies, ' . $zip_info_state->getData('StateName') . ' mothers helpers, ' . $zip_info_state->getData('StateName') . ' au pair in ' . $zip_info_state->getData('StateName');
}

?>

<?php require_once(TEMPLATE . 'header.php'); ?>

<div id="container">


<div id="header">
<h1><a href="http://lookingforasitter.com/" title="Looking For A Sitter">Looking For A Sitter</a></h1>
<p id="desc"><?php echo getPageHeadline($zip_info_state); ?></p>

</div><!-- end id:header -->


<div id="feedarea">

</div><!-- end id:feedarea -->


  <div id="headerimage">
</div><!-- end id:headerimage -->
<div id="content">
<div id="content-main">

		
	<div class="post" id="post-7">
		<div class="posttitle">
      <?php echo $page_header_html . '<br />' . $page_breadcrumb ?>
		</div>

		<div class="entry">

    <?php echo getStateData($a_zip_info_state, $zip_info_state_count); ?>
																				
		</div>
	</div>
							
	</div><!-- end id:content-main -->

<?php require_once(TEMPLATE . 'sidebar.php'); ?>
	
</div><!-- end id:content -->

</div><!-- end id:container -->

<?php require_once(TEMPLATE . 'footer.php'); ?>


</body>
</html>