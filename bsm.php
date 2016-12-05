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
	if(!($stmt->bind_param("ii",$_POST['business'], $_POST['socialmedia']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		echo "Added " . $stmt->affected_rows . " rows to Business / Social Media";
	}
}

//SELECT
else if (isset($_POST['filterbsm'])) {
    echo '<div>
<table style="float: left">
        <tr>
            <th>Business / Social Media</th>
        </tr>
        <tr>
            <td>Business</td>
            <td>Social Media</td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>';
	
		$business = $_POST['business'];
        if(!($stmt = $mysqli->prepare("
		SELECT b.name, smp.name 
		FROM business b
		INNER JOIN business_social_media bsm ON b.id = bsm.bid 
		INNER JOIN social_media_platform smp ON smp.id = bsm.smpid 
		WHERE b.id = '$business'"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        if(!$stmt->bind_result($b_name, $s_m_name)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        while($stmt->fetch()){
            echo "<tr>\n<td>\n" . $b_name . "\n</td>\n<td>\n" . $s_m_name . "\n</td>\n</tr>\n";
        }
        $stmt->close();
    echo '</table>
</div>';
}

?>
