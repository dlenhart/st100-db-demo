<?php 
/*
	Author:  Drew D. Lenhart
	http://www.drewlenhart.com
	Page: install.php
	Desc: Installs Applications Links to the Launcher.
	*/
require("includes/database.class.php");
include ("includes/functions.php"); 
include ("includes/validator.php");


$db = database::getInstance();

$title = $location = $img_loc = $sum = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
	$titleErr = "<div class='alert alert-danger'>You must have a <strong>Title</strong>!</div>";
    }
    elseif (empty($_POST["loc"])) {
        $ingErr = "<div class='alert alert-danger'>You must have an app <strong>Location</strong>!</div>";
    }
    elseif (empty($_POST["img"])) {
	$insErr = "<div class='alert alert-danger'>Your app must have a <strong>Icon</strong>!</div>";
    }
    else {
        $title = validator($_POST['title']);
	$location = validator($_POST['loc']);
	$img_loc = validator($_POST['img']);
	$sum = validator($_POST['sum']);
		
	if(isset($_POST['save'])){
            //Now lets insert the data

            $data = array(
            ':Title' => $title,
            ':Location' => $location,
            ':Img' => $img_loc,
            ':Summary' => $sum);
            
            $sql= 'INSERT INTO app_info (Title, Location, Img_loc, Summary) VALUES (:Title,:Location,:Img,:Summary)';

            $db->insertData($sql, $data);
            
            $added = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>You have successfully added a new app to the launcher!</div>";
	}
    }
}
?>

<?php include("includes/header.php"); ?>
<?php include("includes/navbar.php"); ?>

<article>
    <h1>Install Applications</h1>
    <br />
<div class="alert alert-warning"><strong>Please</strong>, when installing apps, please place files in apps/AppName/.  Otherwise use the web link option to create shortcuts.</div>

<?php echo $added;?>
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Manual Install</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<label for="title"><b>*Title: </b></label><br />
	<input type="text" class="form-control" placeholder="My App" name="title" id="title" value="<?php echo $title; ?>">
	<?php echo $titleErr;?>
	<br />
					
	<label for="loc"><b>*App Location: </b><br />
	<div class="alert alert-info">You may link to files in your web root ( e.g. apps/AppName or a hyperlink! Don't forget the <strong>http://</strong>! ).</div>
	</label>
	<input type="text" class="form-control" placeholder="e.g. apps/AppName or http://www.google.com" name="loc" id="loc" value="<?php echo $location; ?>">
	<?php echo $ingErr;?>
	<br />
					
	<label for="img"><b>*Icon Location: </b></label><br />
	<input type="text" class="form-control" placeholder="e.g. apps/AppName/icon.png" name="img" id="img" value="<?php echo $img_loc; ?>">
	<?php echo $insErr;?>
	<br />
					
	<label for="sum"><b>Summary: </b></label><br />
	<textarea class="form-control" rows="3" name="sum" id="sum" placeholder="A fantasic summary!"><?php echo $sum; ?></textarea>
	<br />
	<input name="save" type="submit" id="save" value="Install" class="btn btn-primary btn-lg" />
	<input type="reset" id="cancel" name="reset" value="Reset" class="btn btn-danger btn-lg" /><br /><br />
        * = Required fields.

	</form>
    </div>
</div>
</article>
<?php $db->closeConn() ?>
<?php include("includes/footer.php"); ?>