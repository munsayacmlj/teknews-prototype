@extends('layouts.app')

@section('content')

<div class="container user-page pt-5 pb-4 mt-4">
	<div class="row px-2">
		<div class="col col-sm-4 col-md-3 center">
			<img src="{!! $profile->getPhotoPath() !!}">
		</div>
		
		<div class="col col-sm-8 col-md-5 profile-details">
			<h1>{{ $profile->name }}</h1>
			<p>{{ $profile->userDetail->bio }}</p>
			@if ( $profile->name != Auth::user()->name )
				@if ( in_array($profile->id, $following) )
					<a href="#" class="px-3 py-2 btn btn-warning unfollow-user-btn" data-user="{{ $profile->name }}" data-id="{{ $profile->id }}" id="uf-btn-{{ $profile->id }}"><i class="fas fa-user-times"></i> Unfollow</a>
				@else
				  <a href="#" class="px-3 py-2 btn btn-info follow-user-btn" data-user="{{ $profile->name }}" data-id="{{ $profile->id }}" id="f-btn-{{ $profile->id }}"><i class="fas fa-user-plus"></i> Follow</a>
				@endif
			@endif
		</div>

		<div class="d-sm-none d-md-block col col-md-2">
			@if (!empty($profile->userDetail->age))
			<div class="user-age pt-4">
				<label><strong>Age:</strong></label>
				<span>{{ $profile->userDetail->age }}</span>
			</div>
			@endif
			@if (!empty($profile->userDetail->location))
			<div class="user-location pt-2">
				<i class="fas fa-map-marker"></i><span> {{ $profile->userDetail->location }}</span>
			</div>
			@endif
		</div>

		<div class="d-sm-none d-md-block col col-md-2">
			<div class="user-follower pt-2">
				<h2>
					<a class="nav-item" href="#!">{{ $profile->followers->count() }}
					</a>
				</h2>
				<label>Followers</label>
			</div>

			<div class="user-following pt-1">
				<h2>
					<a class="nav-item" href="#!">
						{{ $profile->following->count() }}
					</a>
				</h2>
				<label>Following</label>
			</div>
		</div>
	</div>
	
</div>

