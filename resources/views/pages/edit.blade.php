@extends('layouts.app')

@section('content')
<div class="edit-wrapper p-4">
	@if(Session::has('status'))
		<div class="alert alert-secondary">
			<strong class="h5">{{ Session::get('status') }}</strong>
		</div>
	@endif
	<div class="title-edit-page">
		<h2 class="pt-2"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
	</div>
		<div class="container-fluid py-4 outer-edit-box">
			<div class="mx-2 inner-edit-box">
				<div class="header-edit row">
					<span class="col col-md-6 lead pl-3">Edit Post</span>
					<div class="col col-md-6 lead pl-3">
						<a class="float-right h6 py-1 px-2 delete-post-from-post-page del-btn" data-id="{{ $post->id }}">
							<i class="far fa-trash-alt"></i> Delete
						</a>
					</div>
				</div>

				<form method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row">
						<div class="edit-content col-md-8 left-side">
							<div class="first-row row px-3">
								<div class="form-group col-md-6 col-sm-12 py-3">
									{{-- <div class="col-5 py-3"> --}}
									<label>Topic</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-addon"><i class="fas fa-bookmark"></i></span>
											</div>
											<select name="topic" class="form-control">
												@foreach ($topics as $topic)
													<option value="{{ $topic->id }}" @if($topic->id == $post->topic_id) selected @endif>{{ $topic->topic }}</option>
												@endforeach
											</select>
										</div>
									{{-- </div>  --}}
								</div> {{-- form-group --}}

								<div class="form-group col-md-6 col-sm-12 py-3">
									<label>Youtube Video URL</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-addon"><i class="fab fa-youtube-square"></i></span>
										</div>
										<input type="text" class="form-control" name="youtube" placeholder="YouTube URL...">
									</div>
								</div>
							</div> {{-- first-row --}}

							<div class="second-row">
								<div class="form-group">
									<div class="col py-3">
										<label>Title</label>
										<input type="text" class="form-control" name="title" value="{{ $post->title }}">
									</div>
								</div>
							</div>

							<div class="third-row">
								<div class="form-group">
									<div class="col py-3">
										<label>Text</label>
										<textarea name="content" class="form-control" rows="7">{{ $post->content }}</textarea>
									</div>
								</div>
							</div>

							<div class="fourth-row">
								<div class="col mt-2">
									<input type="submit" name="save_edit" value="Save" class="btn btn-primary float-right px-4">
								</div>
							</div>
						</div> {{-- edit-content --}}

						<div class="col-md-4 right-side pt-3">
							<div class="form-group">
								<label>Image</label>
								<div class="file-input">
									<div class="image-row">
										@if(!empty($post->image))
										<div class="inner-image">
											<img src='{{ asset("uploads/post/$post->image") }}' id="image-tag">
										</div>
										@else
										<div class="inner-image">
											<p>No Image</p>
										</div>
										@endif
									</div>
									<span class="input-group-btn">
										 <div class="btn btn-primary btn-sm my-2 custom-file-uploader">
		                                    <input type="file" name="image" id="edit-image">
		                                    <i class="fas fa-folder-open fa-2x"></i>                    
		                                </div>
									</span> 
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="checkbox check-danger">
											<input type="checkbox" name="delete_image" value="y" id="delete_image">
											<label for="delete_image" class="text-muted" style="text-transform: none; font-weight: 400; font-size: 14px;">Remove Image</label>
										</div>
									</div>
								</div>
							</div>
						</div> {{-- right-side --}} 
					</div> {{-- row --}}
				</form>
			</div> {{-- inner-edit-box --}}
		</div>
	</div>

@endsection