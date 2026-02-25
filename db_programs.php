<?php
include "config.php"; // or your DB connection

$sql = "SELECT program_id, title, details, length, components, collaboration 
        FROM programs ORDER BY program_id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Programs List</title>
    <style>
/* ---------- GLOBAL PAGE STYLES ---------- */
body {
    font-family: "Amazon Ember", Arial, sans-serif;
    margin: 0;
    background-color: #f8f9fa;
    color: #111;
}

/* ---------- PROFESSIONAL HEADING ---------- */
.page-heading {
    background: #232f3e;  /* Amazon dark navbar color */
    color: #fff;
    padding: 20px;
    text-align: center;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: 1px;
    border-bottom: 4px solid #febd69; /* Amazon orange underline */
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

/* ---------- TABLE STYLING ---------- */
.table-container {
    width: 90%;
    margin: 30px auto;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.table-container table {
    width: 100%;
    border-collapse: collapse;
    font-size: 15px;
}

.table-container th {
    background: #37475a;
    color: #fff;
    padding: 14px;
    text-align: left;
}

.table-container td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

.table-container tr:hover {
    background: #f3f3f3;
}

</style>
</head>
<body>
<div class="page-heading">
    Programs List
</div>

<div class="table-container">

<?php if ($result && $result->num_rows > 0): ?>
<table>
            <tr>
                <th>Program ID</th>
                <th>Title</th>
                <th>Details</th>
                <th>Length</th>
                <th>Components</th>
                <th>Collaboration</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['program_id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['details'] ?></td>
                    <td><?= $row['length'] ?></td>
                    <td><?= $row['components'] ?></td>
                    <td><?= $row['collaboration'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No programs found.</p>
    <?php endif; ?>
</div>
</body>
</html>
