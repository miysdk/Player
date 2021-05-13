<?php



?>

<html>
<link rel="stylesheet" href="css/player.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/player.js"></script>

<audio id="player"></audio>
<div class="player disabled">
    <input type="range" id="seekslider" min="0" max="100" value="0" step="0.01">
    <div class="playerrest">
        <div class="player__songinfo">
            <div id="player__songname" class="player__songname">Song</div>
            <div id="player__artistalbum" class="player__artistalbum">Artist • Album</div>
        </div>

        <div class="player__controls">
            <button class="player__button" onclick="playerPrev()">⏮</button>
            <button class="player__button" id="playbtn" onclick="togglePlay();">▶️</button>
            <button class="hidden player__button" id="pausebtn" onclick="Pause()">⏸</button>
            <button class="player__button" onclick="playerNext()">⏭</button>
        </div>

        <div class="player__songdata">
            <div id="player__time">00:00</div>
        </div>
    </div>
</div>
<!-- <div class="playerarranger"> -->
<!-- <input type="range" id="seekslider" min="0" max="100" value="0" step="0.01">
<div id="player__visual" class="player">
    
    <div class="player__indicator">
        
    </div>
</div> -->
<!-- </div> -->

</html>