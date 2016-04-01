$(document).ready(function(){

    //Crafted timepicker
    for (i = 0; i < 24; i++) {
        if (i < 10) {
            i = '0' + i;
        }
        $("#start,#finish").append('<option>' + i + ':00' + '</option>');
    }

    // MATCLOCK

    var canvas = document.getElementById('matCanvas');
    var ctx = canvas.getContext("2d");
    var radius = 250;

    ctx.translate(400, 350);
    radius = radius * 0.90;
    //drawClock();
    setInterval(drawClock, 1000);

    function drawClock() {
        drawFace(ctx, radius);
        drawNumbers(ctx, radius);
        drawTime(ctx, radius);
    }

    getParts(ctx, radius);

    function drawFace(ctx, radius) {
        var grad;
        ctx.beginPath();
        ctx.arc(0, 0, radius, 0, 2*Math.PI);
        ctx.fillStyle = 'white';
        ctx.fill();

        ctx.lineWidth = radius * 0.1;
        ctx.stroke();
        ctx.beginPath();

        ctx.fillStyle = '#9290D4';
        ctx.fill();
    }

    function drawNumbers(ctx, radius) {
        var ang;
        var num;

        ctx.font = radius*0.15 + "px arial";
        ctx.textBaseline = "middle";
        ctx.textAlign = "center";

        for (num = 1; num < 13; num++) {
            ang = num * Math.PI / 6;
            ctx.rotate(ang);
            ctx.translate(0, -radius*0.85);
            ctx.rotate(-ang);
            ctx.fillText(num.toString(), 0, 0);
            ctx.rotate(ang);
            ctx.translate(0, radius*0.85);
            ctx.rotate(-ang);
        }
    }

    function drawTime(ctx, radius) {
        var now = new Date();
        var hour = now.getHours();
        var minute = now.getMinutes();
        var second = now.getSeconds();

        hour = hour % 12;
        hour = (hour*Math.PI/6) + (minute*Math.PI/(6*60)) + (second*Math.PI/(360*60));
        drawHand(ctx, hour, radius*0.5, radius*0.07);

        minute = (minute*Math.PI/30) + (second*Math.PI/(30*60));
        drawHand(ctx, minute, radius*0.8, radius*0.07);

        second = (second*Math.PI/30);
        drawHand(ctx, second, radius*0.9, radius*0.02);
    }

    function drawHand(ctx, pos, length, width) {
        ctx.beginPath();
        ctx.lineWidth = width;
        ctx.lineCap = "round";
        ctx.moveTo(0, 0);
        ctx.rotate(pos);
        ctx.lineTo(0, -length);
        ctx.stroke();
        ctx.rotate(-pos);
    }

    function drawParts(ctx, radius, start, finish, label) {

        var pmRad = 1.2;

        var startTime = start.split(':');
        sTime =  parseInt(startTime[0]) % 12;

        if (parseInt(startTime[0]) > 12) {
            pmRad = 1.4;
        }

        var ang = sTime * Math.PI / 6;

        var finishTime = finish.split(':');
        fTime = parseInt(finishTime[0]) % 12;

        var fng = fTime * Math.PI / 6;

        var diff = parseInt(finishTime[0]) - parseInt(startTime[0]);
        var dfg = diff * Math.PI / 6;

        //START DELIMITER
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.rotate(ang);
        ctx.moveTo(0, -radius);
        ctx.lineTo(0, -radius * pmRad);
        ctx.stroke();
        ctx.rotate(-ang);
        ctx.closePath();

        //FINISH DELIMITER
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.rotate(fng);
        ctx.moveTo(0, -radius);
        ctx.lineTo(0, -radius * pmRad);
        ctx.stroke();
        ctx.rotate(-fng);
        ctx.closePath();

        //ARC BETWEEN
        ctx.beginPath();
        ctx.rotate(ang);
        ctx.arc(0, 0, radius * pmRad, -Math.PI / 2, -Math.PI / 2 + dfg);
        ctx.stroke();
        ctx.rotate(-ang);
        ctx.closePath();
    }

    function getParts(ctx, radius) {
        var parts;

        $.get('/parts', function(data){
            parts = data;

            $.each(parts, function(key, value){
                //console.log(key + '===>' + value.start);
                drawParts(ctx, radius, value.start, value.finish, value.name);

            });

        });

    }
});
