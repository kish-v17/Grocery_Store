<?php

$con = mysqli_connect("localhost","root","","purebite_db");
session_start();
$_SESSION["user_id"]=1;