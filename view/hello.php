<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./static/styles.css">
    <script src="./static/scripts.js"></script>
    <title>Title</title>
</head>
<body>
<h1>
    Some serious Shit!
</h1>

<?php
    require('partial/error.php');
    require('partial/list/contact.php');
    require('partial/input/contact.php');
    echo '
<br/>
<div id="moveFrame">
    <div id="moveable" class="move"></div>
</div>';
    require('partial/list/comment.php');
    require('partial/input/comment.php');
?>

</body>
</html>