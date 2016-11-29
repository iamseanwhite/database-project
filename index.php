<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","semexanb-db","Z4cdb8HdX0rt2s6v","semexanb-db");
if($mysqli->connect_errno){
    echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<style type="text/css">
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
    p > input {
        padding: 5px;
        width: 10%;
        height: 3%;
        border: 1px solid;
    }
</style>
<body>

<form action="addperson.php" method="post">

		<fieldset>
			<legend>Business</legend>
			<p>Business Name: <input type="text" name="BusinessName" /></p>
            <p>Field of Business: <input type="text" name="BusinessField" /></p>
            <p>Location: <input type="text" name="Location" /></p>
			<legend>Social Media Platform</legend>
            <select name = "SocialMediaPlatform">
                <option value="value1">Facebook</option>
                <option value="value2">Instagram</option>
                <option value="value3">Twitter</option>
                <option value="value4">Other</option>
            </select>
		</fieldset>

		<fieldset>
			<legend>Post</legend>
			<p>Post Text: <input type="text" name="PostText" /></p>
			<legend>Content Type</legend>
			<select name="ContentType">
                <option value="value1">Photo</option>
                <option value="value2">Video</option>
                <option value="value3">Text</option>
            </select>

            <legend>Feedback</legend>
			<select name="FeedbackType">
            </select>

        </fieldset>
		<p><input type="submit" /></p>

	</form>
</body>
</html>
