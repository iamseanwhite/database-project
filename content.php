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
        header('Location: http://web.engr.oregonstate.edu/~whites3/social-media-archive/index.php');
	}
}


else if (isset($_POST['filtercontent'])){
    echo'<table style="float: left">
        <tr>
            <th>Content</th>
        </tr>
        <tr>
            <td>Type</td>
        </tr>
        <tr>
            <td> </td>
        </tr>';


        $content = $_POST['content_type'];
        if(!($stmt = $mysqli->prepare("SELECT content.type FROM content WHERE content.type = '$content'"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        if(!$stmt->bind_result($c_type)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        while($stmt->fetch()){
            echo "<tr>\n<td>\n" . $c_type . "\n</td>\n</tr>\n";
        }
        $stmt->close();

    echo '</table>';
}

?>