//this is the code for 'tetris' as you can see the game does not actually play tetris but you will still recive a score after 10s

function playMusic(){
    var myAudio = document.getElementById("audio");
    myAudio.play();
}
function pauseMusic(){
    var myAudio = document.getElementById("audio");
    myAudio.pause();
}
function getCookie(name) {
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");

    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");

        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if(name == cookiePair[0].trim()) {
            // Decode the cookie value and return
            return decodeURIComponent(cookiePair[1]);
        }
    }

    // Return null if not found
    return null;
}
function postScore(score){
    var xhr = new XMLHttpRequest();
    //test tets sts sgjsdjksd
    // need to send username also
    var sendData = "score="+score+"&user="+getCookie('username');
    xhr.open("POST", "leaderboard.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    console.log(xhr.status)
    xhr.onreadystatechange = function (){
        console.log(xhr.status)
        if (xhr.readyState === 4 && xhr.status === 200){
            console.log(xhr.status);
        }
    }
    xhr.send(sendData);
}
function countdown(x){
    var timeleft = x;
    var downloadTimer = setInterval(function(){
        if(timeleft <= 0){
            clearInterval(downloadTimer);
            document.getElementById("score").innerHTML = "Your score was: "+score
            document.getElementById("progressBar").style.display = 'none';
            postScore(score);
            pauseMusic();
        } else {
            document.getElementById("progressBar").value = 10 - timeleft;
        }
        timeleft -= 1;
    }, 500);
}

function getRandomIntInclusive() {
    min = Math.ceil(0);
    max = Math.floor(1000);
    return Math.floor(Math.random() * (max - min + 1) + min); //The maximum is inclusive and the minimum is inclusive
}
function tetris(x){
    playMusic();
    score = getRandomIntInclusive();
    x.style.display = 'none';
    countdown(10);

}