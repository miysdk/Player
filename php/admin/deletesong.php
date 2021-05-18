<?php

include("../connect.php");

$querry = "DELETE from `songs` where `id` = ".$_POST['id'];
mysqli_query($conn, $querry);

echo '<script>window.history.back();</script>';