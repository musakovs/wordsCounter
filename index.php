<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<div style="margin-top:16px;color:dimgrey;font-size:9px;font-family: Verdana, Arial, Helvetica, sans-serif;text-decoration:none;">Source: <a href="https://canvasjs.com/jquery-charts/animated-chart/" target="_blank" title="jQuery Charts &amp; Graphs with Animation ">https://canvasjs.com/jquery-charts/animated-chart/</a></div>


<script>

    window.onload = function () {

        var options = {
            title: {
                text: "Top Used Words"
            },
            animationEnabled: false,
            data: [{
                type: "pie",
                startAngle: 40,
                toolTipContent: "<b>{label}</b>: {y}%",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - {y}%",
                dataPoints: <?php include 'top.php' ?>                 
            }]
        };
        $("#chartContainer").CanvasJSChart(options);

    }
</script>
