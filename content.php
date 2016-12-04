<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","whites3-db","fwL6zE0hlK7GW9WU","whites3-db");
if($mysqli->connect_errno){
    echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

//INSERT
if (isset($_POST['addcontent'])) {
	if(!($stmt = $mysqli->prepare("INSERT INTO content (type)  VALUES (?) "))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("s",$_POST['content_type']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		echo "Added " . $stmt->affected_rows . " rows to content";
	}
}

//SELECT
else if (isset($_POST['filterbusiness'])) {

	$query = " SELECT id, name, field, location, bid, smpid, id, type, id, name, id, time_posted, character_length, pid, cid, pid, fid, id, name FROM social ";
	$result = mysqli($query);

	if( $result )
	{
		echo 'Success';
	}
	else
	{
		echo 'Query Failed';
	}
}

//UPDATE
else if (isset($_POST['updatebusiness'])) {

	$query = " UPDATE business SET  id = '$id',  name = '$name',  field = '$field',  location = '$location',  bid = '$bid',  smpid = '$smpid',  id = '$id',  type = '$type',  id = '$id',  name = '$name',  id = '$id',  time_posted = '$time_posted',  character_length = '$character_length',  pid = '$pid',  cid = '$cid',  pid = '$pid',  fid = '$fid',  id = '$id',  name = '$name' WHERE col = val ";
	$result = mysqli($query);

	if( $result )
	{
		echo 'Success';
	}
	else
	{
		echo 'Query Failed';
	}
}

//DELETE
else if (isset($_POST['deletebusiness'])) {
	
	$query = " DELETE FROM business WHERE col = val ";
	$result = mysqli($query);

	if( $result )
	{
		echo 'Success';
	}
	else
	{
		echo 'Query Failed';

	}
}
?>