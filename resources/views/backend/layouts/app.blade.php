<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>@yield('title','Comet | Make your dastination')</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon.png')}}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        {{-- <link rel="stylesheet" href="{{asset('backend/assets/css/font-awesome.min.css')}}"> --}}
        <script src="https://kit.fontawesome.com/2ab099f38c.js" crossorigin="anonymous"></script>
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('backend/assets/css/feathericon.min.css')}}">
		
		<link rel="stylesheet" href="{{asset('backend/assets/plugins/morris/morris.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
		
		<!--[if lt IE 9]>
			<script src="backend/assets/js/html5shiv.min.js"></script>
			<script src="backend/assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
                @include('backend.layouts.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
                @include('backend.layouts.sidebar')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
                    @section('main')
                    @show
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('backend/assets/js/jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('backend/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{asset('backend/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		
		<script src="{{asset('backend/assets/plugins/raphael/raphael.min.js')}}"></script>    
		<script src="{{asset('backend/assets/plugins/morris/morris.min.js')}}"></script>  
		<script src="{{asset('backend/assets/js/chart.morris.js')}}"></script>
		
		<!-- Custom JS -->
		<script  src="{{asset('backend/assets/js/script.js')}}"></script>
		
    </body>

</html>