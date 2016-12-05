<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","whites3-db","fwL6zE0hlK7GW9WU","whites3-db");
if($mysqli->connect_errno){
    echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

//INSERT
if (isset($_POST['addbusiness'])) {
	if(!($stmt = $mysqli->prepare( "INSERT INTO business (name, field, location)  VALUES (?,?,?) "))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("sss",$_POST['name'],$_POST['field'],$_POST['location']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
        header('Location: http://web.engr.oregonstate.edu/~whites3/social-media-archive/index.php');
	}
}

//SELECT
else if (isset($_POST['filterbusiness'])) {
   echo '<div>
    <table style="float: left">
        <tr>
            <th>Businesses</th>
        </tr>
        <tr>
            <td>Name</td>
            <td>Field</td>
            <td>Location</td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>';
        
		
		$field = $_POST['field'];
        if(!($stmt = $mysqli->prepare("SELECT business.name, business.field, business.location FROM business WHERE business.field = '$field'"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        if(!$stmt->bind_result($name, $field, $location)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        while($stmt->fetch()){
            echo "<tr>\n<td>\n" . $name . "\n</td>\n<td>\n" . $field . "\n</td>\n<td>\n" . $location . "\n</td>\n</tr>";
        }
        $stmt->close();
        
    echo '</table>
</div>';
}

//UPDATE BY name
else if (isset($_POST['updatebusiness'])) {
    $name = $_POST['name'];
    $field = $_POST['field'];
    $location = $_POST['location'];

    if(!($stmt = $mysqli->prepare( "UPDATE business SET name = '$name', field='$field', location='$location' WHERE name ='$name'"))){
        echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }

    if(!$stmt->execute()){
        echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
    } else {
        header('Location:http://web.engr.oregonstate.edu/~whites3/social-media-archive/index.php');
    }
}


//DELETE
else if (isset($_POST['deletebusiness'])) {
    $name = $_POST['name'];
    if (!($stmt = $mysqli->prepare("DELETE FROM business WHERE name = '$name'"))) {
        echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
    } else{
        header('Location: http://web.engr.oregonstate.edu/~whites3/social-media-archive/index.php');
    }
    $stmt->close();

}
?>