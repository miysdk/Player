<?php
include("../connect.php");
if(isset($_POST['edited'])) {


    if(isset($_FILES)){
        $name_file = $_FILES['picturef']['name'];
        $tmp_name = $_FILES['picturef']['tmp_name'];
        move_uploaded_file($tmp_name, "../../images/artists/".$name_file);
    }

    if ($name_file == "") $name_file = $_POST['picture'];

    $query = "UPDATE `artists` SET `name`="."'".$_POST['name']."'".",`picture`="."'".$name_file."'".",`description`="."'".$_POST['description']."'"." WHERE `id` = ".$_POST['id'];
    mysqli_query($conn, $query);

    echo $query;
    header("Location: ../../admin.php");
    die();

}


include("../functions.php");
$artist = GetFromDB($conn, "SELECT * from `artists` where `id` = ".$_POST['id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="name" <?php echo 'value="'.$artist[0][1].'"'?>><br><br>
        <input type="hidden" name="picture" <?php echo 'value="'.$artist[0][2].'"'?>>
        <input type="hidden" name="id" <?php echo 'value="'.$artist[0][0].'"'?>>
        <input type="hidden" name="edited" value="true">
        <input type="file" name="picturef" accept=".jpg,.jpeg,.png"><br><br>
        <textarea name="description" style="resize: none;" cols="30" rows="10" ><?php echo $artist[0][3]?></textarea><br><br>
        <input type="submit" value="Submit">

    </form>
</body>
</html>