<div class="container user-activity">
		
	@if($profile->name == Auth::user()->name)
	<div class="pt-2 link-to-edit">
		<a href="/people/{{ $user }}/edit"><i class="far fa-edit"></i> Edit your profile</a>
	</div>
	@endif
	<div class="user-buttons pt-3 mt-3 lower-box">
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link activity-btn active show" data-id="{{ $profile->id }}" data-toggle="tab" href="#user-activity">Activities</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#followers">Followers</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#following">Following</a>
		  </li>
		</ul>
	</div>
	<div class="tab-content pt-1 lower-box">
		<div id="user-activity" class="tab-pane fade show active">
			<div class="grid2">
				
			{{-- List of Activies by a user --}}
			@foreach($activities->reverse() as $activity)
			@if(isset($activity->subject))
			{{-- <div class="activity-list row py-2"> --}}
			<div class="activity-list grid-sizer2 grid-item--width2 clearfix pt-3 mb-3">
					<div class="first-column px-1">
						
						@if ($activity->subject_type == "App\Comment")
						<p>
							<a href="/people/{!! $activity->causer->getSnakeCaseName() !!}">{{ $activity->causer->name }}</a> commented to
							@if($activity->subject->post['user']['name'] == $profile->name)
								@if($profile->userDetail->gender == 'Male')
								his
								@else
								her
								@endif
								own
							@else
							<a href="/people/{!! $activity->subject->post->user->getSnakeCaseName() !!}">{{ $activity->subject->post->user->name }}</a>'s
							@endif 
							<a href="/posts/{{ $activity->subject->post->id }}#{{ $activity->subject->id }}">post.</a>
						</p>
						@elseif($activity->subject_type == "App\Post")
						<p>
							<a href="/people/{!! $activity->causer->getSnakeCaseName() !!}">
								{{ $activity->causer->name }}
							</a>
							posted in
							<a href="/posts/?topic={{ strtolower($activity->subject->topic->topic) }}"> {{ $activity->subject->topic->topic }}.</a>
						</p>
						@endif
					</div> {{-- first-column --}}
					

					{{-- second-column --}}
					<div class="second-column px-1">
						@if($activity->subject_type == "App\Comment")
						
						<div class="pb-2">
							<div class="pb-1">
								<a href="/posts/{{ $activity->subject->post->id }}">
									<span class="h6">{{ $activity->subject->post['title'] }}</span>
								</a>
							</div>
							<div>
								<small><i class="fas fa-tag"></i> Posted in <a href="/posts/?topic={{ strtolower($activity->subject->post->topic->topic) }}">{{ $activity->subject->post->topic->topic }}</a>
								</small>
							</div>
						</div>
							
							@if( $activity->subject->post->hasImage() )
							<div class="pb-2 image-wrapper">
								<a href="/posts/{{ $activity->subject->post->id }}">
									<img src='{!! $activity->subject->post->getImagepath() !!}' class="post-image">
								</a>
							</div>	
							@endif

						<div>
							<p>
								{{ $activity->subject->comment}}
							</p>
							<p>
								<small class="text-muted">{{ $activity->subject->created_at->toFormattedDateString() }} {{ $activity->subject->created_at->setTimezone(Auth::user()->timezone)->format('g:i A') }}
								</small>
							</p>
						</div>
						
						@elseif($activity->subject_type == 'App\Post')	
						
							<a href="/posts/{{ $activity->subject->id }}">
								<div>
									<p>
										<span class="h6">{{ $activity->subject->title }}</span>
									</p>
								</div>
							</a>
							
							@if( $activity->subject->hasImage() )
							<div class="pb-2 image-wrapper">
								<a href="/posts/{{ $activity->subject->id }}">
									<img src='{!! $activity->subject->getImagepath() !!}' class="post-image">
								</a>
							</div>	
							@endif
							<div>
								<p>
									{{ $activity->subject->content }}
								</p>
							</div>

							<div>
								<p>
									<small class="text-muted">{{ $activity->subject->created_at->toFormattedDateString() }} {{ $activity->subject->created_at->setTimezone(Auth::user()->timezone)->format('g:i A') }} </small>
								</p>
							</div>
						@endif
					</div>	{{-- second-column --}}
			</div>
			@endif
			@endforeach
			</div>
		</div>

		<div id="followers" class="tab-pane fade">
			<h3>Followers</h3>
		    <div class="row">
			    @foreach($profile->followers as $follower)
					{{-- <p>{{ $follower->name }}</p> --}}
					<div class="clearfix col-md-6">
						<div class="card mb-3">
							<div class="card-header">
								<div class="float-right u-f-btn" id="u-f-btn-{{ $follower->id }}">
									@if (Auth::user()->name == $profile->name)
									<div class="follow list-of-followers mt-2" id="follow-{{ $follower->id }}">
										@if(in_array($follower->id,$following))
										
										<a href="#" class="px-3 py-2 btn btn-warning btn-sm unfollow-user-btn" data-user="{{ $follower->name }}" data-id="{{ $follower->id }}" id="uf-btn-{{ $follower->id }}"><i class="fas fa-user-times"></i> Unfollow</a>

										@else				

										<a href="#" class="px-3 py-2 btn btn-info btn-sm follow-user-btn" data-user="{{ $follower->name }}" data-id="{{ $follower->id }}" id="f-btn-{{ $follower->id }}"><i class="fas fa-user-plus"></i> Follow</a>

										@endif
									</div>
									@endif
								</div>

								<div class="profile-summary">
									<a href="#" class="user-pic float-left mr-3">
										<img src="{!! $follower->getPhotoPath() !!}">
									</a>
									<div class="user-details">
										<h5><a href="/people/{{ $follower->name }}">{{ $follower->name }}</a></h6>
										<h6>User</h6>
									</div>
								</div> {{-- profile-summary --}}
							</div>
						</div> {{-- card --}}
					</div>
			    @endforeach
		    </div>
		</div>

		<div id="following" class="tab-pane fade">
			<h3>Following</h3>

			<div class="row">
			    @foreach($profile->following as $my_following)
					{{-- <p>{{ $follower->name }}</p> --}}
					<div class="clearfix col-md-6">
						<div class="card mb-3">
							<div class="card-header">
								<div class="float-right u-f-btn" id="u-f-btn-{{ $my_following->id }}">
									@if (Auth::user()->name == $profile->name)
									<div class="follow list-of-followers mt-2" id="follow-{{ $my_following->id }}">
										@if(in_array($my_following->id,$following))
										
										<a href="#" class="px-3 py-2 btn btn-warning btn-sm unfollow-user-btn" data-user="{{ $my_following->name }}" data-id="{{ $my_following->id }}" id="uf-btn-{{ $my_following->id }}"><i class="fas fa-user-times"></i> Unfollow</a>

										@else				

										<a href="#" class="px-3 py-2 btn btn-info btn-sm follow-user-btn" data-user="{{ $my_following->name }}" data-id="{{ $my_following->id }}" id="f-btn-{{ $my_following->id }}"><i class="fas fa-user-plus"></i> Follow</a>

										@endif
									</div>
									@endif
								</div>

								<div class="profile-summary">
									<a href="#" class="user-pic float-left mr-3">
										<img src="{!! $my_following->getPhotoPath() !!}">
									</a>
									<div class="user-details">
										<h5><a href="/people/{{ $my_following->name }}">{{ $my_following->name }}</a></h6>
										<h6>User</h6>
									</div>
								</div> {{-- profile-summary --}}
							</div>
						</div>
					</div>
			    @endforeach
		    </div>
		</div>
	</div>
</div> <!-- container -->
@include('partials.modal')
@endsection