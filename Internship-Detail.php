<?php
include "config.php";
$fieldFilter = $_GET['field'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<title>Available Internships</title>
<style>
body {font-family: Arial; background:#f4f4f4; margin:0;}
header {background:#232f3e; color:white; padding:15px; text-align:center; font-size:22px;}
.intern-container {display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px; padding:20px;}
.intern-card {background:white; padding:15px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1);}
.apply-btn {background:#ff9900; padding:8px 15px; color:white; text-decoration:none; border-radius:5px;}
</style>
</head>

<body>

<header><?php echo $fieldFilter; ?> Internships</header>

<div class="intern-container">

<!-- 🔥 STATIC PRE-AVAILABLE INTERNSHIPS -->
<div class="intern-card">
<h3>Full Stack Intern</h3>
<p>📍 Mumbai | Fresher | ₹10,000</p>
<a class="apply-btn">Apply</a>
</div>

<div class="intern-card">
<h3>Data Science Intern</h3>
<p>📍 Pune | 1 Year | ₹12,000</p>
<a class="apply-btn">Apply</a>
</div>

<div class="intern-card">
<h3>Cyber Security Intern</h3>
<p>📍 Nagpur | Fresher | ₹8,000</p>
<a class="apply-btn">Apply</a>
</div>

<div class="intern-card">
<h3>DevOps Intern</h3>
<p>📍 Bangalore | 2+ Years | ₹15,000</p>
<a class="apply-btn">Apply</a>
</div>

<!-- 🔥 DATABASE INTERNSHIPS (ADMIN ADDED) -->
<?php
$query = "SELECT * FROM internships";
if($fieldFilter != '') {
    $query .= " WHERE field='$fieldFilter'";
}
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)){
?>
<div class="intern-card">
<h3><?php echo $row['title']; ?></h3>
<p>📍 <?php echo $row['city']; ?> | <?php echo $row['experience']; ?> | ₹<?php echo $row['stipend']; ?></p>
<p><?php echo $row['description']; ?></p>
<a class="apply-btn">Apply</a>
</div>
<?php } ?>

</div>
</body>
</html>