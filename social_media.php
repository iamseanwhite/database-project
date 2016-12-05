<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","whites3-db","fwL6zE0hlK7GW9WU","whites3-db");
if($mysqli->connect_errno){
    echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

//INSERT
if (isset($_POST['addsocialmedia'])) {
	if(!($stmt = $mysqli->prepare("INSERT INTO social_media_platform (name)  VALUES (?) "))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("s",$_POST['social_media_platform']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
        header('Location: http://web.engr.oregonstate.edu/~whites3/social-media-archive/index.php');
	}
}

//SELECT
else if (isset($_POST['filtersocialmedia'])){
	echo '<table style="float: left">
        <tr>
            <th>Social Media Platform</th>
        </tr>
        <tr>
            <td>Name</td>
        </tr>
        <tr>
            <td> </td>
        </tr>';

        $s_m_name = $_POST['social_media_platform'];
        if(!($stmt = $mysqli->prepare("SELECT social_media_platform.name FROM social_media_platform WhERE social_media_platform.name = '$s_m_name' "))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        if(!$stmt->bind_result($s_m_name)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        while($stmt->fetch()){
            echo "<tr>\n<td>\n" . $s_m_name . "\n</td>\n</tr>\n";
        }
        $stmt->close();
    
    echo '</table>
	</div>';
}

?>