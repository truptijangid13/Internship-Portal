<?php
include "config.php";
if(isset($_POST['monthlyId']) || isset($_POST['weeklyId']) || isset($_POST['programId'])) {
    header("Content-Type: application/json");
}

// ================= ADD PROGRAM =================
if(isset($_POST['programId'])){

    $pid = $_POST['programId'];
    $title = $_POST['programTitle'];
    $details = $_POST['details'];
    $length = $_POST['length'];
    $components = $_POST['components'];
    $collab = $_POST['collab'];

    $sql = "INSERT INTO programs(program_id,title,details,length,components,collaboration)
            VALUES('$pid','$title','$details','$length','$components','$collab')";

    if(mysqli_query($conn,$sql)){
        echo json_encode(["success"=>true,"message"=>"Program Added Successfully"]);
    } else {
        echo json_encode(["success"=>false,"message"=>mysqli_error($conn)]);
    }
    exit();
}

// ================= LOAD MONTHLY TASKS =================
if(isset($_GET['load']) && $_GET['load']=="monthly"){
    header("Content-Type: text/html");

    $res = mysqli_query($conn,"SELECT * FROM monthly_tasks ORDER BY month_no");
    while($row = mysqli_fetch_assoc($res)){
        echo "<div style='border:1px solid orange;padding:10px;margin:10px;border-radius:8px;'>
        <b>Month ".$row['month_no']."</b><br>
        <b>".$row['title']."</b><br>
        ".$row['description']."
        </div>";
    }
    exit();
}

// ================= LOAD WEEKLY TASKS =================
if(isset($_GET['load']) && $_GET['load']=="weekly"){
    header("Content-Type: text/html");

    $res = mysqli_query($conn,"SELECT * FROM weekly_tasks ORDER BY week_no");
    while($row = mysqli_fetch_assoc($res)){
        echo "<div style='border:1px solid orange;padding:10px;margin:10px;border-radius:8px;'>
        <b>Week ".$row['week_no']."</b><br>
        <b>".$row['title']."</b><br>
        ".$row['description']."
        </div>";
    }
    exit();
}

// ================= INSERT MONTHLY DETAILS =================
if(isset($_POST['monthlyId'])){
    $id = $_POST['monthlyId'];
    $weeks = $_POST['monthlyWeeks'];
    $review = $_POST['monthlyReview'];

    $sql = "INSERT INTO monthly_tasks(month_no,title,description)
            VALUES('$id','$weeks','$review')";

    echo json_encode(["success"=>mysqli_query($conn,$sql)]);
    exit();
}

// ================= INSERT WEEKLY DETAILS =================
if(isset($_POST['weeklyId'])){
    $id = $_POST['weeklyId'];
    $weeks = $_POST['weeklyWeeks'];
    $review = $_POST['weeklyReview'];

    $sql = "INSERT INTO weekly_tasks(week_no,title,description)
            VALUES('$id','$weeks','$review')";

    echo json_encode(["success"=>mysqli_query($conn,$sql)]);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Internship Dashboard</title>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

/* ===== BODY ===== */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f4f4f4;
}

/* HEADING TO WELCOME INTERN */
.center-title {
    font-size: 18px;
    font-weight: bold;
    color: #ff9900;
    margin-top: 5px;
}

.center-subtitle {
    font-size: 14px;
    color: #ddd;
    margin-top: 5px;
}

.center-title {
    text-align: center;
}

.center-subtitle {
    text-align: center;
}

/* ===== SIDEBAR ===== */
.sidebar {
    width: 220px;
    background: #232f3e;
    height: 100vh;
    padding: 20px;
    color: white;
    position: fixed;
}

