<?php
session_start();
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>To-do</title>
    <script src="https://kit.fontawesome.com/6e3a3e7b07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/blog-main-page.css">
    <link rel="stylesheet" href="../css/to-do.css">
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
        <div class="add-task">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="add" method="POST">
                <input type="text" name="task" id="task-feild" class="task" placeholder="add task">
                <button type="submit" id="add-button"><i class="fas fa-plus-circle" style="font-size:36px;"></i></button>
            </form>
            <?php
            include 'control.php';
            include 'user.php';
            $task = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $task = control::test_input($_POST["task"]);
                if (empty($task)) {
                    echo "<p style='color:red;'>didn't insert anything</p>";
                } else {
                    if (user::addTask($task, $username)) {
                        echo "<p style='color:rgb(10, 150, 45);'>Task added</p>";
                    } elseif (user::addTask($task, $username) == false) {
                        echo "<p style='color:red;'>Task already exist</p>";
                    } else {
                        echo "<p style='color:red;'>Error!</p>";
                    }
                }
            }
            ?>
        </div>
        <br>
        <hr style="position: relative; top:50px;">
        <div class="tasks" style="position: relative; top:80px; border-radius: 5px; 
        border-color: #f35345; border-style: solid; width:98%; 
        margin:auto; height:670px; overflow: auto;">
            <?php
            //include 'user.php';
            user::getUserTasks($username);
            ?>
        </div>
    </div>
</body>

</html>