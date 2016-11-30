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

<form action="addperson.php" method="post">

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
                <option value="value1">Facebook</option>
                <option value="value2">Instagram</option>
                <option value="value3">Twitter</option>
                <option value="value4">Other</option>
            </select>
		</fieldset>

		<fieldset>
			<legend>Post</legend>
            <label for="time_posted">Post:</label><input type="text" name="time_posted" id="time_posted" />
            <br class="clear" />

            <label for="time_posted">Time Posted:</label><input type="text" name="time_posted" id="time_posted" />
            <br class="clear" />
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
