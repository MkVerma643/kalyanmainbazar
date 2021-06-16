function showTime() {
    var today = new Date();
    var Drowdate = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    var alldate = Drowdate + " " + mmzz1;
    end = new Date(alldate), sec = 1000, min = sec * 60, hour = min * 60, day = hour * 24;
    var now = new Date(),
        between = end - now;
    var nnx = Math.floor(between / sec);
    if (nnx == 0) {
        $("#preloader").show(); 
        setTimeout(function(){  window.location.reload();}, 3000);
       
        // location.reload();
    }
    if (nnx == 880) {
        getres();
    }
    var days = Math.floor(between / day),
        hours = Math.floor((between % day) / hour),
        minutes = Math.floor((between % hour) / min),
        seconds = Math.floor((between % min) / sec);
    hours = (hours < 10) ? "0" + hours : hours;
    minutes = (minutes < 10) ? "0" + minutes : minutes;
    seconds = (seconds < 10) ? "0" + seconds : seconds;
    if (hours > 0) {
        hours = '00';
        minutes = '00';
        seconds = '00';
    }
    var clock = hours + ":" + minutes + ":" + seconds;
    document.getElementById("xtime").value = clock;
    setTimeout(showTime, 1000);
}