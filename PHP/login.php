<?php
session_start();
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "login") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;
            header("Location: ../dashboard.php"); // Adjust the path as necessary
            exit();
        } else {
            $_SESSION["error"] = "Invalid password."; // Set error message in session
            header("Location: ../login.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "No account found with that username."; // Set error message in session
        header("Location: ../login.php");
        exit();
    }
    $stmt->close();
    exit();
}
?>
