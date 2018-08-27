@extends('layouts.app')

@section('content')

<div class="edit-profile-wrapper p-4">
	@if(Session::has('status'))
		<div class="alert alert-secondary">
			<strong class="h5">{{ Session::get('status') }}</strong>
		</div>
	@endif
	<section class="container-fluid edit-profile-section pt-4">
		<div class="card inner-edit-profile mr-0 ml-0">
			<div class="card-header">
				<span class="card-title">EDIT PROFILE</span>
			</div>
			<div class="card-block px-2 mx-2">
				<h3 class="pl-4 my-4">Profile</h3>
				
				<form method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row">
						<div class="col col-md-8 left-side">
							<div class="row first-row pl-4">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" value="{{ $profile->name }}" name="name" id="name" required>
									</div>
								</div>

								<div class="col-sm-2">
									<div class="form-group">
										<label for="age">Age</label>
										
										<input class="form-control" type="text" name="age" value="{{ $profile->userDetail->age }}">
									</div>
								</div>
								
								<div class="col-sm-2">
									<div class="form-group">
										<label for="gender">Gender</label>
										<select name="gender" id="gender" class="form-control">
											<option value="Male" selected>Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<label for="location">Location</label>
										<input type="text" name="location" id="location" value="{{ $profile->userDetail->location }}" class="form-control">
									</div>
									
								</div>
							</div>

							<div class="bio pl-4">
								<div class="form-group">
									<label for="bio">Bio</label>
									<textarea name="bio" id="bio" class="form-control" rows="10">{{ $profile->userDetail->bio }}</textarea>
								</div>
							</div>

							<div class="button-row pl-4 mb-4">
								<div>
									<button type="submit" class="btn btn-primary btn-lg">Update</button>
									<a href="/people/{{ $user }}" class="btn btn-outline-secondary btn-lg">View Profile</a>
								</div>
							</div>
						</div> {{-- col-md-8 --}}

						<div class="col col-md-4 right-side">
							<div class="form-group">
								<label>Avatar</label>
								<div class="file-input">
									
									<div class="avatar-preview">
										<div class="default-avatar">
											<img src="{!! Auth::user()->getPhotoPath() !!}" class="image-tag">
										</div>
									</div>

									<span class="input-group-btn">
										 <div class="btn btn-primary btn-sm my-2 custom-file-uploader">
                        <input type="file" name="avatar" id="edit-image">
                        <i class="fas fa-folder-open fa-2x"></i>                    
	                    </div>
									</span> 
								</div> {{-- file-input --}}
								<div class="form-group">
									<div class="input-group">
										<div class="checkbox check-danger">
											<input type="checkbox" name="delete_image" value="y" id="delete_image">
											<label for="delete_image" class="text-muted" style="text-transform: none; font-weight: 400; font-size: 14px;">Remove Image</label>
										</div>
									</div>
								</div> {{-- checkbox --}}
							</div> {{-- form-group --}}
						</div>
					</div> {{-- row --}}
				</form>		
			</div>
		</div>
	</section>
</div> {{-- edit-profile-wrapper --}}
@include('partials.modal')
@endsection