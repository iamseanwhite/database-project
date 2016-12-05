<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","whites3-db","fwL6zE0hlK7GW9WU","whites3-db");
if($mysqli->connect_errno){
    echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<style type="text/css">
    html {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    form label {
        float: left;
        width: 150px;
        margin: 5px;


    }
    .clear {
        display: block;
        clear: both;
        width: 100%;
    }


    select {
        padding: 5px;
        width: 10%;
        height: 4%;
    }
    input {
        padding: 5px;
        width: 10%;
        height: 4%;
        border: 1px solid;
    }

     table, th, td {

         padding: 8px;

     }
    tr:nth-child(even) {background-color: #f2f2f2}
    th {
        background-color: rgba(44, 44, 44, 0.79);
        color: white;
    }

    div > input {
        margin-bottom: 10px;
        margin-top: 10px;
    }

</style>
<body>
<form action="business.php" method="post">

    <fieldset>
        <legend>Business</legend>
        <label for="name">Business Name:</label><input type="text" name="name" id="name" />
        <br class="clear" />
        <label for="field">Field of Business:</label><input type="text" name="field" id="field" />
        <br class="clear" />
        <label for="location">Location</label><input type="text" name="location" id="location" />
        <br class="clear" />
       
    </fieldset>
    <div>
    <input style = "float: left" type="submit" name="addbusiness" value="Add Business"/>
    <input style = "float: left" type="submit" name="filterbusiness" value="Filter By Field"/>
    <input style = "float: left" type="submit" name="updatebusiness" value="Update By Name"/>
    <input type="submit" name="deletebusiness" value="Delete By Name"/>
    </div>
</form>
<form action="post.php" method="post">
    <fieldset>
        <legend>Post</legend>
        <label for="time_posted">Time Posted (YYYY-MM-DD hh:mm:ss):</label><input type="datetime" name="time_posted" id="time_posted" />
        <br class="clear" />

        <label for="time_posted">Character Length:</label><input type="text" name="character_length" id="character_length" />
        <br class="clear" />
        
		<label>Business</label>
        <select name = "business">
            <?php
            if(!($stmt = $mysqli->prepare("SELECT id, name FROM business"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!$stmt->execute()){
                echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            if(!$stmt->bind_result($b_id, $b_name)){
                echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            while($stmt->fetch()){
                echo '<option value=" '. $b_id . ' "> ' . $b_name . '</option>\n';
            }
            $stmt->close();
            ?>
        </select>
        
    </fieldset>
    <div>
    <input style = "float: left" type="submit" name="addpost" value="Add Post"/>
    <input type="submit" name="filterpost" value="Filter Post"/>
    </div>
</form>
<form action="social_media.php" method="post">
    <fieldset>
        <legend>Social Media Platform</legend>
        <label for="social_media_platform">Social Media:</label><input type="text" name="social_media_platform" id="social_media_platform" />
        <br class="clear" />

    </fieldset>
	<div>
    <input style = "float: left" type="submit" name="addsocialmedia" value="Add Social Media"/>
    <input type="submit" name="filtersocialmedia" value="Filter Social Media"/>
	</div>

</form>

<form action="content.php" method="post">
    <fieldset>
        <legend>Content</legend>
        <label for="content">Content Type:</label><input type="text" name="content_type" id="content_type" />
        <br class="clear" />

    </fieldset>
	<div>
    <input style = "float: left" type="submit" name="addcontent" value="Add Content"/>
    <input type="submit" name="filtercontent" value="Filter Content"/>
	</div>
</form>

<form action="feedback.php" method="post">
    <fieldset>
        <legend>Feedback</legend>
        <label for="feedback">Feedback:</label><input type="text" name="feedback" id="feedback" />
        <br class="clear" />

    </fieldset>
	<div>
    <input style = "float: left" type="submit" name="addfeedback" value="Add Feedback"/>
    <input type="submit" name="filterfeedback" value="Filter Feedback"/>
	</div>
</form>


<div>
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
        </tr>
        <?php
        if(!($stmt = $mysqli->prepare("SELECT business.name, business.field, business.location FROM business"))){
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
        ?>
    </table>
</div>

<div>
    <table style="float: left">
        <tr>
            <th>Social Media Platform</th>
        </tr>
        <tr>
            <td>Name</td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <?php
        if(!($stmt = $mysqli->prepare("SELECT social_media_platform.name FROM social_media_platform"))){
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
        ?>
    </table>
</div>

<div>
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
        </tr>


        <?php
        if(!($stmt = $mysqli->prepare("SELECT post.time_posted, post.character_length, business.name FROM post INNER JOIN business ON business.id = post.business"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        if(!$stmt->bind_result($p_timeposted, $p_charlength, $p_business)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        while($stmt->fetch()){
            echo "<tr>\n<td>\n" . $p_timeposted . "\n</td>\n<td>\n" . $p_charlength . "\n</td>\n</tr>\n" . $p_business . "\n</td>\n</tr>\n";
        }
        $stmt->close();
        ?>
    </table>

</div>

<div>
    <table style="float: left">
        <tr>
            <th>Content</th>
        </tr>
        <tr>
            <td>Type</td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>


        <?php
        if(!($stmt = $mysqli->prepare("SELECT content.type FROM content"))){
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
        ?>
    </table>
</div>

<div>
    <table style="float: left">
        <tr>
            <th>Feedback</th>
        </tr>
        <tr>
            <td>Type</td>
        </tr>

        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>


        <?php
        if(!($stmt = $mysqli->prepare("SELECT feedback.name FROM feedback"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        if(!$stmt->bind_result($f_name)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }
        while($stmt->fetch()){
            echo "<tr>\n<td>\n" . $f_name . "\n</td>\n</tr>\n";
        }
        $stmt->close();
        ?>
    </table>
</div>

<div>
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
        </tr>


        <?php
        if(!($stmt = $mysqli->prepare("
		SELECT b.name, smp.name 
		FROM business_social_media bsm 
		INNER JOIN business b ON b.id = bsm.bid 
		INNER JOIN social_media_platform smp ON smp.id = bsm.smpid"))){
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
        ?>
    </table>

</div>




</body>
</html>