function postScore(score){
    var xhr = new XMLHttpRequest();
    var sendScore = "score="+score
    xhr.open("POST", "leaderboard.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function (){
        if (xhr.readyState === 4 && xhr.status === 200){
            var returnData = xhr.responseType;
        }
    }
    xhr.send(sendScore);
}
function getRandomIntInclusive() {
    min = Math.ceil(0);
    max = Math.floor(1000);
    return Math.floor(Math.random() * (max - min + 1) + min); //The maximum is inclusive and the minimum is inclusive
}
function tetris(x){
    score = getRandomIntInclusive()
    x.style.display = 'none';
    document.getElementById("score").innerHTML = "Your score was: "+score
    //document.getElementById("button").style.display= "block";
    postScore(score);
}