//object.onload="myFunction";
function myFunction()
{
    setInterval(function(){myTimer()},1000);
}

function myTimer()
{
    var d=new Date();
    var t=d.toLocaleTimeString();
    document.getElementById("timer").innerHTML=t;
}
var Timer;
var TotalSeconds;
var Seconds ;
var PSeconds = "00" ;
Forward = "http://localhost/nextStudy";
function CreateTimer(TimerID, Time, ForwardTo ) {
        Forward = ForwardTo;

        Timer = document.getElementById(TimerID);
        TotalSeconds = Time;
        Seconds = Time;

        UpdateTimer()
        window.setTimeout("Tick()", 1000);
}

function Tick() {
        TotalSeconds -= 1;
        Seconds -= 1;
        PSeconds = Seconds;

        if ( Seconds == 60 )
            PSeconds = '00';

        if ( Seconds < 10 )
            PSeconds = '0' + Seconds;

        if( TotalSeconds % 60 == 0)
            Seconds = 60;

        if ( TotalSeconds >= 0 ){
            UpdateTimer()
            window.setTimeout("Tick()", 1000);
        }
        else {
            move();
            //return 'done';
        }

}

function UpdateTimer() {
        Minutes = Math.floor( TotalSeconds / 60 );
        document.getElementById("timer").innerHTML = Minutes + ':' + Seconds;
}
function move() {
    window.location = Forward
}