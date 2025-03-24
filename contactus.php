<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'siwes_registration');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['message'])) {
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $company = $_POST['company'] ?? ''; 
        $message = $_POST['message'];

        
        $stmt = $conn->prepare("INSERT INTO submission (first_name, last_name, phone, email, company, message) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ssssss", $firstname, $lastname, $phone, $email, $company, $message);

        if ($stmt->execute()) {
            header("Location: /Siwes-Registration/index.html");
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error in inserting data: ' . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    }
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>