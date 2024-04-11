<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            include("config.php");
            if(isset($_POST['submit'])){
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $age = mysqli_real_escape_string($con, $_POST['age']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $role = mysqli_real_escape_string($con, $_POST['role']);

                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                if(mysqli_num_rows($verify_query) != 0 ){
                    echo "<div class='message'>
                              <p>This email is already in use. Please try another one.</p>
                          </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    $insert_query = "INSERT INTO users (Username, Email, Age, Password, Role) VALUES ('$username', '$email', '$age', '$password', '$role')";
                    if(mysqli_query($con, $insert_query)) {
                        echo "<div class='message'>
                                  <p>Registration successful!</p>
                              </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Login Now</button>";
                    } else {
                        echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
                    }
                    
                }
            } else {
            ?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field" name="role" aria-label="User role">
                    <label for="role">Select Role:</label>
                    <select name="role" id="role" required>
                        <option value="recipe_seeker">Recipe Seeker</option>
                        <option value="cook_chef">Cook or Chef</option>
                    </select>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
