s<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $stmt = $conn->prepare("INSERT INTO weekly_tasks (title, description, week_no) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $_POST['title'], $_POST['description'], $_POST['week_no']);

    if($stmt->execute()){
        echo "<script>alert('Weekly Task Added Successfully!'); window.location='admin_page.php';</script>";
    } else {
        echo "DB Error: " . $conn->error;
    }
}
?>