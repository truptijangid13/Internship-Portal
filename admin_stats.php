<?php
include "config.php";

// Count Programs
$programs = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM programs"))[0];

// Count Monthly Tasks
$monthly = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM monthly_tasks"))[0];

// Count Weekly Tasks
$weekly = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM weekly_tasks"))[0];

// Count Reviews
$reviews = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM reviews"))[0];

echo json_encode([
    "programs" => $programs,
    "monthly"  => $monthly,
    "weekly"   => $weekly,
    "reviews"  => $reviews
]);
?>