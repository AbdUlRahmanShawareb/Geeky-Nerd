<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <script src="https://kit.fontawesome.com/6e3a3e7b07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/blog-main-page.css">
    <link rel="stylesheet" href="../css/search-result.css">
</head>

<body>
    <div class="content">
        <div class="nav-bar">
            <a href="blog-main-page.php" class="icon-a"><i id="home" class="fas fa-home" style="font-size:32px;"></i></a>
            <a href="profile.php" class="icon-a"><i id="user" class="fas fa-user" style="font-size:32px;"></i></a>
            <a href="to-do.php" class="icon-a"><i id="to-do" class="fas fa-list-ul" style="font-size:32px;"></i></a>
            <a href="emails.php" class="icon-a"><i id="email" class="fas fa-envelope" style="font-size:32px;"></i></a>
            <a href="add-post.php" class="icon-a"><i id="add-post" class="fas fa-edit" style="font-size:32px;"></i></a>
        </div>
        <div class="search-result">
            <?php
            //include 'user.php';
            include 'control.php';
            $search = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $search = control::test_input($_POST["search"]);
                control::searchForUser($search);
            }
            ?>
        </div>
    </div>
</body>

</html>