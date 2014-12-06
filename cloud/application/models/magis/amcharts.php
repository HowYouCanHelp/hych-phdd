<?php

class Amcharts extends CI_Model 
{
	public function line_multiple($data, $options = array()) {
		$this->load->helper('magis');
		$width = isset_default($options, 'width', '100%');
		$height = isset_default($options, 'height', '400px');
		$id = isset_default($options, 'id', 'line_multiple');
		$json_data = json_encode($data);
		$path_to_images = base_url(AMCHARTS_IMG_PATH);
		
		//[{date:[date], value1:value1...}]
		
		$graphs = '';
		$this->load->helper('inflector');
		foreach($data[0] as $key => $val) {
			if($key != 'date') {
				$human_key = humanize($key);
				$graphs .= <<<EOT
	var graph = new AmCharts.AmGraph();
	graph.title = "$human_key";
	graph.valueField = "$key";
	//graph.hidden = true;
	graph.balloonText = "Total in [[category]]: [[value]]";
	graph.bullet = "round";
	$id.addGraph(graph);
EOT;
			}
		}
		
		$js = <<<EOT
<script>
var $id;
var date$id = $json_data;
var chartCursor;

function setPanSelect$id()
{
	if (document.getElementById("$id-rb1").checked) {
		chartCursor$id.pan = false;
		chartCursor$id.zoomable = true;
	} else {
		chartCursor$id.pan = true;
	}
	$id.validateNow();
}

AmCharts.ready(function () {

	// SERIAL CHART    
	$id = new AmCharts.AmSerialChart();
	$id.pathToImages = "$path_to_images" + "/";
	$id.zoomOutButton = {
		backgroundColor: '#000000',
		backgroundAlpha: 0.15
	};
	$id.dataProvider = date$id;
	$id.categoryField = "date";
	$id.startDuration = 0.3;

	// AXES
	// category
	var categoryAxis = $id.categoryAxis;
	categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
	categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
	categoryAxis.dashLength = 1;
	categoryAxis.gridAlpha = 0.15;
	categoryAxis.axisColor = "#DADADA";

	// value                
	var valueAxis = new AmCharts.ValueAxis();
	valueAxis.axisAlpha = 0.2;
	valueAxis.dashLength = 1;
	$id.addValueAxis(valueAxis);

	// GRAPH
	$graphs
		
	var legend = new AmCharts.AmLegend();
	legend.markerType = "circle";
	$id.addLegend(legend);

	// SCROLLBAR
	var chartScrollbar = new AmCharts.ChartScrollbar();
	chartScrollbar.graph = graph;
	chartScrollbar.scrollbarHeight = 40;
	chartScrollbar.color = "#FFFFFF";
	chartScrollbar.autoGridCount = true;
	$id.addChartScrollbar(chartScrollbar);

	// WRITE
	$id.write("chartdiv$id");
});
</script>
EOT;
		$this->load->helper('inflector');
		$html = $this->load->view('amcharts/line_multiple', array('id' => $id,
																	'width' => $width,
																	'height' => $height), true);
		return array('js' => $js,
					'html' => $html);
	}
	
	public function line($data, $options = array()) 
	{
		$this->load->helper('magis');
		
		//initialize options
		$width = isset_default($options, 'width', '100%');
		$height = isset_default($options, 'height', '300px');
		$id = isset_default($options, 'id', 'line');
		$json_data = json_encode($data);
		$path_to_images = base_url(AMCHARTS_IMG_PATH);
	
		$js = <<<EOT
<script type="text/javascript">
	var chart$id;
	var chartData$id = $json_data;
	var chartCursor$id;

	AmCharts.ready(function () {
		// SERIAL CHART    
		chart$id = new AmCharts.AmSerialChart();
		chart$id.pathToImages = "$path_to_images/";
		chart$id.dataProvider = chartData$id;
		chart$id.categoryField = "date";
		chart$id.balloon.bulletSize = 5;

		// listen for "dataUpdated" event (fired when chart$id is rendered) and call zoomChart method when it happens
		chart$id.addListener("dataUpdated", zoomChart$id);

		// AXES
		// category
		var categoryAxis = chart$id.categoryAxis;
		categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
		categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
		categoryAxis.dashLength = 1;
		categoryAxis.minorGridEnabled = true;
		categoryAxis.position = "bottom";
		categoryAxis.axisColor = "#DADADA";

		// value                
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.axisAlpha = 0;
		valueAxis.dashLength = 1;
		chart$id.addValueAxis(valueAxis);

		// GRAPH
		var graph = new AmCharts.AmGraph();
		graph.title = "red line";
		graph.valueField = "value";
		graph.bullet = "round";
		graph.bulletBorderColor = "#FFFFFF";
		graph.bulletBorderThickness = 2;
		graph.bulletBorderAlpha = 1;
		graph.lineThickness = 2;
		graph.lineColor = "#5fb503";
		graph.negativeLineColor = "#efcc26";
		graph.hideBulletsCount = 50; // this makes the chart$id to hide bullets when there are more than 50 series in selection
		chart$id.addGraph(graph);

		// CURSOR
		chartCursor$id = new AmCharts.ChartCursor();
		chartCursor$id.cursorPosition = "mouse";
		chartCursor$id.pan = true; // set it to fals if you want the cursor to work in "select" mode
		chart$id.addChartCursor(chartCursor$id);

		// SCROLLBAR
		var chartScrollbar$id = new AmCharts.ChartScrollbar();
		chartScrollbar$id.graph = graph;
		chartScrollbar$id.scrollbarHeight = 30;
		chartScrollbar$id.color = "#FFFFFF";
		chartScrollbar$id.autoGridCount = true;
		chart$id.addChartScrollbar(chartScrollbar$id);

		// WRITE
		chart$id.write("chartdiv$id");
	});

	// this method is called when chart$id is first inited as we listen for "dataUpdated" event
	function zoomChart$id() {
		// different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
		chart$id.zoomToIndexes(chartData$id.length - 40, chartData$id.length - 1);
	}

	// changes cursor mode from pan to select
	function setPanSelect$id() {
		if (document.getElementById("rb1$id").checked) {
			chartCursor$id.pan = false;
			chartCursor$id.zoomable = true;
		} else {
			chartCursor$id.pan = true;
		}
		chart$id.validateNow();
	}
				
</script>
EOT;
		$this->load->helper('inflector');
		$html = $this->load->view('amcharts/line_graph_border', array('id' => $id,
																	'width' => $width,
																	'height' => $height), true);
		return array('js' => $js,
					'html' => $html);
	}
	
	public function bar($data) {
		return array('js' => 'js',
					'html' => 'html');
	}
	
	public function pie($data) {
		return array('js' => 'js',
					'html' => 'html');
	}
}
?>