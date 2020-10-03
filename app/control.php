<?php
class control
{

    public static function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public static function searchForUser($usernameORemail)
    {
        include 'user.php';
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT username FROM users WHERE username='$usernameORemail' OR email='$usernameORemail' OR name='$usernameORemail'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $key = $row["username"];
                $form_data = user::getUserData($key);
                echo "<div class='search-result-div' style='position: relative; top:10px; left:10px; font-size:x-large;'>";
                echo "<form method='POST' action='view-user.php' class='user-info'>";
                echo $form_data;
                echo "</form>";
                echo "</div>";
                echo "<hr style='border: 5px solid #f35345; border-radius: 5px; width:98%; margin:auto;'>";
            }
        } else {
            echo "<div class='search-result-div' style='position: relative; top:10px; left:10px; font-size:x-large;'>No Users found!</div>";
        }
    }
}
