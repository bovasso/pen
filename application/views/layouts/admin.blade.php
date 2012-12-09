<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Penpal News Admin Panel</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="/public/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/public/admin/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="/public/admin/css/unicorn.main.css" />
		<link rel="stylesheet" href="/public/admin/css/unicorn.grey.css" class="skin-color" />
		@yield('styles')
	</head>
	<body>
		
		
		<div id="header">
			<h1><a href="/admin">PenPal News Admin Panel</a></h1>		
		</div>
		<div id="user-nav" class="navbar">
            <ul class="nav btn-group">
                <!-- <li class="btn btn-inverse" ><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
                <li class="btn btn-mini btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li> -->
                <li class="btn btn-mini btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
            
		<div id="sidebar">
			<a href="/admin" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
			<ul>
				<li @if ( $title == 'Dashboard' ) class="active" @endif><a href="/admin"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>                             
				<li @if ( $title == 'Topics' ) class="active" @endif><a href="/admin/topics"><i class="icon icon-book"></i> <span>Topics</span></a></li>								
				<li @if ( $title == 'Course Schedule' ) class="active" @endif><a href="/admin/courses"><i class="icon icon-globe"></i> <span>Courses</span></a></li>				
				<li @if ( $title == 'Assignments' ) class="active" @endif><a href="/admin/assignments"><i class="icon icon-file"></i> <span>Assignments</span></a></li>		
				<li @if ( $title == 'Schools' ) class="active" @endif><a href="/admin/schools"><i class="icon icon-pencil"></i> <span>Schools</span></a></li>										
				<li @if ( $title == 'Classes' ) class="active" @endif><a href="/admin/classes"><i class="icon icon-pencil"></i> <span>Classes</span></a></li>				
				<li @if ( $title == 'Group Codes' ) class="active" @endif><a href="/admin/groups"><i class="icon icon-barcode"></i> <span>Group Codes</span></a></li>								
				<li @if ( $title == 'Users' ) class="active" @endif><a href="/admin/users"><i class="icon icon-user"></i> <span>Users</span></a></li>
			</ul>
		
		</div>		
		
		<div id="content">            
		    @yield('content-header')  
            @yield('content')		
		</div>
		<div class="row-fluid">
			<div id="footer" class="span12">
				PenPal News &copy;
			</div>
		</div>
		<script src="/assets/grocery_crud/js/jquery-1.8.2.min.js"></script>
		<script src="/assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.9.0.custom.min"></script>
		@yield('scripts')        		
		<script src="/public/admin/js/bootstrap.min.js"></script>	
		<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                // $("#save-and-go-back-button").on('click', function(event) {
                //     event.preventDefault();
                //     history.back();
                // });
            });
        </script>	
	</body>
</html>
