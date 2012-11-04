@layout('layouts/main')  
@section('stylesheets')
<style type="text/css" media="screen">
    #slider-code { height: 125px; overflow:hidden; }
    #slider-code .viewport { float: left; width: 240px; height: 125px; overflow: hidden; position: relative; }
    #slider-code .buttons { display: block; margin: 30px 10px 0 0; float: left; }
    #slider-code .next { margin: 30px 0 0 10px;  }
    #slider-code .disable { visibility: hidden; }
    #slider-code .overview { list-style: none; position: absolute; padding: 0; margin: 0; left: 0; top: 0; }
    #slider-code .overview li{ float: left; margin: 0 20px 0 0; padding: 1px; height: 121px; border: 1px solid #dcdcdc; width: 236px;}
</style>
@endsection
@section('scripts')      
<script src="https://api.filepicker.io/v1/filepicker.js"></script>                  
<script type="text/javascript" src="/public/js/jcarousellite_1.0.1.min.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {                                           
        // $(".avatar_carousel").jCarouselLite({
        //        btnNext: ".btn-next",
        //        btnPrev: ".btn-prev",
        //        visible: "3.5"
        // });          
        $("#filepicker").on('change', function(event) {
            var file = event.originalEvent.fpfile.url;
            var file = file + "/convert?w=70&h70&format=png";
            $.get('/student/profile/change_avatar', {avatar : file, custom: true}, function(data) {
                window.location.reload(); // reload page
            })
        });
                
        $('.avatar').on('click', function(event) {
            event.preventDefault();
            var avatar = $(this).data('avatar');
            $.get('/student/profile/change_avatar', {avatar : avatar, custom: false}, function(data) {
               window.location.reload(); // reload page
            })            
        });
    });
</script>
@endsection
@section('content')
<div class="wrapper" id="profile">
	<h1>{{$user->first_name}}&nbsp;{{$user->last_name}}</h1>
	<div class="profile_container">
		<div class="left w40">
			<div class="profile-box w100">
				<h3>PROFILE PICTURE</h3>
				<div id="profile-image" class="left w40">
					<a href="#" class="avatar a144">
						<span class="frame">&nbsp;</span>
						@if( $user->avatar )
						<img src="{{$user->avatar}}" class="" alt="{{$user->full_name}}" title="{{$user->full_name}}" />
						@endif						
					</a>
				</div>
				<div class="right w60">
					<div class="btn-wrapper">
					    <input id="filepicker" type="filepicker" class="btn" data-fp-apikey="ApSNNuWRoSnoPd5JDf5gcz" data-fp-container="modal" data-fp-services="COMPUTER,FACEBOOK,FLICKR,INSTAGRAM,WEBCAM"/>                      
					</div>
					<p class="help">Upload or Select an Avatar Below</p>
				</div>            
				<div class="carousel w100">
                    <!-- <div class="carousel-btn"><a id="btn-prev-carousel" class="btn-prev ir">Prev</a></div> -->
                       <div class="avatar_carousel">
    					<ul>
    						<li>
    							<a href="#" data-avatar="pink" class="avatar a64">
    								<span class="frame">&nbsp;</span>
    								<img src="/public/images/default_avatars/pink144.jpg" class=""/>
    							</a>
    						</li>
    						<li>
    							<a href="#" data-avatar="lime"  class="avatar a64">
    								<span class="frame">&nbsp;</span>
    								<img src="/public/images/default_avatars/lime144.jpg" class=""/>
    							</a>
    						</li>
    						<li>
    							<a href="#" data-avatar="lav" class="avatar a64">
    								<span class="frame">&nbsp;</span>
    								<img src="/public/images/default_avatars/lav144.jpg" class=""/>
    							</a>
    						</li>
    						<li>
    							<a href="#" data-avatar="aqua" class="avatar a64">
    								<span class="frame">&nbsp;</span>
    								<img src="/public/images/default_avatars/aqua144.jpg" class=""/>
    							</a>
    						</li>
    					</ul>
    				   </div>                                                                       
                    <!-- <div class="carousel-btn"><a id="btn-next-carousel" class="btn-next ir">Next</a></div> -->
				</div>
			</div> <!-- end Profile Avatar -->

            <!-- <div class="profile-box w100">
                <h3>Join A New Session</h3>
                <form id="join_profile">
                    <input type="text" class="text clear-value left" name="groupCode" id="group-code" placeholder="Enter Group Code" />
                    <div class="btn-wrapper left"><input type="submit" class="submit btn" value="Join" /></div>
                 </form>
            </div> -->
			<!-- end Join Session -->

		</div><!-- end Left Column-->

		<div class="right w50">
			<div class="profile-box w100">
				<h3>About</h3>
				
				<?php echo $this->formbuilder->open( '/student/profile/save', array('id'=>'join_profile')) ?>    	            
        	    
					<textarea class="w100" rows="10" name="about_me" value="{{$user->about_me}}">{{$user->about_me}}</textarea>
					<div class="btn-wrapper right"><input type="submit" class="btn" value="Save" /></div>
                </form>
			</div>
			<div class="profile-box w100">
				<h3>Your Info</h3>
				<div class="left w50">
					<ul>
						<li>
							<label>Name:</label>
							<p class="edit">{{$user->first_name}}&nbsp;{{$user->last_name}}<br/><a href="/account/edit_name" class="profile-edit">Edit</a></p>
						</li>
						<li>
							<label>Username:</label>
							<p>{{$user->username}}<br/><a href="/account/change_password" class="profile-edit">Change Password</a></p>
						</li>
					</ul>
				
				</div>
				<div class="right w50">
					<ul>
						<li><label>School:</label>&nbsp;{{$user->school->name}}</li>
						<li><label>Class:</label>&nbsp;{{$user->classroom->name}}</li>
					</ul>
				</div>
			</div>

		</div><!-- end Right Column-->

	</div>
	<!-- end Main Container -->
</div>
@endsection