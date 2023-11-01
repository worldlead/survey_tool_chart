<?php
require_once "db_functions.php";
$conn = connectDB();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Select an appropriate buy/sell plan</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- FontAwesome JS-->
	<script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

	<!-- jQuery -->
	<script src="vendor/jquery/jquery.min.js"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head>

<body class="app">

	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<div class="row">
					<div class="col-md-6">
						<h1 class="app-page-title">Overview</h1>
					</div>
					<div class="col-md-6">
						<a href="index.php" class="btn btn-info float-right" style="float: right;">Go to Home</a>
					</div>
				</div>

				<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
					<div class="inner">
						<div class="app-card-body p-3 p-lg-4">
							<h3 class="mb-3">Welcome to Statistic Chart</h3>
							<div class="row gx-5 gy-3">
								<div class="col-12 col-lg-9">
									<div>>Welcome to Statistic Chart</div>
								</div><!--//col-->
								<div class="col-12 col-lg-3">
									<a class="btn app-btn-primary" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
											<path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
											<path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z" />
										</svg>Free Download</a>
								</div><!--//col-->
							</div><!--//row-->
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div><!--//app-card-body-->

					</div><!--//inner-->
				</div><!--//app-card-->

			
				<div class="row g-4 mb-4">
					<div class="col-12 col-lg-12">
						<div class="app-card app-card-chart h-100 shadow-sm">
							<div class="app-card-header p-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<h4 class="app-card-title">Trend</h4>
									</div><!--//col-->
									<div class="col-auto">
										<div class="card-header-action">
											<a href="charts.html">More charts</a>
										</div><!--//card-header-actions-->
									</div><!--//col-->
								</div><!--//row-->
							</div><!--//app-card-header-->
							<div class="app-card-body p-3 p-lg-4">
								<div class="mb-3 d-flex">
									<select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
										<option value="1" selected>This week</option>
										<option value="2">Today</option>
										<option value="3">This Month</option>
										<option value="3">This Year</option>
									</select>
								</div>
								<div class="chart-container">
									<canvas id="canvas-linechart"></canvas>
								</div>
							</div><!--//app-card-body-->
						</div><!--//app-card-->
					</div><!--//col-->
				</div>
				<div class="row g-4 mb-4">
					<div class="col-6 col-lg-3">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Total Buy Price</h4>
								<div class="stats-figure" id="total_buy_price"></div>
								<div class="stats-meta text-success">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
									</svg> 20%
								</div>
							</div><!--//app-card-body-->
							<a class="app-card-link-mask" href="#"></a>
						</div><!--//app-card-->
					</div><!--//col-->

					<div class="col-6 col-lg-3">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Total Sell Price</h4>
								<div class="stats-figure" id="total_sell_price"></div>
								<div class="stats-meta text-success">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
									</svg> 5%
								</div>
							</div><!--//app-card-body-->
							<a class="app-card-link-mask" href="#"></a>
						</div><!--//app-card-->
					</div><!--//col-->
					<div class="col-6 col-lg-3">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Profit ratio</h4>
								<div class="stats-figure" id="profit_ratio"></div>
								<div class="stats-meta">
									Open</div>
							</div><!--//app-card-body-->
							<a class="app-card-link-mask" href="#"></a>
						</div><!--//app-card-->
					</div><!--//col-->
					<div class="col-6 col-lg-3">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Contracts</h4>
								<div class="stats-figure">6</div>
								<div class="stats-meta">New</div>
							</div><!--//app-card-body-->
							<a class="app-card-link-mask" href="#"></a>
						</div><!--//app-card-->
					</div><!--//col-->
				</div><!--//row-->
				<div class="row g-4 mb-4">
					<div class="col-3 col-lg-3">
						<div class="app-card app-card-chart h-100 shadow-sm">
							<div class="app-card-header p-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<h4 class="app-card-title">Total</h4>
									</div><!--//col-->
								</div><!--//row-->
							</div>
							<div class="chart-container">
								<canvas id="canvas-barchart-total"></canvas>
							</div>
						</div>
					</div>
				<div class="col-9 col-lg-9">
					<div class="app-card app-card-chart h-100 shadow-sm">
						<div class="app-card-header p-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<h4 class="app-card-title">Buy/Sale</h4>
								</div><!--//col-->
							</div><!--//row-->
						</div><!--//app-card-header-->
						<div class="app-card-body p-3 p-lg-4">
							<div class="mb-3 d-flex form-group">

								<?php
								$sql = "Select * from podio";
								$result = $conn->query($sql);
								$rows = $result->fetchAll(PDO::FETCH_ASSOC);
								?>
								<label class="form-label" for="area_select" style="float: right;">Select an area</label>
								<select class="form-select form-select-sm ms-auto d-inline-flex w-auto" id="area_select">
									<?php
									foreach ($rows as $row) {
										echo "<option value='" . $row['podio_link'] . "'>" . $row['podio_link'] . "</p>";
									}
									?>
								</select>
							</div>
							<div class="chart-container">
								<canvas id="canvas-barchart"></canvas>
							</div>
						</div><!--//app-card-body-->
					</div><!--//app-card-->
				</div><!--//col-->

				<div class="row g-4 mb-4">
					<div class="col-12 col-lg-6">
						<div class="app-card app-card-progress-list h-100 shadow-sm">
							<div class="app-card-header p-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<h4 class="app-card-title">Progress</h4>
									</div><!--//col-->
									<div class="col-auto">
										<div class="card-header-action">
											<a href="#">All projects</a>
										</div><!--//card-header-actions-->
									</div><!--//col-->
								</div><!--//row-->
							</div><!--//app-card-header-->
							<div class="app-card-body">
								<div class="item p-3">
									<div class="row align-items-center">
										<div class="col">
											<div class="title mb-1 ">Project lorem ipsum dolor sit amet</div>
											<div class="progress">
												<div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div><!--//col-->
										<div class="col-auto">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
											</svg>
										</div><!--//col-->
									</div><!--//row-->
									<a class="item-link-mask" href="#"></a>
								</div><!--//item-->


								<div class="item p-3">
									<div class="row align-items-center">
										<div class="col">
											<div class="title mb-1 ">Project duis aliquam et lacus quis ornare</div>
											<div class="progress">
												<div class="progress-bar bg-success" role="progressbar" style="width: 34%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div><!--//col-->
										<div class="col-auto">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
											</svg>
										</div><!--//col-->
									</div><!--//row-->
									<a class="item-link-mask" href="#"></a>
								</div><!--//item-->

								<div class="item p-3">
									<div class="row align-items-center">
										<div class="col">
											<div class="title mb-1 ">Project sed tempus felis id lacus pulvinar</div>
											<div class="progress">
												<div class="progress-bar bg-success" role="progressbar" style="width: 68%;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div><!--//col-->
										<div class="col-auto">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
											</svg>
										</div><!--//col-->
									</div><!--//row-->
									<a class="item-link-mask" href="#"></a>
								</div><!--//item-->

								<div class="item p-3">
									<div class="row align-items-center">
										<div class="col">
											<div class="title mb-1 ">Project sed tempus felis id lacus pulvinar</div>
											<div class="progress">
												<div class="progress-bar bg-success" role="progressbar" style="width: 52%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div><!--//col-->
										<div class="col-auto">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
											</svg>
										</div><!--//col-->
									</div><!--//row-->
									<a class="item-link-mask" href="#"></a>
								</div><!--//item-->

							</div><!--//app-card-body-->
						</div><!--//app-card-->
					</div><!--//col-->
					<div class="col-12 col-lg-6">
						<div class="app-card app-card-stats-table h-100 shadow-sm">
							<div class="app-card-header p-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<h4 class="app-card-title">Stats List</h4>
									</div><!--//col-->
									<div class="col-auto">
										<div class="card-header-action">
											<a href="#">View report</a>
										</div><!--//card-header-actions-->
									</div><!--//col-->
								</div><!--//row-->
							</div><!--//app-card-header-->
							<div class="app-card-body p-3 p-lg-4">
								<div class="table-responsive">
									<table class="table table-borderless mb-0">
										<thead>
											<tr>
												<th class="meta">Source</th>
												<th class="meta stat-cell">Views</th>
												<th class="meta stat-cell">Today</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><a href="#">google.com</a></td>
												<td class="stat-cell">110</td>
												<td class="stat-cell">
													<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
													</svg>
													30%
												</td>
											</tr>
											<tr>
												<td><a href="#">getbootstrap.com</a></td>
												<td class="stat-cell">67</td>
												<td class="stat-cell">23%</td>
											</tr>
											<tr>
												<td><a href="#">w3schools.com</a></td>
												<td class="stat-cell">56</td>
												<td class="stat-cell">
													<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
													</svg>
													20%
												</td>
											</tr>
											<tr>
												<td><a href="#">javascript.com </a></td>
												<td class="stat-cell">24</td>
												<td class="stat-cell">-</td>
											</tr>
											<tr>
												<td><a href="#">github.com </a></td>
												<td class="stat-cell">17</td>
												<td class="stat-cell">15%</td>
											</tr>
										</tbody>
									</table>
								</div><!--//table-responsive-->
							</div><!--//app-card-body-->
						</div><!--//app-card-->
					</div><!--//col-->
				</div><!--//row-->
			</div><!--//container-fluid-->
		</div><!--//app-content-->

	</div><!--//app-wrapper-->

	<!-- Javascript -->
	<script src="assets/plugins/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Charts JS -->
	<script src="assets/plugins/chart.js/chart.min.js"></script>
	<script src="assets/js/index-charts.js"></script>

	<!-- Page Specific JS -->
	<script src="assets/js/app.js"></script>


</body>

</html>