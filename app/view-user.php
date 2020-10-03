<?php
session_start();
$username = $_POST["selected"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User</title>
    <script src="https://kit.fontawesome.com/6e3a3e7b07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/blog-main-page.css">
    <link rel="stylesheet" href="../css/view-user.css">
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
        <div class="user-info">
            <?php
            include 'user.php';
            user::viewUser($username);
            ?>
        </div>
    </div>
</body>

</html>