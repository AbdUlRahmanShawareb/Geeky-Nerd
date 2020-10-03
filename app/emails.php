<?php
session_start();
$username = $_SESSION["username"];
$email = $_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Emails</title>
    <script src="https://kit.fontawesome.com/6e3a3e7b07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/blog-main-page.css">
    <link rel="stylesheet" href="../css/emails.css">
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
        <div class="send-email-div">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="send-email-form" method="POST">
                To:
                <input type="email" name="to" id="email-feild" class="email" placeholder="Enter Email"><br><br>
                Subject:
                <input type="text" name="subject" id="subject-feild" class="subject" placeholder="about"><br><br>
                Content: <br>
                <input type="text" name="content" id="content-feild" class="email-content" placeholder="Email content"><br><br>
                <input type="submit" value="Send" class="send">
            </form>
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
            $to = $from = $subject = $content = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $to = control::test_input($_POST["to"]);
                $from = $username;
                $subject = control::test_input($_POST["subject"]);
                $content = control::test_input($_POST["content"]);
                if (!empty($to) && !empty($subject) && !empty($content)) {
                    $sql = "INSERT INTO emails(sendfrom, sendto, subject, content) VALUES ('$from','$to','$subject','$content')";
                    $conn->query($sql);
                }
            }
            ?>
        </div>
        <hr><br>
        <p class="your-emails">Your Emails:</p>
        <div class="all-emails" style="overflow: auto;">
            <?php
            include 'user.php';
            user::showEmails($email);
            ?>
        </div>
    </div>
</body>

</html>