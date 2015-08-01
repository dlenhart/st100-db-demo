<?php
/*
	Author:  Drew D. Lenhart
	http://www.drewlenhart.com
	Page: appinfo.php
	Desc: Display App info  edit/delete	
	*/
require_once('includes/database.class.php');
include ("includes/functions.php"); 
include ("includes/validator.php");

//Create new object using the $pdo variable from connection.php
$db = database::getInstance();

$entryID = strip_tags($_GET['id']);
							
$query = "SELECT * FROM app_info where ID = '$entryID'";
$row = $db->getDataSingle($query);

$title = $row['Title'];
$sum = $row['Summary'];
$img = $row['Img_loc'];
$loc = $row['Location'];
$date = $row['Post_Date'];
$id = $row['ID'];

$dateConverted = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Update App info
    if(isset($_POST['submit']))
        {
            $new_title = validator($_POST['title']);
            $new_loc = validator($_POST['loc']);
            $new_img = validator($_POST['img']);
            $new_sum = validator($_POST['sum']);

            $sql="UPDATE app_info SET Title='$new_title', Location='$new_loc', Img_loc='$new_img', Summary='$new_sum' WHERE ID='$entryID'";
            $result = $db->updateData($sql);

            if($result){
                die("Database query failed: update appinfo.");
            }else{
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=appinfo.php?id=" . $entryID . "\">";
            }
        }
    //Delete application
    if(isset($_POST['delete'])){
        $sql = "DELETE FROM app_info WHERE ID='$entryID'";
        $result=$db->updateData($sql);
			
        if($result){
            die("Database query failed: delete appinfo.");
        }else{
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
        }
    }
}	
?>
<?php include("includes/header.php"); ?>
<?php include("includes/navbar.php"); ?>
<article>
	<div class="panel panel-default">
	  <div class="panel-heading"><?php echo $title; ?></div>
	  <div class="panel-body">
	    
	    <img src="<?php echo $img; ?>" /><br /><br />
            <a href="<?php echo $loc; ?>" class="btn btn-primary btn-lg">Launch!</a>
            <br /><br />
	    Updated: <?php echo $date; ?><br /><br />
	    Summary: <br />
	    <b><?php echo $sum; ?></b>
	    <hr />
	    <h3>Edit/Remove</h3>
	    *Edit app information<br /><br />

	    <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myEdit">Edit Info</a>
	    <a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myRemove">Delete</a>
	    <hr />
	    
	  </div>
	</div>
</article>

<!-- Edit Modal -->
<div class="modal fade" id="myEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Information</h4>
      </div>
      <div class="modal-body">
        <form name="" method="POST" action="">
		 
		<input type="hidden" name="id" id="id" value="<?php echo $id;?>" class="form-control">
		<label for="title"><b>Title: </b></label><br />
		<input type="text" name="title" id="title" value="<?php echo $title;?>" class="form-control">
		<br />
		<label for="loc"><b>App Location: </b></label><br />
		<input type="text" name="loc" id="loc" value="<?php echo $loc;?>" class="form-control">
		<br />
		<label for="img"><b>Icon Location: </b></label><br />
		<input type="text" name="img" id="img" value="<?php echo $img;?>" class="form-control">
		<br />
		<label for="sum"><b>Summary: </b></label><br />
		<textarea class="form-control" rows="3" name="sum" id="sum"><?php echo $sum;?></textarea>
		<br /><br />
            
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

<!-- Delete Modal -->
<div class="modal fade" id="myRemove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Remove App</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to remove <b><?php echo $title;?></b> from launcher?<br /><br />
          *This only removes from launcher, you will need to delete files and any associated database entries manually.<br /><br />
                <form name='form1' method='post' action=''>
                    <input name='delete' type='submit' id='delete' value='Delete' class='btn btn-primary btn-lg' />
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- End Delete Modal -->
<?php include("includes/footer.php"); ?>