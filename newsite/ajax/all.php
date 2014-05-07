<?php

require_once('../../timelord/bin/settings.php');
require_once('../../timelord/bin/allPage.php');
require_once('../../timelord/bin/HTMLoutput.php');

if(isset($_GET['sortby']) && $_GET['sortby'] == "revised") 
	$orderby = "revised_on";
else
	$orderby = "occurred_on";
if(isset($_GET['top']) && $_GET['top'] == "oldest") 
	$direction = "ASC";
else
	$direction = "DESC";
if(isset($_GET['page']) && is_numeric($_GET['page']))
  $page = $_GET['page'];
else
  $page = 1;

$ap = new AllPage($orderby, $direction, $page);
HTMLoutput::allPage($ap);

?>