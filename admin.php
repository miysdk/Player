<?php

include("php/connect.php");
include("php/functions.php");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/list.css">
</head>

<script>
    function toggleAcc(called, calling){
        document.getElementById(called).classList.toggle("disabled");
        document.getElementById(calling).classList.toggle("disabled");
    }
</script>

<body>

    <div class="acc">
    <?php
    
    $artists = GetFromDB($conn, "SELECT * from `artists`");
    for ($i=0; $i < count($artists); $i++) { 
        echo '
        
        
            <div class="acc__element">
                <div id="accc__element'.$i.'" class="acc__closed" onclick="toggleAcc('."'".'accc__element'.$i.''."'".', '."'".'acco__element'.$i.''."'".')">
                    <img src="images/artists/'.$artists[$i][2].'" class="acc__image">
                    <div class="acc__title">'.$artists[$i][1].'</div>
                </div>

                <div id="acco__element'.$i.'" class="acc_opened disabled">
                    <div class="acc__info">
                        <img src="images/artists/'.$artists[$i][2].'" alt="" class="acco__image">
                        <div class="acc__text">
                            <div class="acc__title">'.$artists[$i][1].'</div>
                            <div class="acc__description">'.$artists[$i][3].'</div>
                            <br><br>
                            <table> 
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                ';

                                $albums = GetFromDB($conn, "SELECT * from `albums` where `artistid` = ".$artists[$i][0]);

                                foreach ($albums as $album) {
                                    echo '
                                    
                                        <tr>
                                        <td>'.$album[0].'</td>
                                        <td><a href="album.php?id='.$album[0].'">'.$album[1].'</a></td>
                                        <td><form action="php/admin/editalbum.php" method="post">
                                            <input type="hidden" name="id" value="'.$album[0].'">
                                            <input type="submit" value="✏️">
                                        </form>
                                        <form action="php/admin/deletealbum.php" method="post">
                                        <input type="hidden" name="id" value="'.$album[0].'">
                                        <input type="submit" value="🗑️">
                                        </form></td>
                                        </tr>
                                    
                                    ';
                                }


                                echo '
                                </tbody>
                                    </table>
                                        <caption>New Album</caption>
                                        <table>
                                        <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <th>Cover, type and release</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                        <form action="php\admin\addalbum.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="artistid" value="'.$artists[$i][0].'">
                                            <td rowspan="3"><input type="text" name="name" required></td>
                                            <td><input required type="file" name="picture" accept=".jpg,.jpeg,.png"></td>
                                            <td rowspan="3"><textarea name="description" required></textarea></td>
                                            <td rowspan="3"><input type="submit" value="➕"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <select name="typeid">';
                                                
                                                
                                                $types = GetFromDB($conn, "SELECT * from `albumtypes`");
                                    
                                                foreach ($types as $type) {
                                                    echo '<option value="'.$type[0].'">'.$type[1].'</option>';
                                                }
                                                
                                                
                                                
                                            echo '</select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="date" name="released">
                                            </td>
                                        </tr>
                                        </form>
                                        </tbody>
                                        </table>

                                        
                                    <br><br>
                                    <form action="">
                                    <input type="hidden" name="artistid" value="'.$artists[$i][0].'">
                                </form>';

                                echo '

                        <div class="acc__actions">
                            <form action="php/admin/editartist.php" method="post">
                                <input type="hidden" name="id" value="'.$artists[$i][0].'">
                                <input type="submit" value="Edit" class="button button__filled"><br><br>
                            </form>
                            <form action="php/admin/deleteartist.php" method="post">
                                <input type="hidden" name="id" value="'.$artists[$i][0].'">
                                <input type="submit" value="Delete" class="button button__hollow">
                            </form>
                        </div>


        
                        </div>
                    </div>
                    <button class="acc__close button button__hollow" onclick="toggleAcc('."'".'acco__element'.$i.''."'".', '."'".'accc__element'.$i.''."'".')">ᐱ</button>
                </div>
            </div>
        
        ';
    }
    ?>

        <div class="acc__element">
            <div id="accc__element-0" class="acc__closed" onclick="toggleAcc('accc__element-0', 'acco__element-0')">
                <img src="https://freepikpsd.com/wp-content/uploads/2019/10/white-plus-sign-png-3-Transparent-Images.png" class="acc__image">
                <div class="acc__title">Add new</div>
            </div>

            <div id="acco__element-0" class="acc_opened disabled">
                <div class="acc__info">
                    <img src="https://freepikpsd.com/wp-content/uploads/2019/10/white-plus-sign-png-3-Transparent-Images.png" alt="" class="acco__image">
                    <div class="acc__text">
                        <div class="acc__title">Add new</div>
                        <div class="acc__description">Enter all the data to create new artist</div>
                        <div class="acc__actions">
                            <form action="php\admin\addartist.php" method="POST" enctype="multipart/form-data">
                                <br>
                                <input type="text" name="name" required><br><br>
                                <input required type="file" name="picture" accept=".jpg,.jpeg,.png"><br><br>
                                <textarea style="resize: none;" name="description" rows="4" cols="50" required></textarea><br><br>
                                <input type="submit" value="Add" class="button button__filled">
                            </form>
                        </div>
                    </div>
                </div>
                <button class="acc__close button button__hollow" onclick="toggleAcc('accc__element-0', 'acco__element-0')">ᐱ</button>
            </div>
        </div>
    </div>
</body>
</html>