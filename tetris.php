<html>
<head>
    <title> Play Tetris </title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<ul>
    <li><a href="index.php" name="home">Home</a> </li>
    <li style="float: right"><a href="tetris.php" name="tetris">Play Tetris</a> </li>
    <li style="float: right"><a href="leaderboard.php" name="leaderboard">Leaderboard</a> </li>
</ul>
<div class="main">
    <div class="form">
        <div class="tetris" id="tetris-bg">

        <?php
        require 'connect.php';
        include 'authenticate.php';
        echo "<p> WELCOME TO TETRIS</p>";
        ?>
        </div>
    </div>
</div>
</body>
</html>
