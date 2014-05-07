<?php 
error_reporting(-1);

$selected = 3; 
include('includes/header.php'); 

require_once('../timelord/bin/settings.php');
require_once('../timelord/bin/keywordListPage.php');
require_once('../timelord/bin/HTMLoutput.php');
require_once('../timelord/bin/recentStories.php');

$selected = 7;
include('includes/changelog_sidebar.php');




?>

<ul class="right_content">
	
	<?php

	$page = (isset($_GET['page']) ? $_GET['page'] : 1);
	$show = (isset($_GET['show']) ? $_GET['show'] : "");

	$klp = new KeywordListPage( $page );

	if($show == "defunct") {
		$klp->setPageTitle("Defunct Food & Dining Locations");
		$klp->setSubLinks("Click <a href=\"food.php\">here</a> for current Food & Dining locations.");
		$keyword_ids = array();
	}
	else {
		$klp->setPageTitle("Food & Dining");
		$klp->setSubLinks("Click <a href=\"food.php?show=defunct\">here</a> for defunct Food & Dining locations");
		$keyword_ids = array(23, 22, 21, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94);
	}
	
	$klp->setListWithIDs( $keyword_ids );
	HTMLoutput::KeywordListPage( $klp );

	?>

</ul>


<?php
include('includes/footer.php'); 
?>