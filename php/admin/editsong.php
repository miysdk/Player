<?php

include("../connect.php");

$query = 'UPDATE `songs` SET `name` = "'.$_POST['name'].'", `song` = "'.$_POST['song'].'" WHERE `id` = '.$_POST['id'];
mysqli_query($conn, $query);


echo "<script>window.close();</script>";
die();