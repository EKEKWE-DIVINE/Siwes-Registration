<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = new mysqli('localhost', 'root', '', 'siwes_registration');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['Password'])) {
        $Username = $_POST['Username'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        $stmt = $conn->prepare("INSERT INTO registration (username, email, password) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("sss", $Username, $Email, $Password);

        if ($stmt->execute()) {
            
            header("Location: /siwes-registration/Registration/Register.html");
            exit();
        } else {
            echo "Error in inserting data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
    $conn->close();
}
?>