/* LOGO-line */
.logo-line {
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, #ff9900, transparent);
    margin: 10px 0 15px 0;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: white;
    padding: 12px;
    text-decoration: none;
    margin-bottom: 8px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.sidebar a:hover {
    background: linear-gradient(90deg, #ff9900, #ffa41c);
    color: black;
}

/* For ADD A PROGRAM heading */
.section-title {
    font-size: 22px;
    color: #ff9900;
    border-bottom: 2px solid #ff9900;
    display: inline-block;
    padding-bottom: 5px;
    margin-bottom: 15px;
}

.section-title::after {
    content: "";
    display: block;
    width: 80px;
    height: 3px;
    background: #ff9900;
    margin-top: 6px;
    border-radius: 5px;
}

/* ===== MAIN AREA ===== */
.dashboard {
    margin-left: 240px;
    padding: 20px;
    width: calc(100% - 240px);
}

/* HEADER */
.header-banner {
    background: linear-gradient(135deg, #131921, #232f3e);
    color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.header-banner h1 {
    margin: 0;
    font-size: 30px;
}

.sidebar-logo {
    width: 120px;
    display: block;
    margin: 0 auto 15px auto;
    filter: brightness(1.2);
}
.sidebar h2 {
    color: #ff9900;
    text-align: center;
    font-weight: bold;
}

/* Back Button */
#backBtn {
    display: none;
    margin-top: 10px;
    padding: 8px 15px;
    background: #ff9900;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
}
#backBtn:hover {
    background: #ffa41c;
}

/* CARDS */
.analytics-cards {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.card {
    background: white;
    padding: 15px;
    border-radius: 10px;
    width: 200px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

.card h4 {
    margin: 0;
    color: #555;
}

.card h2 {
    margin: 5px 0;
}

/* Progress Bar */
.progress-line {
    background: #ddd;
    height: 8px;
    border-radius: 10px;
    overflow: hidden;
}

.progress-fill {
    height: 8px;
    background: #ff9900;
    width: 0%;
}

/* Chart Box */
.chart-box {
    margin-top: 30px;
    background: white;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    width: 60%;
}

/* Dynamic Content */
/* FIX LONG STRIP ISSUE */
#content-area {
    max-width: 700px;   /* limit content width */
    margin: 20px auto;  /* center the whole section */
}

/* Center form card perfectly */
.nav-section {
    max-width: 500px;
    margin: auto;
}

#content-area {
    animation: fadeIn 0.4s ease-in-out;
}
@keyframes fadeIn {
    from {opacity:0; transform: translateY(10px);}
    to {opacity:1;}
}

/* Forms */
/* CENTER FORM CARD */
#monthlyView, 
#weeklyView, 
#addProgramView {
    max-width: 550px;   /* form width */
    margin: auto;        /* center horizontally */
}

/* Reduce input width */
form input, 
form textarea {
    width: 100%;
}

/* FORM CARD STYLE */
.nav-section {
    background: #0b1220;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(255,165,0,0.2);
}

/* FORM TITLE */
.section-title {
    color: #ff9800;
    font-size: 22px;
    margin-bottom: 15px;
}

/* INPUT BOX STYLE */
form input, 
form textarea {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border-radius: 8px;
    border: 1px solid #ff9800;
    background: #020617;
    color: white;
    font-size: 14px;
}

/* INPUT PLACEHOLDER COLOR */
form input::placeholder,
form textarea::placeholder {
    color: #6b7280;
}

/* INPUT FOCUS EFFECT */
form input:focus, 
form textarea:focus {
    outline: none;
    border-color: #ffcc80;
    box-shadow: 0 0 10px #ff9800;
}

/* BUTTON */
form button {
    background: #ff9800;
    color: black;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    margin-top: 10px;
}

form button:hover {
    background: #ffb74d;
}

/* Response Boxes */
.success-box {
    background: #0f171e;   /* dark */
    color: #ff9900;        /* amazon orange */
    border: 1px solid #ff9900;
    padding: 10px;
    border-radius: 5px;
}

.error-box {
    background: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 6px;
    margin-top: 10px;
}

#dashboard-home {
    display: block;
}

#content-area {
    margin-top: 20px;
}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
        <!-- Amazon Logo -->
        <img src="amazon-logo.png" class="sidebar-logo">
        <div class="logo-line"></div>
        <h2>Internship Portal</h2>

    <a onclick="navigate('addProgram')"> Add Program</a>
    <a onclick="showMonthlyTasks()">View Monthly Task</a>
    <a onclick="showWeeklyTasks()">View Weekly Task</a>
    <a onclick="navigate('monthlyView')">Monthly Task Detail's</a>
    <a onclick="navigate('weeklyView')">Weekly Task Detail's</a>
    <a onclick="navigate('chat')"> Chat With Admin</a>
    <a onclick="navigate('review')"> Review's</a>
</div>

<!-- MAIN DASHBOARD -->
<div class="dashboard">

    <!-- HEADER -->
    <div class="header-banner">

<h1 class="center-title">Your Internship Performance Dashboard</h1>
<p class="center-subtitle">Track tasks, manage programs, and monitor your progress in real time.</p>

        <button id="backBtn" onclick="showDashboard()">⬅ Back to Dashboard</button>
    </div>

    <div id="content-area"></div>
<div id="dashboard-home">

    <div class="analytics-cards">
        <div class="card">
            <h4>Monthly Tasks</h4>
            <h2 id="monthlyDone">0 / 0</h2>
            <div class="progress-line">
                <div class="progress-fill" id="monthlyProgress"></div>
            </div>
        </div>

        <div class="card">
            <h4>Weekly Tasks</h4>
            <h2 id="weeklyDone">0 / 0</h2>
            <div class="progress-line">
                <div class="progress-fill" id="weeklyProgress"></div>
            </div>
        </div>
    </div>

    <div class="chart-box">
        <canvas id="taskChart"></canvas>
    </div>

