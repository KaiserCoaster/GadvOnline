<?php 
error_reporting(-1);

$selected = 3; 
include('style/header.php'); 

require_once('../timelord/bin/settings.php');
require_once('../timelord/bin/keywordListPage.php');
require_once('../timelord/bin/HTMLoutput.php');
require_once('../timelord/bin/recentStories.php');

$selected = 0;
include('style/changelog_sidebar.php');




?>

<ul class="right_content">

	<div style="height:40px;"></div>
	
	<?php

	if(!isset($_GET['id'])) {
		echo "No ID specified.";
	}
	else {

		$e_id = $_GET['id'];
		$e = new Entry($e_id);
		if(!$e) {
			echo "Invalid ID.";
		}
		else {
			HTMLOutput::entry($e);
		}
		
	}

	?>

</ul>


<?php
include('style/footer.php'); 
?>