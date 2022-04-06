<html>
<head>
    <title> Play Tetris </title>
    <link rel="stylesheet" href="main.css?rnd=23">
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
            <audio id="audio" src="tetris-gameboy-02.mp3"></audio>
            <?php
            require 'connect.php';
            include 'authenticate.php';
            ?>
            <script type="text/javascript" src="tetris.js"></script>

            <br>
            <button onclick="tetris(this)">Start the game</button>
            <p id="score" class="score"></p>
            <progress value="0" max="10" id="progressBar"></progress>
            <br>


        </div>
    </div>
</div>
</body>
</html>
