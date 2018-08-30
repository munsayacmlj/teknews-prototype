// $(window).on('load', function() {
// 	$('.grid').masonry({
// 		itemSelector: '.grid-item',
// 		columnWidth: '.grid-sizer',
// 		percentPosition: true,
// 		gutter: 20
// 	});

// 	$('.grid2').masonry({
// 		itemSelector: '.grid-item--width2',
// 		columnWidth: '.grid-sizer2',
// 		percentPosition: true,
// 		gutter: 30
// 	});
// });

var changeFollowToUnfollow = (userId, newId) => {
	$("#f-btn-"+userId).html('<i class="fas fa-user-times"></i> Unfollow');   
	$("#f-btn-"+userId).removeClass('follow-user-btn');		
	$("#f-btn-"+userId).addClass('unfollow-user-btn');	
	$("#f-btn-"+userId).removeClass('btn-info').addClass('btn-warning');	
	$("#f-btn-"+userId).attr('id', newId);
}

var changeUnfollowToFollow = (userId, newId) => {
	$("#uf-btn-"+userId).html('<i class="fas fa-user-plus"></i> Follow'); 
	$("#uf-btn-"+userId).removeClass('unfollow-user-btn');		
	$("#uf-btn-"+userId).addClass('follow-user-btn');
	$("#uf-btn-"+userId).removeClass('btn-warning').addClass('btn-info');
	$("#uf-btn-"+userId).attr('id', newId);
}

