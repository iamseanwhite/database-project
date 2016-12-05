<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","whites3-db","fwL6zE0hlK7GW9WU","whites3-db");
if($mysqli->connect_errno){
    echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

//INSERT
if (isset($_POST['addbsm'])) {

	if(!($stmt = $mysqli->prepare("INSERT INTO business_social_media (bid, smpid)  VALUES (?,?) "))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("ii",$_POST['business'],$_POST['socialmedia']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		echo "Added " . $stmt->affected_rows . " rows to Business / Social Media";
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