</div>
<div class="dashboard-container">
    <?php include "USER-CHART.php"; ?>
</div>
</div>

<script>
    // ===== LOAD REAL chart DATA =====
fetch("USER-CHART.php?stats=1")
.then(r=>r.json())
.then(d=>{

    let mDone = d.monthlyDone;
    let mTotal = d.monthlyTotal;
    let wDone = d.weeklyDone;
    let wTotal = d.weeklyTotal;

    document.getElementById("monthlyDone").innerText = mDone+" / "+mTotal;
    document.getElementById("weeklyDone").innerText = wDone+" / "+wTotal;

    document.getElementById("monthlyProgress").style.width = (mDone/mTotal*100)+"%";
    document.getElementById("weeklyProgress").style.width = (wDone/wTotal*100)+"%";
});

// ================= NAVIGATION =================
function navigate(section) {

    // DEBUG ALERT
    alert("Navigation Working: " + section);

    let content = document.getElementById("content-area");
    let dashboardHome = document.getElementById("dashboard-home");
    let backBtn = document.getElementById("backBtn");

    dashboardHome.style.display = "none";
    backBtn.style.display = "inline-block";

    switch(section) {

        // ===== ADD PROGRAM =====
        case "addProgram":
            content.innerHTML = `
            <div class="form-container">
                <h2 class="section-title">Add Program</h2>
                <form id="programForm">
                    <input type="text" name="programId" placeholder="Program ID" required pattern="[A-Z0-9]{3,10}" title="Only uppercase letters & numbers (3-10 chars)">

<input type="text" name="programTitle" placeholder="Program Title" required minlength="5">

<textarea name="details" placeholder="Details" required minlength="10"></textarea>

<input type="number" name="length" placeholder="Length (weeks)" required min="1" max="52">

<textarea name="components" placeholder="Components" required></textarea>

<textarea name="collab" placeholder="Collaboration Details" required></textarea>
                    <button type="submit">Submit</button>
                </form>
                <div id="responseBox"></div>
            </div>`;

            let form = document.getElementById("programForm");
form.addEventListener("submit", function(e){
    e.preventDefault();
    let data = new FormData(form);

    fetch("user_page.php", {
        method: "POST",
        body: data
    })
    .then(r => r.text())
    .then(t => {
        try {
            let d = JSON.parse(t);
            document.getElementById("responseBox").innerHTML =
                d.success ? `<div class="success-box">${d.message}</div>`
                          : `<div class="error-box">${d.message}</div>`;
        } catch(e) {
            console.log("Server returned HTML:", t);
        }
    });
});
            break;


        // ===== REVIEW =====
        case "review":
            content.innerHTML = `
            <div class="form-container">
                <h2>Submit Review</h2>
                <form id="reviewForm">
                    <input type="text" name="pid" placeholder="Program ID">
                    <textarea name="ptask" placeholder="Write review"></textarea>
                    <button type="submit">Submit</button>
                </form>
                <div id="reviewResponse"></div>
            </div>`;

            let reviewForm = document.getElementById("reviewForm");
            reviewForm.addEventListener("submit", function(e){
                e.preventDefault();
                let data = new FormData(reviewForm);

                fetch("db_ReviewADD.php",{method:"POST", body:data})
                .then(r=>r.json())
                .then(d=>{
                    document.getElementById("reviewResponse").innerHTML =
                    d.success ? `<div class="success-box">${d.message}</div>`
                              : `<div class="error-box">${d.message}</div>`;
                });
            });
            break;


        case "monthlyView":
    content.innerHTML = `
    <h2 class="section-title">Monthly Task Entry</h2>
<div class="form-container">
<form id="monthlyForm">
    <label>ID :</label>
    <input type="text" id="monthlyId" name="monthlyId" placeholder="abc123" required>

    <label>Month's Took :</label>
    <input type="text" id="monthlyWeeks" name="monthlyWeeks" placeholder="Numbers only" required>

    <label>Difficulty Faced :</label>
    <input type="text" id="monthlyReview" name="monthlyReview" placeholder="Letters only" required>

    <button type="submit">Save Monthly Task</button>

</form>
</div>
        <table id="monthlyTable" border="1" style="width:100%;margin-top:10px;">
<thead>
<tr><th>ID</th><th>Month</th><th>Difficulty</th></tr>
</thead>
<tbody></tbody>
</table>
    `;

    loadMonthlyJS(); // call validation function
    break;

        case "weeklyView":
    content.innerHTML = `
    <h2 class="section-title">Weekly Task Entry</h2>
<div class="form-container">
<form id="weeklyForm">

    <label>ID :</label>
    <input type="text" id="weeklyId" name="weeklyId" placeholder="abc123" required>

    <label>Weeks Took :</label>
    <input type="text" id="weeklyWeeks" name="weeklyWeeks" placeholder="Numbers only" required>

    <label>Difficulty Faced :</label>
    <input type="text" id="weeklyReview" name="weeklyReview" placeholder="Letters only" required>

    <button type="submit">Save Weekly Task</button>

</form>
</div>
     <table id="weeklyTable" border="1" style="width:100%;margin-top:10px;">
<thead>
<tr><th>ID</th><th>Week</th><th>Difficulty</th></tr>
</thead>
<tbody></tbody>
</table>
    `;

    loadWeeklyJS(); // call validation function
    break;

        case "chat":
            content.innerHTML = "<h2> Chat Support</h2><p>Chat system coming soon...</p>";
            break;
    }
}

