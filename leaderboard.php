<html>
<head>
    <title>Leaderboard</title>
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
    require 'connect.php';
    include "authenticate.php";
        if (isset($_POST['score'])){
            echo "done";

            $UserName = $_POST['user'];
            $Score = $_POST['score'];
            $sql = "INSERT INTO Scores VALUES(NULL,'".$UserName."','".$Score."');";

            $result = mysqli_query($conn,$sql);
            if ($result){
            }else{
                echo "Error: ".mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>
    <div class="form">
        <table>
            <tr id="topColumn">
                <td>Username</td>
                <td>Score</td>
            </tr>
            <?php
            $query = 'SELECT Username, Score FROM Scores WHERE Username IN (SELECT Username FROM Users WHERE Display = 1) ORDER BY Score DESC';
            $result = $conn ->query($query);
            while ($row = $result->fetch_row()){
                echo"<tr><td>{$row[0]}</td>
                <td>{$row[1]}</td></tr>";

            }
            ?>
        </table>
    </div>
</div>
</body>
</html>