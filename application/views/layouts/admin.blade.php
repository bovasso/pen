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
		
        <!-- <div id="search">
            <input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
        </div> -->
		<div id="user-nav" class="navbar">
            <ul class="nav btn-group">
                <li class="btn btn-inverse" ><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
                <!-- <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">new message</a></li>
                        <li><a class="sInbox" title="" href="#">inbox</a></li>
                        <li><a class="sOutbox" title="" href="#">outbox</a></li>
                        <li><a class="sTrash" title="" href="#">trash</a></li>
                    </ul>
                </li> -->
                <li class="btn btn-mini btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
                <li class="btn btn-mini btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
            
		<div id="sidebar">
			<a href="/admin" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
			<ul>
				<li @if ( $title == 'Dashboard' ) class="active" @endif><a href="/admin"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>
				<li @if ( $title == 'Course Schedule' ) class="active" @endif><a href="/admin/courses"><i class="icon icon-globe"></i> <span>Courses</span></a></li>				
				<li @if ( $title == 'Assignments' ) class="active" @endif><a href="/admin/assignments"><i class="icon icon-file"></i> <span>Assignments</span></a></li>								
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
		@yield('scripts')        		
		<script src="/public/admin/js/bootstrap.min.js"></script>		
	</body>
</html>
