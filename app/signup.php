<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <script src="https://kit.fontawesome.com/6e3a3e7b07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/signup.css">
</head>

<body>
    <div class="content">
        <div class="logo">
            <img src="../image/bigLogo.png" alt="Geeky Nerd">
        </div>
        <hr>
        <div class="signup">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="signup-form" method="POST">
                Name:
                <input type="text" name="name" id="name-field" class="name" placeholder="Enter your name"><br><br>
                Username:
                <input type="text" name="username" id="username-feild" class="username" placeholder="Enter your username"><br><br>
                Email:
                <input type="email" name="email" id="email-feild" class="email" placeholder="Enter your email"><br><br>
                Password:
                <input type="password" name="password" id="password-feild" class="password" placeholder="Enter your password"><br><br>
                <input type="submit" value="Signup" class="submit">
            </form>
        </div>
        <?php
        include 'database.php';
        include 'control.php';
        $name = $username = $email = $password = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = control::test_input($_POST["name"]);
            $username = control::test_input($_POST["username"]);
            $email = control::test_input($_POST["email"]);
            $password = control::test_input($_POST["password"]);
            if (empty($name) || empty($username) || empty($email) || empty($password)) {
                echo "<p class='php-output' style='position:relative; color:red; bottom:120px; left:275px;'>All data is required</p>";
            } else {
                if (database::insertNewUser($name, $username, $email, $password) == true) {
                    echo "<p class='php-output' style='position:relative; color:rgb(10, 150, 45); bottom:120px; left:275px;'>Signup successfully!</p>";
                    $_SESSION["name"] = $name;
                    $_SESSION["username"] = $username;
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;
                    header("Location: blog-main-page.php");
                } else if (database::insertNewUser($name, $username, $email, $password) == false) {
                    echo "<p class='php-output' style='position:relative; color:red; bottom:120px; left:275px;'>Username or email already exists!</p>";
                } else {
                    echo "<p class='php-output' style='position:relative; color:red; bottom:120px; left:275px;'>Unexpected error!</p>";
                }
            }
        }
        ?>
    </div>


</body>

</html>