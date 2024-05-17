<?php
session_start();
// echo "Welcome ".$_SESSION['username'];
// echo "<br> University ".$_SESSION['university'];
// echo "<br> Department ".$_SESSION['department'];
// echo "<br> Email ".$_SESSION['email'];
// echo "<br> Emp ID ".$_SESSION['emp_id'];
// echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Amity University</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<style>
        /* Custom styles for infoboxes */
        .infobox {
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 180px; /* Adjust the height as needed */
    }
    .infobox-icon {
        font-size: 48px;
        margin-bottom: 10px;
    }
    .infobox-content {
        font-size: 16px;
        color: #666;
        margin-bottom: 5px;
    }
        .infobox-number {
            font-size: 22px;
            color: #333;
        }
		.view-link {
        color: #337ab7;
        text-decoration: none;
        font-size: 14px;
        margin-top: 10px;
        display: flex;
        align-items: center;
		}
		.view-link i {
			margin-left: 5px;
		}
    </style>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>				</button>

				<div class="navbar-header pull-left">
					<a href="index1.php" class="navbar-brand">
						<small>
							<i class=""></i>
							<img src= "amity_logo.png" alt="amity-logo" width="30" height="30">
							Amity University						</small>					</a>				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<?php
								if (isset($_SESSION['employee_id'])) {
									$employee_id = $_SESSION['employee_id'];

									$conn = new mysqli('localhost', 'root', '', 'scholarsphere');

									if ($conn->connect_error) {
										die('Connection failed: ' . $conn->connect_error);
									}

									// Retrieve the user's avatar filename from the database
									$sql = "SELECT avatar_filename FROM registerinfo WHERE emp_id = $employee_id";
									$result = $conn->query($sql);

									if ($result && $result->num_rows > 0) {
										$row = $result->fetch_assoc();
										$avatar_filename = $row['avatar_filename'];
										echo '<img class="nav-user-photo"  alt="User Avatar" src="uploads/' . $avatar_filename . '">';
									} else {
										// If no avatar found, display default avatar
										echo '<img id="avatar" class="img-responsive" alt="Default Avatar" src="assets\images\avatars\default-avatar.jpg">';
									}

									$conn->close();
								}
							?>
								<span class="user-info">
									<small>Welcome, </small>
									<?php if (isset($_SESSION['user_name'])) { echo $_SESSION['user_name']; } else { echo 'Please login '; } ?>		</span>

								<i class="ace-icon fa fa-caret-down"></i>							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings									</a>								</li>

								<li>
									<a href="profile.php">
										<i class="ace-icon fa fa-user"></i>
										Profile									</a>								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout									</a>								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				

				<ul class="nav nav-list">
					<li class="active">
						<a href="index1.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>						</a>

						<b class="arrow"></b>					</li>

					 

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> View Reports </span>

							<b class="arrow fa fa-angle-down"></b>						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						<li class="">
								<a href="Reochapters.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Chapters Reports
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="Reopapers.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Papers in Conference Report
								</a>

								<b class="arrow"></b>
							</li>

							<li class="active">
								<a href="ReoResearchpaper.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Research Paper Reports
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="ReoBooks.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Books Published
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Forms </span>

							<b class="arrow fa fa-angle-down"></b>						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="form-elements.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Research Papers							</a>

								<b class="arrow"></b>							</li>

							<li class="">
								<a href="form-elements-2.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Chapters in Edited Volumes								</a>

								<b class="arrow"></b>							</li>

							<li class="">
								<a href="form-wizard.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Papers in Conference Proceeding								</a>

								<b class="arrow"></b>							</li>

							<li class="">
								<a href="wysiwyg.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Books Published							</a>

								<b class="arrow"></b>							</li>

							  
						</ul>
					</li>

					 


					 
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>							</div>

							<!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats								</small>							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
                            <!-- Research Papers Infobox -->
                            <div class="col-sm-3">
                                <div class="infobox infobox-green">
                                    <div class="infobox-icon"><i class="ace-icon fa fa-file-text-o"></i></div>
                                    <div class="infobox-data">
                                        <div class="infobox-content"></div>
                                        <div class="infobox-number">
										<?php
											// Database connection
											$servername = 'localhost';
											$username = 'root';
											$password = '';
											$database = 'scholarsphere';

											// Create connection
											$conn = mysqli_connect($servername, $username, $password, $database);

											// Check connection
											if (!$conn) {
												die('Connection failed: ' . mysqli_connect_error());
											}

											// Employee ID for which you want to count entries
											$employee_id = $_SESSION['employee_id'];

											// SQL query to count entries for the specified employee ID
											$sql = "SELECT COUNT(*) AS entry_count FROM researchpapersbyfaculty WHERE `Employee ID` = '$employee_id'";

											// Execute query
											$result = mysqli_query($conn, $sql);

											if ($result) {
												// Fetch the result row
												$row = mysqli_fetch_assoc($result);

												// Get the count of entries
												$entry_count = $row['entry_count'];

												echo "Research Papers : $entry_count";
											} else {
												echo 'Error executing query: ' . mysqli_error($conn);
											}

											// Close connection
											mysqli_close($conn);
										?>
										</div> <!-- Display count dynamically -->
										<a href="ReoResearchpaper.php" class="view-link">View <i class="ace-icon fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Books Infobox -->
                            <div class="col-sm-3">
                                <div class="infobox infobox-blue">
                                    <div class="infobox-icon"><i class="ace-icon fa fa-book"></i></div>
                                    <div class="infobox-data">
                                        <div class="infobox-content"></div>
                                        <div class="infobox-number">
										<?php
											// Database connection
											$servername = 'localhost';
											$username = 'root';
											$password = '';
											$database = 'scholarsphere';

											// Create connection
											$conn = mysqli_connect($servername, $username, $password, $database);

											// Check connection
											if (!$conn) {
												die('Connection failed: ' . mysqli_connect_error());
											}

											// Employee ID for which you want to count entries
											$employee_id = $_SESSION['employee_id'];

											// SQL query to count entries for the specified employee ID
											$sql = "SELECT COUNT(*) AS entry_count FROM booksbyfaculty WHERE `Employee ID` = '$employee_id'";

											// Execute query
											$result = mysqli_query($conn, $sql);

											if ($result) {
												// Fetch the result row
												$row = mysqli_fetch_assoc($result);

												// Get the count of entries
												$entry_count = $row['entry_count'];

												echo "Books Published: $entry_count";
											} else {
												echo 'Error executing query: ' . mysqli_error($conn);
											}

											// Close connection
											mysqli_close($conn);
										?>
										</div> <!-- Display count dynamically -->
										<a href="ReoBooks.php" class="view-link">View <i class="ace-icon fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Chapters Infobox -->
                            <div class="col-sm-3">
                                <div class="infobox infobox-purple">
                                    <div class="infobox-icon"><i class="ace-icon fa fa-file-text"></i></div>
                                    <div class="infobox-data">
                                        <div class="infobox-content"></div>
                                        <div class="infobox-number">
										<?php
											// Database connection
											$servername = 'localhost';
											$username = 'root';
											$password = '';
											$database = 'scholarsphere';

											// Create connection
											$conn = mysqli_connect($servername, $username, $password, $database);

											// Check connection
											if (!$conn) {
												die('Connection failed: ' . mysqli_connect_error());
											}

											// Employee ID for which you want to count entries
											$employee_id = $_SESSION['employee_id'];

											// SQL query to count entries for the specified employee ID
											$sql = "SELECT COUNT(*) AS entry_count FROM bookchaptersbyfaculty WHERE `Employee ID` = '$employee_id'";

											// Execute query
											$result = mysqli_query($conn, $sql);

											if ($result) {
												// Fetch the result row
												$row = mysqli_fetch_assoc($result);

												// Get the count of entries
												$entry_count = $row['entry_count'];

												echo "Chapters: $entry_count";
											} else {
												echo 'Error executing query: ' . mysqli_error($conn);
											}

											// Close connection
											mysqli_close($conn);
										?>
										</div> <!-- Display count dynamically -->
										<a href="Reochapters.php" class="view-link">View <i class="ace-icon fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Papers Infobox -->
                            <div class="col-sm-3">
                                <div class="infobox infobox-red">
                                    <div class="infobox-icon"><i class="ace-icon fa fa-file"></i></div>
                                    <div class="infobox-data">
                                        <div class="infobox-content"></div>
                                        <div class="infobox-number">
										<?php
											// Database connection
											$servername = 'localhost';
											$username = 'root';
											$password = '';
											$database = 'scholarsphere';

											// Create connection
											$conn = mysqli_connect($servername, $username, $password, $database);

											// Check connection
											if (!$conn) {
												die('Connection failed: ' . mysqli_connect_error());
											}

											// Employee ID for which you want to count entries
											$employee_id = $_SESSION['employee_id'];

											// SQL query to count entries for the specified employee ID
											$sql = "SELECT COUNT(*) AS entry_count FROM papersbyfaculty WHERE `Employee ID` = '$employee_id'";

											// Execute query
											$result = mysqli_query($conn, $sql);

											if ($result) {
												// Fetch the result row
												$row = mysqli_fetch_assoc($result);

												// Get the count of entries
												$entry_count = $row['entry_count'];

												echo "Papers: $entry_count";
											} else {
												echo 'Error executing query: ' . mysqli_error($conn);
											}

											// Close connection
											mysqli_close($conn);
										?>
										</div> <!-- Display count dynamically -->
										<a href="Reopapers.php" class="view-link">View <i class="ace-icon fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Amity</span>
							University&copy;						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<!-- <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>							</a> -->

							 							</a>

							 							</a>						</span>					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>			</a>		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>
	</body>
</html>
