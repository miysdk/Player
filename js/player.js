let player, playbtn, seekbar, playlist = [], playingid = null;
let title, artist, curTime;
let durTime;

let mouseDown = 0;


function initializePlayer(){
    player = document.getElementById("player");
    playbtn = document.getElementById("playbtn");
    seekbar = document.getElementById("seekslider");
    title = document.getElementById("player__songname");
    artist = document.getElementById("player__artistalbum");
    curTime = document.getElementById("player__time")

    player.addEventListener("timeupdate", onPlay, false);
    seekbar.addEventListener("change", playerSeek, false);
    seekbar.addEventListener("click", playerSeek, false);
    elements = document.getElementsByClassName("songurl");
    for (let index = 0; index < elements.length; index++) {
        playlist.push(elements[index].value);
    }
}

window.onload = initializePlayer;

function togglePlay(){
    if(player.currentSrc == "") return;
    if(player.paused) {
        player.play();
    }
    else {
        player.pause();
    }
}

function playerPrev(){
    if (!playingid-1 < 0) {
        playingid--;
    }
    setSong(playingid);
}

function playerNext(){
    if (playingid+1 > playlist.length-1) return;
    playingid++;
    setSong(playingid);
}

function getCur(){
    tsec = player.currentTime%60;
    tmin = player.currentTime/60%60 - tsec/60;
    return Math.round(tmin)+":"+Math.round(tsec);
}

function getDur(){
    player.addEventListener('loadedmetadata', function(){
        tsec = player.duration%60;
        tmin = player.duration/60%60 - tsec/60;
        durTime = Math.round(tmin)+":"+Math.round(tsec);
    },false);
}

function onPlay(){
    if(mouseDown == 0)
    seekbar.value = player.currentTime / player.duration * 100;

    curTime.innerHTML = getCur()+" / "+durTime;

    seekbar.onmousedown = function() { 
    ++mouseDown;
    }
    seekbar.onmouseup = function() {
    --mouseDown;
    }

    if(player.ended) playerNext();
}

function setById(id){
    playingid = id;
    durTime = getDur(player);
    setFromUrl(playlist[id], document.getElementsByClassName("songname")[id].value, document.getElementsByClassName("songartist")[id].value)
    // player.src = "audio/" + playlist[id];
    // title.innerHTML = document.getElementsByClassName("songname")[id].value;
    // artist.innerHTML = document.getElementsByClassName("songartist")[id].value;
    // player.play();
    // document.getElementsByClassName("player")[0].classList.remove("disabled");
}

function setFromUrl(src, name, artist){
    durTime = getDur(player);
    player.src = "audio/" + src;
    title.innerHTML = name;
    artist.innerHTML = artist;
    player.play();
    document.getElementsByClassName("player")[0].classList.remove("disabled");
}

function playerSeek(){
    let seekto = seekbar.value / 100 * player.duration;
    player.currentTime = seekto;
}