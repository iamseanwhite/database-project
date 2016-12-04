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
        header('Location: http://web.engr.oregonstate.edu/~semexanb/index.php');
	}
}

//SELECT
else if (isset($_POST['filterbusiness'])) {
    $name = $_POST['name'];
    if(!($stmt = $mysqli->prepare("SELECT * FROM business WHERE name = '$name'"))){
        echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }

    if(!$stmt->execute()){
        echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }else{
        header('Location: http://web.engr.oregonstate.edu/~semexanb/index.php');
    }


    $stmt->close();
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
        header('Location: http://web.engr.oregonstate.edu/~semexanb/index.php');
    }
}

//UPDATE BY field
else if (isset($_POST['updatebusiness'])) {
    $name = $_POST['name'];
    $field = $_POST['field'];
    $location = $_POST['location'];

    if(!($stmt = $mysqli->prepare( "UPDATE business SET name = '$name', field='$field', location='$location' WHERE field ='$field'"))){
        echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }

    if(!$stmt->execute()){
        echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
    } else {
        header('Location: http://web.engr.oregonstate.edu/~semexanb/index.php');
    }
}

//UPDATE BY location
else if (isset($_POST['updatebusiness'])) {
    $name = $_POST['name'];
    $field = $_POST['field'];
    $location = $_POST['location'];

    if(!($stmt = $mysqli->prepare( "UPDATE business SET name = '$name', field='$field', location='$location' WHERE location ='$location'"))){
        echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }

    if(!$stmt->execute()){
        echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
    } else {
        header('Location: http://web.engr.oregonstate.edu/~semexanb/index.php');
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
        header('Location: http://web.engr.oregonstate.edu/~semexanb/index.php');
    }
    $stmt->close();

}
?>