<?php



?>

<html>
<link rel="stylesheet" href="css/player.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/player.js"></script>

<audio id="player"></audio>
<!-- <div class="playerarranger"> -->
<div id="player__visual" style="display: none;" class="player">
    <div class="player__songinfo">
        <div id="player__songname" class="player__songname">Song</div>
        <div id="player__artistalbum" class="player__artistalbum">Artist • Album</div>
    </div>

    <div class="player__controls">
        <button class="player__button" onclick="PrevSong()">⏮</button>
        <button class="player__button" id="playbtn" onclick="Play();">▶️</button>
        <button class="hidden player__button" id="pausebtn" onclick="Pause()">⏸</button>
        <button class="player__button" onclick="NextSong()">⏭</button>
        <button class="player__button" onclick="Skip10()">+</button>
    </div>

    <div class="player__songdata">
        <div class="song__time">00:00</div>
    </div>
    <div class="player__indicator">
        <div id="player__indicator"></div>
    </div>
</div>
<!-- </div> -->

</html>