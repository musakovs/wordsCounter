<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<div style="margin-top:16px;color:dimgrey;font-size:9px;font-family: Verdana, Arial, Helvetica, sans-serif;text-decoration:none;">Source: <a href="https://canvasjs.com/jquery-charts/bar-chart/" target="_blank" title="jQuery Bar Charts &amp; Graphs ">https://canvasjs.com/jquery-charts/bar-chart/</a></div>


<script>
    window.onload = function () {
        const top = <?php include 'top.php'; ?>;
        const options = {
            animationEnabled: true,
            title: {
                text: "Top Used Words",
                fontColor: "Peru"
            },
            axisY: {
                tickThickness: 0,
                lineThickness: 0,
                valueFormatString: " ",
                includeZero: true,
                gridThickness: 0
            },
            axisX: {
                tickThickness: 0,
                lineThickness: 0,
                labelFontSize: 18,
                labelFontColor: "Peru"
            },
            data: [{
                indexLabelFontSize: 26,
                toolTipContent: "<span style=\"color:#62C9C3\">{indexLabel}:</span> <span style=\"color:#CD853F\"><strong>{y}</strong></span>",
                indexLabelPlacement: "inside",
                indexLabelFontColor: "white",
                indexLabelFontWeight: 600,
                indexLabelFontFamily: "Verdana",
                color: "#62C9C3",
                type: "bar",
                dataPoints: top
            }]
        };

        $("#chartContainer").CanvasJSChart(options);
    }
</script>
