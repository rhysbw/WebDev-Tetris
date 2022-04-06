<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="main.css?rnd=23">
</head>
<body>
<ul>
    <li><a href="index.php" name="home">Home</a> </li>
    <li style="float: right"><a href="tetris.php" name="tetris">Play Tetris</a> </li>
    <li style="float: right"><a href="leaderboard.php" name="leaderboard">Leaderboard</a> </li>
</ul>
<div class="main">
<?php
require "connect.php";
if (!isset($_REQUEST['username'])){
?>
<div class="form">
    <h2>Register Here</h2>
    <form name="register" action="index.php" method="post">
        <input type="text" name="firstName" placeholder="First Name" required/>
        <input type="text" name="lastName" placeholder="Last Name" required/>
        <input type="text" name="username" placeholder="Username" required/>
        <input type="password" name="password" placeholder="Password" required/>
        <input type="password" name="confirmPassword" placeholder="Confirm Password" required/>
        <input type="radio" id="yes" name="display" value="YES" checked="checked">
        <label for="yes">YES</label><br>
        <input type="radio" id="no" name="display" value="NO">
        <label for="no">NO</label><br>
        <input type="submit" name="submit" value="register">
    </form>
</div>
<?php }?>
</div>
</body>
</html>
