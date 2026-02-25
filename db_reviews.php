<?php
include "config.php"; // or your DB connection

$sql2 = "SELECT pid, ptask FROM reviews ORDER BY pid DESC";
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reviews List</title>
    <style>
      /* ---------- GLOBAL PAGE STYLES ---------- */
/* ===== PAGE BACKGROUND ===== */
body {
    font-family: "Amazon Ember", Arial, sans-serif;
    margin: 0;
    background: #0b1220;
    color: white;
}

/* ===== PAGE HEADING ===== */
.page-heading {
    background: #131921;
    color: #ff9900;
    padding: 15px;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    border-bottom: 2px solid #ff9900;
}

/* ===== TABLE CONTAINER ===== */
.section-container {
    width: 90%;
    margin: 20px auto;
    background: #111827;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(255,153,0,0.2);
}

/* ===== TABLE STYLE ===== */
.table-style {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

/* HEADER */
.table-style th {
    background: #232f3e;
    color: #ff9900;
    padding: 12px;
    text-align: left;
    border-bottom: 2px solid #ff9900;
}

/* DATA CELLS */
.table-style td {
    padding: 10px;
    border-bottom: 1px solid #333;
    color: white;
}

/* ROW HOVER */
.table-style tr:hover {
    background: rgba(255,153,0,0.1);
}

/* EMPTY MESSAGE */
.section-container p {
    text-align: center;
    color: #ff9900;
    font-size: 16px;
}
    </style>
</head>
<body>
<div class="page-heading">
    Reviews List
</div>
<div class="section-container">
    <?php if ($result2 && $result2->num_rows > 0): ?>
        <table class="table-style">
            <tr>
                <th>PID</th>
                <th>Task</th>
            </tr>
            <?php while ($row = $result2->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['pid'] ?></td>
                    <td><?= $row['ptask'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No reviews found.</p>
    <?php endif; ?>
</div>
</body>
</html>
