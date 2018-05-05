@extends('layouts.app')

@section('content')
	
	<div class="container-fluid py-4" style="background-color: #fff; height: inherit;">
        <div class="posts-header">
            <h1>{{ $topic_name }}</h1>
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-faded">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          {{-- <a class="navbar-brand" href="/posts/?filter=trending">Trending</a> --}}
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="/posts/">Most Recent</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/posts/?filter=trending">Trending</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Groups</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Filter</a>
              </li>
            </ul>
          </div>
        </nav>
        {!! $posts->appends($_GET)->links() !!}
        <div class="grid pt-4 mt-3">
			@foreach ($posts as $post)
			{{-- <div class="outer-card mr-3 mb-3" id="card_{{ $post->id }}" style="width: 300px;"> --}}
				<div class="card bg-light mb-3 grid-sizer grid-item" id="card_{{ $post->id }}">
                        <div class="card-header clearfix">
        					<a href="/people/{{ str_replace(" ", "-", strtolower($post->user->name)) }}" class="float-left">
                                @if (!empty($post->user->userDetail->avatar))
                                    <img src='{{ asset("storage/upload/user_avatar/".$post->user->userDetail->avatar) }}' class="user-pic">
                                @else
                                    <img src='{{ asset("images/default.png") }}' class="user-pic">
                                @endif    						
                                <span class="card-poster mt-1">
                                    {{ $post->user->name }}
                                </span>
                            </a>        
    						<span class="float-right action-btns">
                            @auth    
    							@if ($post->user->name == Auth::user()->name)
    							<a href='{{ url("posts/$post->id/edit") }}' class="edit-post p-1">
    								<i class="far fa-edit"></i>
    							</a>
    							<a href="#" class="delete-post p-1" data-id="{{ $post->id }}">
    								<i class="far fa-trash-alt"></i>
    							</a>

                                @else
                                    @if(in_array($post->user->id, $following))
                                    <button type="button" class="btn btn-warning btn-sm unfollow-user-btn uf-user-{{ $post->user->id }}" data-user="{{ $post->user->name }}" data-id="{{ $post->user->id }}" id="uf-btn-{{ $post->user->id }}"><i class="fas fa-user-times"></i></button>
{{-- 
                                    <a href="#!" title="Unfollow" class="btn btn-warning btn-sm unfollow-user-btn" data-user="{{ $post->user->name }}" data-id="{{ $post->user->id }}" id="uf-btn-{{ $post->user->id }}"><i class="fas fa-user-times"></i></a> --}}
                                    @else
                                    <button type="button" class="btn btn-info btn-sm follow-user-btn f-user-{{ $post->user->id }}" data-user="{{ $post->user->name }}" data-id="{{ $post->user->id }}" id="f-btn-{{ $post->user->id }}"><i class="fas fa-user-plus"></i></button>
                                    @endif
    							@endif
                            @endauth
    						</span>
    					</div>
                    
					<div class="card-body">
						<div class="card-title h5 pb-1">
                            <a href='{{ url("posts/$post->id") }}'>{{ $post->title }}</a>
                        </div>
						<p>{{ $post->content }}</p>
					</div>
					@if ($post->image != NULL)
                        <a href='{{ url("posts/$post->id") }}'>
    						<img src='{{ asset("storage/upload/post/$post->image") }}'>
    					</a>
                    @endif
					<div class="card-footer">
						<div class="m-0">
                            <div class="num-comments">
                                <a href="/posts/{{ $post->id }}#comment-body-{{ $post->id }}"><i class="fas fa-comments"></i> {{ $post->comments->count() }}</a>
                            </div>
							<div>
                                <i class="fas fa-tag"></i>
                                Posted in
                                <a href="/posts/?topic={{ strtolower($post->topic->topic) }}">{{ $post->topic->topic }}</a>
                            </div>
                            <div>
                                <i class="far fa-clock"></i>
                                {{ $post->created_at->diffForHumans() }}
                            </div>
						</div>
					</div>
				</div>
			{{-- </div> --}}
			@endforeach
		</div>
	</div>
	
    
    {{-- Modal for creatig new Post --}}
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
                    <button type="submit" class="btn btn-primary float-right">Save</button>
                </div>
            </form>
            @else
                <div class="h2">
                    Please Sign in
                </div>
            @endauth
          </div>
          {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>  --}}
        </div>
      </div> 
    </div> <!-- /.modal -->
@endsection