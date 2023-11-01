
jQuery(function() {
	'use strict';

	/* Chart.js docs: https://www.chartjs.org/ */
	
	window.chartColors = {
		green: '#75c181',
		gray: '#a9b5c9',
		text: '#252930',
		border: '#e7e9ed'
	};
	
	/* Random number generator for demo purpose */
	var randomDataPoint = function(){ return Math.round(Math.random()*10000)};
	
	
	//Chart.js Line Chart Example 
	
	var lineChartConfig = {
		type: 'line',
	
		data: {
			labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
			
			datasets: [{
				label: 'Current week',
				fill: false,
				backgroundColor: window.chartColors.green,
				borderColor: window.chartColors.green,
				data: [
					randomDataPoint(),
					randomDataPoint(),
					randomDataPoint(),
					randomDataPoint(),
					randomDataPoint(),
					randomDataPoint(),
					randomDataPoint()
				],
			}, {
				label: 'Previous week',
				borderDash: [3, 5],
				backgroundColor: window.chartColors.gray,
				borderColor: window.chartColors.gray,
				
				data: [
					randomDataPoint(),
					randomDataPoint(),
					randomDataPoint(),
					randomDataPoint(),
					randomDataPoint(),
					randomDataPoint(),
					randomDataPoint()
				],
				fill: false,
			}]
		},
		options: {
			responsive: true,	
			aspectRatio: 1.5,
			
			legend: {
				display: true,
				position: 'bottom',
				align: 'end',
			},
			
			title: {
				display: true,
				text: 'Buy To Sale',
				
			}, 
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#fff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,
	
				callbacks: {
					//Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
					label: function(tooltipItem, data) {
						if (parseInt(tooltipItem.value) >= 1000) {
							return "$" + tooltipItem.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						} else {
							return '$' + tooltipItem.value;
						}
					}
				},
	
			},
			hover: {
				mode: 'nearest',
				intersect: true
			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},
					scaleLabel: {
						display: false,
					
					}
				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},
					scaleLabel: {
						display: false,
					},
					ticks: {
						beginAtZero: true,
						userCallback: function(value, index, values) {
							return '$' + value.toLocaleString();   //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
						}
					},
				}]
			}
		}
	};
	
	
	
	// Chart.js Bar Chart Example 
	
	let barChartConfig = {
		type: 'bar',
		
		data: {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			datasets: [{
				label: 'Buy',
				backgroundColor: 'rgba(255, 99, 132, 0.2)',
				borderColor: 'rgba(255, 99, 132, 1)',
				borderWidth: 1,
				data: [25, 45, 76, 75, 62, 37, 83],
			}, {
				label: 'Sale',
				backgroundColor: 'rgba(54, 162, 235, 0.2)',
				borderColor: 'rgba(54, 162, 235, 1)',
				borderWidth: 1,
				data: [40, 22, 68, 31, 77, 58, 92],
			}]
		},
		options: {
			responsive: true,
			aspectRatio: 1.5,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			title: {
				display: true,
				text: 'Buy to Sale'
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#fff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,
	
			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},
	
				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},
	
					
				}]
			}
			
		}
	}

	let totalBarChartConfig = {
		type: 'bar',
		
		data: {
			labels: ['Buy/Sale'],
			datasets: [{
				label: 'Buy',
				backgroundColor: 'rgba(255, 99, 132, 0.2)',
				borderColor: 'rgba(255, 99, 132, 1)',
				borderWidth: 1,
				data: [25],
			}, {
				label: 'Sale',
				backgroundColor: 'rgba(54, 162, 235, 0.2)',
				borderColor: 'rgba(54, 162, 235, 1)',
				borderWidth: 1,
				data: [25],
			}]
		},
		options: {
			responsive: true,
			aspectRatio: 0.4,
			legend: {
				position: 'bottom',
				align: 'end',
			},
			plugins: {
				datalabels: {
					anchor: 'end',
					align: 'end',
					font: {
						size: 12,
					}
				}
			},
			title: {
				display: true,
				text: 'Buy to Sale'
			},
			tooltips: {
				mode: 'index',
				intersect: false,
				titleMarginBottom: 10,
				bodySpacing: 10,
				xPadding: 16,
				yPadding: 16,
				borderColor: window.chartColors.border,
				borderWidth: 1,
				backgroundColor: '#fff',
				bodyFontColor: window.chartColors.text,
				titleFontColor: window.chartColors.text,
				
	
			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.border,
					},
	
				}],
				yAxes: [{
					display: true,
					gridLines: {
						drawBorder: false,
						color: window.chartColors.borders,
					},
	
					
				}]
			}
			
		}
	}
	
	// Generate charts on load
	window.addEventListener('load', function(){
		
		var lineChart = document.getElementById('canvas-linechart').getContext('2d');
		window.myLine = new Chart(lineChart, lineChartConfig);
		
		$.post("read_chart_data.php", { 
			link: $("#area_select").val() 
		}, function(data, status) {
			const records = JSON.parse(data);
			const labels = records.map(rec => `${rec.firstname} ${rec.lastname}`)
			const buyPrices = records.map((record) => record.buyPrice);
			const sellPrices = records.map(record => record.sellPrice);
			const sumOfBuyPrices = buyPrices.reduce((total, price) => total + parseFloat(price), 0);
			const sumOfSellPrices = sellPrices.reduce((total, price) => total + parseFloat(price), 0);
			const profitRatio = (sumOfSellPrices - sumOfBuyPrices) / sumOfBuyPrices * 100;
			
			barChartConfig.data.labels = labels;
			barChartConfig.data.datasets[0].data = buyPrices;
			barChartConfig.data.datasets[1].data = sellPrices;
			var barChart = document.getElementById('canvas-barchart').getContext('2d');
			window.myBar = new Chart(barChart, barChartConfig);

			totalBarChartConfig.data.datasets[0].data = [sumOfBuyPrices];
			totalBarChartConfig.data.datasets[1].data = [sumOfSellPrices];
			$("#total_buy_price").text("$" + sumOfBuyPrices.toLocaleString());
			$("#total_sell_price").text("$" + sumOfSellPrices.toLocaleString());
			$("#profit_ratio").text(profitRatio.toFixed(2) + "%");
			var totalBarChart = document.getElementById('canvas-barchart-total').getContext('2d');
			window.myTotalBar = new Chart(totalBarChart, totalBarChartConfig);
			
		});
		
	});	

	$("#area_select").on('change', function() {
		
		$.post("read_chart_data.php", { 
			link: $(this).val() 
		}, function(data, status) {
			const records = JSON.parse(data);
			const labels = records.map(rec => `${rec.firstname} ${rec.lastname}`)
			const buyPrices = records.map((record) => record.buyPrice);
			const sellPrices = records.map(record => record.sellPrice);
			const sumOfBuyPrices = buyPrices.reduce((total, price) => total + parseFloat(price), 0);
			const sumOfSellPrices = sellPrices.reduce((total, price) => total + parseFloat(price), 0);
			const profitRatio = (sumOfSellPrices - sumOfBuyPrices) / sumOfBuyPrices * 100;
			
			$("#total_buy_price").text("$" + sumOfBuyPrices.toLocaleString());
			$("#total_sell_price").text("$" + sumOfSellPrices.toLocaleString());
			$("#profit_ratio").text(profitRatio.toFixed(2) + "%");
			
			barChartConfig.data.labels = labels;
			barChartConfig.data.datasets[0].data = buyPrices;
			barChartConfig.data.datasets[1].data = sellPrices;
			window.myBar.update();

			
			totalBarChartConfig.data.datasets[0].data = [sumOfBuyPrices];
			totalBarChartConfig.data.datasets[1].data = [sumOfSellPrices];
			window.myTotalBar.update();
		});
	});





});
	
