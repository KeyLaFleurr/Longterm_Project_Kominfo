
<!doctype html>
<html lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<title>Highcharts Integration</title>
		
		<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
		
		<link rel="stylesheet" href="/media/css/site.css?_=0771ef576c9d13b959c1b9f1347f44991">
		<!--[if lte IE 9]>
		<link rel="stylesheet" type="text/css" href="/media/css/ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.css"><link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.css">
		<style>
			
		</style>

		<script src="/media/js/site.js?_=2ebf5030ecffebb7a95961b9ac27790c" data-domain="datatables.net" data-api="https://plausible.sprymedia.co.uk/api/event"></script>
		<script src="https://media.ethicalads.io/media/client/ethicalads.min.js"></script>
		<script src="/media/js/dynamic.php?comments-page=blog%2F2020-10-01" async></script>
		<script src="//code.highcharts.com/highcharts.js"></script><script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.js"></script><script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.js"></script>
		<script>
			
    
$(document).ready(function () {
	var overviewDt = $("#overview").DataTable();
	$('<div id="containerOverview"/>').insertBefore($("#overview_wrapper"));
	var overviewChart = Highcharts.chart("containerOverview", {
		chart: {
			type: "pie",
		},
		title: {
			text: "Staff Count Per Office",
		},
		series: [
			{
				data: chartData(overviewDt),
			},
		],
	});

	overviewDt.on("draw", function () {
		overviewChart.series[0].setData(chartData(overviewDt));
	});


	var basic2 = $("#basic2").DataTable();
	$('<div id="containerbasic2"/>').insertBefore($("#basic2_wrapper"));
	var myChartbasic2 = Highcharts.chart("containerbasic2", {
		chart: {
			type: "pie",
		},
		title: {
			text: "Staff Count Per Office",
		},
		series: [
			{
				data: chartData(basic2),
			},
		],
	});


	var basicFiltering = $("#basicFiltering").DataTable();
	$('<div id="containerbasicfiltering4"/>').insertBefore($("#basicFiltering_wrapper"));
	var myChartbasicfiltering4 = Highcharts.chart("containerbasicfiltering4", {
		chart: {
			type: "pie",
		},
		title: {
			text: "Staff Count Per Office",
		},
		series: [
			{
				data: chartData(basicFiltering),
			},
		],
	});

	basicFiltering.on("draw", function () {
		myChartbasicfiltering4.series[0].setData(chartData(basicFiltering));
	});


	var basicFilteringSP = $("#basicFilteringSP").DataTable({
		dom: "Pfrtip",
		searchPanes: {
			layout: "columns-2",
		},
		columnDefs: [
			{
				searchPanes: {
					show: false,
				},
				targets: [3],
			},
		],
	});
	$('<div id="containerbasicfiltering5"/>').insertBefore($("#basicFilteringSP_wrapper"));
	var myChartbasicfiltering5 = Highcharts.chart("containerbasicfiltering5", {
		chart: {
			type: "pie",
		},
		title: {
			text: "Staff Count Per Position",
		},
		series: [
			{
				data: chartData(basicFilteringSP, 1),
			},
		],
	});

	basicFilteringSP.on("draw", function () {
		myChartbasicfiltering5.series[0].setData(chartData(basicFilteringSP, 1));
	});


	var advanced = $("#advanced").DataTable();
	$('<div id="containeradvanced"/>').insertBefore($("#advanced_wrapper"));
	var axis = {
		id: "salary",
		min: 0,
		title: {
			text: "Average Salary",
		},
	};

	var salary = getSalaries(advanced);

	var seriesadvanced = {
		name: "Overall",
		data: Object.values(salary),
	};

	var myChart = Highcharts.chart("containeradvanced", {
		chart: {
			type: "column",
		},
		title: {
			text: "Average Salary",
		},
		xAxis: {
			categories: Object.keys(salary),
		},
		yAxis: axis,
		series: [seriesadvanced],
	});

	advanced.on("draw", function () {
		salary = getSalaries(advanced);
		myChart.axes[0].categories = Object.keys(salary);
		myChart.series[0].setData(Object.values(salary));
	});
});

function chartData(table, column = 2) {
	var counts = {};

	// Count the number of entries for each position
	table
		.column(column, { search: "applied" })
		.data()
		.each(function (val) {
			if (counts[val]) {
				counts[val] += 1;
			} else {
				counts[val] = 1;
			}
		});

	// And map it to the format hightables uses
	return $.map(counts, function (val, key) {
		return {
			name: key,
			y: val,
		};
	});
}

function getSalaries(table) {
	var salaryCounts = {};
	var salary = {};

	var indexes = table.rows({ search: "applied" }).indexes().toArray();

	for (var i = 0; i < indexes.length; i++) {
		var office = table.cell(indexes[i], 2).data();
		if (salaryCounts[office] === undefined) {
			salaryCounts[office] = [
				+table
					.cell(indexes[i], 3)
					.data()
					.replace(/[^0-9.]/g, ""),
			];
		} else {
			salaryCounts[office].push(
				+table
					.cell(indexes[i], 3)
					.data()
					.replace(/[^0-9.]/g, "")
			);
		}
	}

	var keys = Object.keys(salaryCounts);

	for (var i = 0; i < keys.length; i++) {
		var length = salaryCounts[keys[i]].length;
		var total = salaryCounts[keys[i]].reduce((a, b) => a + b, 0);
		salary[keys[i]] = total / length;
	}

	return salary;
}

    
    
		</script>
	</head>
	<body class="comments">
		<a name="top"></a>

		<div class="fw-background">
			<div>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>

		<div class="fw-container">
			<div class="fw-header">
				<div class="nav-wrapper">
					<div class="nav-master">
						<div class="nav-item">
							<a href="https://cloudtables.com">
								CloudTables
								<div class="nav-explain">
									Low code DataTables and Editor. Configured in your browser in moments.
								</div>
							</a>
						</div>
						<div class="nav-item active">
							<a href="/">
								DataTables
								<div class="nav-explain">
									Advanced interaction<br>features for your tables.
								</div>
							</a>
						</div>
						<div class="nav-item">
							<a href="https://editor.datatables.net">
								Editor
								<div class="nav-explain">
									Comprehensive editing<br>library for DataTables.
								</div>
							</a>
						</div>
					</div>

					<div class="nav-search">
						<div class="nav-item i-manual">
							<a href="/manual">Manual</a>
						</div>
						<div class="nav-item i-download">
							<a href="/download">Download</a>
						</div>
						<div class="nav-item i-user">
							<div class="account"></div>
						</div>
						<div class="nav-item search">
							<form action="/q/" method="GET">
								<input type="text" name="q" placeholder="Search . . ." autocomplete="off">
							</form>
						</div>
					</div>
				</div>
				<div class="nav-ad">
					<div data-ea-publisher="datatablesnet" data-ea-type="image" data-ea-manual="true"></div>
				</div>
			</div>

			<div class="fw-hero">
				
			</div>

			<div class="fw-nav">
				<div class="nav-main">
					<ul><li class=" sub"><a href="/examples/index">Examples</a></li><li class=" sub"><a href="/manual/index">Manual</a></li><li class=" sub"><a href="/reference/index">Reference</a></li><li class=" sub"><a href="/extensions/index">Extensions</a></li><li class=" sub"><a href="/plug-ins/index">Plug-ins</a></li><li class="active"><a href="/blog/index">Blog</a></li><li class=""><a href="/forums/index">Forums</a></li><li class=""><a href="/support/index">Support</a></li><li class=""><a href="/faqs/index">FAQs</a></li><li class=""><a href="/download/index">Download</a></li><li class=""><a href="/purchase/index">Purchase</a></li></ul>
				</div>

				<div class="mobile-show">
					<a>&#8801; <i>Show site navigation</i></a>
				</div>
			</div>

			<div class="fw-body">
				<div class="content">
					<div class="date">Thursday 1st October, 2020</div>
					<div class="author"> By <i>Sandy Galloway</i></div>
					<h1 class="page_title" title="Highcharts Integration">Highcharts Integration</h1>

					
					<p>Recently, we've had some feedback asking about displaying information from a DataTable in a graphical format. This is quite possible to do using our <a href="/manual/api">API</a> and a charting library. There are many available, but in this blog post we will use the ever popular <a href="https://www.highcharts.com/">Highcharts</a> showing how it might be integrated into your DataTables projects.</p>

