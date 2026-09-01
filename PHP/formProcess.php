<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "create") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $repeatPassword = mysqli_real_escape_string(
        $conn,
        $_POST["repeatPassword"]
    );

    if ($password === $repeatPassword) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if username already exists
        $checkUser = $conn->prepare("SELECT id FROM users WHERE username=?");
        $checkUser->bind_param("s", $username);
        $checkUser->execute();
        $checkUser->store_result();

        if ($checkUser->num_rows == 0) {
            // Insert the new user
            $stmt = $conn->prepare(
                "INSERT INTO users (username, password) VALUES (?, ?)"
            );
            $stmt->bind_param("ss", $username, $hashed_password);
            $stmt->execute();

            echo "Account created successfully!";
            $stmt->close();
        } else {
            echo "Username already exists!";
        }
        $checkUser->close();
    } else {
        echo "Passwords do not match!";
    }
}
?>