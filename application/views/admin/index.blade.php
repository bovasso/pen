@layout('layouts/admin')
@section('scripts')
<script src="/public/admin/js/jquery.peity.min.js"></script>
<script src="/public/admin/js/unicorn.js"></script>
<script src="/public/admin/js/unicorn.dashboard.js"></script>
<script type="text/javascript" src="/public/admin/js/oocharts.min.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function () {
    oo.setOOId("07c7d10f89fc432f9e5d9607bb43f28a");    
    oo.load(function () {    
        var aid = "62855727";
        var startDate = new Date('{{$start_date}}');
        var endDate = new Date('{{$end_date}}');
        
        var tl = new oo.Timeline(aid, startDate, endDate);
        
        tl.addMetric('ga:visitors', 'Visits');
        tl.addMetric('ga:newVisits', 'New');

        tl.setOption('title', 'Visits Chart');
        tl.setOption('colors', ['orange', 'green', '#0072c6']);
        
        tl.draw('timeline-div');
    });   
}); 
</script>
@endsection
@section('content-header')
<div id="content-header">
	<h1>Dashboard</h1>
</div>
<div id="breadcrumb">
	<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
	<a href="#" class="current">Dashboard</a>
</div>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12 center" style="text-align: center;">					
			<ul class="stat-boxes">
				<li>
					<div class="left peity_bar_good"><span>2,4,9,7,12,10,12</span></div>
					<div class="right">
						<strong>{{$total_classes}}</strong>
						Classes
					</div>
				</li>
				<li>
					<div class="left peity_bar_good"><span>20,15,18,14,10,9,9,9</span></div>
					<div class="right">
						<strong>{{$total_students}}</strong>
						Students
					</div>
				</li>
				<li>
					<div class="left peity_line_good"><span>12,6,9,23,14,10,17</span></div>
					<div class="right">
						<strong>{{$total_teachers}}</strong>
						Teachers
					</div>
				</li>
			</ul>
		</div>	
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>Google Analytics</h5></div>
				<div class="widget-content">
					<div class="row-fluid">
					<div class="span12">
                            <center><div id="timeline-div"></div></center>
					</div>	
					</div>							
				</div>
			</div>					
		</div>
	</div>
</div>	
@endsection