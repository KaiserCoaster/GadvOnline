<?php 
error_reporting(-1);

$selected = 3; 
include('includes/header.php'); 

require_once('../timelord/bin/settings.php');
require_once('../timelord/bin/keywordListPage.php');
require_once('../timelord/bin/HTMLoutput.php');
require_once('../timelord/bin/recentStories.php');

$selected = 6;
include('includes/changelog_sidebar.php');




?>

<ul class="right_content">
	
	<?php

	$page = (isset($_GET['page']) ? $_GET['page'] : 1);
	$show = (isset($_GET['show']) ? $_GET['show'] : "");

	$klp = new KeywordListPage( $page );

	if($show == "defunct") {
		$klp->setPageTitle("Defunct Rides & Attractions");
		$klp->setSubLinks("Click <a href=\"rides.php\">here</a> for current rides &amp; attractions");
		$keyword_ids = array(19, 14, 24, 26, 28, 25, 30, 27, 29);
	}
	else {
		$klp->setPageTitle("Rides");
		$klp->setSubLinks("Click <a href=\"rides.php?show=defunct\">here</a> for defunct rides &amp; attractions.");
		$keyword_ids = array(15, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 54, 52, 53, 55, 56, 57);
	}
	
	$klp->setListWithIDs( $keyword_ids );
	HTMLoutput::KeywordListPage( $klp );

	?>

</ul>


<?php
include('includes/footer.php'); 
?>