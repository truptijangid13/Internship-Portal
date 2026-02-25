<?php
include "config.php";

header('Content-Type: application/json');

if(isset($_POST['pid']) && isset($_POST['ptask'])){

    $pid = $_POST['pid'];
    $ptask = $_POST['ptask'];

    $sql = "INSERT INTO reviews(pid, ptask) VALUES('$pid','$ptask')";

    if(mysqli_query($conn,$sql)){
        echo json_encode(["success"=>true,"message"=>"Review Submitted Successfully"]);
    } else {
        echo json_encode(["success"=>false,"message"=>"Database Error"]);
    }
}
else {
    echo json_encode(["success"=>false,"message"=>"Invalid Data"]);
}
?>