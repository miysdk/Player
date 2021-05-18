<?php

include("../connect.php");

$query = "DELETE from `songs` where `albumid` = ".$_POST['id'];
mysqli_query($conn, $query);

$query = "DELETE from `albums` where `id` = ".$_POST['id'];
mysqli_query($conn, $query);

header("Location: ../../admin.php");
die();