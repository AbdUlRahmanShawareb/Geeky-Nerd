<?php
session_start();
class database
{
    public static function connectToDatabase()
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
    }
    public static function insertNewUser($name, $username, $email, $password)
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "geeky_nerd";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT*FROM users WHERE username='$username' OR email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return false;
        } else {
            $sql2 = "INSERT INTO users(name,username,email,pass) VALUES ('$name','$username','$email','$password')";
            if ($conn->query($sql2) === TRUE) {
                return true;
            } else {
                return "Error";
            }
        }
    }
    public static function login($email, $password)
    {
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
            return true;
        } else {
            return false;
        }
    }
}
