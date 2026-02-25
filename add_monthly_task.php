<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $stmt = $conn->prepare("INSERT INTO monthly_tasks (title, description, month_no) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $_POST['title'], $_POST['description'], $_POST['month_no']);

    if($stmt->execute()){
        echo "<script>alert('Monthly Task Added Successfully!'); window.location='admin_page.php';</script>";
    } else {
        echo "DB Error: " . $conn->error;
    }
}
?>