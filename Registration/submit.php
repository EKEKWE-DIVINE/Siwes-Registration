<?php
$servername = "localhost";  
$username = "root";         
$password = "";            
$dbname = "siwes_registration";    

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $institution = $_POST['institution'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $course = $_POST['course'];
    $matric_no = $_POST['matric_no'];
    $coordinator = $_POST['coordinator'];
    $coordinator_contact = $_POST['coordinator_contact'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $supervisor_name = $_POST['supervisor_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $bank_name = $_POST['bank_name'];
    $account_name = $_POST['account_name'];
    $account_number = $_POST['account_number'];

    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $photo_name = basename($_FILES["photo"]["name"]);
    $photo_path = $upload_dir . $photo_name;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_path);

    $acceptance_name = basename($_FILES["acceptance_letter"]["name"]);
    $acceptance_path = $upload_dir . $acceptance_name;
    move_uploaded_file($_FILES["acceptance_letter"]["tmp_name"], $acceptance_path);

    $sql = "INSERT INTO students (full_name, dob, gender, email, phone, institution, faculty, department, course, matric_no, coordinator, coordinator_contact, company_name, company_address, supervisor_name, start_date, end_date, acceptance_letter, bank_name, account_name, account_number, photo) 
            VALUES ('$full_name', '$dob', '$gender', '$email', '$phone', '$institution', '$faculty', '$department', '$course', '$matric_no', '$coordinator', '$coordinator_contact', '$company_name', '$company_address', '$supervisor_name', '$start_date', '$end_date', '$acceptance_path', '$bank_name', '$account_name', '$account_number', '$photo_path')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Registration Successful!</h3>";
        echo "<p><a href='loading_page.html'>Go Back</a></p>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