// ================= BACK TO DASHBOARD =================
function showDashboard() {
    document.getElementById("dashboard-home").style.display = "block";
    document.getElementById("content-area").innerHTML = "";
    document.getElementById("backBtn").style.display = "none";
}

const idRegex = /^[a-z0-9]+$/;
const numRegex = /^[0-9]+$/;
const letterRegex = /^[a-zA-Z ]+$/;
// MONTHLY DETAIL'S ADDED TO DB:
function loadMonthlyJS() {
    document.getElementById("monthlyForm").onsubmit = function(e) {
        e.preventDefault();

        let id = monthlyId.value;
        let weeks = monthlyWeeks.value;
        let review = monthlyReview.value;

        // VALIDATIONS
        if (!idRegex.test(id)) {
            alert("ID must be lowercase letters + numbers only");
            return;
        }
        if (!numRegex.test(weeks)) {
            alert("Weeks must be numbers only");
            return;
        }
        if (!letterRegex.test(review)) {
            alert("Difficulty must be letters only");
            return;
        }

        // UI table add
        addRow("monthlyTable", id, weeks, review);

        // Send to PHP
        let data = new FormData(this);

        fetch("user_page.php", {
            method: "POST",
            body: data
        })
        .then(r => r.text())
        .then(t => {
            try {
                let d = JSON.parse(t);
                if (d.success) alert("Monthly Task Saved in DB!");
                else alert("Error saving monthly task");
            } catch(e) {
                console.log("Not JSON:", t);
            }
        });

        this.reset();
    };
}



// WEEKLY DETAIL'S ADDED TO DB:
function loadWeeklyJS() {
    document.getElementById("weeklyForm").onsubmit = function(e) {
        e.preventDefault();

        let id = weeklyId.value;
        let weeks = weeklyWeeks.value;
        let review = weeklyReview.value;

        // VALIDATIONS
        if (!idRegex.test(id)) {
            alert("ID must be lowercase letters + numbers only");
            return;
        }
        if (!numRegex.test(weeks)) {
            alert("Weeks must be numbers only");
            return;
        }
        if (!letterRegex.test(review)) {
            alert("Difficulty must be letters only");
            return;
        }

        // UI table add
        addRow("weeklyTable", id, weeks, review);

        // Send to PHP
        let data = new FormData(this);

        fetch("user_page.php", {
            method: "POST",
            body: data
        })
        .then(r => r.text())
        .then(t => {
            try {
                let d = JSON.parse(t);
                if (d.success) alert("Weekly Task Saved in DB!");
                else alert("Error saving weekly task");
            } catch(e) {
                console.log("Not JSON:", t);
            }
        });

        this.reset();
    };
}

fetch("USER-CHART.php?weeklyGraph=1")
.then(r=>r.json())
.then(graphData=>{

    let labels = [];
    let values = [];

    graphData.forEach(g=>{
        labels.push(g.week);
        values.push(g.done);
    });

    const ctx = document.getElementById("taskChart");
    new Chart(ctx,{
        type:'bar',
        data:{
            labels: labels,
            datasets:[{
                label:"Weekly Tasks Completed",
                data: values,
                backgroundColor:'#ff9900'
            }]
        }
    });
});

function showMonthlyTasks(){
    fetch("user_page.php?load=monthly")
    .then(r=>r.text())
    .then(d=>{
        document.getElementById("content-area").innerHTML = "<h2>Monthly Tasks</h2>"+d;
    });
}

function showWeeklyTasks(){
    fetch("user_page.php?load=weekly")
    .then(r=>r.text())
    .then(d=>{
        document.getElementById("content-area").innerHTML = "<h2>Weekly Tasks</h2>"+d;
    });
}

</script>
</body>
</html>