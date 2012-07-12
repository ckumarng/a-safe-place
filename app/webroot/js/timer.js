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
var Minutes;
Forward = "http://localhost/nextStudy";
function CreateTimer(TimerID, Time, ForwardTo ) {
        Forward = ForwardTo;

        Timer = document.getElementById(TimerID);
        TotalSeconds = Time;

        Minutes = Math.floor( TotalSeconds / 60 );

        if ( TotalSeconds < 60 )
            if ( TotalSeconds < 10 )
            Seconds = '0' + TotalSeconds;
            else
                Seconds = TotalSeconds;
        else
            Seconds = 60 - (TotalSeconds % 60);

        UpdateTimer()
        window.setTimeout("Tick()", 1000);
}
function Tick() {
        if ( TotalSeconds < 60 )
           Minutes = 0;
       else
        Minutes = Math.floor( TotalSeconds / 60 );

        TotalSeconds -= 1;
        Seconds -= 1;
        PSeconds = Seconds;

        if ( Seconds < 0)
            Seconds = 0 ;

        if ( Seconds == 60 )
            Seconds = '00';

        if ( Seconds < 10 )
            Seconds = '0' + Seconds;

        if( TotalSeconds % 60 == 0){
            Seconds = 60;
        }
        if ( TotalSeconds <= 0 )
            Seconds = '00';

        if ( TotalSeconds > 0 ){
            UpdateTimer()
            window.setTimeout("Tick()", 1000);
        }
        else {
            move();
        }
}
function UpdateTimer() {
        document.getElementById("timer").innerHTML = Minutes + ':' + Seconds;
}
function move() {
    window.location = Forward
}