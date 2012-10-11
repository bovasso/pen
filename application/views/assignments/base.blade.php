@layout('layouts/main')
@section('content')
<?php echo $this->ci_alerts->display() ?>
<div class="wrapper" id="assignments">
	<h1>All Assignments</h1>
	<div id="assignment-tabs" class="tabs">
		<ul>
			<li class="assignment-tab-1"><a class="nav-link" href="/assignments"><span>1.</span>select a news story</a></li>
			<li class="assignment-tab-2"><a class="nav-link" href="#"><span>2.</span>answer the questions</a></li>
			<li class="assignment-tab-3"><a class="nav-link" href="#"><span>3.</span>comment on your penpals answers</a></li>
		</ul>
		<div id="assignment-tabs-1" class="tab">
			    @yield('overview')
		</div><!-- end Assignment Tab 1 -->

		<div id="assignment-tabs-2" class="tab">
                @yield('article')
		</div><!-- end Assignment Tab 2 -->

		<div id="assignment-tabs-3" class="tab">
			    @yield('comment')
		</div>
	</div>
</div>
@endsection
