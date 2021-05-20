var player, playbtn, seekbar, playlist = [], playingid = null;
var title, artist, time;

var mouseDown = 0;


function initializePlayer(){
    player = document.getElementById("player");
    playbtn = document.getElementById("playbtn");
    seekbar = document.getElementById("seekslider");
    title = document.getElementById("player__songname");
    artist = document.getElementById("player__artistalbum");
    time = document.getElementById("player__time")

    player.addEventListener("timeupdate", onPlay, false);
    seekbar.addEventListener("change", playerSeek, false);
    seekbar.addEventListener("click", playerSeek, false);
    elements = document.getElementsByClassName("songurl");
    for (let index = 0; index < elements.length; index++) {
        playlist.push(elements[index].value);
    }
}

window.onload = initializePlayer;


function playerPlay(){
    player.play();
    playbtn.innerHTML = "⏸";
}

function playerPause(){
    player.pause();
    playbtn.innerHTML = "▶️";
}

function togglePlay(){
    if(player.currentSrc == "") return;
    if(player.paused) {
        playerPlay();
    }
    else {
        playerPause();
    }
}

function playerPrev(){
    console.log("yass")
    if (!playingid-1 < 0) {
        playingid--;
    }
    setSong(playingid);
}

function playerNext(){
    console.log("queen")
    if (playingid+1 > playlist.length-1) return;
    playingid++;
    setSong(playingid);
}

function onPlay(){
    if(mouseDown == 0)
    seekbar.value = player.currentTime / player.duration * 100;

    
    tsec = player.currentTime%60;
    tmin = player.currentTime/60%60 - tsec/60;
    time.innerHTML = tmin+":"+Math.round(tsec);

    seekbar.onmousedown = function() { 
    ++mouseDown;
    }
    seekbar.onmouseup = function() {
    --mouseDown;
    }

    if(player.ended) playerNext();
}

function setSong(id){
    playingid = id;
    player.src = "audio/" + playlist[id];
    title.innerHTML = document.getElementsByClassName("songname")[id].value;
    artist.innerHTML = document.getElementsByClassName("songartist")[id].value;
    playerPlay();
    document.getElementsByClassName("player")[0].classList.remove("disabled");
}

function setFromUrl(src, name, artist){
    console.log("hi");
    player.src = "audio/" + src;
    title.innerHTML = name;
    artist.innerHTML = artist;
    playerPlay();
    document.getElementsByClassName("player")[0].classList.remove("disabled");

}

function playerSeek(){
    var seekto = seekbar.value / 100 * player.duration;
    player.currentTime = seekto;
}