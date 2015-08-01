<?php
/*
	Author:  Drew D. Lenhart
	http://www.drewlenhart.com
	Page: index.php
	Desc: Main view screen.	Displays installed applications.
	*/

require_once('includes/database.class.php');

$db = database::getInstance();

include("includes/functions.php"); 
include("includes/header.php"); 
include("includes/navbar.php"); ?>

<article>
<h1>Applications</h1>
<br />
<div class="container-fluid">
    <div class="row" style="text-align: center">
<?php
$sql = 'SELECT * FROM app_info';
$rows = $db->getData($sql);

foreach ($rows as $row) : 
    $entryID = $row['ID'];
    $title = $row['Title'];
    $loc = $row['Location'];
    $img_loc = $row['Img_loc'];
    echo "<div class='col-xs-6 col-sm-3' style='margin-bottom: 4%'><a href='$loc'><img src='$img_loc' /></a><br /><br /><a type='button' class='btn btn-default btn-xs' href='appinfo.php?id=" . $entryID . "'><span class='glyphicon glyphicon-edit'></span> " . $title . "</a></div>";		
endforeach;
?>
    </div>
</div>
</article>
<?php $db->closeConn() ?>
<?php include("includes/footer.php"); ?>