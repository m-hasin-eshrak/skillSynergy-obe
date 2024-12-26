<?php

$id = $_POST['ID'];
$table_name = $_POST['table_name'];

$host = "localhost:3306";
$user = "root";
$pass = "";
$db = "elearning";

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {

    if ($table_name == "students") {
        $sql = "DELETE FROM $table_name WHERE s_id = $id";
    } elseif ($table_name == "instructors") {
        $sql = "DELETE FROM $table_name WHERE i_id = $id";
    } elseif ($table_name == "admins") {
        $sql = "DELETE FROM $table_name WHERE i_id = $id";
    } elseif ($table_name == "courses") {
        $sql = "DELETE FROM $table_name WHERE course_id = $id";
    } elseif ($table_name == "assignment") {
        $sql = "DELETE FROM $table_name WHERE assignment_id = $id";
        $result = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result) > 0) {
            // Get the PDF file path from the result
            $row = mysqli_fetch_assoc($result);
            $file_path = "Practice folder/Admin/pdf/" . $row['pdf'] . ".txt";

            // Delete the PDF file
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        // $sql1 = "SELECT pdf FROM $table_name WHERE project_id = $id";
        $sql = "DELETE FROM $table_name WHERE assignment_id = $id";
    }
    mysqli_query($conn, $sql);
    echo "Data deleted successfully!";
    header('location: data_view.php');
    exit;
}
