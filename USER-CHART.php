<?php
include "config.php";

/* SAFE HEADER */
if (!headers_sent()) {
    header("Content-Type: application/json");
}

// ================= DASHBOARD STATS API =================
if(isset($_GET['stats'])){

    // Monthly counts
    $monthlyDone = mysqli_fetch_assoc(
        mysqli_query($conn,"SELECT COUNT(*) as c FROM monthly_tasks WHERE status=1")
    )['c'];

    $monthlyTotal = mysqli_fetch_assoc(
        mysqli_query($conn,"SELECT COUNT(*) as c FROM monthly_tasks")
    )['c'];

    // Weekly counts
    $weeklyDone = mysqli_fetch_assoc(
        mysqli_query($conn,"SELECT COUNT(*) as c FROM weekly_tasks WHERE status=1")
    )['c'];

    $weeklyTotal = mysqli_fetch_assoc(
        mysqli_query($conn,"SELECT COUNT(*) as c FROM weekly_tasks")
    )['c'];

    echo json_encode([
        "monthlyDone"=>$monthlyDone,
        "monthlyTotal"=>$monthlyTotal,
        "weeklyDone"=>$weeklyDone,
        "weeklyTotal"=>$weeklyTotal
    ]);
    exit();
}

// ================= GRAPH DATA API =================
if(isset($_GET['weeklyGraph'])){

    $data = [];
    $res = mysqli_query($conn,"SELECT week_no, status FROM weekly_tasks ORDER BY week_no");

    while($row = mysqli_fetch_assoc($res)){
        $data[] = [
            "week" => "Week ".$row['week_no'],
            "done" => $row['status']
        ];
    }

    echo json_encode($data);
    exit();
}