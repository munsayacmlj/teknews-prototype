@extends('layouts.app')

@section('content')

<div class="wrapper px-3">
	<div class="container-fluid post-preview pt-2 my-4" style="background-color: transparent;">
		<div class="row px-3">
			<div class="col col-sm-12 col-md-8 col-lg-9">		
				<div class="row py-3 mb-4" style="background-color: #fff;">
								
					<div class="col col-md-6">
						<div class="first-row">
							<span><i class="fas fa-tag"></i> 
								<a href="/posts/?topic={{ strtolower($post->topic->topic) }}"> {{ $post->topic->topic }}
								</a>
							</span>
							@if (Auth::user()->name == $post->user->name)	
								<span class="float-right edit-post px-3 py-1">
									<a href='{{ url("posts/$post->id/edit") }}'>
										<i class="far fa-edit"></i> Edit
									</a>
								</span>
							@endif
						</div>

						<div class="second-row py-3">
							<span class="h5 user">{{ $post->user->name }}</span>
						</div>

						<div class="third-row py-1">
							<span class="h3">{{ $post->title }}</span>
						</div>

						<div class="fourth-row">
							<span><i class="far fa-clock"></i> Posted {{ $post->created_at->diffForHumans() }}</span>
						</div>
						<div class="fifth-row py-2">
							<p>
								{{ $post->content }}
							</p>
						</div>
					</div>
					
					@if (!empty($post->image))
					<div class="col col-sm-12 col-md-6 mt-5">
						<div class="post-image">
							<img src='{{ asset("storage/upload/post/$post->image") }}'>
						</div>
					</div>
					@endif
				</div>	{{-- row --}}		

				<div class="comment-wrapper">
					<div class="comment-heading py-3">
						<span class="h3">Comments</span>
					</div>
					<div class="comment-body-wrapper">
						<div class="comment-body" id="comment-body-{{ $post->id }}">

							{{-- comments here --}}
							@foreach ($post->comments as $comment)
								<div class="comment mx-3 pt-2" id="{{ $comment->id }}">
									<span class="commenter">
										<a href='/people/{{ $user }}' class="h6">
											<img src='{{ asset("storage/upload/user_avatar/".$comment->user->userDetail->avatar) }}'> {{ $comment->user->name }}
										</a> said on {{ $comment->created_at->toFormattedDateString() }}, {{ $comment->created_at->setTimezone(Auth::user()->timezone)->format('g:i A') }}
									</span>
									
									@if ((Auth::user()->name == $comment->user->name))				
										<span class="p-1 edit-delete text-muted" id="editDelete_{{ $comment->id }}">
											<small class="px-1 edit-comment" data-post-id="{{ $post->id }}" data-id="{{ $comment->id }}">Edit</small>
									@endif
									@if ((Auth::user()->name == $post->user->name) || (Auth::user()->name == $comment->user->name))
											<small class="px-1 delete-comment" data-post-id="{{ $post->id }}" data-id="{{ $comment->id }}">Delete</small>
									@endif
										</span>
									<div id="editArea_{{ $comment->id }}" class="edit-area py-2">
										<textarea id="commentArea_{{ $comment->id }}" class="comment-input" cols="35">{{ $comment->comment }}</textarea>
										<br>
										<small class="px-1 save-comment text-muted" id="saveBtn_{{ $comment->id }}" data-id="{{ $comment->id }}" data-post-id="{{ $post->id }}">Save</small>
										<small class="px-1 cancel-comment text-muted" id="cancelBtn_{{ $comment->id }}" data-id="{{ $comment->id }}">Cancel</small>
									</div>
									<p id="comment_{{ $comment->id }}" class="comment-paragraphs">{{ $comment->comment }}</p>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				
			</div> {{-- col-md-8 --}}


			<div class="col col-md-4 col-lg-3 side-bar">
				<div class="add-comment-section pt-2" style="background-color: #fff;">
					<div class="first-row py-2">
						<span class="pl-4">Community Response</span>
					</div>

					<div class="add-comment-footer form-group py-3 px-2">
						<textarea name="comment" id="comment-area-{{ $post->id }}" class="form-control" rows="7" placeholder="Say Something..."></textarea>
						<button type="button" data-id="{{ $post->id }}" data-user="{{ Auth::user()->name }}" class="btn btn-primary form-control mt-4 comment-btn">Comment</button>
					</div>
				</div>
			</div>
		</div> {{-- row justify-content-md-center --}}
	</div> {{-- container --}}
</div>

	<div class="modal fade stick-up" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding: 0;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header mt-2" style="border-bottom: none;">
            <h5 class="modal-title" id="exampleModalLabel"><span class="text-muted h3">New</span> <span class="h3">Post</span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           @auth
            <form action="/posts" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="topic form-group w-75">
                    <label>Topic</label>
                    <select class="form-control" name="topic_id">
                        @foreach ($topics as $topic)
                        <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="title form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title..." required>
                </div>

                <div class="text form-group">
                    <label>Text</label>
                    <textarea rows="7" class="form-control" placeholder="Say Something..." name="content"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Photo</label>
                        <div class="input-group">
                            <input type="text" id="filename" class="form-control" placeholder="No file selected" readonly>
                            <span class="input-group-btn">
                                <div class="btn btn-default custom-file-uploader">
                                    <input type="file" name="image" id="image">
                                    <i class="fas fa-folder-open fa-2x"></i>                    
                                </div>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary float-right">Save changes</button>
                </div>
            </form>
            @else
                <div class="h2">
                    Please Sign in
                </div>
            @endauth
          </div>
        </div>
      </div> 
    </div> <!-- /.modal -->
    
@endsection