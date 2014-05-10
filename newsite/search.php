<?php 
error_reporting(-1);

$selected = 3; 
include('includes/header.php'); 

require_once('../timelord/bin/settings.php');
require_once('../timelord/bin/search.php');
require_once('../timelord/bin/HTMLoutput.php');
require_once('../timelord/bin/recentStories.php');

$selected = 7;
include('includes/changelog_sidebar.php');




?>

<ul class="right_content">
	
	<?php

	$s = new Search("new");

	?>

</ul>


<?php
include('includes/footer.php'); 
?>