<p>Here is an example of the type of integration we will create there. Note that as we the filter the table, the chart is redrawn to reflect the filtered data:</p>

<p><table id="overview" class="display" style="width:100%"><thead><tr><th>Name</th><th>Position</th><th>Office</th><th>Salary</th></tr></thead><tbody><tr><td>Tiger Nixon</td><td>System Architect</td><td>Edinburgh</td><td>$320,800</td></tr><tr><td>Garrett Winters</td><td>Accountant</td><td>Tokyo</td><td>$170,750</td></tr><tr><td>Ashton Cox</td><td>Junior Technical Author</td><td>San Francisco</td><td>$86,000</td></tr><tr><td>Cedric Kelly</td><td>Senior Javascript Developer</td><td>Edinburgh</td><td>$433,060</td></tr><tr><td>Airi Satou</td><td>Accountant</td><td>Tokyo</td><td>$162,700</td></tr><tr><td>Brielle Williamson</td><td>Integration Specialist</td><td>New York</td><td>$372,000</td></tr><tr><td>Herrod Chandler</td><td>Sales Assistant</td><td>San Francisco</td><td>$137,500</td></tr><tr><td>Rhona Davidson</td><td>Integration Specialist</td><td>Tokyo</td><td>$327,900</td></tr><tr><td>Colleen Hurst</td><td>Javascript Developer</td><td>San Francisco</td><td>$205,500</td></tr><tr><td>Sonya Frost</td><td>Software Engineer</td><td>Edinburgh</td><td>$103,600</td></tr><tr><td>Jena Gaines</td><td>Office Manager</td><td>London</td><td>$90,560</td></tr><tr><td>Quinn Flynn</td><td>Support Lead</td><td>Edinburgh</td><td>$342,000</td></tr><tr><td>Charde Marshall</td><td>Regional Director</td><td>San Francisco</td><td>$470,600</td></tr><tr><td>Haley Kennedy</td><td>Senior Marketing Designer</td><td>London</td><td>$313,500</td></tr><tr><td>Tatyana Fitzpatrick</td><td>Regional Director</td><td>London</td><td>$385,750</td></tr><tr><td>Michael Silva</td><td>Marketing Designer</td><td>London</td><td>$198,500</td></tr><tr><td>Paul Byrd</td><td>Chief Financial Officer (CFO)</td><td>New York</td><td>$725,000</td></tr><tr><td>Gloria Little</td><td>Systems Administrator</td><td>New York</td><td>$237,500</td></tr><tr><td>Bradley Greer</td><td>Software Engineer</td><td>London</td><td>$132,000</td></tr><tr><td>Dai Rios</td><td>Personnel Lead</td><td>Edinburgh</td><td>$217,500</td></tr><tr><td>Jenette Caldwell</td><td>Development Lead</td><td>New York</td><td>$345,000</td></tr><tr><td>Yuri Berry</td><td>Chief Marketing Officer (CMO)</td><td>New York</td><td>$675,000</td></tr><tr><td>Caesar Vance</td><td>Pre-Sales Support</td><td>New York</td><td>$106,450</td></tr><tr><td>Doris Wilder</td><td>Sales Assistant</td><td>Sydney</td><td>$85,600</td></tr><tr><td>Angelica Ramos</td><td>Chief Executive Officer (CEO)</td><td>London</td><td>$1,200,000</td></tr><tr><td>Gavin Joyce</td><td>Developer</td><td>Edinburgh</td><td>$92,575</td></tr><tr><td>Jennifer Chang</td><td>Regional Director</td><td>Singapore</td><td>$357,650</td></tr><tr><td>Brenden Wagner</td><td>Software Engineer</td><td>San Francisco</td><td>$206,850</td></tr><tr><td>Fiona Green</td><td>Chief Operating Officer (COO)</td><td>San Francisco</td><td>$850,000</td></tr><tr><td>Shou Itou</td><td>Regional Marketing</td><td>Tokyo</td><td>$163,000</td></tr><tr><td>Michelle House</td><td>Integration Specialist</td><td>Sydney</td><td>$95,400</td></tr><tr><td>Suki Burks</td><td>Developer</td><td>London</td><td>$114,500</td></tr><tr><td>Prescott Bartlett</td><td>Technical Author</td><td>London</td><td>$145,000</td></tr><tr><td>Gavin Cortez</td><td>Team Leader</td><td>San Francisco</td><td>$235,500</td></tr><tr><td>Martena Mccray</td><td>Post-Sales support</td><td>Edinburgh</td><td>$324,050</td></tr><tr><td>Unity Butler</td><td>Marketing Designer</td><td>San Francisco</td><td>$85,675</td></tr><tr><td>Howard Hatfield</td><td>Office Manager</td><td>San Francisco</td><td>$164,500</td></tr><tr><td>Hope Fuentes</td><td>Secretary</td><td>San Francisco</td><td>$109,850</td></tr><tr><td>Vivian Harrell</td><td>Financial Controller</td><td>San Francisco</td><td>$452,500</td></tr><tr><td>Timothy Mooney</td><td>Office Manager</td><td>London</td><td>$136,200</td></tr><tr><td>Jackson Bradshaw</td><td>Director</td><td>New York</td><td>$645,750</td></tr><tr><td>Olivia Liang</td><td>Support Engineer</td><td>Singapore</td><td>$234,500</td></tr><tr><td>Bruno Nash</td><td>Software Engineer</td><td>London</td><td>$163,500</td></tr><tr><td>Sakura Yamamoto</td><td>Support Engineer</td><td>Tokyo</td><td>$139,575</td></tr><tr><td>Thor Walton</td><td>Developer</td><td>New York</td><td>$98,540</td></tr><tr><td>Finn Camacho</td><td>Support Engineer</td><td>San Francisco</td><td>$87,500</td></tr><tr><td>Serge Baldwin</td><td>Data Coordinator</td><td>Singapore</td><td>$138,575</td></tr><tr><td>Zenaida Frank</td><td>Software Engineer</td><td>New York</td><td>$125,250</td></tr><tr><td>Zorita Serrano</td><td>Software Engineer</td><td>San Francisco</td><td>$115,000</td></tr><tr><td>Jennifer Acosta</td><td>Junior Javascript Developer</td><td>Edinburgh</td><td>$75,650</td></tr><tr><td>Cara Stevens</td><td>Sales Assistant</td><td>New York</td><td>$145,600</td></tr><tr><td>Hermione Butler</td><td>Regional Director</td><td>London</td><td>$356,250</td></tr><tr><td>Lael Greer</td><td>Systems Administrator</td><td>London</td><td>$103,500</td></tr><tr><td>Jonas Alexander</td><td>Developer</td><td>San Francisco</td><td>$86,500</td></tr><tr><td>Shad Decker</td><td>Regional Director</td><td>Edinburgh</td><td>$183,000</td></tr><tr><td>Michael Bruce</td><td>Javascript Developer</td><td>Singapore</td><td>$183,000</td></tr><tr><td>Donna Snider</td><td>Customer Support</td><td>New York</td><td>$112,000</td></tr></tbody></table></p>

