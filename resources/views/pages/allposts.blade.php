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
              <img src="{!! $post->user->getPhotoPath() !!}" class="user-pic">					
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
					@if ($post->hasImage())
            <a href='{{ url("posts/$post->id") }}'>
    					<img src='{!! $post->getImagepath() !!}'>
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
@include('partials.modal')
@endsection