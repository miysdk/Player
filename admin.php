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
    <link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
</head>

<script>
    function ToggleUI(id){
        document.getElementsByClassName("overlay")[0].classList.toggle("disabled");
        document.getElementById(id).classList.remove("disabled");
    }

    function Enable(id){
        DisableTabs();
        document.getElementById(id).classList.remove("disabled");
    }
    
    function DisableTabs(){
        ids = ['albums', 'artists', 'songs'];
        ids.forEach(element => {
            document.getElementById(element).classList.add("disabled");
        });
    }
</script>

<body>
    <div class="overlay disabled">

        <!-- #ADDARTIST form -->
        <div id="addartist" class="ovui disabled">
            <form action="php\admin\addartist.php" method="POST" enctype="multipart/form-data">
                <!-- artist's name -->
                <div>
                    <div>Name</div>
                    <div><input required type="text" name="name"></div>
                </div>

                <!-- artist's pfp -->
                <div>
                    <div><br>Picture</div>
                    <div><input required type="file" name="picture" accept=".jpg,.jpeg,.png"></div>
                </div>

                <!-- description about the artist -->
                <div><br>Description</div>
                <div><input  type="text" name="description"></div>


                <input type="hidden" name="db" value="artists">

                <!-- buttons for submit and cancel -->
                <div><br><br><input type="submit" class="button button__filled">
                    <button onclick="ToggleUI('addartist')" class="button button__hollow">Cancel</button>
                </div>

                <!-- end of form -->
            </form>
        <!-- end of #ADDARTIST -->
        </div>


        <!-- #ADDALBUMFORM -->
        <div id="addalbum" class="ovui disabled">
            <form action="php\admin\addartist.php" method="POST" enctype="multipart/form-data">
                <!-- album's name -->
                <div>
                    <div>Name</div>
                    <div><input required type="text" name="name"></div>
                </div>

                <!-- album's cover -->
                <div>
                    <div><br>Cover</div>
                    <div><input required type="file" name="picture" accept=".jpg,.jpeg,.png"></div>
                </div>

                <!-- album's artist -->
                <div>
                    <div><br>Artist</div>
                    <div><select name="artistid">
                        <?php 
                            $names = GetFromDB($conn, "SELECT * from `artists`");
                            foreach ($names as $name) {
                                echo '<option class="input" value="'.$name[0].'">'.$name[1].'</option>';
                            }
                        ?>
                    </select></div>
                </div>

                <!-- when released -->
                <div>
                    <div><br>Release Date:</div>
                    <div><input type="date" name="releasedate"></div>
                </div>

                <!-- description -->
                <div>
                    <div><br>Description</div>
                    <div><input type="text" name="description"></div>
                </div>

                <!-- type of album -->
                <div>
                    <div><br>Type</div>
                    <div><select name="typeid">
                        <?php 
                            $types = GetFromDB($conn, "SELECT * from `albumtypes`");
                            foreach ($types as $type) {
                                echo '<option class="input" value="'.$type[0].'">'.$type[1].'</option>';
                            }
                        ?>
                    </select></div>
                </div>

                <input type="hidden" name="db" value="albums">

                <!-- buttons for submit and cancel -->
                <div><br><br><input type="submit" class="button button__filled">
                    <button onclick="ToggleUI('addalbum')" class="button button__hollow">Cancel</button>
                </div>

                <!-- end of form -->
            </form>
            <!-- end of #ADDALBUM -->
        </div>


        <!-- #ADDSONG form -->
        <div id="addartist" class="ovui disabled">
            <form action="php\admin\addartist.php" method="POST" enctype="multipart/form-data">
                <!-- artist's name -->
                <div>
                    <div>Name</div>
                    <div><input required type="text" name="name"></div>
                </div>

                <!-- artist's pfp -->
                <div>
                    <div><br>Picture</div>
                    <div><input required type="file" name="picture" accept=".jpg,.jpeg,.png"></div>
                </div>

                <!-- description about the artist -->
                <div><br>Description</div>
                <div><input  type="text" name="description"></div>


                <input type="hidden" name="db" value="artists">

                <!-- buttons for submit and cancel -->
                <div><br><br><input type="submit" class="button button__filled">
                    <button onclick="ToggleUI('addartist')" class="button button__hollow">Cancel</button>
                </div>

                <!-- end of form -->
            </form>
        <!-- end of #ADDARTIST -->
        </div>


        <!-- end of OVERLAY -->
    </div>


    <!-- ----------------- -->
    <!-- MAIN ADMIN SYSTEM -->
    <!-- ----------------- -->
    <div class="tabview">
        <!-- TAB__PANEL panel with tabs of CRUD -->
        <div class="tab__panel">
            <div onclick="Enable('artists')" class="tab__button">Artists</div>
            <div onclick="Enable('albums')" class="tab__button">Albums</div>
            <div onclick="Enable('songs')" class="tab__button">Songs</div>
        <!-- end of TAB__PANEL -->
        </div>


        <!-- TAB__VIEWER show's what's in the tab -->
        <div class="tab__viewer">

            <!-- #ARTISTS tab with `artists` DB CRUD -->
            <div id="artists" class="viewer__body">
                <!-- VIEWER__HEAD -->
                <div class="viewer__header">
                    <div class="viewer__title">Artists</div>
                    <button onclick="ToggleUI('addartist')" class="viewer__add button button__filled">New Artist</button>
                <!-- end of VIEWER__HEAD -->
                </div>

                <!-- TABLE of artists from `artists` -->
                <div class="table">
                    <table border="2">
                        <tr>
                            <th >ID</th>
                            <th >Name</th>
                            <th style="width: 15%">Cover</th>
                            <th style="width: 30%;">Description</th>
                            <th style="width: 10%;">Actions</th>
                        </tr>

                        <?php 
                        
                        $data = GetFromDB($conn, "SELECT * from `artists`");
                        foreach ($data as $dat) {
                            if (strlen($dat[3]) > 300){
                                $descr = substr($dat[3], 0, 300)."...";
                            }
                            else $descr = $dat[3];
                            echo '
                            <tr>
                                <td rowspan="2">'.$dat[0].'</td>
                                <td rowspan="2">'.$dat[1].'</td>
                                <td><img style="width:100%" src="images/artists/'.$dat[2].'"></td>
                                <td rowspan="2">'.$descr.'</td>
                                <td rowspan="2">
                                    <button class="button button__filled">Edit</button><br><br>
                                    <form action="php/admin/delete.php" method="POST">
                                        <input type="hidden" name="db" value="artists">
                                        <input type="hidden" name="id" value="'.$dat[0].'">
                                        <input type="submit" value="Delete" class="button button__hollow">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>'.$dat[2].'</td>
                            </tr>
                        ';
                        }

                        ?>

                    </table>
                <!-- end of TABLE -->
                </div>
            <!-- end of #ARTISTS -->
            </div>


            <!-- #ALBUMS tab with `albums` DB CRUD -->
            <div id="albums" class="viewer__body disabled">
                <!-- VIEWER__HEADER -->
                <div class="viewer__header">
                        <div class="viewer__title">Albums</div>
                        <button onclick="ToggleUI('addalbum')" class="viewer__add button button__filled">New Album</button>
                <!-- end of VIEWER__HEADER -->
                </div>

                <!-- TABLE of albums from `albums` -->
                <div class="table">
                    <table border="2">
                        <tr>
                            <th >ID</th>
                            <th >Name</th>
                            <th style="width: 10%">Cover</th>
                            <th>Artist</th>
                            <th>Release date</th>
                            <th style="width: 20%;">Description</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>

                        <?php 
                        
                        $data = GetFromDB($conn, "SELECT * from `albums`");
                        foreach ($data as $dat) {
                            if (strlen($dat[5]) > 100){
                                $descr = substr($dat[5], 0, 99)."...";
                            }
                            else $descr = $dat[5];
                            echo '
                            <tr>
                                <td rowspan="2">'.$dat[0].'</td>
                                <td rowspan="2">'.$dat[1].'</td>
                                <td><img style="width:100%" src="images/albums/'.$dat[2].'"></td>
                                <td rowspan="2">'.$dat[3].'</td>
                                <td rowspan="2">'.$dat[4].'</td>
                                <td rowspan="2">'.$descr.'</td>
                                <td rowspan="2">'.$dat[6].'</td>
                                <td rowspan="2">
                                    <button class="button button__filled">Edit</button><br><br>
                                    <form action="php/admin/delete.php" method="POST">
                                        <input type="hidden" name="db" value="albums">
                                        <input type="hidden" name="id" value="'.$dat[0].'">
                                        <input type="submit" value="Delete" class="button button__hollow">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>'.$dat[2].'</td>
                            </tr>
                        ';
                        }

                        ?>

                    </table>
                <!-- end of TABLE -->
                </div>
            <!-- end of #ALBUMS -->
            </div>


            <!-- #SONGS from `songs` -->
            <div id="songs" class="viewer__body disabled">
                <!-- VIEWER__HEADER -->
                <div class="viewer__header">
                        <div class="viewer__title">Albums</div>
                        <button onclick="ToggleUI('addalbum')" class="viewer__add button button__filled">New Album</button>
                <!-- end of VIEWER__HEADER -->
                </div>

                <!-- TABLE of albums from `albums` -->
                <div class="table">
                    <table  border="2">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Song</th>
                            <th>Album</th>
                            <th>Actions</th>
                        </tr>

                        <?php 
                        
                        $data = GetFromDB($conn, "SELECT * from `songs`");
                        foreach ($data as $dat) {
                            $album = GetFromDB($conn, "SELECT * from `albums` where `id` = ".$dat[4]);
                            echo '
                            <tr>
                                <td rowspan="2">'.$dat[0].'</td>
                                <td rowspan="2">'.$dat[1].'</td>
                                <td rowspan="2">'.$dat[2].'</td>
                                <td><audio controls src="audio/'.$dat[3].'"></audio></td>
                                <td><img style="width:100px;" src="images/albums/'.$album[0][2].'"</td>
                                <td rowspan="2">
                                    <button class="button button__filled">Edit</button><br><br>
                                    <form action="php/admin/delete.php" method="POST">
                                        <input type="hidden" name="db" value="songs">
                                        <input type="hidden" name="id" value="'.$dat[0].'">
                                        <input type="submit" value="Delete" class="button button__hollow">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>'.$dat[3].'</td>
                                <td>'.$album[0][1].'</td>
                            </tr>
                        ';
                        }

                        ?>

                    </table>
                <!-- end of TABLE -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>