<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","whites3-db","fwL6zE0hlK7GW9WU","whites3-db");
if($mysqli->connect_errno){
    echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

//INSERT
if (isset($_POST['addpost'])) {

	if(!($stmt = $mysqli->prepare("INSERT INTO post (time_posted, character_length, business)  VALUES (?,?,?) "))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("sii",$_POST['time_posted'],$_POST['character_length'],$_POST['business']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
        header('Location: http://web.engr.oregonstate.edu/~whites3/social-media-archive/index.php');
	}
}

else if (isset($_POST['filterpost'])) {
    echo '<div>
<table style="float: left">
        <tr>
            <th>Posts</th>
        </tr>
        <tr>
            <td>Time Posted</td>
            <td>Character Length</td>
			<td>Business</td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>';

        $business = $_POST['business'];
        if(!($stmt = $mysqli->prepare("
		SELECT p.time_posted, p.character_length, b.name 
		FROM post p 
		INNER JOIN business b ON b.id = p.business 
		WHERE b.id = '$business'"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        if(!$stmt->bind_result($p_timeposted, $p_charlength, $p_business)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        while($stmt->fetch()){
            echo "<tr>\n<td>\n" . $p_timeposted . "\n</td>\n<td>\n" . $p_charlength . "\n</td>\n<td>\n" . $p_business . "\n</td>\n</tr>\n";
        }
        $stmt->close();
    echo '</table>
</div>';
}

?>