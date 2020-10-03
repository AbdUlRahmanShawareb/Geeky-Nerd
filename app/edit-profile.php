<?php
session_start();
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/6e3a3e7b07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/blog-main-page.css">
    <link rel="stylesheet" href="../css/edit-profile.css">
</head>

<body>
    <div class="content">
        <div class="nav-bar">
            <a href="blog-main-page.php" class="icon-a"><i id="home" class="fas fa-home" style="font-size:32px;"></i></a>
            <a href="profile.php" class="icon-a"><i id="user" class="fas fa-user" style="font-size:32px;"></i></a>
            <a href="to-do.php" class="icon-a"><i id="to-do" class="fas fa-list-ul" style="font-size:32px;"></i></a>
            <a href="emails.php" class="icon-a"><i id="email" class="fas fa-envelope" style="font-size:32px;"></i></a>
            <a href="add-post.php" class="icon-a"><i id="add-post" class="fas fa-edit" style="font-size:32px;"></i></a>
            <form action="search-result.php" class="search-form" method="POST">
                <input type="search" name="search" id="search-id" class="search-feild" placeholder="Search for user">
                <button type="submit" class="submit" id="submit-button"><i class="fas fa-search" style="font-size:32px;"></i></button>
            </form>
        </div>
        <div class="edit-profile">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="edit-form" method="POST">
                <p class="pesronal-info">PERSONAL INFO</p>
                Study at:
                <input type="text" name="studyat" id="studyat"><br><br>
                Work at:
                <input type="text" name="workat" id="workat"><br><br>
                <hr>
                <p class="bio">Bio</p> <br>
                <input type="text" name="bio" id="bio-feild"> <br><br>
                <hr>
                <p class="contact-info">CONTACT INFO</p>
                <i class="fab fa-facebook-square" style="color: blue; font-size:32px;"></i>
                <input type="text" name="facebook" id="facebook" style="position: relative; left:5px;"><br><br>
                <i class="fab fa-twitter-square" style="color: lightseagreen; font-size:32px;"></i>
                <input type="text" name="twitter" id="twitter" style="position: relative; left:5px;"><br><br>
                <i class="fab fa-instagram-square" style="color:#821752; font-size:32px;"></i>
                <input type="text" name="instgram" id="instgram" style="position: relative; left:5px;"><br><br>
                <i class="fab fa-linkedin" style="color:#133b5c; font-size:32px;"></i>
                <input type="text" name="linkedin" id="linkedin" style="position: relative; left:5px;"><br><br>
                <i class="fab fa-github-square" style="font-size:32px;"></i>
                <input type="text" name="github" id="github" style="position: relative; left:5px;"><br><br>
                <i class="fab fa-stack-overflow" style="font-size:32px; color:#cf7500;"></i>
                <input type="text" name="stack" id="stack" style="position: relative; left:5px;"><br><br>
                <hr><br><br>
                <input type="submit" value="Edit" class="edit-submit">
                <br><br>
            </form>
        </div>
        <?php
        include 'control.php';
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $studyat = $workat = $facebook = $twitter = $insta = $linkedin = $github = $stack = $bio = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $studyat = control::test_input($_POST["studyat"]);
            $workat = control::test_input($_POST["workat"]);
            $bio = control::test_input($_POST["bio"]);
            $facebook = control::test_input($_POST["facebook"]);
            $twitter = control::test_input($_POST["twitter"]);
            $insta = control::test_input($_POST["instgram"]);
            $linkedin = control::test_input($_POST["linkedin"]);
            $github = control::test_input($_POST["github"]);
            $stack = control::test_input($_POST["stack"]);
            if (!empty($studyat)) {
                $sql = "UPDATE users SET studyat='$studyat' WHERE username='$username'";
                $conn->query($sql);
            }
            if (!empty($workat)) {
                $sql = "UPDATE users SET workat='$workat' WHERE username='$username'";
                $conn->query($sql);
            }
            if (!empty($bio)) {
                $sql = "UPDATE users SET bio='$bio' WHERE username='$username'";
                $conn->query($sql);
            }
            if (!empty($facebook)) {
                $sql = "UPDATE users SET facebook='$facebook' WHERE username='$username'";
                $conn->query($sql);
            }
            if (!empty($twitter)) {
                $sql = "UPDATE users SET twitter='$twitter' WHERE username='$username'";
                $conn->query($sql);
            }
            if (!empty($insta)) {
                $sql = "UPDATE users SET insta='$insta' WHERE username='$username'";
                $conn->query($sql);
            }
            if (!empty($linkedin)) {
                $sql = "UPDATE users SET linkedin='$linkedin' WHERE username='$username'";
                $conn->query($sql);
            }
            if (!empty($github)) {
                $sql = "UPDATE users SET github='$github' WHERE username='$username'";
                $conn->query($sql);
            }
            if (!empty($stack)) {
                $sql = "UPDATE users SET stackoverflow='$stack' WHERE username='$username'";
                $conn->query($sql);
            }
            header("Location: profile.php");
        }
        ?>
    </div>
</body>

</html>