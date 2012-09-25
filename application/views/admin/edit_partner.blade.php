@layout('layouts/admin')
<div id="content-header">
	<h1>Course Schedule</h1>
</div>
<div id="breadcrumb">
 <?php echo set_breadcrumb(); ?>
</div>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row-fluid">
		<div class="widget-box">
			<div class="widget-content nopadding">
                <div style="margin-left: 20px" class="row-fluid">
                <h4>Classes and Students <small><em>Assigned</em></small></h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>School</th>
                            <th>Name</th>
                            <th>State</th>                            
                            <th>Size</th>
                            <th>Assign</th>                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr><td>{{$class->school}}</td><td>{{$class->name}}</td><td>{{$class->state}}</td><td>{{$class->class_size}}</td><td><a href="#" data-class="{{$class->id}}" class="assign_class btn btn-info">Assign Class</a></td></tr>                            
                                <tr><td>---</td></tr>
                                @foreach ($class->users as $user)
                                    <tr><td>{{$user->email}}</td><td></td></tr>                            
                                @endforeach                                
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="margin-left: 20px" class="row-fluid">
                <h4>Classes and Students <small><em>unassigned</em></small></h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>School</th>
                            <th>Name</th>
                            <th>State</th>                            
                            <th>Size</th>
                            <th>Assign</th>                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr><td>{{$class->school}}</td><td>{{$class->name}}</td><td>{{$class->state}}</td><td>{{$class->class_size}}</td><td><a href="#" data-class="{{$class->id}}" class="assign_class btn btn-info">Assign Class</a></td></tr>                            
                                <tr><td>---</td></tr>
                                @foreach ($class->users as $user)
                                    <tr><td>{{$user->email}}</td><td></td></tr>                            
                                @endforeach                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection