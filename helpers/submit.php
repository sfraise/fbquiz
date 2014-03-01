<?php
// INCLUDE THE INPUT CLASS
require_once("../classes/input.php");

// GET THE INPUT VALUES
$answer = Input::get('answer');
$name = Input::get('name');
$email = Input::get('email');
$userid = Input::get('userid');
?>

<!-- DISPLAY RESULTS -->
<div class="results">
    Thank you <?php echo $name; ?>!<br /><br />
    Your email is <?php echo $email; ?>.<br /><br />
    Your user id is <?php echo $userid; ?><br /><br />
    Your answer is "<?php echo $answer; ?>".
</div>