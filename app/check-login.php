<?php
include 'control.php';
$email = control::test_input($_POST["email"]);
$password = control::test_input($_POST["password"]);
if (empty($email) || empty($password)) {
    echo "<p class='php-output' style='position:relative; color:red; bottom:120px; left:275px;'>all data is required!</p>";
} else {
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "geeky_nerd";
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT*FROM users WHERE email='$email' AND pass='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["name"] = $row["name"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["password"] = $row["pass"];
        header("Location: test.php");
    } else {
        echo "<p class='php-output' style='position:relative; color:red; bottom:120px; left:275px;'>Wrong email or password</p>";
    }
}
