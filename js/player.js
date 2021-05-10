function Playlist(songid){
    if(playlist.length <= 0) return;
    document.getElementById("player");
    if(player.ended && playlist.length != 0){
        NextSong();
    }
    setTimeout(function(){Playlist(playingid)}, 100);
    //return;
}

function AddToPlaylist(song){
    playlist.push(song);
    playingid = playlist.length-1;
    SetSong(playlist[playingid]);
    console.log(playlist);
}

function AddSongsToQueue(songs){
    songs.forEach(element => {
        AddToPlaylist(element);
    });
    playingid=playlist.length-songs.length;
    console.log(playingid=playlist.length-songs.length);
    SetSong(playlist[playingid]);
    Playlist(playingid);
}

function SetSong(song){
    src = "audio/"+song[0];
    player = document.getElementById("player");
    document.getElementById("player__songname").innerHTML = song[1];
    document.getElementById("player__artistalbum").innerHTML = song[2] + " • " + song[3];
    document.getElementById("player__visual").style.display = "flex";

    player.src = src;
    setTimeout(Play, 100);
}

function PrevSong(){
    if (!playingid == 0) {
        playingid = playingid-1;
    }
    SetSong(playlist[playingid]);
}

function NextSong(){
    if(playingid+1 >= playlist.length) return;
    playingid += 1;
    SetSong(playlist[playingid]);
}

function Play(){
    player = document.getElementById("player");
    if (player.currentSrc == "") return;
    player.play();
    ToggleBTNs();
    indicator();
}

function Pause(){
    player = document.getElementById("player");
    player.pause();
    ToggleBTNs();
}

function Skip10(){
    player = document.getElementById("player");
    if(player.paused||player.ended||player.currentTime+10>=player.duration) return;
    player.currentTime += 10;
}

function ToggleBTNs(){
    document.getElementById("playbtn").classList.toggle("hidden");
    document.getElementById("pausebtn").classList.toggle("hidden");
}

function indicator(){
    player = document.getElementById("player");
    ind = document.getElementById("player__indicator");
    if(player.ended || player.paused && player.currentTime == 0) {
        ind.style.width = 0;
        Pause();
        return;
    }
    if(player.paused) return;
    var per = player.currentTime/player.duration*100;
    ind.style.width = per+"%";
    setTimeout(indicator, 100)
}