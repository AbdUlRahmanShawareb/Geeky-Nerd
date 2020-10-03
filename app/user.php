<?php
class user
{
    public static function addTask($task, $username)
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT*FROM to_do WHERE task='$task'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return false;
        } else {
            $sql2 = "INSERT INTO to_do(task,taskowner) VALUES('$task','$username')";
            if ($conn->query($sql2) === TRUE) {
                return true;
            } else {
                return "Error";
            }
        }
    }
    public static function getUserData($username)
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $data = "";
        $sql = "SELECT*FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $resultn_name = $row["name"];
            $result_username = $row["username"];
            $result_studyAt = $row["studyat"];
            $result_workAt = $row["workat"];
            $data = "@<input type='submit' name='selected' value='" . $result_username . "' style='background:none; border:none; font-size:x-large;'>" .
                "<p class='user-name'>Name: " . $resultn_name . "</p>"  .
                "<p class='study-at'>Study at:" . $result_studyAt . "</p>" .
                "<p class='work-at'>Work at:" . $result_workAt . "</p>";
        } else {
            $data = "USER NOT FOUND";
        }
        return $data;
    }
    public static function addPost($post, $uname)
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO blog(content, publisherusername) VALUES ('$post','$uname')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public static function getUserPosts($username)
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT content FROM blog WHERE publisherusername='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $content = $row["content"];
                echo "<p class='blog' style='position:relative; top:5px; left:5px; font-size:x-large;'>" . $content . "</p>";
                echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'>";
            }
        } else {
            echo "<p class='blog' style='position:relative; top:5px; left:5px; font-size:x-large;'> You didn't write anything yet</p>";
        }
    }
    public static function getUserTasks($username)
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT task FROM to_do WHERE taskowner='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p style='font-size:larger'>" . $row["task"] . "</p>";
                echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'>";
            }
        } else {
            echo "<p>You have no tasks to do</p>";
        }
    }
    public static function showProfileInfo($username)
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT*FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div style='position:relative; left:10px; font-size:x-large; color:#212121;'>";
            echo "<p style='font-size:x-large; color:#f35345; font-weight:bolder;'>Personal info:</p>";
            echo "Name: " . $row["name"] . "<br>" . "@" . $row["username"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Study at: " . $row["studyat"] . "<br>";
            echo "Work at: " . $row["workat"] . "<br><br>";
            echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'><br>";
            echo "<p style='font-size:x-large; color:#f35345; font-weight:bolder;'>Bio: </p>" . $row["bio"] . "<br><br>";
            echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'><br>";
            echo "<p style='font-size:x-large; color:#f35345; font-weight:bolder;'>Contacts: </p>";
            if (!empty($row["facebook"])) {
                echo "<a href='" . $row["facebook"] . "'><i class='fab fa-facebook-square' style='color: blue; font-size:40px;'></i></a>";
                echo "<br>";
            }
            if (!empty($row["twitter"])) {
                echo "<a href='" . $row["twitter"] . "'><i class='fab fa-twitter-square' style='color: lightseagreen; font-size:40px;'></i></a>";
                echo "<br>";
            }
            if (!empty($row["insta"])) {
                echo "<a href='" . $row["insta"] . "'><i class='fab fa-instagram-square' style='color:#821752; font-size:40px;'></i></a>";
                echo "<br>";
            }
            if (!empty($row["linkedin"])) {
                echo "<a href='" . $row["linkedin"] . "'><i class='fab fa-linkedin' style='color:#133b5c; font-size:40px;'></i></a>";
                echo "<br>";
            }
            if (!empty($row["github"])) {
                echo "<a href='" . $row["github"] . "'><i class='fab fa-github-square' style='color:black; font-size:40px;''></i></a>";
                echo "<br>";
            }
            if (!empty($row["stackoverflow"])) {
                echo "<a href='" . $row["stackoverflow"] . "'><i class='fab fa-stack-overflow' style='font-size:40px; color:#cf7500;'></i></a>";
                echo "<br>";
            }
            echo "<br>";
            echo "<br>";
            echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'><br>";
            echo "<a href='edit-profile.php'><button style='position:relative; left:5px; font-size:24px; background-color:#f35345;
            color:#212121; border-radius:5px;'>Edit ptofile</button></a>";
            echo "</div>";
        } else {
            echo "UNEXPECTED ERROR!";
        }
    }
    public static function showEmails($email)
    {

        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT*FROM emails WHERE sendto='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div style='position:relative; left:5px; top:5px;'>";
                echo "From: " . $row["sendfrom"] . "<br>";
                echo "Subject: " . $row["subject"] . "<br>";
                echo "Content: " . "<br>" . $row["content"] . "<br>";
                echo "</div>";
                echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'><br>";
            }
        } else {
            echo "<div style='position:relative; left:5px; top:5px;'>";
            echo "You have no emails";
            echo "</div>";
        }
    }
    public static function viewUser($username)
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "<div style='position:relative; width:98%; margin:auto;
        border-style: solid; border-color: #f35345; border-radius: 10px; height:300px; overflow: auto; top:10px;'>";
        $sql = "SELECT*FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div style='position:relative; left:10px; font-size:x-large; color:#212121;'>";
            echo "<p style='font-size:x-large; color:#f35345; font-weight:bolder;'>Personal info:</p>";
            echo "Name: " . $row["name"] . "<br>" . "@" . $row["username"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Study at: " . $row["studyat"] . "<br>";
            echo "Work at: " . $row["workat"] . "<br><br>";
            echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'><br>";
            echo "<p style='font-size:x-large; color:#f35345; font-weight:bolder;'>Bio: </p>" . $row["bio"] . "<br><br>";
            echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'><br>";
            echo "<p style='font-size:x-large; color:#f35345; font-weight:bolder;'>Contacts: </p>";
            if (!empty($row["facebook"])) {
                echo "<a href='" . $row["facebook"] . "'><i class='fab fa-facebook-square' style='color: blue; font-size:40px;'></i></a>";
                echo "<br>";
            }
            if (!empty($row["twitter"])) {
                echo "<a href='" . $row["twitter"] . "'><i class='fab fa-twitter-square' style='color: lightseagreen; font-size:40px;'></i></a>";
                echo "<br>";
            }
            if (!empty($row["insta"])) {
                echo "<a href='" . $row["insta"] . "'><i class='fab fa-instagram-square' style='color:#821752; font-size:40px;'></i></a>";
                echo "<br>";
            }
            if (!empty($row["linkedin"])) {
                echo "<a href='" . $row["linkedin"] . "'><i class='fab fa-linkedin' style='color:#133b5c; font-size:40px;'></i></a>";
                echo "<br>";
            }
            if (!empty($row["github"])) {
                echo "<a href='" . $row["github"] . "'><i class='fab fa-github-square' style='color:black; font-size:40px;''></i></a>";
                echo "<br>";
            }
            if (!empty($row["stackoverflow"])) {
                echo "<a href='" . $row["stackoverflow"] . "'><i class='fab fa-stack-overflow' style='font-size:40px; color:#cf7500;'></i></a>";
                echo "<br>";
            }
            echo "<br>";
            echo "<br>";
            echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'><br>";
            echo "</div>";
        } else {
            echo "UNEXPECTED ERROR!";
        }
        echo "</div>";
        echo "<div style='position:relative; width:98%; margin:auto;
        border-style: solid; border-color: #f35345; border-radius: 10px; height:550px; overflow: auto; top:30px;'>";
        $sql = "SELECT content FROM blog WHERE publisherusername='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $content = $row["content"];
                echo "<p class='blog' style='position:relative; top:5px; left:5px; font-size:x-large;'>" . $content . "</p>";
                echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'>";
            }
        } else {
            echo "<p class='blog' style='position:relative; top:5px; left:5px; font-size:x-large;'> User didn't write anything yet</p>";
        }
        echo "</div>";
    }
}
