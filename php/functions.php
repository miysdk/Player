<?php

function GetFromDB($connect, $query){
    $data = mysqli_query($connect, $query);
    $data = mysqli_fetch_all($data);
    return $data;
}

function DisplayerElement($href, $name, $image, $description){
    echo '<div class="displayer__element">
    <a href="'.$href.'">
    <img src="images/'.$image.'" alt="" class="element__cover">
    </a>
    <div class="element__title"><a href="'.$href.'">'.$name.'</a></div>
    <div class="element__subtitle">'.$description.'</div>
    </div>';
}
