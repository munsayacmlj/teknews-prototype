@extends('layouts.app')


@section('content')
	
	<div class="container pt-4">
		<div id="chat">
			<div class="row">
				<div class="col-md-9">
					<div class="card">
						<div class="card-header">
							<span class="h2">Chatroom</span>
						</div>

						<div class="card-block">
							<chat-log :messages="messages"></chat-log>
							<chat-composer @messagesent="addMessage" current-user="{{ Auth::user()->name }}"></chat-composer>
						</div>
					</div> {{-- card --}}
				</div> {{-- col-md-8 --}}
				<div class="col-md-3">
					<div>
						<span class="h5">Online Users</span>
						<span class="badge badge-primary h6">@{{ usersInRoom.length }}</span>
						<list-of-users :users="usersInRoom"></list-of-users>
						{{-- @{{ messages[0]['user']['userDetail'] }} --}}
					</div>
				</div> {{-- col-md-3 --}}
			</div> {{-- row --}}
		</div>
	</div>
	

@endsection