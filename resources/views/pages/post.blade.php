@extends('layouts.app')

@section('content')

<div class="wrapper px-3">
	<div class="container-fluid post-preview pt-2 my-4" style="background-color: transparent;">
		<div class="row px-3">
			<div class="col-12 col-md-8 col-lg-9">		
				<div class="row py-3 mb-4" style="background-color: #fff;">
								
					<div class="col-12 col-md-6">
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
							<a href="/people/{!! $post->user->getSnakeCaseName() !!}">
								<span class="h5 user">{{ $post->user->name }}</span>
							</a>
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
					
					@if ( $post->hasImage() )
					<div class="col-12 col-md-6 mt-5">
						<div class="post-image">
							<img src='{!! $post->getImagepath() !!}'>
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
										<a href='/people/{{ $comment->user->getSnakeCaseName() }}' class="h6">
											<img src="{!! $comment->user->getPhotoPath() !!}">
											{{ $comment->user->name }}
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


			<div class="col-12 col-md-4 col-lg-3 side-bar">
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
@include('partials.modal')
@endsection