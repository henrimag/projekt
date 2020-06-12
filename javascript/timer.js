var ms = 0, s = 0, m = 0;
var timer;
var startTime = Date.now();
var stopwatchElement = document.querySelector('.stopwatch');

function submit(e) {
    //e.preventDefault();
     // console.log(e);
      const passed = Date.now() - startTime;
      var timePassed = Math.floor(passed / 1000);
      console.log(timePassed);
      $('#submitTime').value(timePassed);
    //  $('#random').submit();
}
function start() {
    startTime = Date.now();
    if(!timer){//kui vajutatakse timer start siis ei saa vajutada teist korda
        timer = setInterval(run, 10)
    }
} 

function run() {
    stopwatchElement.textContent = getTimer();
    ms++;
    if(ms == 100) {
        ms = 0;
        s++;
    }
    if (s == 60) {
        s = 0;
        m++;
    }
}

function pause(){
    stopTimer();
}

function stop(){
    stopTimer();
    ms = 0;
    s = 0;
    m = 0;
    stopwatchElement.textContent = getTimer();
}

function stopTimer(){
    clearInterval(timer);
    timer = false;
}

function restart(){
    stop();
    start();
}

function getTimer(){
    return (m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s) + ":" + (ms < 10 ? "0" + ms : ms); // lisan ? ja 0 sest siis ei hüppa timer vaid on static
}