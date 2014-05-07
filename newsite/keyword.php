<?php 
error_reporting(-1);
$selected = 3; 
include('includes/header.php'); 

require_once('../timelord/bin/settings.php');
require_once('../timelord/bin/keywordSearch.php');
require_once('../timelord/bin/keywordPage.php');
require_once('../timelord/bin/HTMLoutput.php');
require_once('../timelord/bin/recentStories.php');

$selected = 0;
include('includes/changelog_sidebar.php');




$search = (isset($_GET['s']) ? $_GET['s'] : "");
$page = (isset($_GET['page']) ? $_GET['page'] : 1);

$k = KeywordSearch::find($search);

if($k) {
	$kp = new KeywordPage($k, $page);
	HTMLoutput::keywordPage($kp);
}


?>

<?php include('includes/footer.php'); ?>