<p>In this post I'm going to walkthrough the process of linking up DataTables with Highcharts. I'll cover:</p>

<ul class="markdown">
<li>Static charting</li>
<li>Asynchronous charting</li>
<li>Charting with data processing</li>
</ul>

<h2 data-anchor="Static-Charting"><a name="Static-Charting" href="#Static-Charting"></a>Static Charting</h2>

<p>Highcharts offers a wide range of different graphs and charts that are supported. I'm going to use pie charts and column graphs in this post.</p>

<p>A very basic pie chart initialisation is shown below:</p>

<pre><code class="multiline language-js">var myChart = Highcharts.chart('container', {
    chart: {
        type: 'pie',
    },
    title: {
        text: 'Staff Count Per Office',
    },
    series: [
        {
            data: countMap,
        },
    ],
});
</code></pre>

<p>The config is fairly self explanatory. We are setting the <code>chart.type</code> to be <code class="string" title="String">pie</code>, for a pie chart and the <code>title.text</code> to <code class="string" title="String">Staff Count Per Office</code>. The <code>series</code> array is being set to contain one object that contains the data required for the series.</p>

<p>Now all that is left to do is to collect the data from the DataTable. To do this we simply iterate through the values of the desired column, retrieved by the <a href="//datatables.net/reference/api/column().data()"><code class="api" title="DataTables API method">column().data()</code></a> method, incrementing the values as we go. The resulting binned data is then converted to a array of objects for Highcharts to use.</p>

<pre><code class="multiline language-js">var table = $('#example').DataTable();
var counts = {};

// Count the number of entries for each office
table
    .column(2, { search: 'applied' })
    .data()
    .each(function (val) {
        if (counts[val]) {
            counts[val] += 1;
        } else {
            counts[val] = 1;
        }
    });

// And map it to the format highcharts uses
var countMap = $.map(counts, function (val, key) {
    return {
        name: key,
        y: val,
    };
});
</code></pre>

<p>An example of the table and chart generated by this code is shown below. There is also <a href="http://live.datatables.net/jodijehu/1/edit">a live version available</a> so that you can modify and experiment with it.</p>

