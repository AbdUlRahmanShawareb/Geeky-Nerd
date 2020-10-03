<?php
session_start();
$post_publisher = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/6e3a3e7b07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/blog-main-page.css">
    <link rel="stylesheet" href="../css/add-post.css">
    <title>Add post</title>
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
        <div class="post-div">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="post-form" method="POST">
                <input type="text" name="post" id="post-feild" class="post" placeholder="What are you thinking about?">
                <br> <br>
                <input type="submit" value="Post" class="submit-form">
            </form>
            <?php
            include 'control.php';
            include 'user.php';
            $post = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $post = control::test_input($_POST["post"]);
                if (!empty($post)) {
                    $check = user::addPost($post, $post_publisher);
                    if (!$check) {
                        echo "<p style='color:red;'>Unexpected Error!</p>";
                    }
                }
                header("Location: blog-main-page.php");
            }
            ?>
        </div>
    </div>
</body>

</html>