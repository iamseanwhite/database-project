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
<style type="text/css">
    form label {
        float: left;
        width: 150px;
        margin-bottom: 5px;
        margin-top: 5px;

    }
    .clear {
        display: block;
        clear: both;
        width: 100%;
    }
    fieldset {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    legend{
        padding: 10px;
    }

    select{
        padding: 5px;
        width: 10%;
        height: 4%;
    }
    input {
        padding: 5px;
        width: 10%;
        height: 3%;
        border: 1px solid;
    }
</style>
<body>
<div>
	<table style = "float: left">
		<tr>
			<td>Businesses</td>
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
	<table style = "float: left">
		<tr>
			<td>Social Media Platform</td>
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
			 echo "<tr>\n<td>\n" . $s_m_name . "\n</td>\n<td>\n";
			}
			$stmt->close();
			?>
	</table>
</div>

<div>
	<table style = "float: left">
		<tr>
			<td>Posts</td>
		</tr>
		<tr>
			<td>Time Posted</td>
			<td>Character Length</td>
		</tr>
		<tr>
			<td> </td>
			<td> </td>
			<td> </td>
		</tr>
		
			
			<?php
			if(!($stmt = $mysqli->prepare("SELECT post.time_posted, post.character_length FROM post"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}

			if(!$stmt->execute()){
				echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$stmt->bind_result($p_timeposted, $p_charlength)){
				echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while($stmt->fetch()){
			 echo "<tr>\n<td>\n" . $p_timeposted . "\n</td>\n<td>\n" . $p_charlength . "\n</td>\n<td>\n";
			}
			$stmt->close();
			?>
	</table>
	
</div>

<div>
	<table>
		<tr>
			<td>Content</td>
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
			 echo "<tr>\n<td>\n" . $c_type . "\n</td>\n<td>\n";
			}
			$stmt->close();
			?>
	</table>
</div>
<br><br>
<div>
	<table>
		<tr>
			<td>Feedback</td>
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
			 echo "<tr>\n<td>\n" . $f_name . "\n</td>\n<td>\n";
			}
			$stmt->close();
			?>
	</table>
</div>
<form action="business.php" method="post">

		<fieldset>
			<legend>Business</legend>
            <label for="name">Business Name:</label><input type="text" name="name" id="name" />
            <br class="clear" />
            <label for="field">Field of Business:</label><input type="text" name="field" id="field" />
            <br class="clear" />
            <label for="location">Location</label><input type="text" name="location" id="location" />
            <br class="clear" />
			<legend>Social Media Platform</legend>
            <select name = "SocialMediaPlatform">
                <?php
				if(!($stmt = $mysqli->prepare("SELECT id, name FROM social_media_platform"))){
					echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}

				if(!$stmt->execute()){
					echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$stmt->bind_result($id, $s_m_name)){
					echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $id . ' "> ' . $s_m_name . '</option>\n';
				}
				$stmt->close();
				?>
            </select>
		</fieldset>
		
		<p><input style = "float: left" type="submit" name="addbusiness" value="Add Business"/></p>
		<p><input style = "float: left" type="submit" name="filterbusiness" value="Filter Business"/></p>
		<p><input style = "float: left" type="submit" name="updatebusiness" value="Update Business"/></p>
		<p><input type="submit" name="deletebusiness" value="Delete Business"/></p>
</form>

<form action="post.php" method="post">
		<fieldset>
			<legend>Post</legend>
            <label for="time_posted">Time Posted (YYYY-MM-DD hh:mm:ss):</label><input type="datetime" name="time_posted" id="time_posted" />
            <br class="clear" />

            <label for="time_posted">Character Length:</label><input type="text" name="character_length" id="character_length" />
            <br class="clear" />
			<legend>Content Type</legend>
			<select name="ContentType">
                <?php
				if(!($stmt = $mysqli->prepare("SELECT id, type FROM content"))){
					echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}

				if(!$stmt->execute()){
					echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$stmt->bind_result($id, $c_type)){
					echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $id . ' "> ' . $c_type . '</option>\n';
				}
				$stmt->close();
				?>
            </select>

            <legend>Feedback</legend>
			<select name="FeedbackType">
			<?php
				if(!($stmt = $mysqli->prepare("SELECT id, name FROM feedback"))){
					echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}

				if(!$stmt->execute()){
					echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$stmt->bind_result($id, $f_name)){
					echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $id . ' "> ' . $f_name . '</option>\n';
				}
				$stmt->close();
				?>
            </select>

        </fieldset>
		<p><input style = "float: left" type="submit" name="addpost" value="Add Post"/></p>
		<p><input type="submit" name="filterpost" value="Filter Post"/></p>

	</form>
</body>
</html>
