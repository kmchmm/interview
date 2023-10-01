<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "interviewdb";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ("Database Connection Failed!");
