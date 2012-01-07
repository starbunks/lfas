<?php
require_once('/home/content/75/4893175/html/dev/config.php');
require_once(CODE . 'page_utility.php');

require_once(CODE . 'zip_info.php');
require_once(CODE . 'zip_code.php');
require_once(CODE . 'zip_info_state.php');

$zip_code = $_REQUEST['zip'];
$state = $_REQUEST['state'];
$city = $_REQUEST['city'];
//print_r($_REQUEST);

// VALIDATION - make sure a zipcode sent on the request
if (!$zip_code) {
echo header('Location: http://lookingforasitter.com/us?searcherror=missingzip');
}

// VALIDATION - make sure URL is correct
searchResultsValidation($state, $city, $zip_code);

if ($zip_code) {
  
  $zip_info = new zip_info($zip_code);
  $zip = new zip_code($zip_code);
  
  $page_header_html = getPageHeader($zip_info->zipCopy());
  $page_breadcrumb = getPageBreadCrumb($zip);
  $page_title = 'Looking For A Sitter   &raquo; ' . $zip->getData('CityName') . ' babysitters in ' . $zip->getData('CityName') . ', ' . $zip->getData('StateName') .' '. $zip->getData('ZipCode');
  $page_description_content = 'Find local ' . $zip->getData('CityName') . ' care providers - Visit LookingForASitter.com to find local babysitters, nannies, mothers helpers, au pairs in ' . $zip->getData('CityName') . ' ' . $zip->getData('StateName') . ' ' . $zip->getData('ZipCode');
  $page_keywords_content = $zip->getData('CityName') . ' babysitters, child care in ' . $zip->getData('CityName') . ', ' . $zip->getData('CityName') . ' nannies, ' . $zip->getData('CityName') . ' mothers helpers, ' . $zip->getData('CityName') . ' au pair in ' . $zip->getData('CityName') .' '. $zip->getData('StateName') .' '. $zip->getData('ZipCode');
}
?>

<?php require_once(TEMPLATE . 'header.php'); ?>

<div id="container">


<div id="header">
<h1><a  rel="nofollow" href="http://lookingforasitter.com/" title="Looking For A Sitter">Looking For A Sitter</a></h1>
<p id="desc"><?php echo getPageHeadline($zip); ?></p>

</div><!-- end id:header -->


  <div id="headerimage">
</div><!-- end id:headerimage -->

<div id="content">
<div id="content-main">

		
			<div class="post" id="post-7">
				<div class="posttitle">
          <?php echo $page_header_html . '<br />' . $page_breadcrumb ?>
				</div>

				<div class="entry">

<?php echo getSitterData($zip_code); ?>
<p>

<a target="_blank" href="http://www.shareasale.com/r.cfm?b=126881&u=283736&m=10994&urllink=&afftrack="><img src="http://www.shareasale.com/image/10994/SCSAVE10_468x60.gif" alt="Looking for a Sitter? Try Sittercity.com Now!" border="0"></a>

</p>					
																				
				</div>
			</div>
							
	</div><!-- end id:content-main -->
	
<?php require_once(TEMPLATE . 'sidebar.php'); ?>

</div><!-- end id:content -->

</div><!-- end id:container -->

<?php require_once(TEMPLATE . 'footer.php'); ?>

</body>
</html>