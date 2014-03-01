<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title>Facebook Quiz</title>
    <meta name="description" content="This is a Facebook Quiz"/>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<div class="content">
    <div id="fb-root"></div>
    <h1>Facebook Quiz</h1>

    <form id="fb_quiz_form">
        <label for="question">How cold is it today?</label>
        <select id="question">
            <option value="" selected="selected"> -- SELECT AN ANSWER --</option>
            <option value="Not cold at all">Not cold at all</option>
            <option value="Moderately cold">Moderately cold</option>
            <option value="Very cold">Very cold</option>
            <option value="I live in Wisconsin cold">I live in Wisconsin cold</option>
        </select>
        <br/><br/>
        <input type="button" id="quiz_submit" value="Submit"/>
    </form>

    <div id="ajaxDiv"></div>
    <div id="ajaxError"></div>
</div>
</body>
</html>