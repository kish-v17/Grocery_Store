<?php
$con = mysqli_connect("localhost", "root", "","Purebite_db");
if ($con) {
    echo "Database Connected";
} else {
    echo "Error";
}
