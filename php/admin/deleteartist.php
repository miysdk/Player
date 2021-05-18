<?php

if (!isset($_POST['id'])) header("Location: ../../admin.php");

include("../connect.php");

$query = "DELETE from `artists` where `id` = ".$_POST['id'];
mysqli_query($conn, $query);

header("Location: ../../admin.php");