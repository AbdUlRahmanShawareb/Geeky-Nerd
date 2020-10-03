<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Geeky Nerd</title>
    <script src="https://kit.fontawesome.com/6e3a3e7b07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/Main.css">
</head>

<body>
    <div class="content">
        <div class="logo">
            <img src="image/bigLogo.png" alt="Geeky Nerd">
        </div>
        <div class="log-in-div">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="log-in-form" method="POST">
                Email:
                <input type="email" name="email" class="email" placeholder="Enter your email"><br><br>
                Password:
                <input type="password" name="password" class="password" placeholder="Enter your password"><br><br>
                <input type="submit" value="Login" class="submit-button">
            </form>
            <p>New user? <a href="../GeekyNerd/app/signup.php">SignUp</a></p>
            <?php
            include 'app/database.php';
            include 'app/control.php';
            $email = $password = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = control::test_input($_POST["email"]);
                $password = control::test_input($_POST["password"]);
                if (empty($email) || empty($password)) {
                    echo "<p class='php-output' style='position:relative; color:red; top:10px; left:80px;'>all data is required!</p>";
                } else {
                    if (database::login($email, $password)) {
                        header("Location: app/blog-main-page.php");
                    } else {
                        echo "<p class='php-output' style='position:relative; color:red; top:10px; left:80px;'>Wrong email or password</p>";
                    }
                }
            }
            ?>
        </div>
    </div>

</body>

</html>