<p><table id="basic2" class="display" style="width:100%"><thead><tr><th>Name</th><th>Position</th><th>Office</th><th>Salary</th></tr></thead><tbody><tr><td>Tiger Nixon</td><td>System Architect</td><td>Edinburgh</td><td>$320,800</td></tr><tr><td>Garrett Winters</td><td>Accountant</td><td>Tokyo</td><td>$170,750</td></tr><tr><td>Ashton Cox</td><td>Junior Technical Author</td><td>San Francisco</td><td>$86,000</td></tr><tr><td>Cedric Kelly</td><td>Senior Javascript Developer</td><td>Edinburgh</td><td>$433,060</td></tr><tr><td>Airi Satou</td><td>Accountant</td><td>Tokyo</td><td>$162,700</td></tr><tr><td>Brielle Williamson</td><td>Integration Specialist</td><td>New York</td><td>$372,000</td></tr><tr><td>Herrod Chandler</td><td>Sales Assistant</td><td>San Francisco</td><td>$137,500</td></tr><tr><td>Rhona Davidson</td><td>Integration Specialist</td><td>Tokyo</td><td>$327,900</td></tr><tr><td>Colleen Hurst</td><td>Javascript Developer</td><td>San Francisco</td><td>$205,500</td></tr><tr><td>Sonya Frost</td><td>Software Engineer</td><td>Edinburgh</td><td>$103,600</td></tr><tr><td>Jena Gaines</td><td>Office Manager</td><td>London</td><td>$90,560</td></tr><tr><td>Quinn Flynn</td><td>Support Lead</td><td>Edinburgh</td><td>$342,000</td></tr><tr><td>Charde Marshall</td><td>Regional Director</td><td>San Francisco</td><td>$470,600</td></tr><tr><td>Haley Kennedy</td><td>Senior Marketing Designer</td><td>London</td><td>$313,500</td></tr><tr><td>Tatyana Fitzpatrick</td><td>Regional Director</td><td>London</td><td>$385,750</td></tr><tr><td>Michael Silva</td><td>Marketing Designer</td><td>London</td><td>$198,500</td></tr><tr><td>Paul Byrd</td><td>Chief Financial Officer (CFO)</td><td>New York</td><td>$725,000</td></tr><tr><td>Gloria Little</td><td>Systems Administrator</td><td>New York</td><td>$237,500</td></tr><tr><td>Bradley Greer</td><td>Software Engineer</td><td>London</td><td>$132,000</td></tr><tr><td>Dai Rios</td><td>Personnel Lead</td><td>Edinburgh</td><td>$217,500</td></tr><tr><td>Jenette Caldwell</td><td>Development Lead</td><td>New York</td><td>$345,000</td></tr><tr><td>Yuri Berry</td><td>Chief Marketing Officer (CMO)</td><td>New York</td><td>$675,000</td></tr><tr><td>Caesar Vance</td><td>Pre-Sales Support</td><td>New York</td><td>$106,450</td></tr><tr><td>Doris Wilder</td><td>Sales Assistant</td><td>Sydney</td><td>$85,600</td></tr><tr><td>Angelica Ramos</td><td>Chief Executive Officer (CEO)</td><td>London</td><td>$1,200,000</td></tr><tr><td>Gavin Joyce</td><td>Developer</td><td>Edinburgh</td><td>$92,575</td></tr><tr><td>Jennifer Chang</td><td>Regional Director</td><td>Singapore</td><td>$357,650</td></tr><tr><td>Brenden Wagner</td><td>Software Engineer</td><td>San Francisco</td><td>$206,850</td></tr><tr><td>Fiona Green</td><td>Chief Operating Officer (COO)</td><td>San Francisco</td><td>$850,000</td></tr><tr><td>Shou Itou</td><td>Regional Marketing</td><td>Tokyo</td><td>$163,000</td></tr><tr><td>Michelle House</td><td>Integration Specialist</td><td>Sydney</td><td>$95,400</td></tr><tr><td>Suki Burks</td><td>Developer</td><td>London</td><td>$114,500</td></tr><tr><td>Prescott Bartlett</td><td>Technical Author</td><td>London</td><td>$145,000</td></tr><tr><td>Gavin Cortez</td><td>Team Leader</td><td>San Francisco</td><td>$235,500</td></tr><tr><td>Martena Mccray</td><td>Post-Sales support</td><td>Edinburgh</td><td>$324,050</td></tr><tr><td>Unity Butler</td><td>Marketing Designer</td><td>San Francisco</td><td>$85,675</td></tr><tr><td>Howard Hatfield</td><td>Office Manager</td><td>San Francisco</td><td>$164,500</td></tr><tr><td>Hope Fuentes</td><td>Secretary</td><td>San Francisco</td><td>$109,850</td></tr><tr><td>Vivian Harrell</td><td>Financial Controller</td><td>San Francisco</td><td>$452,500</td></tr><tr><td>Timothy Mooney</td><td>Office Manager</td><td>London</td><td>$136,200</td></tr><tr><td>Jackson Bradshaw</td><td>Director</td><td>New York</td><td>$645,750</td></tr><tr><td>Olivia Liang</td><td>Support Engineer</td><td>Singapore</td><td>$234,500</td></tr><tr><td>Bruno Nash</td><td>Software Engineer</td><td>London</td><td>$163,500</td></tr><tr><td>Sakura Yamamoto</td><td>Support Engineer</td><td>Tokyo</td><td>$139,575</td></tr><tr><td>Thor Walton</td><td>Developer</td><td>New York</td><td>$98,540</td></tr><tr><td>Finn Camacho</td><td>Support Engineer</td><td>San Francisco</td><td>$87,500</td></tr><tr><td>Serge Baldwin</td><td>Data Coordinator</td><td>Singapore</td><td>$138,575</td></tr><tr><td>Zenaida Frank</td><td>Software Engineer</td><td>New York</td><td>$125,250</td></tr><tr><td>Zorita Serrano</td><td>Software Engineer</td><td>San Francisco</td><td>$115,000</td></tr><tr><td>Jennifer Acosta</td><td>Junior Javascript Developer</td><td>Edinburgh</td><td>$75,650</td></tr><tr><td>Cara Stevens</td><td>Sales Assistant</td><td>New York</td><td>$145,600</td></tr><tr><td>Hermione Butler</td><td>Regional Director</td><td>London</td><td>$356,250</td></tr><tr><td>Lael Greer</td><td>Systems Administrator</td><td>London</td><td>$103,500</td></tr><tr><td>Jonas Alexander</td><td>Developer</td><td>San Francisco</td><td>$86,500</td></tr><tr><td>Shad Decker</td><td>Regional Director</td><td>Edinburgh</td><td>$183,000</td></tr><tr><td>Michael Bruce</td><td>Javascript Developer</td><td>Singapore</td><td>$183,000</td></tr><tr><td>Donna Snider</td><td>Customer Support</td><td>New York</td><td>$112,000</td></tr></tbody></table></p>

<p>Now that is pretty cool, but wouldn't it be better if the graph could reflect any filtering that is applied to it? Keep reading...</p>

<h2 data-anchor="Asynchronous-Charting"><a name="Asynchronous-Charting" href="#Asynchronous-Charting"></a>Asynchronous Charting</h2>

<p>To achieve this we are going to have to make a couple of changes to the code above. We are going to take the office counting out of the <code>$(document).ready(...)</code> listener and put it in its own function, replacing it with a call to our new function. The function should look something like this:</p>

<pre><code class="multiline language-js">function chartData(table) {
    var counts = {};

    // Count the number of entries for each office
    table
        .column(2, { search: 'applied' })
        .data()
        .each(function (val) {
            if (counts[val]) {
                counts[val] += 1;
            } else {
                counts[val] = 1;
            }
        });

    // And map it to the format highcharts uses
    return $.map(counts, function (val, key) {
        return {
            name: key,
            y: val,
        };
    });
}
</code></pre>

<p>Using this approach means that positions fall off of the chart as filtering takes place, leading to a neater charting experience.</p>

<p>Now all that is left is to add a listener for when the filtering occurs to tell the chart to update with new data - for this we use <a href="//datatables.net/reference/event/draw"><code class="event" title="DataTables event">draw</code></a>.</p>

<pre><code class="multiline language-js">table.on('draw', function () {
    // Set the data for the first series to be the map returned from the chartData function
    myChart.series[0].setData(chartData(table));
});
</code></pre>

<p>An example of this code is given below, and as before <a href="http://live.datatables.net/meherohu/1/edit">a live version showing the full, running code is available</a>.</p>

