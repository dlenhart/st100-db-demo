<?php 
/*
	Author:  Drew D. Lenhart
	http://www.drewlenhart.com
	Page: settings.php
	Desc: Main view screen.	Displays installed applications.
	*/
require_once("includes/database.class.php");
include ("includes/functions.php"); 
include ("includes/validator.php");

$db = database::getInstance();

$new_title = "";

if(isset($_POST['submit']))
{
    $new_title = validator($_POST['title']);

    $sql="UPDATE common_entry SET Name='$new_title' WHERE ID = '1'";
    $result = $db->updateData($sql);

    if($result){echo "<meta http-equiv=\"refresh\" content=\"0;URL=settings.php\">";}
}
include("includes/header.php"); 
?>

<?php include("includes/navbar.php"); ?>

<article>
    <h1>Settings</h1>
<br />
	<div class="panel panel-default">
	  <div class="panel-body">
              <h4>Current title: <?php get_title(); ?></h4><br /><br />
		<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myEditTitle">Edit Title</a>
	  </div>
	</div>
</article>

<!-- Edit Modal -->
<div class="modal fade" id="myEditTitle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Information</h4>
      </div>
      <div class="modal-body">
<form method="POST" action="">
		 
		<label for="title"><b>Title: </b></label><br />
		<input type="text" name="title" id="title" value="<?php echo get_title(); ?>" class="form-control">
		<br />
            
		<input name="submit" type="submit" id="submit" value="Save Changes" class="btn btn-primary btn-lg" />
<br />
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- End Edit Modal -->
<?php $db->closeConn() ?>
<?php include("includes/footer.php"); ?>