$(document).ready(function() {

	$("#image").on("change", function() {
	    let image = this.files[0].name;
	    $("#filename").val(image);
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			let reader = new FileReader();

			reader.onload = function(e) {
				$(".image-tag").attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#edit-image").change(function() {
		readURL(this);
	});

	$(".delete-post").click(function() {
		// e.preventDefault();
		let postId = $(this).data('id');
		
		alertify.confirm('Delete Post', 'Are you sure you want to delete this post?', function() {
			
			$.ajax({
				headers: {
	          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          	},
				url: '/posts/' + postId + '/delete',
				type: 'POST',
				data: {
					
				},
				beforeSend:function() {
					$.blockUI();
				},
				success:function(data) {
					$.unblockUI();
					$('#card_'+postId).remove();
				}
			});

		}, function() {

		});
	});


	$(".comment-btn").click(function () {
		let postId = $(this).data('id');
		let user = $(this).data('user');
		let comment = $("#comment-area-"+postId).val();
		let created_at = $(this).data('time');
		$.ajax({
			headers: {
	          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          	},
			url: '/posts/'+postId+'/comment',
			type: 'POST',
			data: {
				comment: comment,
			},
			beforeSend:function() {
				$.blockUI();
			},
			success:function(data) {
				$.unblockUI();
				console.log(data);
				$("#comment-area-"+postId).val('');
				$(".comment-wrapper").find("#comment-body-"+postId).append("<div class='comment mx-3'><span>" + user + " said on: " + data.time + 
						"</span><p>" + comment +"</p></div>");
				$(".comment-body-wrapper").load(' .comment-body');
			}
		});
	});

	$(".comment-body-wrapper").on('click', '.delete-comment', function() {

		let commentId = $(this).data('id');
		let postId = $(this).data('post-id');

		alertify.confirm('Delete Comment', 'Are you sure you want to delete this comment?', function() {

			$.ajax({
				headers: {
		          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          	},
	          	url: '/posts/'+postId+'/comment/'+commentId+'/delete',
	          	type: 'POST',
	          	data: {
	          		// commentId : commentId
	          	},
	          	beforeSend:function() {
	          		$.blockUI();
	          	},
	          	success:function(data) {
	          		$.unblockUI();
	          		$("#"+commentId).remove();
	          	}

			});

		}, function() {
			
		});
	});


	$(".comment-body-wrapper").on('click', '.save-comment', function() {
		let commentId = $(this).data('id');
		let postId = $(this).data('post-id');
		let input = $("#commentArea_"+commentId).val();

		$.ajax({
			headers: {
		          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          	},
          	url: '/posts/'+postId+'/comment/'+commentId+'/edit',
          	type: 'POST',
          	data: {
          		input: input
          	},
          	beforeSend:function() {
          		$.blockUI();
          	},
          	success:function(data) {
          		$.unblockUI();
          		$("#comment_"+commentId).html(input);
          		$("#editDelete_"+commentId).show();
				$("#editArea_"+commentId).hide();
				$("#comment_"+commentId).show();
          	}
		});
	});

	$(".comment-body-wrapper").on('click', '.edit-comment', function() {
		let commentId = $(this).data('id');
		$("#editDelete_"+commentId).hide();
		$("#editArea_"+commentId).show();
		$("#comment_"+commentId).hide();
	});

	$(".comment-body-wrapper").on('click', '.cancel-comment', function() {
		let commentId = $(this).data('id');
		let originalComment = $("#comment_"+commentId).html();

		$("#editDelete_"+commentId).show();
		$("#commentArea_"+commentId).val(originalComment);
		$("#editArea_"+commentId).hide();
		$("#comment_"+commentId).show();
	});

	$(".profile-details").on('click', '.follow-user-btn', function() {
		let userId = $(this).data('id');
		let name = $(this).data('user');
		let newId = "uf-btn-"+userId;
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: '/people/'+name+'/follow',
			type: 'POST',
			data: {
				userId: userId,
			},
			beforeSend: function() {
				$.blockUI();
			},
			success:function(data) {
				$.unblockUI();
				changeFollowToUnfollow(userId, newId);
			}
		});

	});

	$(".profile-details").on('click', '.unfollow-user-btn', function() {
		let userId = $(this).data('id');
		let name = $(this).data('user');
		let newId = "f-btn-"+userId;
		$.ajax({
			headers: {
		          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	},
    	url: '/people/'+name+'/unfollow',
    	type: 'POST',
    	data: {
    		userId: userId
    	},
    	beforeSend:function() {
    		$.blockUI();
    	},
    	success:function(data) {
    		$.unblockUI();
    		changeUnfollowToFollow(userId, newId);
    	}
		});
	})


	$(".u-f-btn").on('click', '.follow-user-btn', function() {
		let userId = $(this).data('id');
		let name = $(this).data('user');
		let newId = "uf-btn-"+userId;
		$.ajax({
			headers: {
		          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	},
    	url: '/people/'+name+'/follow',
    	type: 'POST',
    	data:{
    		userId: userId
    	},
    	beforeSend:function() {
    		$.blockUI();
    	},
    	success:function(data) {
    		$.unblockUI();
	 			changeFollowToUnfollow(userId, newId);
    	}
		});	
	});
	

	$(".u-f-btn").on('click', '.unfollow-user-btn', function() {
		let userId = $(this).data('id');
		let name = $(this).data('user');
		let newId = "f-btn-"+userId;
		$.ajax({
			headers: {
		          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	},
    	url: '/people/'+name+'/unfollow',
    	type: 'POST',
    	data: {
    		userId: userId
    	},
    	beforeSend:function() {
    		$.blockUI();
    	},
    	success:function(data) {
    		$.unblockUI();
    		changeUnfollowToFollow(userId, newId);
    	}
		});
		
	});

	$(".action-btns").on('click', '.follow-user-btn', function(e) {
		let userId = $(this).data('id');
		let name = $(this).data('user');
		let newId = "uf-btn-"+userId;
		
		$.ajax({
			headers: {
		          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          	},
          	url: '/people/'+name+'/follow',
          	type: 'POST',
          	data:{
          		userId: userId
          	},
          	beforeSend:function() {
          		// $.blockUI({ message: "Please wait..."});
          		$('#f-btn-'+userId).block({
		  			message: null
		  		});
          	},
          	complete:function() {
          		let timer;
          		clearTimeout(timer);
          		timer = setTimeout(function() {
          			$('#f-btn-'+userId).unblock();
          		}, 800);
          	},
          	success:function(data) {
       				changeFollowToUnfollow(userId, newId);
          	}
		});	
	});

	$(".action-btns").on('click', '.unfollow-user-btn', function() {
		let userId = $(this).data('id');
		let name = $(this).data('user');
		let newId = "f-btn-"+userId;
		$.ajax({
			headers: {
		          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          	},
          	url: '/people/'+name+'/unfollow',
          	type: 'POST',
          	data: {
          		userId: userId
          	},
          	beforeSend:function() {
          		$('#uf-btn-'+userId).block({
		  			message: null
		  		});
          	},
          	complete:function() {
          		let timer;
          		clearTimeout(timer);
          		timer = setTimeout(function() {
          			$('#uf-btn-'+userId).unblock();
          		}, 800);
          	},
          	success:function(data) {
          		changeUnfollowToFollow(userId, newId);
          	}
		});
		
	});


	$(".list-of-followers").on('click', '.follow-user-btn', function() {
		let userId = $(this).data('id');
		let name = $(this).data('user');
		let newId = "f-btn-"+userId;
		$.ajax({
			headers: {
		          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          	},
          	url: '/people/'+name+'/follow',
          	type: 'POST',
          	data: {
          		userId: userId
          	},
          	beforeSend:function() {
          		$('#f-btn-'+userId).block({
		  			message: null
		  		});
          	},
          	complete:function() {
          		let timer;
          		clearTimeout(timer);
          		timer = setTimeout(function() {
          			$('#f-btn-'+userId).unblock();
          		}, 800);
          	},
          	success:function(data) {
          		changeFollowToUnfollow(userId, newId);
          	}
		});
		
	});

	$(".list-of-followers").on('click', '.unfollow-user-btn', function() {
		let userId = $(this).data('id');
		let name = $(this).data('user');
		let newId = "f-btn-"+userId;
		$.ajax({
			headers: {
		          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          	},
          	url: '/people/'+name+'/unfollow',
          	type: 'POST',
          	data: {
          		userId: userId
          	},
          	beforeSend:function() {
          		$('#uf-btn-'+userId).block({
		  			message: null
		  		});
          	},
          	complete:function() {
          		let timer;
          		clearTimeout(timer);
          		timer = setTimeout(function() {
          			$('#uf-btn-'+userId).unblock();
          		}, 800);
          	},
          	success:function(data) {
          		changeUnfollowToFollow(userId, newId);
          	}
		});
		
	});

	

});
