.disp_time {  

    animation: disp_time 1s ease-in-out infinite alternate;

    font-family: cursive;

    position: fixed;

    left: 47%;

    top: 2%;

}

/*Time*/

@-webkit-keyframes disp_time {

  from {

   transform: scale(1);

    text-shadow: 0 2px 4px #000, 0 8px 32px rgba(0, 0, 0, 0.5);

  }

</style>

<script>

function clock() {

    var now = new Date();

    var TwentyFourHour = now.getHours();

    var hour = now.getHours();

    var min = now.getMinutes();

    var sec = now.getSeconds();

    var mid = ‘pm’;

    if (min < 10) {

        min = “0” + min;

    }

    if (hour > 12) {

        hour = hour – 12;

    }

    if (hour == 0) {

        hour = 12;

    }

    if (TwentyFourHour < 12) {

        mid = ‘am’;

    }

    $(‘.disp_time’).text((’00’ + hour).slice(-2) + ‘:’ + (’00’ + min).slice(-2) + ‘:’ + (’00’ + sec).slice(-2)  + ‘ ‘ + mid);

    setTimeout(clock, 1000);

}