<p><table id="basicFiltering" class="display" style="width:100%"><thead><tr><th>Name</th><th>Position</th><th>Office</th><th>Salary</th></tr></thead><tbody><tr><td>Tiger Nixon</td><td>System Architect</td><td>Edinburgh</td><td>$320,800</td></tr><tr><td>Garrett Winters</td><td>Accountant</td><td>Tokyo</td><td>$170,750</td></tr><tr><td>Ashton Cox</td><td>Junior Technical Author</td><td>San Francisco</td><td>$86,000</td></tr><tr><td>Cedric Kelly</td><td>Senior Javascript Developer</td><td>Edinburgh</td><td>$433,060</td></tr><tr><td>Airi Satou</td><td>Accountant</td><td>Tokyo</td><td>$162,700</td></tr><tr><td>Brielle Williamson</td><td>Integration Specialist</td><td>New York</td><td>$372,000</td></tr><tr><td>Herrod Chandler</td><td>Sales Assistant</td><td>San Francisco</td><td>$137,500</td></tr><tr><td>Rhona Davidson</td><td>Integration Specialist</td><td>Tokyo</td><td>$327,900</td></tr><tr><td>Colleen Hurst</td><td>Javascript Developer</td><td>San Francisco</td><td>$205,500</td></tr><tr><td>Sonya Frost</td><td>Software Engineer</td><td>Edinburgh</td><td>$103,600</td></tr><tr><td>Jena Gaines</td><td>Office Manager</td><td>London</td><td>$90,560</td></tr><tr><td>Quinn Flynn</td><td>Support Lead</td><td>Edinburgh</td><td>$342,000</td></tr><tr><td>Charde Marshall</td><td>Regional Director</td><td>San Francisco</td><td>$470,600</td></tr><tr><td>Haley Kennedy</td><td>Senior Marketing Designer</td><td>London</td><td>$313,500</td></tr><tr><td>Tatyana Fitzpatrick</td><td>Regional Director</td><td>London</td><td>$385,750</td></tr><tr><td>Michael Silva</td><td>Marketing Designer</td><td>London</td><td>$198,500</td></tr><tr><td>Paul Byrd</td><td>Chief Financial Officer (CFO)</td><td>New York</td><td>$725,000</td></tr><tr><td>Gloria Little</td><td>Systems Administrator</td><td>New York</td><td>$237,500</td></tr><tr><td>Bradley Greer</td><td>Software Engineer</td><td>London</td><td>$132,000</td></tr><tr><td>Dai Rios</td><td>Personnel Lead</td><td>Edinburgh</td><td>$217,500</td></tr><tr><td>Jenette Caldwell</td><td>Development Lead</td><td>New York</td><td>$345,000</td></tr><tr><td>Yuri Berry</td><td>Chief Marketing Officer (CMO)</td><td>New York</td><td>$675,000</td></tr><tr><td>Caesar Vance</td><td>Pre-Sales Support</td><td>New York</td><td>$106,450</td></tr><tr><td>Doris Wilder</td><td>Sales Assistant</td><td>Sydney</td><td>$85,600</td></tr><tr><td>Angelica Ramos</td><td>Chief Executive Officer (CEO)</td><td>London</td><td>$1,200,000</td></tr><tr><td>Gavin Joyce</td><td>Developer</td><td>Edinburgh</td><td>$92,575</td></tr><tr><td>Jennifer Chang</td><td>Regional Director</td><td>Singapore</td><td>$357,650</td></tr><tr><td>Brenden Wagner</td><td>Software Engineer</td><td>San Francisco</td><td>$206,850</td></tr><tr><td>Fiona Green</td><td>Chief Operating Officer (COO)</td><td>San Francisco</td><td>$850,000</td></tr><tr><td>Shou Itou</td><td>Regional Marketing</td><td>Tokyo</td><td>$163,000</td></tr><tr><td>Michelle House</td><td>Integration Specialist</td><td>Sydney</td><td>$95,400</td></tr><tr><td>Suki Burks</td><td>Developer</td><td>London</td><td>$114,500</td></tr><tr><td>Prescott Bartlett</td><td>Technical Author</td><td>London</td><td>$145,000</td></tr><tr><td>Gavin Cortez</td><td>Team Leader</td><td>San Francisco</td><td>$235,500</td></tr><tr><td>Martena Mccray</td><td>Post-Sales support</td><td>Edinburgh</td><td>$324,050</td></tr><tr><td>Unity Butler</td><td>Marketing Designer</td><td>San Francisco</td><td>$85,675</td></tr><tr><td>Howard Hatfield</td><td>Office Manager</td><td>San Francisco</td><td>$164,500</td></tr><tr><td>Hope Fuentes</td><td>Secretary</td><td>San Francisco</td><td>$109,850</td></tr><tr><td>Vivian Harrell</td><td>Financial Controller</td><td>San Francisco</td><td>$452,500</td></tr><tr><td>Timothy Mooney</td><td>Office Manager</td><td>London</td><td>$136,200</td></tr><tr><td>Jackson Bradshaw</td><td>Director</td><td>New York</td><td>$645,750</td></tr><tr><td>Olivia Liang</td><td>Support Engineer</td><td>Singapore</td><td>$234,500</td></tr><tr><td>Bruno Nash</td><td>Software Engineer</td><td>London</td><td>$163,500</td></tr><tr><td>Sakura Yamamoto</td><td>Support Engineer</td><td>Tokyo</td><td>$139,575</td></tr><tr><td>Thor Walton</td><td>Developer</td><td>New York</td><td>$98,540</td></tr><tr><td>Finn Camacho</td><td>Support Engineer</td><td>San Francisco</td><td>$87,500</td></tr><tr><td>Serge Baldwin</td><td>Data Coordinator</td><td>Singapore</td><td>$138,575</td></tr><tr><td>Zenaida Frank</td><td>Software Engineer</td><td>New York</td><td>$125,250</td></tr><tr><td>Zorita Serrano</td><td>Software Engineer</td><td>San Francisco</td><td>$115,000</td></tr><tr><td>Jennifer Acosta</td><td>Junior Javascript Developer</td><td>Edinburgh</td><td>$75,650</td></tr><tr><td>Cara Stevens</td><td>Sales Assistant</td><td>New York</td><td>$145,600</td></tr><tr><td>Hermione Butler</td><td>Regional Director</td><td>London</td><td>$356,250</td></tr><tr><td>Lael Greer</td><td>Systems Administrator</td><td>London</td><td>$103,500</td></tr><tr><td>Jonas Alexander</td><td>Developer</td><td>San Francisco</td><td>$86,500</td></tr><tr><td>Shad Decker</td><td>Regional Director</td><td>Edinburgh</td><td>$183,000</td></tr><tr><td>Michael Bruce</td><td>Javascript Developer</td><td>Singapore</td><td>$183,000</td></tr><tr><td>Donna Snider</td><td>Customer Support</td><td>New York</td><td>$112,000</td></tr></tbody></table></p>

