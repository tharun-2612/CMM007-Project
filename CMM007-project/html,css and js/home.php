<?php 
session_start();
include("config.php");

if(isset($_SESSION['username'])){
    $username = $_SESSION["username"];
    $result = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $res_id = $row['Id'];
        $res_Uname = $row['Username'];
        $res_Email = $row['Email'];
        $res_Age = $row['Age'];
    } else {
       
        echo "No data found.";
    }
} else {
    
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="login.php">The Cooking Foodie</a></p>
        </div>

        <div class="right-links">
            <a href='edit.php?Id=<?php echo $res_id ?>'>Change Profile</a>
            <a href="index.php"><button class="btn">BACK</button></a>
        </div>
    </div>
    <main>
   <div class="main-box top">
      <div class="top">
        <div class="box">
            <?php if(isset($res_Uname)): ?>
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            <?php else: ?>
                <p>Hello, Welcome</p>
            <?php endif; ?>
        </div>
        <div class="box">
            <?php if(isset($res_Email)): ?>
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            <?php else: ?>
                <p>Your email is not available.</p>
            <?php endif; ?>
        </div>
      </div>
      <div class="bottom">
        <div class="box">
            <?php if(isset($res_Age)): ?>
                <p>And you are <b><?php echo $res_Age ?> years old</b>.</p> 
            <?php else: ?>
                <p>Your age is not available.</p>
            <?php endif; ?>
        </div>
      </div>
   </div>
</main>