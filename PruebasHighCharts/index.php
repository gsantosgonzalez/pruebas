<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Prueba con HighCharts</title>
	<style>
		.chart-wrapper {
		 	position: relative;
		    padding-bottom: 40%;
		    width:45%;
		    float:left;
		}

		.chart-inner {
			position: absolute;
		    width: 50%; height: 100%;
		}
	</style>
</head>
<body>
	<div class="chart-wrapper">
		<div class="chart-inner">
        	<div id="container1" style="width:100%; height: 100%;">

        	</div>
        </div>
    </div>
	<div class="chart-wrapper">
		<div class="chart-inner">
			<div id="container2" style="width:100%; height: 100%;">
				
			</div>
		</div>
	</div>
	<div class="chart-wrapper">
		<div class="chart-inner">
			<div id="container3" style="width:100%; height: 100%;">
				
			</div>
		</div>
	</div>
	<script src = "jquery-3.1.0.js"></script>
	<script src = "function.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/modules/exporting.js"></script>
</body>
</html>