<p>This not only works with DataTables' global filter input, but also with extensions such as <a href="https://datatables.net/extensions/searchpanes/">SearchPanes</a>, which you can see in the following example. A slight difference here is that we are charting the <em>Position</em> column. Again, I've linked a <a href="http://live.datatables.net/pedakowe/1/edit">live version</a>.</p>

<p><table id="basicFilteringSP" class="display" style="width:100%"><thead><tr><th>Name</th><th>Position</th><th>Office</th><th>Salary</th></tr></thead><tbody><tr><td>Tiger Nixon</td><td>System Architect</td><td>Edinburgh</td><td>$320,800</td></tr><tr><td>Garrett Winters</td><td>Accountant</td><td>Tokyo</td><td>$170,750</td></tr><tr><td>Ashton Cox</td><td>Junior Technical Author</td><td>San Francisco</td><td>$86,000</td></tr><tr><td>Cedric Kelly</td><td>Senior Javascript Developer</td><td>Edinburgh</td><td>$433,060</td></tr><tr><td>Airi Satou</td><td>Accountant</td><td>Tokyo</td><td>$162,700</td></tr><tr><td>Brielle Williamson</td><td>Integration Specialist</td><td>New York</td><td>$372,000</td></tr><tr><td>Herrod Chandler</td><td>Sales Assistant</td><td>San Francisco</td><td>$137,500</td></tr><tr><td>Rhona Davidson</td><td>Integration Specialist</td><td>Tokyo</td><td>$327,900</td></tr><tr><td>Colleen Hurst</td><td>Javascript Developer</td><td>San Francisco</td><td>$205,500</td></tr><tr><td>Sonya Frost</td><td>Software Engineer</td><td>Edinburgh</td><td>$103,600</td></tr><tr><td>Jena Gaines</td><td>Office Manager</td><td>London</td><td>$90,560</td></tr><tr><td>Quinn Flynn</td><td>Support Lead</td><td>Edinburgh</td><td>$342,000</td></tr><tr><td>Charde Marshall</td><td>Regional Director</td><td>San Francisco</td><td>$470,600</td></tr><tr><td>Haley Kennedy</td><td>Senior Marketing Designer</td><td>London</td><td>$313,500</td></tr><tr><td>Tatyana Fitzpatrick</td><td>Regional Director</td><td>London</td><td>$385,750</td></tr><tr><td>Michael Silva</td><td>Marketing Designer</td><td>London</td><td>$198,500</td></tr><tr><td>Paul Byrd</td><td>Chief Financial Officer (CFO)</td><td>New York</td><td>$725,000</td></tr><tr><td>Gloria Little</td><td>Systems Administrator</td><td>New York</td><td>$237,500</td></tr><tr><td>Bradley Greer</td><td>Software Engineer</td><td>London</td><td>$132,000</td></tr><tr><td>Dai Rios</td><td>Personnel Lead</td><td>Edinburgh</td><td>$217,500</td></tr><tr><td>Jenette Caldwell</td><td>Development Lead</td><td>New York</td><td>$345,000</td></tr><tr><td>Yuri Berry</td><td>Chief Marketing Officer (CMO)</td><td>New York</td><td>$675,000</td></tr><tr><td>Caesar Vance</td><td>Pre-Sales Support</td><td>New York</td><td>$106,450</td></tr><tr><td>Doris Wilder</td><td>Sales Assistant</td><td>Sydney</td><td>$85,600</td></tr><tr><td>Angelica Ramos</td><td>Chief Executive Officer (CEO)</td><td>London</td><td>$1,200,000</td></tr><tr><td>Gavin Joyce</td><td>Developer</td><td>Edinburgh</td><td>$92,575</td></tr><tr><td>Jennifer Chang</td><td>Regional Director</td><td>Singapore</td><td>$357,650</td></tr><tr><td>Brenden Wagner</td><td>Software Engineer</td><td>San Francisco</td><td>$206,850</td></tr><tr><td>Fiona Green</td><td>Chief Operating Officer (COO)</td><td>San Francisco</td><td>$850,000</td></tr><tr><td>Shou Itou</td><td>Regional Marketing</td><td>Tokyo</td><td>$163,000</td></tr><tr><td>Michelle House</td><td>Integration Specialist</td><td>Sydney</td><td>$95,400</td></tr><tr><td>Suki Burks</td><td>Developer</td><td>London</td><td>$114,500</td></tr><tr><td>Prescott Bartlett</td><td>Technical Author</td><td>London</td><td>$145,000</td></tr><tr><td>Gavin Cortez</td><td>Team Leader</td><td>San Francisco</td><td>$235,500</td></tr><tr><td>Martena Mccray</td><td>Post-Sales support</td><td>Edinburgh</td><td>$324,050</td></tr><tr><td>Unity Butler</td><td>Marketing Designer</td><td>San Francisco</td><td>$85,675</td></tr><tr><td>Howard Hatfield</td><td>Office Manager</td><td>San Francisco</td><td>$164,500</td></tr><tr><td>Hope Fuentes</td><td>Secretary</td><td>San Francisco</td><td>$109,850</td></tr><tr><td>Vivian Harrell</td><td>Financial Controller</td><td>San Francisco</td><td>$452,500</td></tr><tr><td>Timothy Mooney</td><td>Office Manager</td><td>London</td><td>$136,200</td></tr><tr><td>Jackson Bradshaw</td><td>Director</td><td>New York</td><td>$645,750</td></tr><tr><td>Olivia Liang</td><td>Support Engineer</td><td>Singapore</td><td>$234,500</td></tr><tr><td>Bruno Nash</td><td>Software Engineer</td><td>London</td><td>$163,500</td></tr><tr><td>Sakura Yamamoto</td><td>Support Engineer</td><td>Tokyo</td><td>$139,575</td></tr><tr><td>Thor Walton</td><td>Developer</td><td>New York</td><td>$98,540</td></tr><tr><td>Finn Camacho</td><td>Support Engineer</td><td>San Francisco</td><td>$87,500</td></tr><tr><td>Serge Baldwin</td><td>Data Coordinator</td><td>Singapore</td><td>$138,575</td></tr><tr><td>Zenaida Frank</td><td>Software Engineer</td><td>New York</td><td>$125,250</td></tr><tr><td>Zorita Serrano</td><td>Software Engineer</td><td>San Francisco</td><td>$115,000</td></tr><tr><td>Jennifer Acosta</td><td>Junior Javascript Developer</td><td>Edinburgh</td><td>$75,650</td></tr><tr><td>Cara Stevens</td><td>Sales Assistant</td><td>New York</td><td>$145,600</td></tr><tr><td>Hermione Butler</td><td>Regional Director</td><td>London</td><td>$356,250</td></tr><tr><td>Lael Greer</td><td>Systems Administrator</td><td>London</td><td>$103,500</td></tr><tr><td>Jonas Alexander</td><td>Developer</td><td>San Francisco</td><td>$86,500</td></tr><tr><td>Shad Decker</td><td>Regional Director</td><td>Edinburgh</td><td>$183,000</td></tr><tr><td>Michael Bruce</td><td>Javascript Developer</td><td>Singapore</td><td>$183,000</td></tr><tr><td>Donna Snider</td><td>Customer Support</td><td>New York</td><td>$112,000</td></tr></tbody></table></p>

