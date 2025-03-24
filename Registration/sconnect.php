<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'siwes_registration');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['Full-name']) && isset($_POST['Username']) && isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['psw-repeat']) && isset($_POST['phone-Number'])) {
        $Fullname = $_POST['Full-name'];
        $Username = $_POST['Username'];
        $email = $_POST['email'];
        $psw = $_POST['psw'];
        $pswrepeat = $_POST['psw-repeat'];
        $phoneNumber = $_POST['phone-Number'];

        if ($psw !== $pswrepeat) {
            die("Passwords do not match.");
        }

        $stmt = $conn->prepare("INSERT INTO signup (Fullname, Username, email, psw,pswrepeat, phoneNumber) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ssssss", $Fullname, $Username, $email, $psw, $pswrepeat, $phoneNumber);

        if ($stmt->execute()) {
            
            header("Location: /Siwes-Registration/Registration/Register.html");
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