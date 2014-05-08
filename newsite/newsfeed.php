<?php 
error_reporting(-1);

$selected = 3; 
include('includes/header.php'); 

require_once('../timelord/bin/settings.php');
require_once('../timelord/bin/allPage.php');
require_once('../timelord/bin/HTMLoutput.php');
require_once('../timelord/bin/recentStories.php');

$selected = 1;
include('includes/changelog_sidebar.php');


if(isset($_GET['sortby']) && $_GET['sortby'] == "revised") 
	$orderby = "revised_on";
else
	$orderby = "occurred_on";
if(isset($_GET['top']) && $_GET['top'] == "oldest") 
	$direction = "ASC";
else
	$direction = "DESC";
if(isset($_GET['page']) && is_numeric($_GET['page'])) {
	$page = $_GET['page'];
}
else {
	$page = 1;
}

echo "<ul class=\"right_content\">";

$revisedprint = ($orderby == "revised_on" ? "selected=\"selected\"" : "");
$ASCprint = ($direction == "ASC" ? "selected=\"selected\"" : "");
echo "<div id=\"sortby\">Sort by: 
		<select name=\"sortby\">
			<option value=\"date\">Date Occurred</option>
			<option value=\"revised\" " . $revisedprint . ">Date Posted</option>
		</select>
		<select name=\"top\">
			<option value=\"recent\">Most Recent</option>
			<option value=\"oldest\" " . $ASCprint . ">Oldest</option>
		</select>
	</div>";

echo "<div class=\"page_title\">Newsfeed</div>";

echo "<div id=\"entry_list\">";

$ap = new AllPage($orderby, $direction, $page);
HTMLoutput::allPage($ap);

echo "</div></ul>";

include('includes/footer.php'); 
?>