<h2 data-anchor="Charting-with-Data-Processing"><a name="Charting-with-Data-Processing" href="#Charting-with-Data-Processing"></a>Charting with Data Processing</h2>

<p>Of course it is also possible to do some more processing with the data from the DataTable. The example below is creating a column graph, showing the average salaries of the employees in the example table, by office. And of course, here is a link to a <a href="http://live.datatables.net/cebucive/1/edit">live version</a>.</p>

<p><table id="advanced" class="display" style="width:100%"><thead><tr><th>Name</th><th>Position</th><th>Office</th><th>Salary</th></tr></thead><tbody><tr><td>Tiger Nixon</td><td>System Architect</td><td>Edinburgh</td><td>$320,800</td></tr><tr><td>Garrett Winters</td><td>Accountant</td><td>Tokyo</td><td>$170,750</td></tr><tr><td>Ashton Cox</td><td>Junior Technical Author</td><td>San Francisco</td><td>$86,000</td></tr><tr><td>Cedric Kelly</td><td>Senior Javascript Developer</td><td>Edinburgh</td><td>$433,060</td></tr><tr><td>Airi Satou</td><td>Accountant</td><td>Tokyo</td><td>$162,700</td></tr><tr><td>Brielle Williamson</td><td>Integration Specialist</td><td>New York</td><td>$372,000</td></tr><tr><td>Herrod Chandler</td><td>Sales Assistant</td><td>San Francisco</td><td>$137,500</td></tr><tr><td>Rhona Davidson</td><td>Integration Specialist</td><td>Tokyo</td><td>$327,900</td></tr><tr><td>Colleen Hurst</td><td>Javascript Developer</td><td>San Francisco</td><td>$205,500</td></tr><tr><td>Sonya Frost</td><td>Software Engineer</td><td>Edinburgh</td><td>$103,600</td></tr><tr><td>Jena Gaines</td><td>Office Manager</td><td>London</td><td>$90,560</td></tr><tr><td>Quinn Flynn</td><td>Support Lead</td><td>Edinburgh</td><td>$342,000</td></tr><tr><td>Charde Marshall</td><td>Regional Director</td><td>San Francisco</td><td>$470,600</td></tr><tr><td>Haley Kennedy</td><td>Senior Marketing Designer</td><td>London</td><td>$313,500</td></tr><tr><td>Tatyana Fitzpatrick</td><td>Regional Director</td><td>London</td><td>$385,750</td></tr><tr><td>Michael Silva</td><td>Marketing Designer</td><td>London</td><td>$198,500</td></tr><tr><td>Paul Byrd</td><td>Chief Financial Officer (CFO)</td><td>New York</td><td>$725,000</td></tr><tr><td>Gloria Little</td><td>Systems Administrator</td><td>New York</td><td>$237,500</td></tr><tr><td>Bradley Greer</td><td>Software Engineer</td><td>London</td><td>$132,000</td></tr><tr><td>Dai Rios</td><td>Personnel Lead</td><td>Edinburgh</td><td>$217,500</td></tr><tr><td>Jenette Caldwell</td><td>Development Lead</td><td>New York</td><td>$345,000</td></tr><tr><td>Yuri Berry</td><td>Chief Marketing Officer (CMO)</td><td>New York</td><td>$675,000</td></tr><tr><td>Caesar Vance</td><td>Pre-Sales Support</td><td>New York</td><td>$106,450</td></tr><tr><td>Doris Wilder</td><td>Sales Assistant</td><td>Sydney</td><td>$85,600</td></tr><tr><td>Angelica Ramos</td><td>Chief Executive Officer (CEO)</td><td>London</td><td>$1,200,000</td></tr><tr><td>Gavin Joyce</td><td>Developer</td><td>Edinburgh</td><td>$92,575</td></tr><tr><td>Jennifer Chang</td><td>Regional Director</td><td>Singapore</td><td>$357,650</td></tr><tr><td>Brenden Wagner</td><td>Software Engineer</td><td>San Francisco</td><td>$206,850</td></tr><tr><td>Fiona Green</td><td>Chief Operating Officer (COO)</td><td>San Francisco</td><td>$850,000</td></tr><tr><td>Shou Itou</td><td>Regional Marketing</td><td>Tokyo</td><td>$163,000</td></tr><tr><td>Michelle House</td><td>Integration Specialist</td><td>Sydney</td><td>$95,400</td></tr><tr><td>Suki Burks</td><td>Developer</td><td>London</td><td>$114,500</td></tr><tr><td>Prescott Bartlett</td><td>Technical Author</td><td>London</td><td>$145,000</td></tr><tr><td>Gavin Cortez</td><td>Team Leader</td><td>San Francisco</td><td>$235,500</td></tr><tr><td>Martena Mccray</td><td>Post-Sales support</td><td>Edinburgh</td><td>$324,050</td></tr><tr><td>Unity Butler</td><td>Marketing Designer</td><td>San Francisco</td><td>$85,675</td></tr><tr><td>Howard Hatfield</td><td>Office Manager</td><td>San Francisco</td><td>$164,500</td></tr><tr><td>Hope Fuentes</td><td>Secretary</td><td>San Francisco</td><td>$109,850</td></tr><tr><td>Vivian Harrell</td><td>Financial Controller</td><td>San Francisco</td><td>$452,500</td></tr><tr><td>Timothy Mooney</td><td>Office Manager</td><td>London</td><td>$136,200</td></tr><tr><td>Jackson Bradshaw</td><td>Director</td><td>New York</td><td>$645,750</td></tr><tr><td>Olivia Liang</td><td>Support Engineer</td><td>Singapore</td><td>$234,500</td></tr><tr><td>Bruno Nash</td><td>Software Engineer</td><td>London</td><td>$163,500</td></tr><tr><td>Sakura Yamamoto</td><td>Support Engineer</td><td>Tokyo</td><td>$139,575</td></tr><tr><td>Thor Walton</td><td>Developer</td><td>New York</td><td>$98,540</td></tr><tr><td>Finn Camacho</td><td>Support Engineer</td><td>San Francisco</td><td>$87,500</td></tr><tr><td>Serge Baldwin</td><td>Data Coordinator</td><td>Singapore</td><td>$138,575</td></tr><tr><td>Zenaida Frank</td><td>Software Engineer</td><td>New York</td><td>$125,250</td></tr><tr><td>Zorita Serrano</td><td>Software Engineer</td><td>San Francisco</td><td>$115,000</td></tr><tr><td>Jennifer Acosta</td><td>Junior Javascript Developer</td><td>Edinburgh</td><td>$75,650</td></tr><tr><td>Cara Stevens</td><td>Sales Assistant</td><td>New York</td><td>$145,600</td></tr><tr><td>Hermione Butler</td><td>Regional Director</td><td>London</td><td>$356,250</td></tr><tr><td>Lael Greer</td><td>Systems Administrator</td><td>London</td><td>$103,500</td></tr><tr><td>Jonas Alexander</td><td>Developer</td><td>San Francisco</td><td>$86,500</td></tr><tr><td>Shad Decker</td><td>Regional Director</td><td>Edinburgh</td><td>$183,000</td></tr><tr><td>Michael Bruce</td><td>Javascript Developer</td><td>Singapore</td><td>$183,000</td></tr><tr><td>Donna Snider</td><td>Customer Support</td><td>New York</td><td>$112,000</td></tr></tbody></table></p>

