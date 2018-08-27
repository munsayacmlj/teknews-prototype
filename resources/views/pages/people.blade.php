@extends('layouts.app')

@section('content')
	
	<section class="people-heading py-4">
		<span class="h1 pl-3 pr-1 text-muted">Search</span><strong class="h1">People</strong>
		<span class="float-right pr-4 mr-4"><input type="text" name="search" class="form-control" placeholder="Search user..."></span>
	</section>
	<div class="container-fluid py-4 people-wrapper">
		<div class="row">
			<div class="col col-sm-8">
				<div class="row">
					@foreach($all_users as $this_user)
					{{-- {{ $this_user->following->id }} --}}
						@if ($this_user->name != Auth::user()->name)
							<div class="clearfix col-md-6">
								<div class="card mb-4 inner-card">
									<div class="card-header cleafix py-3">
										<div class="float-right u-f-btn" id="u-f-btn-{{ $this_user->id }}">
											<div class="follow mt-2" id="follow-{{ $this_user->id }}">
												@if(in_array($this_user->id,$following))
												
												<a href="#" class="px-3 py-2 btn btn-warning unfollow-user-btn" data-user="{{ $this_user->name }}" data-id="{{ $this_user->id }}" id="uf-btn-{{ $this_user->id }}"><i class="fas fa-user-times"></i> Unfollow</a>

												@else				

												<a href="#" class="px-3 py-2 btn btn-info follow-user-btn" data-user="{{ $this_user->name }}" data-id="{{ $this_user->id }}" id="f-btn-{{ $this_user->id }}"><i class="fas fa-user-plus"></i> Follow</a>

												@endif
											</div>
										</div>

										<div class="profile-summary">
											<a href="#" class="user-pic float-left mr-3">
												<img src="{!! $this_user->getPhotoPath() !!}">
											</a>
											<div class="user-details">
												<h5><a href="/people/{!! $this_user->getSnakeCaseName() !!}">{{ $this_user->name }}</a></h6>
												<h6>User</h6>
											</div>
										</div>
									</div>
								</div>
							</div> {{--  --}}
						@endif
					@endforeach
				</div>
			</div>

			<div class="col col-sm-4">
				
			</div>
		</div>
	</div>

@endsection