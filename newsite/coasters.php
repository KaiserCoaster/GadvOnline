<?php 
error_reporting(-1);

$selected = 3; 
include('includes/header.php'); 

require_once('../timelord/bin/settings.php');
require_once('../timelord/bin/keywordListPage.php');
require_once('../timelord/bin/HTMLoutput.php');
require_once('../timelord/bin/recentStories.php');

$selected = 5;
include('includes/changelog_sidebar.php');




?>

<ul class="right_content">
	
	<?php

	$page = (isset($_GET['page']) ? $_GET['page'] : 1);
	$show = (isset($_GET['show']) ? $_GET['show'] : "");

	$klp = new KeywordListPage( $page );

	if($show == "defunct") {
		$klp->setPageTitle("Defunct Roller Coasters");
		$klp->setSubLinks("Click <a href=\"coasters.php\">here</a> for current coasters");
		$keyword_ids = array(19, 14, 24, 33, 28, 25, 30, 27, 29, 34, 31, 32, 26, 35);
	}
	else {
		$klp->setPageTitle("Roller Coasters");
		$klp->setSubLinks("Click <a href=\"coasters.php?show=defunct\">here</a> for defunct coasters");
		$keyword_ids = array(1, 5, 4, 7, 6, 2, 8, 9, 10, 12, 3, 11);
	}
	
	$klp->setListWithIDs( $keyword_ids );
	HTMLoutput::KeywordListPage( $klp );

	?>

</ul>


<?php
include('includes/footer.php'); 
?>