<?php
include "config.php";
if($conn){
    echo "DB Connected";
} else {
    echo "DB Failed";
}
?>