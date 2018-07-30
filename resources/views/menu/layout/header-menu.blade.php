<!doctype html>
<html lang="en">

<head>
	<title>Simponi | Sistem Informasi Monitoring Pengajuan Opini</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ URL::asset('style-menu/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('style-menu/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('style-menu/assets/vendor/linearicons/style.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ URL::asset('style-menu/custom/modal/css/AdminLTE.min.css') }}">
	{{-- <link rel="stylesheet" href="style-menu/custom/modal/css/skins/_all-skins.min.css"> --}}
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ URL::asset('style-menu/assets/css/main.css') }}">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{ URL::asset('style-menu/custom/datepicker/datepicker3.css') }}">
	<!-- toastr -->
	<link rel="stylesheet" href="{{ URL::asset('style-custom/toastr/toastr.min.css') }}">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="{{ URL::asset('style-menu/custom/timepicker/bootstrap-timepicker.min.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ URL::asset('style-menu/assets/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('style-menu/assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('style-menu/assets/img/favicon.png') }}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand" style="padding:15px 30px;text-align: center">
				<a href="#"><!-- <img src="{{ URL::asset('style-login/images/bsb.jpeg') }}" width="80px" alt="Bank Bukopin Logo" class="img-responsive logo"> --> SISTEM INFORMASI MONITORING<br/> PENGAJUAN OPINI</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>{{ Session::get('name') }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/input_pengajuan" class=""><i class="lnr lnr-pencil"></i> <span>Input Pengajuan Opini</span></a></li>
						@if (Session::get('level')=='admin')
						<li><a href="/list_pengajuan" class=""><i class="lnr lnr-list"></i> <span>Update Opini</span></a></li>
						
						<li><a href="/list_pengajuan_all" class=""><i class="lnr lnr-checkmark-circle"></i> <span>Daftar Opini</span></a></li>
						@endif
						@if (Session::get('level')=='user')
						<li><a href="/list_pengajuan_user" class=""><i class="lnr lnr-list"></i> <span>Update Opini</span></a></li>
						<li><a href="/list_pengajuan_all_view" class=""><i class="lnr lnr-checkmark-circle"></i> <span>Daftar Opini</span></a></li>
						@endif
						<li><a href="/rekapitulasi" class=""><i class="lnr lnr-layers"></i> <span>Rekapitulasi Opini</span></a></li>
						<li><a href="/pengembalian" class=""><i class="lnr lnr-layers"></i> <span>List Pengembalian Opini</span></a></li>
						@if (Session::get('level')=='admin')
						<li><a href="/list_user" class=""><i class="lnr lnr-list"></i> <span>Edit User</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		@yield('main')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ URL::asset('style-menu/assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('style-menu/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('style-menu/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ URL::asset('style-menu/assets/scripts/klorofil-common.js') }}"></script>
	<!-- toastr -->
	<script src="{{ URL::asset('style-custom/toastr/toastr.min.js') }}"></script>
	<!-- bootstrap datepicker -->
	<script src="{{ URL::asset('style-menu/custom/datepicker/bootstrap-datepicker.js') }}"></script>
	<!-- bootstrap time picker -->
	<script src="{{ URL::asset('style-menu/custom/timepicker/bootstrap-timepicker.min.js') }}"></script>

	@yield('style')
</body>

</html>
