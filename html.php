<?php 
ini_set('display_errors', 'On');
?>

<form method="post" action="addperson.php"> 

		<fieldset>
			<legend>Business</legend>
			<p>Business Name: <input type="text" name="BusinessName" /></p>
			<legend>Social Media Platform</legend>
            <select name = "SocialMediaPlatform">
            </select>
		</fieldset>

		<fieldset>
			<legend>Post</legend>
			<p>Post Text: <input type="text" name="PostText" /></p>

			<legend>Content Type</legend>
			<select name="ContentType">
            </select>

            <legend>Feedback</legend>
			<select name="FeedbackType">
            </select>
            
        </fieldset>
		<p><input type="submit" /></p>
	</form>
