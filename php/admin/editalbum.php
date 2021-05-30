<?php

session_start();
include("../connect.php");
include("../functions.php");

$user_data = checkLogin($conn);
if($user_data['roleid'] != 2) 
{
    header("Location: ../../index.php");
    die();
}


if(isset($_POST['edited'])) {


    if(isset($_FILES)){
        $name_file = $_FILES['picturef']['name'];
        $tmp_name = $_FILES['picturef']['tmp_name'];
        move_uploaded_file($tmp_name, "../../images/artists/".$name_file);
    }

    if ($name_file == "") $name_file = $_POST['picture'];

    $query = "UPDATE `albums` SET `name`="."'".$_POST['name']."'".",`picture`="."'".$name_file."'".",`description`="."'".$_POST['description']."'"." WHERE `id` = ".$_POST['id'];
    mysqli_query($conn, $query);

    echo $query;
    header("Location: ../../admin.php");
    die();

}


include("../functions.php");
$album = GetFromDB($conn, "SELECT * from `albums` where `id` = ".$_POST['id']);


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

        <input type="text" name="name" <?php echo 'value="'.$album[0][1].'"'?>><br><br>
        <input type="hidden" name="picture" <?php echo 'value="'.$album[0][2].'"'?>>
        <input type="hidden" name="id" <?php echo 'value="'.$album[0][0].'"'?>>
        <input type="hidden" name="edited" value="true">
        <img style="width: 100px; height: 100px;" <?php echo 'src="../../images/albums/'.$album[0][2].'"' ?> alt=""><br>
        <input type="file" name="picturef" accept=".jpg,.jpeg,.png"><br><br>
        <select name="artist">
            <?php
            
            $artists = GetFromDB($conn, "SELECT * from `artists`");

            foreach ($artists as $artist) {
                echo '<option value="'.$artist[0].'"';
                if ($artist[0] == $album[0][3]) echo 'selected';
                echo '>'.$artist[1].'</option>';
            }
            
            
            ?>
        </select><br><br>
        <textarea name="description" style="resize: none;" cols="30" rows="10" ><?php echo $album[0][5]?></textarea><br><br>
        <select name="type">
            <?php
            
            $types = GetFromDB($conn, "SELECT * from `albumtypes`");

            foreach ($types as $type) {
                echo '<option value="'.$type[0].'"';
                if ($type[0] == $album[0][6]) echo 'selected';
                echo '>'.$type[1].'</option>';
            }
            
            
            ?>
        </select>
        <input type="submit" value="Submit">

    </form>
        <hr>
        <table border="1">
            <caption>Songs</caption>
            <tbody>

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Song</th>
                    <th>Album</th>
                    <th>Actions</th>
                </tr>
                
                <?php
                
                $songs = GetFromDB($conn, "SELECT * from `songs` where `albumid` = ".$album[0][0]);
                foreach ($songs as $song) {
                    echo '
                    <form action="editsong.php" method="post" target="_blank">
                    <tr>
                        <input type="hidden" name="id" value="'.$song[0].'">
                        <td rowspan="2">'.$song[0].'</td>
                        <td rowspan="2"><input type="text" name="name" value="'.$song[1].'"></td>
                        <td><input type="text" name="song" value="'.$song[3].'"></td>
                        <td rowspan="2"><select name="albumid">';
                
                            $albums = GetFromDB($conn, "SELECT * from `albums`");
                
                            foreach ($albums as $_album) {
                                echo '<option value="'.$_album[0].'"';
                                if ($_album[0] == $_POST['id']) echo 'selected';
                                echo '>'.$_album[1].'</option>';
                            }
                            
                        echo '</select></td>
                        <td rowspan="2"><input type="submit" value="Save"></form><form action="deletesong.php" method="post">
                            <input type="hidden" name="id" value="'.$song[0].'">
                            <input type="submit" value="Delete">
                        </form></td>
                    </tr>
                    <tr>
                        <td><audio controls src="../../audio/'.$song[3].'"><audio></td>
                    </tr>
                    ';
                }
                
                ?>
                <form action="addsong.php" method="post" enctype="multipart/form-data">
                    <tr>
                    <input type="hidden" name="albumid" <?php echo 'value="'.$_POST['id'].'"' ?>>
                        <td>New</td>
                        <td>Song name:<br><input type="text" name="name"></td>
                        <td colspan="2">File:<br><input type="file" name="song" accept=".mp3"></td>
                        <td><input type="submit" value="Add"></td>
                    </tr>
                </form>
            </tbody>
        </table>
        <hr>
        
</body>
</html>