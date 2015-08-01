<?php 
/*
	Author:  Drew D. Lenhart
	http://www.drewlenhart.com
	Page: includes/functions.php
	Desc: misc functions.
	*/
require_once("database.class.php");

function get_title(){
	$db_once = database::getInstance();
	$sql = "SELECT * FROM common_entry where ID = 1";
        
        $row = $db_once->getDataSingle($sql);

	$Name = $row['Name'];
	echo $Name;
        
        //$db_once->closeConn();
}
?>