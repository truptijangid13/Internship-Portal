<?php
include "config.php";

// ================= ADD INTERNSHIP =================
if(isset($_POST['add_internship'])){

    $title = $_POST['title'];
    $city = $_POST['city'];
    $experience = $_POST['experience'];
    $field = $_POST['field'];
    $stipend = $_POST['stipend'];
    $description = $_POST['description'];

    $sql = "INSERT INTO internships(title, city, experience, field, stipend, description) 
            VALUES('$title','$city','$experience','$field','$stipend','$description')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Internship Added Successfully');</script>";
    } else {
        echo "<script>alert('DB Error');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{
  font-family:Poppins,Arial,sans-serif;
  background:linear-gradient(135deg,#f2f4f8,#e9ecf1);
  display:flex;
  height:100vh;
}
.sidebar{
  width:250px;
  background:linear-gradient(180deg,#131921,#232f3e);
  color:#fff;
  padding:20px;
}
.sidebar h2{
  text-align:center;
  margin-bottom:20px;
  border-bottom:1px solid #2c3e50;
  padding-bottom:10px;
}
.sidebar a{
  color:#ddd;
  padding:12px;
  display:block;
  text-decoration:none;
  border-radius:8px;
  margin-bottom:8px;
  transition:.3s;
}
.sidebar a:hover{
  background:#ff9900;
  color:black;
}
.main-content{
  flex:1;
  padding:20px;
}
.content-box{
  background:white;
  padding:20px;
  border-radius:12px;
  box-shadow:0 0 10px rgba(0,0,0,.1);
}
.analytics-cards{
  display:flex;
  gap:15px;
}
.card{
  background:#111827;
  padding:15px;
  border-radius:10px;
  width:180px;
  color:white;
}
.card h4{color:#ff9900;}
.chart-box{
  background:#111827;
  padding:15px;
  margin-top:20px;
  border-radius:12px;
}
input,textarea{
  width:100%;
  padding:10px;
  margin-top:5px;
  border:1px solid #ff9900;
  border-radius:6px;
}

/* Center Dashboard Title */
.center-title {
    text-align: center;
    font-size: 26px;
    font-weight: bold;
    color: #ff9800;
    margin-bottom: 5px;
}

.center-subtitle {
    text-align: center;
    font-size: 14px;
    color: #555;
    margin-bottom: 20px;
}

/* Center all form headings */
.content-box h2 {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: #ff9800;
    margin-bottom: 15px;
}

/* Form Box */
form {
    background: #0f172a;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(255,153,0,0.25);
    max-width: 550px;
    margin: auto;
}

/* LABEL TEXT (TITLE / CITY / STIPEND etc) */
form label {
    color: white;   /* LABELS WHITE */
    font-size: 14px;
    font-weight: bold;
    margin-top: 12px;
    display: block;
}

/* INPUT TEXT SIMPLE WHITE */
form input,
form textarea {
    width: 100%;
    padding: 12px;
    margin-top: 5px;
    border-radius: 8px;
    border: 1px solid #ff9800;
    background: #020617;
    color: white;      /* WHITE INPUT TEXT */
    font-size: 14px;
}

/* Focus Glow */
form input:focus,
form textarea:focus {
    outline: none;
    border-color: #ffcc80;
    box-shadow: 0 0 10px #ff9800;
}

/* Button */
.form-btn {
    background: linear-gradient(45deg, #ff9900, #ffb74d);
    color: black;
    padding: 12px;
    border: none;
    border-radius: 30px;
    font-weight: bold;
    cursor: pointer;
    width: 100%;
    margin-top: 15px;
}

</style>
</head>

<body>

<div class="sidebar">
  <h2>Admin Dashboard</h2>
  <a onclick="navigate('addMonthlyTask')"><i class="fa fa-calendar"></i> Add Monthly Task</a>
  <a onclick="navigate('addWeeklyTask')"><i class="fa fa-calendar-week"></i> Add Weekly Task</a>
  <a onclick="navigate('viewPrograms')"><i class="fa fa-list"></i> View Programs</a>
  <a onclick="navigate('contact')"><i class="fa fa-envelope"></i> Add Internship</a>
  <a onclick="navigate('review')"><i class="fa fa-star"></i> View Reviews</a>
</div>

<div class="main-content">
  <div id="content-area" class="content-box">Loading...</div>
</div>

<script>
// ================= LOAD STATS FROM DB =================
function loadStats(){
fetch("admin_stats.php")
.then(res => res.json())
.then(d => {
    document.getElementById("totalPrograms").innerText = d.programs;
    document.getElementById("totalMonthly").innerText = d.monthly;
    document.getElementById("totalWeekly").innerText = d.weekly;
    document.getElementById("totalReviews").innerText = d.reviews;

 new Chart(document.getElementById("adminChart"),{
   type:"bar",
   data:{
     labels:["Programs","Monthly","Weekly","Reviews"],
     datasets:[{
       data:[d.programs,d.monthly,d.weekly,d.reviews],
       backgroundColor:["#ff9900","#ffa41c","#ffcc80","#ffe0b2"]
     }]
   }
 });
});
}

// ================= NAVIGATION =================
function navigate(page){
const c=document.getElementById("content-area");

switch(page){

case 'addMonthlyTask':
c.innerHTML=`
<h2>Add Monthly Task</h2>
<form method="POST" action="add_monthly_task.php">
<label>Title</label><input name="title">
<label>Description</label><input name="description">
<label>Month No</label><input type="number" name="month_no">
<button class="form-btn">Save</button>
</form>`;
break;

case 'addWeeklyTask':
c.innerHTML=`
<h2>Add Weekly Task</h2>
<form method="POST" action="add_weekly_task.php">
<label>Title</label><input name="title">
<label>Description</label><input name="description">
<label>Week No</label><input type="number" name="week_no">
<button class="form-btn">Save</button>
</form>`;
break;

case 'viewPrograms':
fetch("db_programs.php").then(r=>r.text()).then(d=>c.innerHTML=d);
break;

case 'review':
fetch("db_reviews.php").then(r=>r.text()).then(d=>c.innerHTML=d);
break;

case 'contact':
c.innerHTML=`
<h2 class="center-title">Add Internship</h2>
<form method="POST" action="">
<label>Title: </label><input name="title">
<label>City: </label><input name="city">
<label>Experience: </label><input name="experience">
<label>Field: </label><input name="field">
<label>Stipend: </label><input name="stipend">
<label>Description: </label><textarea name="description"></textarea>
<button name="add_internship" class="form-btn">Add Internship</button>
</form>`;
break;

default:
c.innerHTML=`
<h2 class="center-title">Hello LORD </h2>
<div class="analytics-cards">
<div class="card"><h4>Programs</h4><h2 id="totalPrograms">0</h2></div>
<div class="card"><h4>Monthly</h4><h2 id="totalMonthly">0</h2></div>
<div class="card"><h4>Weekly</h4><h2 id="totalWeekly">0</h2></div>
<div class="card"><h4>Reviews</h4><h2 id="totalReviews">0</h2></div>
</div>
<div class="chart-box"><canvas id="adminChart"></canvas></div>`;
loadStats();
}
}

window.onload=()=>navigate();
</script>

</body>
</html>