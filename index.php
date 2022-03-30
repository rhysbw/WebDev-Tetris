<html>
<head>
        <title>LANDING PAGE</title>
        <link rel="stylesheet" href="main.css">
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
    session_start();
    if (isset($_SESSION['username'])){
        echo"<div class='form'>
    <h2>Welcome to Tetris</h2>
    <br/>
    <a href='tetris.php'>Click here to play</a>
    <br/>
    <a href='logout.php'>Logout</a> </div>";
    }else{
        if (isset($_POST['username'])){
            // if a registration is sent
            // this removes any backslashes that would cause an error
            $UserName = stripslashes($_POST['username']);
            $FirstName = stripslashes($_POST['firstName']);
            $LastName = stripslashes($_POST['lastName']);
            $Password = stripslashes($_POST['password']);
            $PasswordConf = stripslashes($_POST['confirmPassword']);
            $Display = $_POST['display'];

            //this escapes special chars in string
            $UserName = mysqli_real_escape_string($conn,$UserName);
            $FirstName =mysqli_real_escape_string($conn,$FirstName);
            $LastName = mysqli_real_escape_string($conn,$LastName);
            $Password = mysqli_real_escape_string($conn,$Password);

            // gets the val from the radio buttons
            if ($Display == "YES"){
                $DisplayVal = 1;
            }else{
                $DisplayVal = 0;
            }
            // checks to see if the passwords match
            if ($Password != $PasswordConf){
                echo"   <div class='form'>
                        <h2>Passwords do not match</h2>
                        <br/>
                        <a href='register.php'>Try Again</a></div>";
            }else{
                //NEED TO ADD CHECK FOR SAME USERNAME
                //sql query
                $sql = "INSERT INTO Users VALUES('".$UserName."','".$FirstName."','".$LastName."','".$Password."','".$DisplayVal."');";

                $result = mysqli_query($conn,$sql);
                if ($result){
                    echo "  <div class='form'>
                            <h3>You are registered successfully.</h3>
                            <br/>Click here to <a href='index.php'>Login</a></div>";
                }else{
                    echo "INCORRECT REGISTRING";
                    echo "Error: ".mysqli_error($conn);
                }
                mysqli_close($conn);
            }
        }
        if (isset($_GET['username'])){


            // Remove slashes
            $Username = stripslashes($_GET['username']);
            $Password = stripslashes($_GET["password"]);

            //removes speshial chars
            $Username = mysqli_real_escape_string($conn, $Username);
            $Password = mysqli_real_escape_string($conn, $Password);

            //checking login info

            if ($stmt = $conn->prepare('SELECT Password FROM Users WHERE UserName = ?')){
                $stmt->bind_param('s',$Username);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt ->num_rows >0){
                    $stmt->bind_result($passwordFound);
                    $stmt->fetch();
                    if ($Password == $passwordFound){
                        $_SESSION['username'] = $Username;
                        header("Location: index.php");
                        echo "LOGGED IN";
                    }else{
                        echo "
            <div class='form'>
            <h2>The Username or Password were not recognised.</h2>
            <br/>
            Click here to <a href='index.php'>Try Again</a></div>";
                    }
                }else{
                    echo "
            <div class='form'>
            <h2>The Username or Password were not recognised.</h2>
            <br/>
            Click here to <a href='index.php'>Try Again</a></div>";
                }
                $stmt->close();
            }
        }elseif (!isset($_POST['username'])){
                ?>
                <div class="form">
                    <h3>Please Log In Play</h3>
                    <form action="" method="get" name="login">
                        <input type="text" name="username" placeholder="Username" required/>
                        <br/>
                        <input type="password" name="password" placeholder="Password" required/>
                        <br/>
                        <input type="submit" name="submit" value="login"/>
                    </form>

                    <p>Don’t have a user account?</br><a href="register.php">Register Now</a> </p>
                </div>
    </div>
<?php }} ?>
</body>
</html>
