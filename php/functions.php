<?php

function GetFromDB($connect, $query){
    $data = mysqli_query($connect, $query);
    $data = mysqli_fetch_all($data);
    return $data;
}

function DisplayerElement($href, $name, $image, $description){
    echo '<div class="displayer__element">
    <a href="'.$href.'">
    <img src="'.$image.'" alt="" class="element__cover">
    </a>
    <div class="element__title"><a href="'.$href.'">'.$name.'</a></div>
    <div class="element__subtitle">'.$description.'</div>
    </div>';
}

function checkLogin($con){
    if(isset($_SESSION['userid']))
    {
        $id = $_SESSION['userid'];
        $query = "SELECT * from `users` where `userid` = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }

        header("Location: ../login.php");
        die;

    }
}

function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4, $length);
    for ($i=0; $i < $len; $i++) { 
        $text .= rand(0,9);
    }

    return $text;

}