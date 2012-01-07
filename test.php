<?php
require_once('/home/content/75/4893175/html/dev/config.php');
require_once(CODE . 'page_utility_2.php');

require_once(CODE . 'zip_info.php');
require_once(CODE . 'zip_code.php');
require_once(CODE . 'zip_info_state.php');

$zip_code = $_REQUEST['zip'];
$zip_info = new zip_info($zip_code);

echo $zip_info->getData('ZipCode');

print_r($zip_info);

echo date_diff($zip_info->getData('DateModified'));

echo '<br /><br />';

$start = '2010-01-19 00:00:00';
$end = '2010-01-19 11:00:00';
//$end = 'NOW';


echo day_diff($zip_info->getData('DateModified'));

function day_diff($start, $end="NOW") {
  $sdate = strtotime($start);
  $edate = strtotime($end);
  
  $time = $edate - $sdate;
  $pday = ($edate - $sdate) / 86400;
  $preday = explode('.',$pday);
  $days = $preday[0];
  return $days;
}

function date_diff($start, $end="NOW")
{
        $sdate = strtotime($start);
        $edate = strtotime($end);

        $time = $edate - $sdate;
        if($time>=0 && $time<=59) {
                // Seconds
                $timeshift = $time.' seconds ';

        } elseif($time>=60 && $time<=3599) {
                // Minutes + Seconds
                $pmin = ($edate - $sdate) / 60;
                $premin = explode('.', $pmin);
               
                $presec = $pmin-$premin[0];
                $sec = $presec*60;
               
                $timeshift = $premin[0].' min '.round($sec,0).' sec ';

        } elseif($time>=3600 && $time<=86399) {
                // Hours + Minutes
                $phour = ($edate - $sdate) / 3600;
                $prehour = explode('.',$phour);
               
                $premin = $phour-$prehour[0];
                $min = explode('.',$premin*60);
               
                $presec = '0.'.$min[1];
                $sec = $presec*60;

                $timeshift = $prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';

        } elseif($time>=86400) {
                // Days + Hours + Minutes
                $pday = ($edate - $sdate) / 86400;
                $preday = explode('.',$pday);

                $phour = $pday-$preday[0];
                $prehour = explode('.',$phour*24);

                $premin = ($phour*24)-$prehour[0];
                $min = explode('.',$premin*60);
               
                $presec = '0.'.$min[1];
                $sec = $presec*60;
               
                $timeshift = $preday[0].' days '.$prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';

        }
        return $timeshift;
}

exit();
//$zip_code= '60610';

//echo getCurl($zip_code);
//exit();

if (!$zip_code) {
echo header('Location: http://lookingforasitter.com/us?searcherror=missingzip');
}

if ($zip_code) {
  
  $zip_info = new zip_info($zip_code);
  $zip = new zip_code($zip_code);
  
  $page_header_html = getPageHeader($zip_info->zipCopy());
  $page_breadcrumb = getPageBreadCrumb($zip);
  $page_title = 'Looking For A Sitter   &raquo; ' . $zip->getData('CityName') . ' babysitters in ' . $zip->getData('CityName') . ', ' . $zip->getData('StateName') .' '. $zip->getData('ZipCode');
  $page_description_content = 'Find local ' . $zip->getData('CityName') . ' care providers - Visit LookingForASitter.com to find local babysitters, nannies, mothers helpers, au pairs in ' . $zip->getData('CityName') . ' ' . $zip->getData('StateName') . ' ' . $zip->getData('ZipCode');
  $page_keywords_content = $zip->getData('CityName') . ' babysitters, child care in ' . $zip->getData('CityName') . ', ' . $zip->getData('CityName') . ' nannies, ' . $zip->getData('CityName') . ' mothers helpers, ' . $zip->getData('CityName') . ' au pair in ' . $zip->getData('CityName') .' '. $zip->getData('StateName') .' '. $zip->getData('ZipCode');
}

require_once(TEMPLATE . 'header.php');
?>

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