<p>The code for this example is very similar to the previous examples, with a couple of tweaks to the extra function that we created.</p>

<pre><code class="multiline language-js">function getSalaries(table) {
    var salaryCounts = {};
    var salary = {};

    // Get the row indexes for the rows displayed under the current search
    var indexes = table.rows({ search: 'applied' }).indexes().toArray();

    // For each row, extract the office and add the salary to the array
    for (var i = 0; i &lt; indexes.length; i++) {
        var office = table.cell(indexes[i], 2).data();
        if (salaryCounts[office] === undefined) {
            salaryCounts[office] = [
                +table
                    .cell(indexes[i], 3)
                    .data()
                    .replace(/[^0-9.]/g, ''),
            ];
        } else {
            salaryCounts[office].push(
                +table
                    .cell(indexes[i], 3)
                    .data()
                    .replace(/[^0-9.]/g, '')
            );
        }
    }

    // Extract the office names that are present in the table
    var keys = Object.keys(salaryCounts);

    // For each office work out the average salary
    for (var i = 0; i &lt; keys.length; i++) {
        var length = salaryCounts[keys[i]].length;
        var total = salaryCounts[keys[i]].reduce((a, b) =&gt; a + b, 0);
        salary[keys[i]] = total / length;
    }

    return salary;
}
</code></pre>

<p>Here we have 2 objects, the first <code>salary</code> object is going to hold the final data that we need for a column graph, while <code>salaryCounts</code> is a temporary object that will allow us to perform some extra processing.</p>

<p>We also have to make a change to our <code>series</code> variable, the data is now the values of the <code>salary</code> array. We also need to declare an x and y axis. Putting all of this together gives us the following scipt, which is used for the example above.</p>

<pre><code class="multiline language-js">$(document).ready(function () {
    var table = $('#example').DataTable();
    var salary = getSalaries(table);

    // Declare axis for the column graph
    var axis = {
        id: 'salary',
        min: 0,
        title: {
            text: 'Average Salary',
        },
    };

    // Declare inital series with the values from the getSalaries function
    var series = {
        name: 'Overall',
        data: Object.values(salary),
    };

    var myChart = Highcharts.chart('container', {
        chart: {
            type: 'column',
        },
        title: {
            text: 'Average Salary',
        },
        xAxis: {
            categories: Object.keys(salary),
        },
        yAxis: axis,
        series: [series],
    });

    // On draw, get updated salaries and refresh axis and series
    table.on('draw', function () {
        salary = getSalaries(table);
        myChart.axes[0].categories = Object.keys(salary);
        myChart.series[0].setData(Object.values(salary));
    });
});

function getSalaries(table) {
    var salaryCounts = {};
    var salary = {};

    // Get the row indexes for the rows displayed under the current search
    var indexes = table.rows({ search: 'applied' }).indexes().toArray();

    // For each row, extract the office and add the salary to the array
    for (var i = 0; i &lt; indexes.length; i++) {
        var office = table.cell(indexes[i], 2).data();
        if (salaryCounts[office] === undefined) {
            salaryCounts[office] = [
                +table
                    .cell(indexes[i], 3)
                    .data()
                    .replace(/[^0-9.]/g, ''),
            ];
        } else {
            salaryCounts[office].push(
                +table
                    .cell(indexes[i], 3)
                    .data()
                    .replace(/[^0-9.]/g, '')
            );
        }
    }

    // Extract the office names that are present in the table
    var keys = Object.keys(salaryCounts);

    // For each office work out the average salary
    for (var i = 0; i &lt; keys.length; i++) {
        var length = salaryCounts[keys[i]].length;
        var total = salaryCounts[keys[i]].reduce((a, b) =&gt; a + b, 0);
        salary[keys[i]] = total / length;
    }

    return salary;
}
</code></pre>

<p>As I've mentioned, Highcharts offers a wide range of different graphs, and by making use of the DataTables API it is easy to create dynamic charts and graphs to run alongside a DataTable.</p>

<p>Hopefully, this will help to add another dimension to your DataTables implementations.</p>

				</div>
			</div>

			<div class="fw-page-nav">
				<div class="page-nav">
					<div class="page-nav-title">Page navigation</div>
				</div>
			</div>
		</div>

		<div class="fw-footer">
			<div class="skew"></div>
			<div class="skew-bg"></div>
			<div class="copyright">
				<h4>DataTables</h4>
				<p>
					DataTables designed and created by <a href="//sprymedia.co.uk">SpryMedia Ltd</a>.<br>
					&copy; 2007-2023 <a href="/license/mit">MIT licensed</a>. <a href="/privacy">Privacy policy</a>. <a href="/supporters">Supporters</a>.<br>
					SpryMedia Ltd is registered in Scotland, company no. SC456502.
				</p>
			</div>
		</div>
	</body>
</html>
