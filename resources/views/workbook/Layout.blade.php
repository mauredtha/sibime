<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sibime</title>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/font-awesome.min.css" rel="stylesheet">
	<link href="/css/datepicker3.css" rel="stylesheet">
	<link href="/css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Si</span>bime</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
				<div class="profile-usertitle-status">{{ Auth::user()->email }}</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="{{ route('home') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{ route('classes.index') }}"><em class="fa fa-calendar">&nbsp;</em> Kelas</a></li>
			<li><a href="{{ route('courses.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> Mata Pelajaran</a></li>
			<li class="active"><a href="{{ route('workbooks.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> Buku Kerja</a></li>
			<li><a href="{{ route('logout') }}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{ route('home') }}">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"><a href="{{ route('workbooks.index') }}">
					Buku Kerja
				</a></li>
			</ol>
		</div><!--/.row-->
			
        <div class="panel panel-default">
            <div class="panel-heading">
                Buku Kerja
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    @yield('content')
                    <br />
                    <br />
                </div>
            </div>
		</div><!-- /.panel-->
		
		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="/js/jquery-1.11.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/chart.min.js"></script>
	<script src="/js/chart-data.js"></script>
	<script src="/js/easypiechart.js"></script>
	<script src="/js/easypiechart-data.js"></script>
	<script src="/js/bootstrap-datepicker.js"></script>
	<script src="/js/custom.js"></script>
		
</body>
</html>