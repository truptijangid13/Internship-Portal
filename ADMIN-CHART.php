<?php
include "config.php";

/* ===== API MODE FOR COUNTS ===== */
if(isset($_GET['stats'])){

    $users    = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM users"))['t'];
    $programs = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM programs"))['t'];
    $monthly  = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM monthly_tasks"))['t'];
    $weekly   = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM weekly_tasks"))['t'];

    echo json_encode([
        "users"=>$users,
        "programs"=>$programs,
        "monthly"=>$monthly,
        "weekly"=>$weekly
    ]);
    exit();
}
?>

<!-- ===== ADMIN ANALYTICS UI ===== -->
<div class="analytics-cards">

    <div class="card">
        <h4>Total Interns</h4>
        <h2 id="totalUsers">0</h2>
    </div>

    <div class="card">
        <h4>Total Programs</h4>
        <h2 id="totalPrograms">0</h2>
    </div>

    <div class="card">
        <h4>Monthly Tasks</h4>
        <h2 id="totalMonthly">0</h2>
    </div>

    <div class="card">
        <h4>Weekly Tasks</h4>
        <h2 id="totalWeekly">0</h2>
    </div>

</div>

<div class="chart-box">
    <canvas id="adminChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
fetch("admin_analytics.php?stats=1")
.then(r=>r.json())
.then(d=>{

    document.getElementById("totalUsers").innerText = d.users;
    document.getElementById("totalPrograms").innerText = d.programs;
    document.getElementById("totalMonthly").innerText = d.monthly;
    document.getElementById("totalWeekly").innerText = d.weekly;

    new Chart(document.getElementById("adminChart"),{
        type:"bar",
        data:{
            labels:["Users","Programs","Monthly Tasks","Weekly Tasks"],
            datasets:[{
                data:[d.users,d.programs,d.monthly,d.weekly],
                backgroundColor:["#ff9900","#ffa41c","#ffcc80","#ffe0b2"]
            }]
        }
    });
});
</script>