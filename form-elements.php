<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Research Papers - Amity University</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />

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
	</head>
    <?php
// Submit the following to the database
if($_SERVER['REQUEST_METHOD']=='POST') {
    $uni =  $_SESSION['university'];
    $department = $_SESSION['department'];
    $faculty = $_SESSION['user_name'];
    $empid = $_SESSION['employee_id'];
    $author = $_SESSION['user_name'];
    $coauthor = $_POST['corresponding_coauthor_name'];
    $booktitle = $_POST['paper_title'];
    $journalname = $_POST['journal_name'];
    $article = isset($_POST['article']) ? $_POST['article'] : '';
    $National = isset($_POST['National']) ? $_POST['National'] : '';
    $publicationdate = isset($_POST['publicationdate']) ? $_POST['publicationdate'] : '';
    $pubyear = isset($_POST['pubyear']) ? $_POST['pubyear'] : '';
    $edition = isset($_POST['edition']) ? $_POST['edition'] : '';
    $pagefrom = isset($_POST['pagefrom']) ? $_POST['pagefrom'] : '';
    $pageto = isset($_POST['pageto']) ? $_POST['pageto'] : '';
    $impact = isset($_POST['impact']) ? $_POST['impact'] : '';
    $scopus = isset($_POST['scopus']) ? $_POST['scopus'] : '';
    $listedin = isset($_POST['listedin']) ? $_POST['listedin'] : '';
    $wos = isset($_POST['wos']) ? $_POST['wos'] : '';
    $peer = isset($_POST['peer']) ? $_POST['peer'] : '';
    $issn = isset($_POST['issn']) ? $_POST['issn'] : '';
    $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : '';
    $pubname = isset($_POST['pubname']) ? $_POST['pubname'] : '';
    $affltn = isset($_POST['affltn']) ? $_POST['affltn'] : '';
    $corrauthor = isset($_POST['corrauthor']) ? $_POST['corrauthor'] : '';
    $citind = isset($_POST['citind']) ? $_POST['citind'] : '';
    $nocit = isset($_POST['nocit']) ? $_POST['nocit'] : '';
    $link = isset($_POST['link']) ? $_POST['link'] : '';
    $othrinfo = $_POST['othrinfo'];
    $ref = $_POST['ref'];
    $file_name = isset($_FILES['evdupload']['name']) ? $_FILES['evdupload']['name'] : '';
    $file_tmp = isset($_FILES['evdupload']['tmp_name']) ? $_FILES['evdupload']['tmp_name'] : '';

    // Move uploaded file to desired directory
    $upload_directory = 'uploads/';

    // Check if the directory to store files is available; if not, create it
    if (!is_dir($upload_directory)) {
        // Create the directory with permissions 0755
        if (!mkdir($upload_directory, 0755, true)) {
            die("Failed to create directory '$upload_directory'");
        }
    }

    $destination = $upload_directory . $file_name;

    if(move_uploaded_file($file_tmp, $destination)) {
        // File uploaded successfully
        // Save $destination to the database if you need to store the file path
        echo '<script>alert("File uploaded successfully")</script>';
    } else {
        // echo "Error uploading file.";
    }

    // Connection to database
    $servername="localhost";
    $username="root";
    $password="";
    $database="scholarsphere";
    $conn=mysqli_connect($servername,$username,$password,$database);

    if(!$conn) {
        die("The connection to DB wasn't established ".mysqli_connect_error($conn));
    }

    $sql="INSERT INTO `researchpapersbyfaculty` (`University`, `Department`, `Faculty`, `Employee ID`, `Author`, `Co-author`, `papertitle`, `journalname`, `article`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `impact`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `link`, `evdupload`, `othrinfo`, `ref`) VALUES ('$uni', '$department', '$faculty', '$empid', '$author', '$coauthor', '$booktitle', '$journalname', '$article', '$National', '$publicationdate', '$pubyear', '$edition', '$pagefrom', '$pageto', '$impact', '$scopus', '$listedin', '$wos', '$peer', '$issn', '$isbn', '$pubname', '$affltn', '$corrauthor', '$citind', '$nocit', '$link', '$destination', '$othrinfo', '$ref')";

    $result=mysqli_query($conn,$sql);
    if($result) {
        echo '<script>alert("Success! Your details were successfully saved")</script>';
    }
}
?>



	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index1.php" class="navbar-brand">
						<small>
							<i class=""></i>
							<img src= "amity_logo.png" alt="amity-logo" width="30" height="30">
							Amity University
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						 

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php
												if (isset($_SESSION['employee_id'])) {
													$employee_id = $_SESSION['employee_id'];
												
													$conn = new mysqli('localhost', 'root', '', 'scholarsphere');
												
													if ($conn->connect_error) {
														die("Connection failed: " . $conn->connect_error);
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
									<small>Welcome,</small>
									<?php echo $_SESSION['user_name']	?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.php">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
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

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="index1.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> View Reports </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

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

					<li class="active open">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Forms </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="active">
								<a href="form-elements.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Research Paper
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="form-elements-2.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Chapters in Edited Volumes
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="form-wizard.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Papers in Conference Proceeding
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="books.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Books Published
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>

					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Forms</a>
							</li>
							<li class="active">Research Paper</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Research Paper
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Common form elements and layouts
								</small>
							</h1>
						</div><!-- /.page-header -->
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="form-elements.php" enctype="multipart/form-data">
								<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> University </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1" name="university" placeholder="Enter University Name" class="col-xs-10 col-sm-5" value="<?php echo $_SESSION['university']?>"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Department </label>
								<div class="col-sm-9">
									<input type="text" id="form-field-1-1" name="department" placeholder="Enter Department Name" class="col-xs-10 col-sm-5" value="<?php echo $_SESSION['department']?>" />
								</div>
							</div>
							<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-4"> Author's Name </label>
										<div class="col-sm-9">
										<input type="text" id="form-field-1-1" name="author_name" placeholder="Enter Author's Name" class="col-xs-10 col-sm-5" value="<?php echo $_SESSION['user_name']?>" />
                                        </div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-5"> Corresponding/Co-author's Name </label>
										<div class="col-sm-9">
											<div class="clearfix">
												<input type="text" id="form-field-5" name="corresponding_coauthor_name" placeholder="Enter Corresponding/Co-author's Name" class="col-xs-10 col-sm-5" />
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> Title of Paper </label>
										<div class="col-sm-9">
											<input type="text" name="paper_title" placeholder="Enter Title of Paper" class="col-xs-10 col-sm-5" />
											<div class="space-2"></div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> Name of Journal </label>
										<div class="col-sm-9">
											<input type="text" name="journal_name" placeholder="Enter Name of Journal" class="col-xs-10 col-sm-5" />
											<div class="space-2"></div>
										</div>
									</div>
									
									
									
									<div class="hr hr-24"></div>
									
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Research Paper/Article Submission</h4>
													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</div>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<div>
															<label for="research-paper">Research Paper/Article or anything which you would like to mention</label>
															<textarea class="form-control" name="article" id="research-paper" placeholder="Enter Research Paper/Article"></textarea>
														</div>
														<hr />
														<div>
															<label for="publisher">Name of Publisher</label>
															<input type="text" name ="pubname" class="form-control" id="publisher" placeholder="Enter Name of Publisher">
														</div>
														<hr />
														<div>
															<label for="institutional-affiliations">Institutional Affiliations</label>
															<input type="text" name="affltn" class="form-control" id="institutional-affiliations" placeholder="Enter Institutional Affiliations">
														</div>
														<hr />
														<div>
															<label for="corresponding-author">Corresponding Author</label>
															<input type="text" name="corrauthor" class="form-control" id="corresponding-author" placeholder="Enter Corresponding Author">
														</div>
														<hr />
														<div>
															<label for="additional-info">Any Other Information</label>
															<textarea class="form-control" name="othrinfo" id="additional-info" placeholder="Enter Any Other Information"></textarea>
														</div>
														<hr />
														<div>
															<label for="reference">Reference</label>
															<textarea class="form-control" name="ref" id="reference" placeholder="Enter Reference"></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Publication Details</h4>
													<span class="widget-toolbar">
														<a href="#" data-action="settings">
															<i class="ace-icon fa fa-cog"></i>
														</a>
														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</span>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<div>
															<label for="volume-edition">Volume/Edition</label>
															<input class="form-control" name="edition" type="number" id="volume-edition" placeholder="Enter Volume/Edition" />
														</div>
														<hr />
														<div>
															<label for="issn">ISSN</label>
															<input class="form-control" name="issn" type="text" id="issn" placeholder="Enter ISSN" />
														</div>
														<hr />
														<div>
															<label for="isbn">ISBN</label>
															<input class="form-control" name="isbn" type="text" id="isbn" placeholder="Enter ISBN" />
														</div>
														<hr />
														<div>
															<label for="citation-index">Citation Index</label>
															<input class="form-control" name="citind" type="number" id="citation-index" placeholder="Enter Citation Index" />
														</div>
														<hr />
														<div>
															<label for="num-citations">Number of Citations</label>
															<input class="form-control" name = "nocit" type="number" id="num-citations" placeholder="Enter Number of Citations" />
														</div>
														<hr />
														<div>
															<label for="impact-factor">Impact Factor</label>
															<input class="form-control" name="impact" type="text" id="impact-factor" placeholder="Enter Impact Factor" />
														</div>
														<hr />
														<div>
															<label for="ugc-recognition-link">UGC Recognition Link</label>
															<input class="form-control" name="link" type="url" id="ugc-recognition-link" placeholder="Enter UGC Recognition Link" />
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Publication Details</h4>
													<span class="widget-toolbar">
														<a href="#" data-action="settings">
															<i class="ace-icon fa fa-cog"></i>
														</a>
														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</span>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<div>
															<label for="region">Region</label>
															<select class="form-control" id="region" name="National" >
																<option value=""></option>
																<option value="national">National</option>
																<option value="international">International</option>
															</select>
														</div>
														<hr />
														<div>
															<label for="listing">Listing</label>
															<select class="form-control" id="listing" name="listedin">
																<option value=""></option>
																<option value="ugc">UGC</option>
																<option value="pubmed">PubMed</option>
																<option value="ici">ICI</option>
																<option value="others">Others</option>
															</select>
														</div>
													</div>
												</div>
												
											</div>
									<br>
									<br>
									</div>
									
									<div class="space-24"></div>
									
									<h3 class="header smaller lighter blue">
										Peer Review & Listings
										<small>Peer Review Status and Listing Information</small>
									</h3>
									
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<div class="control-group">
												<label class="control-label bolder blue" name="peer">Peer Reviewed</label>
												<div class="radio inline">
													<label>
														<input name="peer" type="radio" class="ace" value="y" />
														<span class="lbl"> Yes</span>
													</label>
												</div>
												<div class="radio inline">
													<label>
														<input name="peer" type="radio" class="ace" value="n" />
														<span class="lbl"> No</span>
													</label>
												</div>
											</div>
										</div>
										<br>
										<br>
										<div class="col-xs-12 col-sm-4">
											<div class="control-group">
												<label class="control-label bolder blue" name="wos">Listed in Web of Science (Thomas Reuters) (Clarivate Analytics)</label>
												<div class="radio inline">
													<label>
														<input name="wos" type="radio" class="ace" value="y" />
														<span class="lbl"> Yes</span>
													</label>
												</div>
												<div class="radio inline">
													<label>
														<input name="wos" type="radio" class="ace" value="n" />
														<span class="lbl"> No</span>
													</label>
												</div>
											</div>
										</div>
										<br>
										<br>
										
										<div class="col-xs-12 col-sm-4">
											<div class="control-group">
												<label class="control-label bolder blue" name="scopus">Listed in Scopus</label>
												<div class="radio inline">
													<label>
														<input name="scopus" type="radio" class="ace" value="y" />
														<span class="lbl"> Yes</span>
													</label>
												</div>
												<div class="radio inline">
													<label>
														<input name="scopus" type="radio" class="ace" value="n" />
														<span class="lbl"> No</span>
													</label>
												</div>
											</div>
										</div>
									</div>
									
									
									<!-- /.row -->

									<hr />
									<!-- <div class="form-group">
										<label class="control-label col-xs-12 col-sm-3">On/Off Switches</label>

										<div class="controls col-xs-12 col-sm-9">
											<div class="row">
												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-2" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch" type="checkbox" />
														<span class="lbl" data-lbl="CUS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOM"></span>
													</label>
												</div>
											</div>

											<div class="row">
												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-4" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-7" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>
											</div>

											<div class="row">
												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch btn-rotate" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-4 btn-flat" type="checkbox" />
														<span class="lbl"></span>
													</label>
												</div>
											</div>
										</div>
									</div> -->

									<!-- <hr /> -->
									<div class="row">
										<div class="col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Evidence (Upload)</h4>
													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</div>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<div class="form-group">
															<div class="col-xs-12">
																<input type="file" id="id-input-file-2" name="evdupload" />
															</div>
														</div>
														<div class="form-group">
															<div class="col-xs-12">
																<input multiple="" type="file" id="id-input-file-3" />
															</div>
														</div>
														<label>
															<input type="checkbox" name="file-format" id="id-file-format" class="ace" />
															<span class="lbl"> Allow only images</span>
														</label>
													</div>
												</div>
											</div>
										
										
										</div>
										<div class="col-sm-4">
										<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Publication Details</h4>

<span class="widget-toolbar">
    <a href="#" data-action="settings">
        <i class="ace-icon fa fa-cog"></i>
    </a>
    <a href="#" data-action="reload">
        <i class="ace-icon fa fa-refresh"></i>
    </a>
    <a href="#" data-action="collapse">
        <i class="ace-icon fa fa-chevron-up"></i>
    </a>
    <a href="#" data-action="close">
        <i class="ace-icon fa fa-times"></i>
    </a>
</span>

<div class="widget-body">
    <div class="widget-main">
        <div>
            <label for="publication-date">Publication Date</label>
            <div class="input-group">
                <input class="form-control date-picker" id="publication-date" name="publicationdate" type="text" data-date-format="yyyy-mm-dd" />
                <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                </span>
            </div>
        </div>

        <hr />

        <div>
            <label for="publication-year">Publication Year</label>
            <input class="form-control" type="number" id="publication-year" name="pubyear" placeholder="Enter Publication Year" />
        </div>

        <hr />

        <div class="row">
            <div class="col-xs-6">
                <label for="page-from">Page From</label>
                <input class="form-control" type="number" id="page-from" name="pagefrom" placeholder="Enter Page From" />
            </div>

            <div class="col-xs-6">
                <label for="page-to">Page To</label>
                <input class="form-control" type="number" id="page-to" name="pageto" placeholder="Enter Page To" />
            </div>
</div>
														</div>
													</div>
												</div>
											</div>
</div>
										<!-- <div class="col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">jQuery UI Sliders</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="row">
															<div class="col-xs-3 col-md-2">
																<div id="slider-range"></div>
															</div>

															<div class="col-xs-9 col-md-10">
																<div id="slider-eq">
																	<span class="ui-slider-green ui-slider-small">77</span>
																	<span class="ui-slider-red">55</span>
																	<span class="ui-slider-purple" data-rel="tooltip" title="Disabled!">33</span>
																	<span class="ui-slider-simple ui-slider-orange">40</span>
																	<span class="ui-slider-simple ui-slider-dark">88</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div> -->

										<!-- <div class="col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Spinners</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<input type="text" id="spinner1" />
														<div class="space-6"></div>

														<input type="text" class="input-sm" id="spinner2" />
														<div class="space-6"></div>

														<input type="text" id="spinner3" />
														<div class="space-6"></div>

														<input type="text" class="input-lg" id="spinner4" />
													</div>
												</div>
											</div>
										</div> -->
									</div>

									<!-- <hr /> -->
									<!-- <div class="row"> -->
										<!-- <div class="col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Publication Details</h4>

<span class="widget-toolbar">
    <a href="#" data-action="settings">
        <i class="ace-icon fa fa-cog"></i>
    </a>
    <a href="#" data-action="reload">
        <i class="ace-icon fa fa-refresh"></i>
    </a>
    <a href="#" data-action="collapse">
        <i class="ace-icon fa fa-chevron-up"></i>
    </a>
    <a href="#" data-action="close">
        <i class="ace-icon fa fa-times"></i>
    </a>
</span>

<div class="widget-body">
    <div class="widget-main">
        <div>
            <label for="publication-date">Publication Date</label>
            <div class="input-group">
                <input class="form-control date-picker" id="publication-date" name="publicationdate" type="text" data-date-format="yyyy-mm-dd" />
                <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                </span>
            </div>
        </div>

        <hr />

        <div>
            <label for="publication-year">Publication Year</label>
            <input class="form-control" type="number" id="publication-year" name="pubyear" placeholder="Enter Publication Year" />
        </div>

        <hr />

        <div class="row">
            <div class="col-xs-6">
                <label for="page-from">Page From</label>
                <input class="form-control" type="number" id="page-from" name="pagefrom" placeholder="Enter Page From" />
            </div>

            <div class="col-xs-6">
                <label for="page-to">Page To</label>
                <input class="form-control" type="number" id="page-to" name="pageto" placeholder="Enter Page To" />
            </div>
</div>
														</div>
													</div>
												</div>
											</div>
										</div> -->
									
									
										<!-- <div class="col-sm-4"> -->
											<!-- <div class="widget-box"> -->
												<!-- <div class="widget-header">
													 <h4 class="widget-title">
														<i class="ace-icon fa fa-tint"></i>
														Color Picker
													</h4> 
												</div> -->

												<!-- <div class="widget-body"> -->
													<!-- <div class="widget-main"> -->
														<!-- <div class="clearfix">
															<label for="colorpicker1">Color Picker</label>
														</div> -->

														<!-- <div class="control-group">
															 <div class="bootstrap-colorpicker">
																<input id="colorpicker1" type="text" class="input-small" />
															</div> 
														</div>

														<hr /> -->

														<!-- <div>
															<label for="simple-colorpicker-1">Custom Color Picker</label>

															<select id="simple-colorpicker-1" class="hide">
																<option value="#ac725e">#ac725e</option>
																<option value="#d06b64">#d06b64</option>
																<option value="#f83a22">#f83a22</option>
																<option value="#fa573c">#fa573c</option>
																<option value="#ff7537">#ff7537</option>
																<option value="#ffad46" selected="">#ffad46</option>
																<option value="#42d692">#42d692</option>
																<option value="#16a765">#16a765</option>
																<option value="#7bd148">#7bd148</option>
																<option value="#b3dc6c">#b3dc6c</option>
																<option value="#fbe983">#fbe983</option>
																<option value="#fad165">#fad165</option>
																<option value="#92e1c0">#92e1c0</option>
																<option value="#9fe1e7">#9fe1e7</option>
																<option value="#9fc6e7">#9fc6e7</option>
																<option value="#4986e7">#4986e7</option>
																<option value="#9a9cff">#9a9cff</option>
																<option value="#b99aff">#b99aff</option>
																<option value="#c2c2c2">#c2c2c2</option>
																<option value="#cabdbf">#cabdbf</option>
																<option value="#cca6ac">#cca6ac</option>
																<option value="#f691b2">#f691b2</option>
																<option value="#cd74e6">#cd74e6</option>
																<option value="#a47ae2">#a47ae2</option>
																<option value="#555">#555</option>
															</select>
														</div> -->
													<!-- </div> -->
												<!-- </div> -->
											<!-- </div> -->
										<!-- </div> -->

										<!-- <div class="col-sm-4"> -->
											<!-- <div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">
														<i class="ace-icon fa fa-tachometer"></i>
														Knob Input
													</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="control-group">
															<div class="row">
																<div class="col-xs-6 center">
																	<div class="knob-container inline">
																		<input type="text" class="input-small knob" value="15" data-min="0" data-max="100" data-step="10" data-width="80" data-height="80" data-thickness=".2" />
																	</div>
																</div>

																<div class="col-xs-6  center">
																	<div class="knob-container inline">
																		<input type="text" class="input-small knob" value="41" data-min="0" data-max="100" data-width="80" data-height="80" data-thickness=".2" data-fgcolor="#87B87F" data-displayprevious="true" data-anglearc="250" data-angleoffset="-125" />
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-xs-12 center">
																	<div class="knob-container inline">
																		<input type="text" class="input-small knob" value="1" data-min="0" data-max="10" data-width="150" data-height="150" data-thickness=".2" data-fgcolor="#B8877F" data-angleoffset="90" data-cursor="true" />
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div> -->
										<!-- </div> -->
									<!-- </div> -->
									<div class="clearfix form-actions">
									<div class="col-md-offset-4 col-md-8">
                                        <button class="btn btn-info" type="submit" name="submit">
                                           <i class="ace-icon fa fa-check bigger-110"></i>
                                              Submit
                                        </button>
                                       </div>
									
											<!-- &nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div> -->
									
								</form>

								<!-- <div class="hr hr-18 dotted hr-double"></div> -->

								<!-- <h4 class="pink">
									<i class="ace-icon fa fa-hand-o-right green"></i>
									<a href="#modal-form" role="button" class="blue" data-toggle="modal"> Form Inside a Modal Box </a>
								</h4> -->

								<!-- <div class="hr hr-18 dotted hr-double"></div> -->
								<!-- <h4 class="header green">Form Layouts</h4> -->

								<div class="row">
									<!-- <div class="col-sm-5"> -->
										<!-- <div class="widget-box"> -->
											<!-- <div class="widget-header">
												<h4 class="widget-title">Default</h4>
											</div> -->

											<!-- <div class="widget-body"> -->
												<!-- <div class="widget-main no-padding">
													<form>
														 <legend>Form</legend> 
														<fieldset>
															 <label>Label name</label> 

															 <input type="text" placeholder="Type something&hellip;" />
															<span class="help-block">Example block-level help text here.</span>

															<label class="pull-right">
																<input type="checkbox" class="ace" />
																<span class="lbl"> check me out</span>
															</label> 
														</fieldset>

														 <div class="form-actions center">
															<button type="button" class="btn btn-sm btn-success">
																Submit
																<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
															</button>
														</div> 
													</form>
												</div> -->
											<!-- </div> -->
										<!-- </div> -->
									<!-- </div> -->

									<!-- <div class="col-sm-7"> -->
										<!-- <div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Inline Forms</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<form class="form-inline">
														<input type="text" class="input-small" placeholder="Username" />
														<input type="password" class="input-small" placeholder="Password" />
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> remember me</span>
														</label>

														<button type="button" class="btn btn-info btn-sm">
															<i class="ace-icon fa fa-key bigger-110"></i>Login
														</button>
													</form>
												</div>
											</div>
										</div> -->

										<!-- <div class="space-6"></div> -->

										<!-- <div class="widget-box">
											<div class="widget-header widget-header-small">
												<h5 class="widget-title lighter">Search Form</h5>
											</div> -->

											<!-- <div class="widget-body">
												<div class="widget-main">
													<form class="form-search">
														<div class="row">
															<div class="col-xs-12 col-sm-8">
																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="ace-icon fa fa-check"></i>
																	</span>

																	<input type="text" class="form-control search-query" placeholder="Type your query" />
																	<span class="input-group-btn">
																		<button type="button" class="btn btn-purple btn-sm">
																			<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
																			Search
																		</button>
																	</span>
																</div>

																<div class="hr"></div>

																<div class="input-group input-group-lg">
																	<span class="input-group-addon">
																		<i class="ace-icon fa fa-check"></i>
																	</span>

																	<input type="text" class="form-control search-query" placeholder="Type your query" />
																	<span class="input-group-btn">
																		<button type="button" class="btn btn-default btn-lg">
																			<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
																			Search
																		</button>
																	</span>
																</div>

																<div class="hr"></div>

																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="ace-icon fa fa-check"></i>
																	</span>

																	<input type="text" class="form-control search-query" placeholder="Type your query" />
																	<span class="input-group-btn">
																		<button type="button" class="btn btn-inverse btn-white">
																			<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
																			Search
																		</button>
																	</span>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div> -->
									<!-- </div> -->
								</div>

								<div id="modal-form" class="modal" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">Please fill the following form fields</h4>
											</div>

											<div class="modal-body">
												<div class="row">
													<div class="col-xs-12 col-sm-5">
														<div class="space"></div>

														<input type="file" />
													</div>

													<div class="col-xs-12 col-sm-7">
														<div class="form-group">
															<label for="form-field-select-3">Location</label>

															<div>
																<select class="chosen-select" data-placeholder="Choose a Country...">
																	<option value="">&nbsp;</option>
																	<option value="AL">Alabama</option>
																	<option value="AK">Alaska</option>
																	<option value="AZ">Arizona</option>
																	<option value="AR">Arkansas</option>
																	<option value="CA">California</option>
																	<option value="CO">Colorado</option>
																	<option value="CT">Connecticut</option>
																	<option value="DE">Delaware</option>
																	<option value="FL">Florida</option>
																	<option value="GA">Georgia</option>
																	<option value="HI">Hawaii</option>
																	<option value="ID">Idaho</option>
																	<option value="IL">Illinois</option>
																	<option value="IN">Indiana</option>
																	<option value="IA">Iowa</option>
																	<option value="KS">Kansas</option>
																	<option value="KY">Kentucky</option>
																	<option value="LA">Louisiana</option>
																	<option value="ME">Maine</option>
																	<option value="MD">Maryland</option>
																	<option value="MA">Massachusetts</option>
																	<option value="MI">Michigan</option>
																	<option value="MN">Minnesota</option>
																	<option value="MS">Mississippi</option>
																	<option value="MO">Missouri</option>
																	<option value="MT">Montana</option>
																	<option value="NE">Nebraska</option>
																	<option value="NV">Nevada</option>
																	<option value="NH">New Hampshire</option>
																	<option value="NJ">New Jersey</option>
																	<option value="NM">New Mexico</option>
																	<option value="NY">New York</option>
																	<option value="NC">North Carolina</option>
																	<option value="ND">North Dakota</option>
																	<option value="OH">Ohio</option>
																	<option value="OK">Oklahoma</option>
																	<option value="OR">Oregon</option>
																	<option value="PA">Pennsylvania</option>
																	<option value="RI">Rhode Island</option>
																	<option value="SC">South Carolina</option>
																	<option value="SD">South Dakota</option>
																	<option value="TN">Tennessee</option>
																	<option value="TX">Texas</option>
																	<option value="UT">Utah</option>
																	<option value="VT">Vermont</option>
																	<option value="VA">Virginia</option>
																	<option value="WA">Washington</option>
																	<option value="WV">West Virginia</option>
																	<option value="WI">Wisconsin</option>
																	<option value="WY">Wyoming</option>
																</select>
															</div>
														</div>

														<div class="space-4"></div>

														<div class="form-group">
															<label for="form-field-username">Username</label>

															<div>
																<input type="text" id="form-field-username" placeholder="Username" value="alexdoe" />
															</div>
														</div>

														<div class="space-4"></div>

														<div class="form-group">
															<label for="form-field-first">Name</label>

															<div>
																<input type="text" id="form-field-first" placeholder="First Name" value="Alex" />
																<input type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Cancel
												</button>

												<button class="btn btn-sm btn-primary">
													<i class="ace-icon fa fa-check"></i>
													Save
												</button>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
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
							University &copy;
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							 
							</a>

							 
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

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
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
			
				autosize($('textarea[class*=autosize]'));
				
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
					
					
					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//console.log($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			
				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			
				
				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
				//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
					
					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
				}
				
				
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					autosize.destroy('textarea[class*=autosize]')
					
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
		</script>
	</body>
</html>
