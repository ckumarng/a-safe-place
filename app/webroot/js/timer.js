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
var Seconds;
var PSeconds = "00" ;
<<<<<<< HEAD
var Minutes;
Forward = "http://localhost/nextStudy";
=======
Forward = "/nextStudy";
>>>>>>> simple
function CreateTimer(TimerID, Time, ForwardTo ) {
        Forward = ForwardTo;

        Timer = document.getElementById(TimerID);
        TotalSeconds = Time;

        Minutes = Math.floor( TotalSeconds / 60 );


            Seconds = TotalSeconds - (Minutes * 60);

        if ( Seconds < 10 )
                    Seconds = '0' + Seconds;

        UpdateTimer()
        window.setTimeout("Tick()", 1000);
}
function Tick() {
        TotalSeconds -= 1;
        Seconds -= 1;
        PSeconds = Seconds;

        if ( Seconds < 0)
            PSeconds = 0 ;

        if ( Seconds < 0 )
            Seconds = 59;

        if ( Seconds < 10 )
            Seconds = '0' + Seconds;

        if( TotalSeconds % 60 == 0)
            Seconds = '00';

        if ( TotalSeconds >= 0 ){
            UpdateTimer()
            window.setTimeout("Tick()", 1000);
        }
        else {
            move();
        }
}
function UpdateTimer() {
        Minutes = Math.floor( TotalSeconds / 60 );
        document.getElementById("timer").innerHTML = Minutes + ':' + Seconds;
}
function move() {
    window.location = Forward
}