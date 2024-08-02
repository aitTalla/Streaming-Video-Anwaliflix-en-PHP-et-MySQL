
var video = document.getElementById("background-video");

function enterViewBoxFilm(box,trialerSrc){

    box.getElementsByClassName("boxFilmShow")[0].style.display = "";
    /*
    video.getElementsByTagName('source')[0].src = "/data/media/videos/"+trialerSrc
    video.load();
    video.style.display = "";
    video.play()
	*/
}

function outViewBoxFilm(box){
    box.style.display = "none";
    
    /*video.style.display = "none";
    video.pause()
	*/
}

function showSaison(idSaison){
    window.location = "/data/pages/saison.php?watch="+idSaison;
}

function playSaison(idEpisode){
    window.location = "/data/pages/view.php?watch="+idEpisode;
}
function playEpisode(idEpisode)
{
    window.location = "/data/pages/view.php?watch="+idEpisode;

}